<?php

use Sofort\SofortLib\Notification;

/* @var $sofortLibNotification Notification */
$sofortLibNotification = new Notification();

$notificationResult = array();

$requestContent = SdkRestApi::getParam('requestContent', false);

if (!$requestContent) {
	$notificationResult['error'] = TRUE;
	$notificationResult['error_msg'] = 'Missing request content!';
	return $notificationResult;
}

$transactionId = $sofortLibNotification->getNotification($requestContent);

if (!$transactionId) {
	$notificationResult['error'] = TRUE;
	$notificationResult['error_msg'] = $sofortLibNotification->errors;
} else {
	$notificationResult['transactionId'] = $transactionId;
}

return $notificationResult;
