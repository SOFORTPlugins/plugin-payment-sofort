<?php
namespace Sofort\Providers\DataProvider;

use Plenty\Plugin\Templates\Twig;
use Sofort\Utility\DivUtility;

/**
 * Class SofortLogoDataProvider
 * 
 * @package Sofort\Providers\DataProvider
 */
class SofortLogoDataProvider
{

	/**
	 * @param Twig $twig
	 * @param DivUtility $divUtility
	 * @return string
	 */
	public function call(Twig $twig, DivUtility $divUtility)
	{
		return $twig->render('SOFORT::Homepage.SofortLogo', ['src' => $divUtility->getLogo()]);
	}
}