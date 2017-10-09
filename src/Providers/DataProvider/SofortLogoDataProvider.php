<?php
namespace Sofort\Providers\DataProvider;

use Plenty\Plugin\Templates\Twig;
use Sofort\Constants\SofortConstants;

/**
 * Class SofortLogoDataProvider
 * 
 * @package Sofort\Providers\DataProvider
 */
class SofortLogoDataProvider
{

	/**
	 * @param Twig $twig
	 * @return string
	 */
	public function call(Twig $twig)
	{
		return $twig->render('SOFORT::Homepage.SofortLogo', ['src' => SofortConstants::KLARNA_LOGO_URI]);
	}
}