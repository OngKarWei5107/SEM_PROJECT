<?php

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'dms');
define('DB_USER', 'root');
define('DB_PASS', '');

class DB
{

  public static function connect($value='')
  {
    // create a new PDO connection
    $pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
        try {
            $stmt->execute($args);
            return $stmt;
        }
        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }   
     }
}

class medicineData
{
	public $table = 'medicine';
	
	public $medicineid, $medicineName, $quantity, $descp, $price, $photo;

    public static function All()
    {
        $query = "SELECT * FROM medicine";
        try {
            // use static method run() from class DB 
            if ($stmt = DB::run($query)) { // this will run the build query
                // assign all of the data fetch from database to variable data
                $medicine = $stmt->fetchAll(PDO::FETCH_ASSOC); // need to add fetchAll for pdo 
 // return the array of users filled with user array
                return $medicine;
            };
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


        public function add(){
            
            $medicineid="";

		$query="INSERT INTO medicine (medicineid, medicineName, price, descp, quantity, photo ) VALUES (:medicineid, :medicineName, :price, :descp, :quantity, :photo)";
                $param=[    'medicineid' => $this->medicineid, 
                            'medicineName' => $this->medicineName,                                                                  
                            'price' => $this->price, 
                            'descp' => $this->descp, 
                            'quantity' => $this->quantity,
                            'photo' => $this->photo];


                $stmt = DB::RUN($query, $param);
        return 0;
	   }

        public static function getById($medicineid)
    {
        $query = "SELECT * FROM medicine WHERE medicineid = :medicineid LIMIT 1";
        $param = [':medicineid' => $medicineid]; // the parameter that will be bind by pdo
        try {
            // use static method run() from class DB 
            if ($stmt = DB::Run($query, $param)) { // this will run the build query
                // need to use fetch to retrieve only 1 row of data
                $medicine = $stmt->fetch(PDO::FETCH_ASSOC); // this will retrieve the row of data
                                                        // that is associated to the passed id
                // return the user object
                return $medicine;
            };
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


        public function update()
    {
        $query = "UPDATE `medicine` SET `medicineName`=:medicineName, `price`=:price, `descp`=:descp, `quantity`=:quantity WHERE `medicineid`=:medicineid";
        $param = [ // the parameter that will be bind by pdo
            ':medicineid' => $this->medicineid,
            ':medicineName' => $this->medicineName, 
            ':price' => $this->price,
            ':descp' => $this->descp,
            ':quantity' => $this->quantity]; 
        
        try {
            // use static method run() from class DB
            if ($stmt = DB::Run($query, $param)) { // we dont use fetch() or fetchAll() here
                                                   // because no data will be return when we
                                                   // perform update operation
                return true;
            };
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function delete()
    {
        $query = "DELETE FROM medicine WHERE medicineid=:medicineid";
        $param = [':medicineid' => $this->medicineid]; // the parameter that will be bind by pdo
        try {
            // use static method run() from class DB
            if ($stmt = DB::Run($query, $param)) { // we dont use fetch() or fetchAll() here
                                                   // because no data will be return when we
                                                   // perform delete operation
                return true;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public static function searchable($where_column, $data)
    {
        $query = "SELECT * FROM medicine WHERE `medicineName` LIKE :where_param";
        $where_param = "%$data%";
        $param = [':where_param' => $where_param];
        try {
            // use static method run() from class DB
            if ($stmt = DB::Run($query, $param)) { 
                //echo $stmt->queryString;
                // assign all of the data fetch from database to variable data
                $medicine=$stmt->fetchAll(PDO::FETCH_ASSOC); // need to add fetchAll for pdo 
                                                         // in order for pdo to retrieve the data from database
                if ($data == NULL) {
                    $return = 'no data found';
                    return $return;
                }
                // return the array of users filled with user array
                return $medicine;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

     public function addCartModel($medicineItemid){

            $query = "SELECT * From order WHERE medicineid ='$medicineid'"; //pk

            $query = mysql_query("UPDATE medicine SET quantity='$totalquantity' WHERE medicineid='$medicineid'");

            $qry2 = "INSERT INTO order Values('','$_COOKIE[PHPSESSID]','$Equip_ID','$Equip_Name','$Equip_Price','$Item_Quantity','$totalprice')";

        $query="INSERT INTO medicine(medicineid, medicineName, price, descp, quantity, photo) VALUES (:medicineid, :medicineName, :price, :descp, :quantity, :photo)";
                $param=[    'medicineid' => $this->medicineid, 
                            'medicineName' => $this->medicineName,                                                                  
                            'price' => $this->price, 
                            'descp' => $this->descp, 
                            'quantity' => $this->quantity,
                            'photo' => $this->photo];

                alert("Hello! I am an alert box!!");

                $stmt = DB::RUN($query, $param);
        return 0;
       }



}