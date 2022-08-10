<?php
require '../vendor/autoload.php';
require '../src/model/Cart.php';
require '../src/model/PayPalClient.php';

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Model\Cart\Cart;
use Nyholm\Psr7\Response;
use PayPalHttp\HttpException;
use App\Lib\Database\DatabaseConnection;
use App\Model\PayPalClient\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

session_start();
$client = PayPalClient::client();
$request = new OrdersCaptureRequest($_SESSION["paypal_order_id"]);
$request->prefer('return=representation');
// dd($request);
try {
    // Call API with your client and get a response for your call
    // dd($client->execute($request));
    $response = $client->execute($request);
    // dd($response);
    // dd($_SESSION);
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    // print_r($response);

    $CartRepository = new Cart();
    $CartRepository->connection = new DatabaseConnection();
    // dd($CartRepository);
    // dd($_SESSION);
    $CartRepository->setcin($_SESSION['cin']);
    // dd($CartRepository);
    $CartRepository->paymentSuccess();
    $rentalCarInfo = $CartRepository->findCarsRentaPayed();
    // dd($CartRepository);
    ob_start();
    require '../templates/successPayement.php';
    $page = ob_get_clean();

    $option = new Options(); 
    $option->set('defaultFont', 'Courier');

    $dompdf = new Dompdf($option);
    $dompdf->loadHtml($page);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    $fil_name = 'RentalCarsFes_facturation'. $_SESSION['cin'] . '.pdf';
    // Output the generated PDF to Browser
    $dompdf->stream($fil_name);

    // echo 'ok';
}catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}