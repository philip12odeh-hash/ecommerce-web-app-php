
<?php 
session_start();
include "dbcon.php" 
// start a session and connect to db 
?>

<?php



// 2. Clear Session Data
$_SESSION = array(); // Unset all session variables

session_destroy(); // Destroy the session on the server    
    // Truncate clears the data and resets auto-increment keys back to 1
$conn->exec("TRUNCATE TABLE cart");
    



// 5. Redirect to the homepage
header("Location:../index.php");
//exit;