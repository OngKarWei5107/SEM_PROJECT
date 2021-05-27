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
    $serviceProviderData->email = $_POST['email'];
    $serviceProviderData->psw = $_POST['psw'];
    $serviceProviderData->phone = $_POST['phone'];


    
    // save new feedback into database
    $serviceProviderData->signup();
    // set message
    $message="Your account has been registered";
              echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/SEM_PROJECT/Application Layer/Home/User_Login.php'); 
                      </script>";
  }

  public function resetPassword(){
      $serviceProviderData = new serviceProviderData();
      $serviceProviderData->email = $_POST['email'];
      if ($serviceProviderData->check() > 0){
        $token = "abcdefghijklmnopqrstuvwxyz0123456789";
        $token = str_shuffle($token);
        $serviceProviderData->token = substr($token,0,10);

      }

      if($serviceProviderData->addToken()){
        $to      = $_POST['email']; // Send email to our user
        $subject = 'Change Password | Verification'; // Give the email a subject 
        $message = '
  
        Account Registered with email below have requested for reset password.
  
  
        In order to reset your passowrd, please click the link below:
        http://localhost/SEM_PROJECT/Application%20Layer/Home/setPassword.php?email='.$_POST['email'].'&token='.$serviceProviderData->token.'&userType='.$userType = $_POST['userType'].'
  
        '; // Our message above including the link
                      
        $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers

        if (mail($to, $subject, $message, $headers)){ // Send our email
          $message = 'Please check your email inbox'; 
          echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/SEM_PROJECT/Application Layer/Home/User_Login.php'); 
                      </script>";
                    }
                    else {
                      $message = 'Error! Please try it again';
                      echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/SEM_PROJECT/Application Layer/Home/User_Login.php'); 
                      </script>";
                    }
      }
  }

  public function setPassword($email, $token){
    $serviceProviderData = new serviceProviderData();
    $serviceProviderData->email = $email;
    $serviceProviderData->token = $token;
    $serviceProviderData->password = $_POST['password'];

    if($serviceProviderData->setPassword() > 0){
      $message = 'Your New Password is reset already. Please change the password after login .';
      echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/SEM_PROJECT/Application Layer/Home/User_Login.php'); 
                      </script>";
    }
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