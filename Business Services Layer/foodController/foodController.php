<?php
require_once 'C:/xampp/htdocs/dms/Business Services Layer/foodData/foodData.php';


class foodController
{
	public function addController(){

		if(isset($_POST['btnRegister'])){
        $filename=$_FILES['photo']['name'];
        $filesize=$_FILES['photo']['size'];
        $filetmp=$_FILES['photo']['tmp_name'];
        $dir= "photo/".$filename;}


		$food = new foodData();
		
		$food->photo = ($_FILES['photo']['name']);
		$food->foodName = $_POST['foodName'];
		$food->price = $_POST['price'];
		$food->descp = $_POST['descp'];
		$food->quantity = $_POST['quantity'];
	
	    $food->add();
	    copy($filetmp, $dir);
	    echo '<script type="text/javascript">;
                alert("your product already added!!!"); 
                </script>';
                header( "refresh:1; url=serviceProInterface.php");	
	}


	public function displayController($value='')
	{
		// assign the returned values(array of user object) to variable users
		$food = foodData::All(); // we use the static method All() that we
							  // created in user model to retrieve all 
							  // data for user
		return $food;
	}

	public function get($foodid)
    {
        // get user object associate with $id
        $food = foodData::getById($foodid);
        // return user object with the user details
        return $food;
    }

	public function update($foodid)
	{
		// get user data associate with $id
		$findUser = foodData::getById($foodid);
		// update/set the attributes of the user
		$food = new foodData();

		$food->foodid = $findUser['foodid'];
		$food->foodName = $_POST['foodName'];
		$food->price = $_POST['price'];
		$food->descp = $_POST['descp'];
		$food->quantity = $_POST['quantity'];
		// update the user data in database
		$food->update();
		echo '<script type="text/javascript">;
                alert("Are you sure you want to update?"); 
                </script>';
                header( "refresh:1; url=serviceProInterface.php");
	
	}

		public function destroy($foodid)
	{
		// get user data associate with $id
		$findUser = foodData::getById($foodid);
		// update/set the attributes of the user
		$food = new foodData();
		$food->foodid = $findUser['foodid'];
		// delete the user
		$food->delete();

		// redirect the page
		echo '<script type="text/javascript">;
                alert("Are you sure you want to delete?"); 
                </script>';
                header( "refresh:1; url=serviceProInterface.php");
	}


	public function search($value='')
	{
		
		$food = foodItemData::Searchable('foodName', $_POST['search']);
		return $food;
	}


		public function addcart($foodid)
	{

		$findUser = foodData::getById($foodid);
		// update/set the attributes of the user
		$cart = new foodData();

		$cart->foodd = $findUser['foodid'];
		$cart->foodName = $_POST['foodName'];
		$cart->price = $_POST['price'];
		$cart->descp = $_POST['descp'];
		$cart->quantity = $_POST['quantity'];
		
	
   		$totalprice = $quantity * $price;

  		$totalquantity = $Equip_Quantity - $quantity;
	
	    $cart->addCartModel($foodid);

	    alert("Hello! I am an alert box!!");
	
		}

}