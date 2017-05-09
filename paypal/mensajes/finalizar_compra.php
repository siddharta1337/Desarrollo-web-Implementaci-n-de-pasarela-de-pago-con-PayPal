<?php


use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;


require __DIR__ . './../bootstrap.php';



if( isset( $_GET['aprobado']) &&  $_GET['aprobado'] === 'true' ){

    $paymentId = $_GET['paymentId'];

    $payment = Payment::get($paymentId, $apiContext);


    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);

    $payment->execute($execution, $apiContext);

    /*
    actualizar las bd
    */

    header("Location:../mensajes/compra_finalizada.php");




}else{
        header("Location:../mensajes/cancelado.php");
}
?>