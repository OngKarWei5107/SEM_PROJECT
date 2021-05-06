<?php

/* Database Settings
*/
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'dms');
define('DB_USER', 'root');
define('DB_PASS', '');
/*
* Base URL
*/
define('BASE_URL', '..\..\Business Services Layer\userController\RegisCustomer.php');

/**
* 
*/
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


/**
* Model class for User
*/
class customerData
{
	public $table = 'customer';
	/*
	* Attributes
	* ----------
	* if you want to use private then you should have setter and getter
	* or using PHP magic methods, __SET and __GET
	*/
	public $customerid;
	public $username;
	public $psw;
	public $phone;
	public $address;

	/**
	* Static method All()
	* this method will retrieve all user data in database 
	* and will return the data as array of user object
	*/

	public static function All()
	{
		$query = "SELECT * FROM customer";
		try {
			// use static method run() from class DB 
	    	if ($stmt = DB::run($query)) { // this will run the build query
	    		// assign all of the data fetch from database to variable data
				$CustomerData = $stmt->fetchAll(PDO::FETCH_ASSOC); // need to add fetchAll for pdo 
														    // in order for pdo to retrieve the data from database
				// return the array of feedback filled with user array
				return $CustomerData;
			};
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
	/**
	* Static method getById()
	* this method will retrieve 1 row of data from database
	* based on the feedback id passed to the method
	* @param string customerid
	*/
	public static function getById($customerid)
	{
		$query = "SELECT * FROM customer WHERE customerid = :customerid LIMIT 1";
		$param = [':customerid' => $customerid]; // the parameter that will be bind by pdo
		try {
			// use static method run() from class DB 
	    	if ($stmt = DB::Run($query, $param)) { // this will run the build query
				// need to use fetch to retrieve only 1 row of data
				$CustomerData = $stmt->fetch(PDO::FETCH_ASSOC); // this will retrieve the row of data
													    // that is associated to the passed id
				// return the user object
				return $CustomerData;
			};
		} catch (PDOException $e) {
			return $e->getMessage();
		}
	}
	public function signup()
	{
		$query = "INSERT INTO customer (`username`, `psw`, `phone`, `address`) VALUES (:username, :psw, :phone, :address)";
		$param = [ // the parameter that will be bind by pdo
			':username' => $this->username,
			':psw' => $this->psw,
			':phone' => $this->phone,
			':address' => $this->address,
			];	
		
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
	
	
}
