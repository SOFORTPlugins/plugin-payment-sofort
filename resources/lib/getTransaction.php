<?php

use Sofort\SofortLib\TransactionData;

$executeResult = [];

/* @var $transactionData TransactionData */
$transactionData = new \Sofort\SofortLib\TransactionData(SdkRestApi::getParam('configKey', true));

$transactionDataId = SdkRestApi::getParam('transactionId', false);

if (!$transactionDataId) {
	$executeResult['error'] = true;
	$executeResult['error_msg'] = 'Missing transaction id!';
	return $executeResult;
}

$transactionData->addTransaction($transactionDataId);
$transactionData->sendRequest();

if ($transactionData->isError()) {
	$executeResult['error'] = true;
	$executeResult['error_msg'] = $transactionData->getError();
} else {
	if (SdkRestApi::getParam('status', false)) {
		$executeResult['status'] = $transactionData->getStatus();
		$executeResult['statusReason'] = $transactionData->getStatusReason();
		$executeResult['transactionId'] = $transactionDataId;
	} else {
		$executeResult['transactionId'] = $transactionData->getTransaction();
		$executeResult['amount'] = $transactionData->getAmount();
		$executeResult['currency'] = $transactionData->getCurrency();
		$executeResult['entryDate'] = $transactionData->getTime();
		$executeResult['status'] = $transactionData->getStatus();
		$executeResult['statusReason'] = $transactionData->getStatusReason();
		$executeResult['recipientBIC'] = $transactionData->getRecipientBic();
		$executeResult['recipientIBAN'] = $transactionData->getRecipientIban();
		$executeResult['recipientHolder'] = $transactionData->getRecipientHolder();
		$executeResult['senderBIC'] = $transactionData->getSenderBic();
		$executeResult['senderIBAN'] = $transactionData->getSenderIban();
		$executeResult['senderHolder'] = $transactionData->getSenderHolder();
		$executeResult['reason'] = $transactionData->getReason(0, 0);
	}
}

return $executeResult;
