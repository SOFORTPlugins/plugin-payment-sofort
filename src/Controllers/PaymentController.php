<?php
namespace Sofort\Controllers;

use Plenty\Modules\Basket\Contracts\BasketRepositoryContract;
use Plenty\Modules\Order\Contracts\OrderRepositoryContract;
use Plenty\Modules\Order\Models\Order;
use Plenty\Plugin\ConfigRepository;
use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Templates\Twig;
use Sofort\Helper\PaymentHelper;
use Sofort\Services\PaymentService;
use Sofort\Services\SessionStorageService;

/**
 * Class PaymentController
 * 
 * @package Sofort\Controllers
 */
class PaymentController extends Controller
{
	/**
	 * @var Request
	 */
	private $request;

	/**
	 * @var Response
	 */
	private $response;

	/**
	 * @var ConfigRepository
	 */
	private $config;

	/**
	 * @var PaymentHelper
	 */
	private $paymentHelper;

	/**
	 * @var BasketRepositoryContract
	 */
	private $basketContract;

	/**
	 * @var OrderRepositoryContract
	 */
	private $orderContract;

	/**
	 * @var SessionStorageService
	 */
	private $sessionStorage;

	/**
	 * @var PaymentService
	 */
	private $paymentService;

	/**
	 * @var Twig
	 */
	private $twig;

	/**
	 * PaymentController constructor.
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param ConfigRepository $config
	 * @param PaymentHelper $paymentHelper
	 * @param BasketRepositoryContract $basketContract
	 * @param SessionStorageService $sessionStorage
	 * @param PaymentService $paymentService
	 * @param OrderRepositoryContract $orderContract
	 * @param Twig $twig
	 */
	public function __construct(Request $request,
								Response $response,
								ConfigRepository $config,
								PaymentHelper $paymentHelper,
								BasketRepositoryContract $basketContract,
								SessionStorageService $sessionStorage,
								PaymentService $paymentService,
								OrderRepositoryContract $orderContract,
								Twig $twig)
	{
		$this->request = $request;
		$this->response = $response;
		$this->config = $config;
		$this->paymentHelper = $paymentHelper;
		$this->basketContract = $basketContract;
		$this->sessionStorage = $sessionStorage;
		$this->paymentService = $paymentService;
		$this->orderContract = $orderContract;
		$this->twig = $twig;
	}

	/**
	 * @return Response
	 */
	public function checkoutCancel()
	{
		$this->sessionStorage->setSessionValue(SessionStorageService::SOFORT_PAY_ID, null);

		return $this->response->redirectTo('checkout');
	}

	/**
	 * @return Response
	 */
	public function checkoutSuccess()
	{
		$paymentId = $this->request->get('transactionId');
		$sofortPayId = $this->sessionStorage->getSessionValue(SessionStorageService::SOFORT_PAY_ID);

		if ($paymentId != $sofortPayId) {
			return $this->checkoutCancel();
		}

		return $this->response->redirectTo('place-order');
	}

	/**
	 * @return Response
	 */
	public function sofortCheckout()
	{
		$orderId = (int) $this->request->get('orderId');
		if ($orderId) {
			/* @var $order Order */
			$order = $this->orderContract->findOrderById($orderId);
			if ($order instanceof Order) {
				$paymentUrl = $this->paymentService->getPaymentContentByOrder($order);
				return $this->response->json(['redirectUrl' => $paymentUrl]);
			}
		} else {
			return $this->response->json(['error' => ['msg' => 'No order found']], Response::HTTP_BAD_REQUEST);
		}
	}

	/**
	 * @return Response
	 */
	public function notification()
	{
		$transactionData = $this->paymentService->notificationStatus($this->request->getContent());
		if (isset($transactionData['error'])) {
			return $this->response->json($transactionData, Response::HTTP_BAD_REQUEST);
		}
		$this->paymentHelper->updatePayment($transactionData['status'], $transactionData['transactionId']);

		return $this->response->json(['ok']);
	}
}