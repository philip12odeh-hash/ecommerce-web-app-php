<?php


function checkPassword(){
if (isset($_POST['password'], $_POST['passwordcheck'])) {
    
    // 1. Retrieve the submitted values
    $password = $_POST['password'];
    $passwordCheck = $_POST['passwordcheck'];
    
    // 2. Perform the server-side comparison
    if ($password !== $passwordCheck) {
        // The fields do NOT match
        
        // Handle the error (e.g., set an error message, redirect back to the form)
        echo "Error: The two password fields must be identical. Please go back and try again.";
        exit; // Stop further processing
        
    } else {
        // The fields DO match
        
        // Continue with data sanitization, validation, and database storage (e.g., password_hash)
        // ...
      //  echo "Passwords match! Processing registration..."."<br>";
    }
} 
}

// inputs sanitizer

	function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
  
}



	
