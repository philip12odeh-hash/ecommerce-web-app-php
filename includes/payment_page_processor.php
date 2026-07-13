<?php
session_start();
// Read the raw JSON stream
$json = file_get_contents('php://input');
$data = json_decode($json, true);
//print_r($data);
print_r($summary = $data['summary']);
$shipment_first_name = $data['shipment_first_name'];
$shipment_second_name= $data['shipment_second_name'];
$shipment_telephone_number= $data['shipment_telephone_number'];
$shipment_email= $data['shipment_email'];
$shipment_address= $data['shipment_address'];
$shipment_state= $data['shipment_state'];
$card= $data['card'];
$Total = $data['Total'];

//print_r($data);

print_r($_SESSION["Summary"] = $summary);
echo"<br>";
$_SESSION["FirstName"] = $shipment_first_name;
echo"<br>";
$_SESSION["SecondName"] =$shipment_second_name;
echo"<br>";
$_SESSION["PhoneNumber"] = $shipment_telephone_number;
echo"<br>";
$_SESSION["Email"] = $shipment_email;
echo"<br>";
$_SESSION["Address"] = $shipment_address;
echo"<br>";
$_SESSION["State"] = $shipment_state;
echo"<br>";
$_SESSION["Card"] = $card;
echo"<br>";
$_SESSION["Total"] = $Total;



// Store it in the session for the next page


?>