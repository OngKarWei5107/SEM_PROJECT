<?php
require_once '..\..\Business Services Layer\userData\serviceProviderData.php';
/**
* 
*/
class RegisServiceProvider
{
  public function index($value='')
  {
    // assign the returned values(array of feedback object) to variable users
    $serviceProviderData = serviceProviderData::All(); // we use the static method All() that we
                // created in feedback model to retrieve all 
                // data for feedback
    return $serviceProviderData;
  }
  public function signup($value='')
  {
    // create new feedback object
    $serviceProviderData = new serviceProviderData();
    // set the attributes of fSupplierDataeedback object
    $serviceProviderData->username = $_POST['username'];
    $serviceProviderData->psw = $_POST['psw'];
    $serviceProviderData->phone = $_POST['phone'];
    $serviceProviderData->address = $_POST['address'];

    
    // save new feedback into database
    $serviceProviderData->signup();
    // set message
    $message="Your account has been registered";
              echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/dms/Application Layer/Home/User_Login.php'); 
                      </script>";
  }
  public function get($serviceProviderid)
  {
    // get feedback object associate with $id
    $serviceProviderData = serviceProviderData::getById($serviceProviderid);
    // return feedback object with the feedback details
    return $serviceProviderData;
  }

  
  
  public function redirect($url) {
        header('Location: '.$url);
        exit();
    }
}