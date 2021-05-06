<?php
session_unset($_SESSION['userType']);
session_destroy();
header("location:../../Application Layer/Home/User_Login.php")

?>