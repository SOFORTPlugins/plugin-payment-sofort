<?php
namespace Sofort\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

/**
 * Class SofortRouteServiceProvider
 * 
 * @package Sofort\Providers
 */
class SofortRouteServiceProvider extends RouteServiceProvider
{

	/**
	 * @param Router $router
	 */
	public function map(Router $router)
	{
		$router->get('sofort/checkoutSuccess', 'Sofort\Controllers\PaymentController@checkoutSuccess');
		$router->get('sofort/checkoutCancel', 'Sofort\Controllers\PaymentController@checkoutCancel');
		//$router->get('sofort/sofortCheckout', 'Sofort\Controllers\PaymentController@sofortCheckout');
		$router->post('sofort/notification', 'Sofort\Controllers\PaymentController@notification');
	}
}