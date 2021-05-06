<?php
require_once 'C:/xampp/htdocs/dms/Business Services Layer/orderData/orderData.php';
session_start();

if(isset($_GET['success'])){
                if(isset($_GET['check'])){
                    foreach ($_GET['check'] as $value){
                        $sql = "UPDATE order_info SET status = 1 WHERE id = $value"; //write this query according to your table schema
                        mysqli_query($conn, $sql) ;
                       

                        
                    }header("location:manageDelivery.php");
                }
            }
