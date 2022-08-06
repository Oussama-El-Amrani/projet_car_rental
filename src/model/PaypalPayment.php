<?php
namespace App\Model\PaypalPayment;

use App\Exception\PaymentAmountMissmatchException\PaymentAmountMissmatchException;
use App\Model\Cart\Cart;
use Exception;
use Psr\Http\Message\ServerRequestInterface;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use PayPalCheckoutSdk\Payments\AuthorizationsCaptureRequest;
use PayPalCheckoutSdk\Payments\AuthorizationsGetRequest;


class PaypalPayment
{
    readonly private string $clientId;
    readonly private string $clientSecret;
    readonly private bool $sandbox;

    public function __construct(string $clientId,string $clientSecret, bool $sandbox)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->sandbox = $sandbox;
    }

    public function ui(Cart $cart): string
    {
        // $total = $cart->getTotal()/10;
        $clientId = 'AZcP5NMIfn5ddSPV7eI_bE70hTbS48Cq1J5Fsii7weXdnHHXsiX6hJaRSUvowMyG4Vs-hIGhSMEIDXgf';
        
        $order = json_encode([
            'purchase_units' => [[
                'description' => 'Panier rentalCarsFes',
                'amount' => [
                    'currency_code'=>'EUR',
                    'value' => $cart->getTotal()/10,
                    'breakdown'=> [
                        'item_total'=>[
                            'currency_code' => 'EUR',
                            'value' =>$cart->getTotal()/10,
                        ] 
                    ]
                ]
            ]]
        ]);

        return <<<HTML
            <script src="https://www.paypal.com/sdk/js?client-id={$clientId}&currency=EUR&intent=authorize"></script>
            <!-- Set up a container element for the button -->
            <div id="paypal-button-container"></div>
            <script>
                paypal.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                        return actions.order.create(${order})
                    },
                    // Finalize the transaction after payer approval
                    onApprove: async(data, actions) => {
                        const authorization = await actions.order.authorize()
                        const authorizationId = authorization.purchase_units[0].payments.authorizations[0].id
                            await fetch('/src//controllers/paypalControllers.php', {
                                method : 'post',
                                headers: {
                                    'content-type': 'application/json'
                                },
                                body:JSON.stringify({authorisationId})
                            })
                            alert('Votre paiement a bien ete enregistré')
                        }
                    }
                }).render('#paypal-button-container');
            </script>
HTML;
    }

    public function handle(ServerRequestInterface $request, Cart $cart): void
    {   
        if($this->sandbox){
            $environment = new SandboxEnvironment($this->clientid, $this->clientSecret); 
        } else {
            $environment = new ProductionEnvironment($this->clientid, $this->clientSecret);
        }

        $client = new PayPalHttpClient($environment);
        
        $authoririzationId = $request->getParsedBody()['authorizationId'];
        $request = new AuthorizationsGetRequest($authoririzationId);
        $authorizationResponse = $client->execute($request); 
        $amount = (int)round(floatval($authorizationResponse->result->amount->value)*10);
        if($amount !== $cart->getTotal()){
            throw new PaymentAmountMissmatchException($amount, $cart->getTotal);
        }

        $orderId = $authorizationResponse->result->supplementary_data->related_ids->order_id;

        // $request = new OrdersGetRequest($orderId);
        // $orderResponse = $client->execute($request);


        $request = new AuthorizationsCaptureRequest($authoririzationId);
        $response = $client->execute($request);
        if($response->result->status === 'COMPLETED'){
            throw new Exception();
        }
    }
}