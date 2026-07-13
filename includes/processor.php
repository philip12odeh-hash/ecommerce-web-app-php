

<?php
include "dbcon.php";
include "functions.php";
if(isset($_POST["action_source"])){
checkPassword();
 // grab all inputs from environment variable
 $owner ="owner";
 $fname = $sname =  $email = $tel = $password = $spassword = $nickname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $fname = test_input($_POST["firstName"]);
  $sname = test_input($_POST["secondName"]);
  $email = test_input($_POST["Email"]);
  $tel = test_input($_POST["phoneNumber"]);
	$password = test_input($_POST["password"]);  
 $spassword = test_input($_POST["passwordcheck"]);
  $nickname = test_input($_POST["userid"]);
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//check if data where received
 //echo $owner ."<br>";
 //echo $fname ."<br>";
 //echo $sname ."<br>"; 
 //echo $email."<br>";
 //echo $tel ."<br>"; 
 //echo $password ."<br>";
 //echo $spassword ."<br>"; 
 //echo $hashedPassword ."<br>";
 //echo $nickname ."<br>";
 
// id First_Name	Second_Name	Email	Phone_Number	PASSWORD	USER_ID	

// prepare and bind

 $stmt = $conn->prepare("INSERT INTO store_owner (id, First_Name, Second_Name, Email, Phone_Number, PASSWORD, USER_ID)
    VALUES (:id, :First_Name, :Second_Name, :Email, :Phone_Number, :PASSWORD, :USER_ID )");
    $stmt->bindParam(':id', $owner);
    $stmt->bindParam(':First_Name', $fname);
    $stmt->bindParam(':Second_Name', $sname);
	$stmt->bindParam(':Email', $email);
	$stmt->bindParam(':Phone_Number', $tel);
	$stmt->bindParam(':PASSWORD', $hashedPassword);
	$stmt->bindParam(':USER_ID', $nickname);
	
 $stmt->execute();
	
/*	
$stmt = $conn->prepare("INSERT INTO store_owner (id, First_Name, Second_Name, Email, Phone_Number, PASSWORD, USER_ID) VALUES (?,?,?,?,?,?,?)");

$stmt->bindParam("sssssss", $owner, $fname, $sname, $email, $tel, $hashedPassword, $nickname);

// set parameters and execute
$stmt->execute();
*/
$conn = null;

header("Location:..\success.php");
}else{header("Location:..\erro.php");}

  
 




