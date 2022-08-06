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
        $clientId = getenv("CLIENT_ID")?:"AZcP5NMIfn5ddSPV7eI_bE70hTbS48Cq1J5Fsii7weXdnHHXsiX6hJaRSUvowMyG4Vs-hIGhSMEIDXgf";
        $clientSecrret = getenv("CLIENT_SECRET")?: "EPr9qCReiCR3K22AAQH3oW_dAj8xxp3-04gsMP2UTNR6ep04pJ1a58jyq-H0bkGwCkZWXb45xgI_m3Gv";

        return new SandboxEnvironment($clientId,$clientSecrret);
    }
}