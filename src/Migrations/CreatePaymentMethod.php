<?php
namespace Sofort\Migrations;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;
use Sofort\Helper\PaymentHelper;

/**
 * Class CreatePaymentMethod
 * 
 * @package Sofort\Migrations
 */
class CreatePaymentMethod
{
	/**
	 * @var PaymentMethodRepositoryContract
	 */
	private $paymentMethodRepositoryContract;

	/**
	 * @var PaymentHelper
	 */
	private $paymentHelper;

	/**
	 * CreatePaymentMethod constructor.
	 *
	 * @param PaymentMethodRepositoryContract $paymentMethodRepositoryContract
	 * @param PaymentHelper $paymentHelper
	 */
	public function __construct(PaymentMethodRepositoryContract $paymentMethodRepositoryContract,
								PaymentHelper $paymentHelper)
	{
		$this->paymentMethodRepositoryContract = $paymentMethodRepositoryContract;
		$this->paymentHelper = $paymentHelper;
	}

	/**
	 * 
	 */
	public function run()
	{
		if ($this->paymentHelper->getSofortMopId() == 'no_paymentmethod_found') {
			$paymentMethodData = ['pluginKey' => 'sofort', 'paymentKey' => 'SOFORT', 'name' => 'SOFORT'];
			$this->paymentMethodRepositoryContract->createPaymentMethod($paymentMethodData);
		}
	}
}