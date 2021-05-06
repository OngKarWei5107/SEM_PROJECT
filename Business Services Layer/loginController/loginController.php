<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    
    print '<script type="text/javascript">'; 
print 'alert("Connection Failed!!")'; 
print '</script>';  
}

session_start();
		if(isset($_GET['login'])){
		$username = $_REQUEST['username'];
    	$password = $_REQUEST['psw'];
    	$userType = $_REQUEST['userType'];
		include "../loginData/loginData.php";
		}
?>