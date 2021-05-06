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

class DB
{
    public static function connect($value='')
    {
        // create a new PDO connection
        $pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
        // PDO::ATTR_ERRMODE: Error reporting.
        // PDO::ERRMODE_EXCEPTION: Throw exceptions.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set this so pdo will show us
                                                                       // the error when we perform DB operations
        return $pdo;
    }
    public static function run($sql, $args = NULL)
    {
        if (!$args) // if no parameter
        {
            // run the query straight away without parameter binding
             return DB::connect()->query($sql);
        }
        // prepare the sql query
        $stmt = DB::connect()->prepare($sql);
        // execute the query with bind parameter values
        $stmt->execute($args);
        return $stmt;
    }
}

     $query = "select customer.address, order_info.status, order_info.id, order_info.product_name, order_info.price, order_info.quantity, order_info.order_id 
     from customer inner join order_info on customer.order_id=order_info.order_id
     where order_info.status='0'";

     $result=mysqli_query($conn, $query);

     $i = 1;

    $query1 = "select * from order_info where status='1'";

     $result1=mysqli_query($conn, $query1);
?>