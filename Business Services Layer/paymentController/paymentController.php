<?php
require_once "../../vendor/autoload.php";
 
use Omnipay\Omnipay;
 
define('CLIENT_ID', 'AQ2RiNdm94R1aPEIUaC0mx_L_FLY06RPZU3_Y7jacHS3BIGjoNDyDL_Cob9zY64VFOWPBEDvSj6Fr4KK');
define('CLIENT_SECRET', 'EIrc7kLvvN__ivms6swo3jstdkzEVEZMn5JEsDKu6OeOJMR7KTRLgsfN_wFR3ghnCIn8WBLYXpJLDdf6');
 
define('PAYPAL_RETURN_URL', 'http://localhost/dms/Application%20Layer/customerView/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/dms/Business%20Services%20layer/paymentData/cancel.php');
define('PAYPAL_CURRENCY', 'USD'); // set your currency here
 
// Connect with the database 
$db = new mysqli('localhost', 'root', '', 'dms'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live

