<?php
require_once '..\..\Business Services Layer\userData\customerData.php';
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
    $customerData->email = $_POST['email'];
    $customerData->psw = $_POST['psw'];
    $customerData->phone = $_POST['phone'];
    $customerData->address = $_POST['address'];
    $customerData->hash = md5( rand(0,1000) );
    $customerData->active = 0;

    if ($customerData->signup()){


    // set message
    $to      = $_POST['email']; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject 
    $message = '
  
    Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
  
    ------------------------
    Username: '.$_POST['username'].'
    Password: '.$_POST['psw'].'
    ------------------------
  
    Please click this link to activate your account:
    http://localhost/SEM_PROJECT/Application%20Layer/Home/verify.php?email='.$_POST['email'].'&hash='.$customerData->hash.'
  
    '; // Our message above including the link
                      
    $headers = 'From:noreply@yourwebsite.com' . "\r\n"; // Set from headers
    if (mail($to, $subject, $message, $headers)){ // Send our email
      $message = 'Please verify your email address'; 
    echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/SEM_PROJECT/Application Layer/Home/User_Login.php'); 
                      </script>";
                    }
}
}

  public function resetPassword(){
      $customerData = new customerData();
      $customerData->email = $_POST['email'];
      if ($customerData->check() > 0){
        $token = "abcdefghijklmnopqrstuvwxyz0123456789";
        $token = str_shuffle($token);
        $customerData->token = substr($token,0,10);

      }

      if($customerData->addToken()){
        $to      = $_POST['email']; // Send email to our user
        $subject = 'Change Password | Verification'; // Give the email a subject 
        $message = '
  
        Account Registered with email below have requested for reset password.
  
  
        In order to reset your passowrd, please click the link below:
        http://localhost/SEM_PROJECT/Application%20Layer/Home/setPassword.php?email='.$_POST['email'].'&token='.$customerData->token.'&userType='.$userType = $_POST['userType'].'
  
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
    $customerData = new customerData();
    $customerData->email = $email;
    $customerData->token = $token;
    $customerData->password = $_POST['password'];

    if($customerData->setPassword() > 0){
      $message = 'Your New Password is reset already. Please change the password after login .';
      echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/SEM_PROJECT/Application Layer/Home/User_Login.php'); 
                      </script>";
    }
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