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


      $username = $_REQUEST['username'];
      $password = $_REQUEST['psw'];
      $userType = $_REQUEST['userType'];   
if(isset($_REQUEST['userType'])){
  
    if($userType=="admin")
    {
      
      $query="select * from admin";
      $result=mysqli_query($conn,$query);
      $flag=0;
      while($row=mysqli_fetch_array($result))
      {
          //if enetered email, password matches database values
          if($username==$row[1] && $password==$row[2]) {
              $flag=1;
              break;
          }
      }
      if($flag==1)
      {
          $_SESSION['username']=$username;
          header("location:../../Application Layer/adminView/approvalAcc.php");
      }
      // if enetered email, password doesnt match db values
      else
      {
          header("location:../../Application Layer/Home/User_Login.php");
      }
    }
    elseif ($userType=="customer")
    { 

      $query="select * from customer";
      $result=mysqli_query($conn,$query);
      $flag=0;
      while($row=mysqli_fetch_array($result))
      {
          //if enetered email, password matches database values
          if($username==$row[1] && $password==$row[2]) {
              $flag=1;
              break;
          }
      }
      if($flag==1)
      {
          $_SESSION['username']=$username;
          header("location:../../Application Layer/customerView/customerInterface.php");
      }
      // if enetered email, password doesnt match db values
      else
      {
          header("location:../../Application Layer/Home/User_Login.php");
      }
    }
    elseif ($userType=="serviceProvider")
    {
      $query="select * from serviceProvider";
      $result=mysqli_query($conn,$query);
      $flag=0;
      $query1="select * from serviceProvider where username='$username' and approved ='0'";
      $result1=mysqli_query($conn,$query1);
      if($row=mysqli_fetch_array($result1)){

                echo '<script type="text/javascript">;
                alert("sorry, your account has not approved yet"); 
                </script>';
                header( "refresh:1; url=../../Application Layer/Home/User_Login.php");
              }else{
      while($row=mysqli_fetch_array($result))
      {
        if($username==$row[1] && $password==$row[2]) {
          $flag=1;
          break;
              
        }
              //if enetered email, password matches database values

      }
      if($flag==1)
      {
          $_SESSION['username']=$username;
          header("location:../../Application Layer/serviceProviderView/serviceProInterface.php");
      }
      // if enetered email, password doesnt match db values
      else
      {
          header("location:../../Application Layer/Home/User_Login.php");
      }
    }
    }
    elseif ($userType=="runner")
    {
      $query="select * from runner";
      $result=mysqli_query($conn,$query);
      $flag=0;
      while($row=mysqli_fetch_array($result))
      {
          //if enetered email, password matches database values
          if($username==$row[1] && $password==$row[2]) {
              $flag=1;
              break;
          }
      }
      if($flag==1)
      {
          $_SESSION['username']=$username;
          header("location:../../Application Layer/runnerView/manageDelivery.php");
      }
      // if enetered email, password doesnt match db values
      else
      {
          header("location:../../Application Layer/Home/User_Login.php");
      }
    }
  }


?>