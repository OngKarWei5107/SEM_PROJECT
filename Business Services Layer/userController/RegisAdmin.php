<?php
require_once '..\..\Business Services Layer\userData\adminData.php';
/**
* 
*/
class RegisAdmin
{
  public function index($value='')
  {
    // assign the returned values(array of feedback object) to variable users
    $adminData = adminData::All(); // we use the static method All() that we
                // created in feedback model to retrieve all 
                // data for feedback
    return $adminData;
  }
  public function get($adminid)
  {
    // get feedback object associate with $id
    $adminData = adminData::getById($adminid);
    // return feedback object with the feedback details
    return $adminData;
  }
  
  
  public function redirect($url) {
        header('Location: '.$url);
        exit();
    }


}

if(isset($_GET['approve'])){
                if(isset($_GET['check'])){
                    foreach ($_GET['check'] as $value){
                        $sql = "UPDATE serviceProvider SET approved = 1 WHERE serviceProviderid = $value"; //write this query according to your table schema
                        mysqli_query($conn, $sql) ;
                    }
                }
            }