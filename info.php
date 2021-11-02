<?php
error_reporting(E_ALL);
$data = array(
	'amount' => '100',
	'currency' => 'USD',
	'invoice' => rand('1111111111','999999999'),
	'externalId' => rand('1111111111','999999999'),
	'successCallbackUrl' => 'https://zfollowers.com/payment/callback?id=12345&status=success&uid=dasd868as46dasd5ads9das',
	'failureCallbackUrl' => 'https://zfollowers.com/payment/callback?id=12345&status=failed&uid=dasd868as46dasd5ads9das',
	'successRedirectUrl' => 'https://zfollowers.com',
	'failureRedirectUrl' => 'https://zfollowers.com'
);
$payload = json_encode($data);
$context_options = array (
        'http' => array (
            'method' => 'POST',
			'header' => array(
				"channel: 10292246\r\n".
				"secret: 0fda2c8338004e54953c1ef64430c0ed\r\n".
				"websiteurl: zfollowers.com\r\n".
				'Content-Length:' . strlen($payload)."\r\n".
				"Content-type: application/json\r\n\r\n"
			),
            'content' => $payload,
            )
        );
$url= "https://whish.money/itel-service/api/payment/collect";
$context = stream_context_create($context_options); 
$result = file_get_contents($url, false, $context);
print_r($result);die;
/*$data = array(
	'amount' => '100',
	'currency' => 'USD',
	'invoice' => rand('1111111111','999999999'),
	'externalId' => rand('1111111111','999999999'),
	'successCallbackUrl' => 'https://zfollowers.com/payment/callback?id=12345&status=success&uid=dasd868as46dasd5ads9das',
	'failureCallbackUrl' => 'https://zfollowers.com/payment/callback?id=12345&status=failed&uid=dasd868as46dasd5ads9das',
	'successRedirectUrl' => 'https://zfollowers.com',
	'failureRedirectUrl' => 'https://zfollowers.com'
);
$payload = json_encode($data);
$url= "https://whish.money/itel-service/api/payment/collect";
// Prepare new cURL resource
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Content-Length:' . strlen($payload),
	'channel:10292246',
	'secret:0fda2c8338004e54953c1ef64430c0ed',
	'websiteurl:zfollowers.com',
	)
);
// Submit the POST request
$result = curl_exec($ch);
if (curl_errno($ch)) {
    $error_msg = curl_error($ch);
	print_r($error_msg);
}
print_r($result);die;
// Close cURL session handle
curl_close($ch);

die('end');
?>