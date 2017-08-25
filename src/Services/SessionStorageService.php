<?php
namespace Sofort\Services;

use Plenty\Modules\Frontend\Session\Storage\Contracts\FrontendSessionStorageFactoryContract;
use Plenty\Modules\Frontend\Session\Storage\Models\LocaleSettings;
use Plenty\Modules\Frontend\Session\Storage\Models\Order;

/**
 * Class SessionStorageService
 *
 * @package Sofort\Services
 */
class SessionStorageService
{
	const DELIVERY_ADDRESS_ID = "deliveryAddressId";
	const BILLING_ADDRESS_ID = "billingAddressId";
	const SOFORT_PAY_ID = "sofortPayId";

	/**
	 * @var FrontendSessionStorageFactoryContract
	 */
	private $sessionStorage;

	/**
	 * SessionStorageService constructor.
	 *
	 * @param FrontendSessionStorageFactoryContract $sessionStorage
	 */
	public function __construct(FrontendSessionStorageFactoryContract $sessionStorage)
	{
		$this->sessionStorage = $sessionStorage;
	}

	/**
	 * @param string $name
	 * @param $value
	 */
	public function setSessionValue(string $name, $value)
	{
		$this->sessionStorage->getPlugin()->setValue($name, $value);
	}

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function getSessionValue(string $name)
	{
		return $this->sessionStorage->getPlugin()->getValue($name);
	}

	/**
	 * @return Order
	 */
	public function getOrder(): Order
	{
		return $this->sessionStorage->getOrder();
	}

	/**
	 * @return string
	 */
	public function getLocaleSettings(): LocaleSettings
	{
		return $this->sessionStorage->getLocaleSettings();
	}
}