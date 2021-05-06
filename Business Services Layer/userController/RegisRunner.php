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
		$runnerData->psw = $_POST['psw'];
		$runnerData->phone = $_POST['phone'];
		$runnerData->address = $_POST['address'];
		
		// save new feedback into database
		$runnerData->signup();
		// set message
		$message="Your account has been registered";
              echo "<script type='text/javascript'>
                      alert('$message');
                      window.location.href=('http://localhost/dms/Application Layer/Home/User_Login.php'); 
                      </script>";
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