<?php

/**
 * Some utilities
 */
class SofortHelper
{

	/**
	 * @param string $amountAsString
	 * @return string
	 */
	public static function formattingAmount($amountAsString)
	{
		$amountWithoutThousandSeps = str_replace('.', '', $amountAsString);
		$formattedAmount = str_replace(',', '.', $amountWithoutThousandSeps);
		
		return $formattedAmount;
	}
}