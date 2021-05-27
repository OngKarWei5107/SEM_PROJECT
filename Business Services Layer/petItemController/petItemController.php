<?php
require_once '../../Business Services Layer/petItemData/petItemData.php';


class petItemController
{
	public function addController(){

		if(isset($_POST['btnRegister'])){
        $filename=$_FILES['photo']['name'];
        $filesize=$_FILES['photo']['size'];
        $filetmp=$_FILES['photo']['tmp_name'];
        $dir= "photo/".$filename;}


		$pet = new petItemData();
		
		$pet->photo = ($_FILES['photo']['name']);
		$pet->petItemName = $_POST['petItemName'];
		$pet->price = $_POST['price'];
		$pet->descp = $_POST['descp'];
		$pet->quantity = $_POST['quantity'];
	
	    $pet->add();
	    copy($filetmp, $dir);	
	    echo '<script type="text/javascript">;
                alert("your product already added!!!"); 
                </script>';
                header( "refresh:1; url=serviceProInterface.php");
	}


	public function displayController($value='')
	{
		// assign the returned values(array of user object) to variable users
		$pet = petItemData::All(); // we use the static method All() that we
							  // created in user model to retrieve all 
							  // data for user
		return $pet;
	}

	public function get($petItemid)
    {
        // get user object associate with $id
        $pet = petItemData::getById($petItemid);
        // return user object with the user details
        return $pet;
    }

	public function update($petItemid)
	{
		// get user data associate with $id
		$findUser = petItemData::getById($petItemid);
		// update/set the attributes of the user
		$pet = new petItemData();

		$pet->petItemid = $findUser['petItemid'];
		$pet->petItemName = $_POST['petItemName'];
		$pet->price = $_POST['price'];
		$pet->descp = $_POST['descp'];
		$pet->quantity = $_POST['quantity'];
		// update the user data in database
		$pet->update();
		 echo '<script type="text/javascript">;
                alert("Are you sure you want to update?"); 
                </script>';
                header( "refresh:1; url=serviceProInterface.php");
	
	}

		public function destroy($petItemid)
	{
		// get user data associate with $id
		$findUser = petItemData::getById($petItemid);
		// update/set the attributes of the user
		$pet = new petItemData();
		$pet->petItemid = $findUser['petItemid'];
		// delete the user
		$pet->delete();

		// redirect the page
		 echo '<script type="text/javascript">;
                alert("Are you sure you want to delete?"); 
                </script>';
                header( "refresh:1; url=serviceProInterface.php");
	}


	public function search($value='')
	{
		
		$pet = petItemData::Searchable('petItemName', $_POST['search']);
		return $pet;
	}


		public function addcart($petItemid)
	{

		$findUser = petItemData::getById($petItemid);
		// update/set the attributes of the user
		$cart = new petItemData();

		$cart->petItemid = $findUser['petItemid'];
		$cart->petItemName = $_POST['petItemName'];
		$cart->price = $_POST['price'];
		$cart->descp = $_POST['descp'];
		$cart->quantity = $_POST['quantity'];
		
	
   		$totalprice = $quantity * $price;

  		$totalquantity = $Equip_Quantity - $quantity;
	
	    $cart->addCartModel($petItemid);

	    alert("Hello! I am an alert box!!");
	
		}

}