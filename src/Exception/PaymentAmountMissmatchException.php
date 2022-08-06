<?php
namespace App\Exception\PaymentAmountMissmatchException;

use Exception;

class PaymentAmountMissmatchException extends Exception{
    public function __construct(int $value , int $expected) {
        parent::__construct(sprintf('%s attendu est différent de %s',$expected, $value));
    }
}