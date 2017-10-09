<?php
namespace Sofort\Utility;

use Plenty\Modules\Frontend\Session\Storage\Models\LocaleSettings;
use Plenty\Plugin\ConfigRepository;
use Sofort\Constants\SofortConstants;
use Sofort\Services\SessionStorageService;

/**
 * Class DivUtility
 *
 * @package Klarna\Utility
 */
class DivUtility
{
	/**
	 * @var SessionStorageService
	 */
	private $sessionStorage;

	/**
	 * @var ConfigRepository
	 */
	private $configRepo;

	/**
	 *
	 * @param SessionStorageService $sessionStorage
	 * @param ConfigRepository $configRepo
	 */
	public function __construct(SessionStorageService $sessionStorage,
								ConfigRepository $configRepo)
	{
		$this->sessionStorage = $sessionStorage;
		$this->configRepo = $configRepo;
	}

	/**
	 * @param string $language
	 * @return string
	 */
	public function getLogo($language = ''): string
	{
		if (!strlen($language)) {
			$language = $this->getLanguage();
		}
		$src = SofortConstants::CHECKOUT_LOGO_URI;
		$src = str_replace('%LOCALE%', ($language === 'de' ? 'de_de' : 'en_gb'), $src);

		return $src;
	}

	/**
	 * @return string
	 */
	public function getLanguage(): string
	{
		/* @var $localeSettings LocaleSettings */
		$localeSettings = $this->sessionStorage->getLocaleSettings();
		$language = $localeSettings->language;

		if(!in_array($language, ['de', 'en'])) {
			return 'en';
		}

		return $language;
	}

	/**
	 * @param string $input
	 * @return string
	 */
	public function removeInvalidChars($input): string
	{
		$input = str_replace('@', '-at-', $input);
		$input = str_replace('_', '-', $input);

		return $input;
	}
}