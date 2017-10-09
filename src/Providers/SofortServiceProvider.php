<?php
namespace Sofort\Providers;

use Plenty\Modules\Basket\Contracts\BasketRepositoryContract;
use Plenty\Modules\Basket\Events\Basket\AfterBasketChanged;
use Plenty\Modules\Basket\Events\Basket\AfterBasketCreate;
use Plenty\Modules\Basket\Events\BasketItem\AfterBasketItemAdd;
use Plenty\Modules\EventProcedures\Services\Entries\ProcedureEntry;
use Plenty\Modules\EventProcedures\Services\EventProceduresService;
use Plenty\Modules\Frontend\Events\FrontendLanguageChanged;
use Plenty\Modules\Frontend\Events\FrontendShippingCountryChanged;
use Plenty\Modules\Payment\Events\Checkout\ExecutePayment;
use Plenty\Modules\Payment\Events\Checkout\GetPaymentMethodContent;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use Plenty\Modules\Payment\Models\Payment;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\Log\Loggable;
use Plenty\Plugin\ServiceProvider;
use Sofort\Helper\PaymentHelper;
use Sofort\Methods\SofortPaymentMethod;
use Sofort\Procedures\RefundEventProcedure;
use Sofort\Providers\SofortRouteServiceProvider;
use Sofort\Services\PaymentService;

/**
 * Class SofortServiceProvider
 *
 * @package Sofort\Providers
 */
class SofortServiceProvider extends ServiceProvider
{

	use Loggable;

	/**
	 * Register the route service provider
	 */
	public function register()
	{
		$this->getApplication()->register(SofortRouteServiceProvider::class);
		$this->getApplication()->bind(RefundEventProcedure::class);
	}
	
	/**
	 * @param Dispatcher $eventDispatcher
	 * @param PaymentHelper $paymentHelper
	 * @param PaymentService $paymentService
	 * @param BasketRepositoryContract $basket
	 * @param PaymentMethodContainer $payContainer
	 * @param EventProceduresService $eventProceduresService
	 */
	public function boot(Dispatcher $eventDispatcher,
						 PaymentHelper $paymentHelper,
						 PaymentService $paymentService,
						 BasketRepositoryContract $basket,
						 PaymentMethodContainer $payContainer,
						 EventProceduresService $eventProceduresService)
	{

		$payContainer->register('sofort::SOFORT', SofortPaymentMethod::class, [
			AfterBasketChanged::class,
			AfterBasketItemAdd::class,
			AfterBasketCreate::class,
			FrontendLanguageChanged::class,
			FrontendShippingCountryChanged::class
		]);

		$refundNames = [
			'de' => 'Rückerstattung der Sofort-Zahlung',
			'en' => 'Refund of Sofort Payment'
		];
		$eventProceduresService->registerProcedure('sofort', ProcedureEntry::EVENT_TYPE_ORDER, $refundNames,'\Sofort\Procedures\RefundEventProcedure@run');

		$eventDispatcher->listen(GetPaymentMethodContent::class,
				function(GetPaymentMethodContent $event) use($paymentHelper, $basket, $paymentService ) {

			if ($event->getMop() == $paymentHelper->getSofortMopId()) {
				$basket = $basket->load();
				$event->setValue($paymentService->getPaymentContentByBasket($basket));
				$event->setType($paymentService->getReturnType());
			}

		});

		$eventDispatcher->listen(ExecutePayment::class,
				function(ExecutePayment $event) use ($paymentHelper, $paymentService) {

			if ($event->getMop() == $paymentHelper->getSofortMopId()) {

				$sofortPaymentData = $paymentService->executePayment();

				if ($paymentService->getReturnType() != 'errorCode') {
					$creditPayment = $paymentHelper->createPlentyPayment($sofortPaymentData);
					if ($creditPayment instanceof Payment) {
						$paymentHelper->assignPlentyPaymentToPlentyOrder($creditPayment, $event->getOrderId());
						$event->setType('success');
						$event->setValue('The Sofort-Payment has been executed successfully!');
					}
				} else {
					$event->setType('error');
					$event->setValue('The Sofort-Payment could not be executed!');
				}
			}
		});
	}
}