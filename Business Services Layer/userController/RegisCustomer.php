<?php
require_once '..\..\Business Services Layer\userData\CustomerData.php';
/**
* 
*/
class RegisCustomer
{
  public function index($value='')
  {
    // assign the returned values(array of feedback object) to variable users
    $customerData = customerData::All(); // we use the static method All() that we
                // created in feedback model to retrieve all 
                // data for feedback
    return $customerData;
  }
  public function signup($value='')
  {
    $customerData = new customerData();
    $customerData->username = $_POST['username'];
    $customerData->psw = $_POST['psw'];
    $customerData->phone = $_POST['phone'];
    $customerData->address = $_POST['address'];
    
    $customerData->signup();
    // set message
    $message="Your account has been registered";
              echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/dms/Application Layer/Home/User_Login.php'); 
                      </script>";
  }
  public function get($customerid)
  {
    // get feedback object associate with $id
    $customerData = customerData::getById($customerid);
    // return feedback object with the feedback details
    return $customerData;
  }

  
  public function redirect($url) {
        header('Location: '.$url);
        exit();
    }
}