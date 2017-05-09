<?php


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;


require __DIR__  . '/vendor/autoload.php';


$apiContext = new ApiContext(
    new OAuthTokenCredential(
        'AYF81q9Dh0BPQOQrTt1KDqlSS7FkeFn8QfUl4-qkUPhWqfRsoSyZntz1kRpDDDJWdvc8BqHPUxJwOjzS',
        'ENSF0FvHPIPTb-8UzSlPSuXwpv6g9-TsOL5p_6KQFPaQU9NfhH-Speb70EzK4xKs61dVFmSC3kwbmbr9' 
    )

);

$apiContext->setConfig(
      array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => 'PayPal.log',
        'log.LogLevel' => 'DEBUG', 
    )
);  


?>