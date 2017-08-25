<?php

use Sofort\SofortLib\Refund;

require_once __DIR__.'/SofortHelper.php';

$executeResult = [];

/* @var $refund Refund */
$refund = new Refund(SdkRestApi::getParam('configKey', true));

$bic = SdkRestApi::getParam('bic', false);
$iban = SdkRestApi::getParam('iban', false);
$holder = SdkRestApi::getParam('holder', false);

$transactionId = SdkRestApi::getParam('transactionId', false);
$amount = SdkRestApi::getParam('amount', false);

if (!$bic || !$iban || !$holder || !$transactionId || !$amount) {
	$executeResult['error'] = true;
	$executeResult['error_msg'] = 'There are missing properties!';
	$executeResult['properties'] = [
		'bic' => $bic,
		'iban' => $iban,
		'holder' => $holder,
		'transactionId' => $transactionId,
		'amount' => $amount
	];
	return $executeResult;
}

$refund->setSenderSepaAccount($bic, $iban, $holder);
$refund->addRefund($transactionId, $amount);

$refund->sendRequest();

if ($refund->isError()) {
	$executeResult['error']= true;
	$executeResult['error_msg'] = $refund->getError();
} else {
	if ($refund->isRefundError()) {
		$executeResult['refundError'] = $refund->getRefundError();
	}
	$executeResult['status'] = $refund->getStatus();
	$executeResult['amount'] = $refund->getAmount();
	$executeResult['entryDate'] = $refund->getTime();
	$executeResult['transactionId'] = $refund->getTransactionId();
}

return $executeResult;
