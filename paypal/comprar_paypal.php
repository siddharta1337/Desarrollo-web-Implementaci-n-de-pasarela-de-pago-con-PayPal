<?php
 


use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;

require __DIR__ . '/bootstrap.php';

    $precio_item = $_POST['precio_item'];

    $payer = new Payer();
    $payer->setPaymentMethod('paypal');

    $details = new Details();
    $details->setShipping('0.00')
            ->setTax('0.00')
            ->setSubtotal($precio_item);

    $amount = new Amount();
    $amount->setCurrency('USD')
            ->setTotal( $precio_item )
            ->setDetails($details);


    $transaction = new Transaction();
    $transaction->setAmount($amount)
                ->setDescription("50 kilos de pan francés a nico's café");


    $payment = new Payment();
    $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions([ $transaction ]);


    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl('http://localhost:8888/paypal/mensajes/finalizar_compra.php?aprobado=true')
                ->setCancelUrl('http://localhost:8888/paypal/mensajes/cancelado.php');


     $payment->setRedirectUrls($redirectUrls);


     try{

        $payment->create($apiContext);

    
     } catch (PayPal\Exception\PayPalConnectionException $ex) {
        header("Location:mensajes/error.php");
    }


    foreach( $payment->getLinks() as $link){
        if( $link->getRel() == 'approval_url'){
            $redirectUrl = $link->getHref();

        }
    }


    header("Location:".$redirectUrl );
    

?>