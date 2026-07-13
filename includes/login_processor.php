<?php
session_start();
include "dbcon.php";
include "functions.php";
// check if data is sent via submitt button
if(isset($_POST["action_source"])){
	
	// collect username and password supplied

 $Store_name = test_input($_POST["userid"]);
 $password = test_input($_POST["password"]);
 $owner = "Owner";
 
 // check if values where grabsed
	//echo $Store_name;
	//echo $password;
	//echo "<br>";
 // check if username supplied is in database;
		// pull data from db for userid, email and phone number
	$sql = "SELECT USER_ID, EMAIL, Phone_Number FROM store_owner";
	$result = $conn->query($sql);

	$result = $result->fetch(PDO::FETCH_ASSOC);
	
	//echo "USER_ID = ". $result['USER_ID']."<br>";
		$userid = $result['USER_ID']; 
	//echo "EMAIL = ". $result['EMAIL']."<br>";
	//echo "Phone_Number = ". $result['Phone_Number']."<br>";

	if($Store_name == $result['USER_ID'] || $Store_name == $result['EMAIL'] ||$Store_name == $result['Phone_Number']){
			// check password
			//	echo "yes store name accepted <br>";
				//$supplied_password = password_hash($password, PASSWORD_DEFAULT);
			//	echo "supplied password = ". $supplied_password."<br>";
				// password in db
			$sql = "SELECT PASSWORD FROM store_owner";
				$result = $conn->query($sql);
				$result = $result->fetch(PDO::FETCH_ASSOC);
				
				//echo "db password = ". $result['PASSWORD'];
				if (password_verify($password, $result['PASSWORD'])){
					//echo "your are loged in ";
					$_SESSION["userid"] = $userid ;
					//echo $_SESSION["userid"];
					header("Location:..\index.php");
				}else{
					echo "some details are not correct go back and try again";
				}
		
	}else{
		echo "Sorry Mistake in Supplied Details go back and try again";
	}






$conn = null;

}else{
	
	header("Location:..\erro.php");
}