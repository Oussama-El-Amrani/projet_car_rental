<?php

use App\Model\Cart\Cart;
use App\Model\PaypalPayment\PaypalPayment;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require '../vendor/autoload.php';


define('PAYPAL_ID' ,'AZcP5NMIfn5ddSPV7eI_bE70hTbS48Cq1J5Fsii7weXdnHHXsiX6hJaRSUvowMyG4Vs-hIGhSMEIDXgf');
define('PAYPAL_SECRET' ,'EPr9qCReiCR3K22AAQH3oW_dAj8xxp3-04gsMP2UTNR6ep04pJ1a58jyq-H0bkGwCkZWXb45xgI_m3Gv');

$cart = new Cart();

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$request = $creator->fromGlobals();

$payment = new PaypalPayment(PAYPAL_ID, PAYPAL_SECRET, true);
$payment->handle($request, $cart);