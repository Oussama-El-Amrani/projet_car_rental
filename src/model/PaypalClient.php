<?php
namespace App\Model\PayPalClient;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class PayPalClient
{
    public static function client()
    {
        return new PayPalHttpClient(self::environment());    
    }

    public static function environment()
    {
        $clientId = getenv("CLIENT_ID")?:"";
        $clientSecrret = getenv("CLIENT_SECRET")?: "";

        return new SandboxEnvironment($clientId,$clientSecrret);
    }
}