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

class petItemData
{
	public $table = 'petItem';
	
	public $petItemid, $petItemName, $quantity, $descp, $price, $photo;

    public static function All()
    {
        $query = "SELECT * FROM petItem";
        try {
            // use static method run() from class DB 
            if ($stmt = DB::run($query)) { // this will run the build query
                // assign all of the data fetch from database to variable data
                $pet = $stmt->fetchAll(PDO::FETCH_ASSOC); // need to add fetchAll for pdo 
 // return the array of users filled with user array
                return $pet;
            };
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


        public function add(){
            
            $petItemid="";

		$query="INSERT INTO petItem (petItemid, petItemName, price, descp, quantity, photo ) VALUES (:petItemid, :petItemName, :price, :descp, :quantity, :photo)";
                $param=[    'petItemid' => $this->petItemid, 
                            'petItemName' => $this->petItemName,                                                                  
                            'price' => $this->price, 
                            'descp' => $this->descp, 
                            'quantity' => $this->quantity,
                            'photo' => $this->photo];


                $stmt = DB::RUN($query, $param);
        return 0;
	   }

        public static function getById($petItemid)
    {
        $query = "SELECT * FROM petItem WHERE petItemid = :petItemid LIMIT 1";
        $param = [':petItemid' => $petItemid]; // the parameter that will be bind by pdo
        try {
            // use static method run() from class DB 
            if ($stmt = DB::Run($query, $param)) { // this will run the build query
                // need to use fetch to retrieve only 1 row of data
                $pet = $stmt->fetch(PDO::FETCH_ASSOC); // this will retrieve the row of data
                                                        // that is associated to the passed id
                // return the user object
                return $pet;
            };
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


        public function update()
    {
        $query = "UPDATE `petItem` SET `petItemName`=:petItemName, `price`=:price, `descp`=:descp, `quantity`=:quantity WHERE `petItemid`=:petItemid";
        $param = [ // the parameter that will be bind by pdo
            ':petItemid' => $this->petItemid,
            ':petItemName' => $this->petItemName, 
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
        $query = "DELETE FROM petItem WHERE petItemid=:petItemid";
        $param = [':petItemid' => $this->petItemid]; // the parameter that will be bind by pdo
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
        $query = "SELECT * FROM petItem WHERE `petItemName` LIKE :where_param";
        $where_param = "%$data%";
        $param = [':where_param' => $where_param];
        try {
            // use static method run() from class DB
            if ($stmt = DB::Run($query, $param)) { 
                //echo $stmt->queryString;
                // assign all of the data fetch from database to variable data
                $pet=$stmt->fetchAll(PDO::FETCH_ASSOC); // need to add fetchAll for pdo 
                                                         // in order for pdo to retrieve the data from database
                if ($data == NULL) {
                    $return = 'no data found';
                    return $return;
                }
                // return the array of users filled with user array
                return $pet;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

     public function addCartModel($petItemid){

            $query = "SELECT * From order WHERE petItemid ='$petItemid'"; //pk

            $query = mysql_query("UPDATE petItem SET quantity='$totalquantity' WHERE petItemid='$petItemid'");

            $qry2 = "INSERT INTO order Values('','$_COOKIE[PHPSESSID]','$Equip_ID','$Equip_Name','$Equip_Price','$Item_Quantity','$totalprice')";

        $query="INSERT INTO petItem (petItemid, petItemName, price, descp, quantity, photo) VALUES (:petItemid, :petItemName, :price, :descp, :quantity, :photo)";
                $param=[    'petItemid' => $this->petItemid, 
                            'petItemName' => $this->petItemName,                                                                  
                            'price' => $this->price, 
                            'descp' => $this->descp, 
                            'quantity' => $this->quantity,
                            'photo' => $this->photo];

                alert("Hello! I am an alert box!!");

                $stmt = DB::RUN($query, $param);
        return 0;
       }



}