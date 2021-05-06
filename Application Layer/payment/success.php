<?php
require_once '../../Business Services Layer/paymentController/paymentcontroller.php';
 
// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
 
    if ($response->isSuccessful()) {
        // The customer has successfully paid.
        $arr_body = $response->getData();
 
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $payer_email = $arr_body['payer']['payer_info']['email'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];
 
        // Insert transaction data into the database
        $isPaymentExist = $db->query("SELECT * FROM payments WHERE payment_id = '".$payment_id."'");
 
        if($isPaymentExist->num_rows == 0) { 
            $insert = $db->query("INSERT INTO payments(payment_id, payer_id, payer_email, amount, currency, payment_status) VALUES('". $payment_id ."', '". $payer_id ."', '". $payer_email ."', '". $amount ."', '". $currency ."', '". $payment_status ."')");
        }
 
        echo "Payment is successful. Your transaction id is: ". $payment_id;
    } else {
        echo $response->getMessage();
    }
} else {
    echo 'Transaction is declined';
}

?>

<div class="container">
    <div class="status">
        <?php if(!empty($payment_id)){ ?>
           
            
            <h4>Payment Information</h4>
            <p><b>Transaction ID:</b> <?php echo $payment_id; ?></p>
            <p><b>Payer ID:</b> <?php echo $payer_id; ?></p>
            <p><b>Paid Amount:</b> <?php echo $amount; ?></p>
            <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
            
            <h4>Product Information</h4>
            <p><b>Name:</b> <?php echo $productRow['name']; ?></p>
            <p><b>Price:</b> <?php echo $productRow['price']; ?></p>
        <?php }else{ ?>
            <h1 class="error">Your Payment has Failed</h1>
        <?php } ?>
    </div>
    <a href="../customerView/customerInterface.php" class="btn-link">Back to Products</a>
</div>