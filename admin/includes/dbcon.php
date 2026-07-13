<?php 

$servername = "localhost";
$username = "Admin";
$password = "pheelinn123.";
$myDB ="odehthriftstore";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
   // echo "Connection failed: " . $e->getMessage();
    die("Database connection error. Please try again later.");
    }
?>