<?php
require_once '..\..\Business Services Layer\userData\runnerData.php';
/**
* 
*/


class RegisRunner
{
	public function index($value='')
	{
		// assign the returned values(array of feedback object) to variable users
		$runnerData = runnerData::All(); // we use the static method All() that we
							  // created in feedback model to retrieve all 
							  // data for feedback
		
		return $runnerData;
	}
	public function signup($value='')
	{
		// create new feedback object
		$runnerData = new runnerData();
		// set the attributes of fSupplierDataeedback object
		$runnerData->username = $_POST['username'];
		$runnerData->email = $_POST['email'];
		$runnerData->psw = $_POST['psw'];
		$runnerData->phone = $_POST['phone'];

		
		// save new feedback into database
		$runnerData->signup();
		// set message
		$message="Your account has been registered";
              echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/SEM_PROJECT/Application Layer/Home/User_Login.php'); 
                      </script>";
	}

  	public function resetPassword(){
     	 $runnerData = new runnerData();
     	 $runnerData->email = $_POST['email'];
     	 if ($runnerData->check() > 0){
       		$token = "abcdefghijklmnopqrstuvwxyz0123456789";
        	$token = str_shuffle($token);
        	$runnerData->token = substr($token,0,10);

     	 }

      	if($runnerData->addToken()){
        	$to      = $_POST['email']; // Send email to our user
        	$subject = 'Change Password | Verification'; // Give the email a subject 
        	$message = '
  
        	Account Registered with email below have requested for reset password.
  
  
        	In order to reset your passowrd, please click the link below:
        	http://localhost/SEM_PROJECT/Application%20Layer/Home/setPassword.php?email='.$_POST['email'].'&token='.$runnerData->token.'&userType='.$userType = $_POST['userType'].'
  
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
    	$runnerData = new runnerData();
    	$runnerData->email = $email;
    	$runnerData->token = $token;
    	$runnerData->password = $_POST['password'];

    	if($runnerData->setPassword() > 0){
      		$message = 'Your New Password is reset already. Please change the password after login .';
      		echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/SEM_PROJECT/Application Layer/Home/User_Login.php'); 
                      </script>";
    	}
  	}

	public function get($runnerid)
	{
		// get feedback object associate with $id
		$runnerid = runnerid::getById($runnerid);
		// return feedback object with the feedback details
		return $runnerData;
	}
	

	public function redirect($url) {
        header('Location: '.$url);
        exit();
    }
}