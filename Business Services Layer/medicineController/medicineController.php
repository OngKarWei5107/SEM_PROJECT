<?php
require_once '../../Business Services Layer/medicineData/medicineData.php';


class medicineController
{
	public function addController(){

		if(isset($_POST['btnRegister'])){
        $filename=$_FILES['photo']['name'];
        $filesize=$_FILES['photo']['size'];
        $filetmp=$_FILES['photo']['tmp_name'];
        $dir= "photo/".$filename;}


		$medicine = new medicineData();
		
		$medicine->photo = ($_FILES['photo']['name']);
		$medicine->medicineName = $_POST['medicineName'];
		$medicine->price = $_POST['price'];
		$medicine->descp = $_POST['descp'];
		$medicine->quantity = $_POST['quantity'];
	
	    $medicine->add();
	    copy($filetmp, $dir);	
	    echo '<script type="text/javascript">;
                alert("your product already added!!!"); 
                </script>';
                header( "refresh:1; url=serviceProInterface.php");
	}


	public function displayController($value='')
	{
		// assign the returned values(array of user object) to variable users
		$medicine = medicineData::All(); // we use the static method All() that we
							  // created in user model to retrieve all 
							  // data for user
		return $medicine;
	}

	public function get($medicineid)
    {
        // get user object associate with $id
        $medicine = medicineData::getById($medicineid);
        // return user object with the user details
        return $medicine;
    }

	public function update($medicineid)
	{
		// get user data associate with $id
		$findUser = medicineData::getById($medicineid);
		// update/set the attributes of the user
		$medicine = new medicineData();

		$medicine->medicineid = $findUser['medicineid'];
		$medicine->medicineName = $_POST['medicineName'];
		$medicine->price = $_POST['price'];
		$medicine->descp = $_POST['descp'];
		$medicine->quantity = $_POST['quantity'];
		// update the user data in database
		$medicine->update();
		echo '<script type="text/javascript">;
                alert("Are you sure you want to update?"); 
                </script>';
                header( "refresh:1; url=serviceProInterface.php");
	}

		public function destroy($medicineid)
	{
		// get user data associate with $id
		$findUser = medicineData::getById($medicineid);
		// update/set the attributes of the user
		$medicine = new medicineData();
		$medicine->medicineid = $findUser['medicineid'];
		// delete the user
		$medicine->delete();

		// redirect the page
		echo '<script type="text/javascript">;
                alert("Are you sure you want to delete?"); 
                </script>';
                header( "refresh:1; url=serviceProInterface.php");
	}


	public function search($value='')
	{
		
		$medicine = medicineItemData::Searchable('medicineName', $_POST['search']);
		return $medicine;
	}


		public function addcart($medicineid)
	{

		$findUser = medicineData::getById($medicineid);
		// update/set the attributes of the user
		$cart = new medicineData();

		$cart->medicined = $findUser['medicineid'];
		$cart->medicineName = $_POST['medicineName'];
		$cart->price = $_POST['price'];
		$cart->descp = $_POST['descp'];
		$cart->quantity = $_POST['quantity'];
		
	
   		$totalprice = $quantity * $price;

  		$totalquantity = $Equip_Quantity - $quantity;
	
	    $cart->addCartModel($medicineid);

	    alert("Hello! I am an alert box!!");
	
		}

}