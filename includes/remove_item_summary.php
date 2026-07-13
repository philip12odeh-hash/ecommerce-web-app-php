<?php include "dbcon.php" ?>
<?php
// Check if the POST data exists
if (isset($_POST['SN'])) {
       //  $_POST['SN'];

        $serialNum = $_POST['SN'];
     //  $serialNum = intval($serialNum);
       // echo $serialNum;
         

       try {
            // 1. Delete the user row safely
            $stmt = $conn->prepare("DELETE FROM cart WHERE SN = ?");
            $stmt->execute([$serialNum]);
        
            // 2. Rearrange IDs consecutively starting from 1
            $conn->exec("SET @count = 0;");
            $conn->exec("UPDATE cart SET SN = (@count := @count + 1);");
        
            // 3. Reset auto-increment so the next new row gets the next logical number
            $conn->exec("ALTER TABLE cart AUTO_INCREMENT = 1;");
        
            echo "Item Successfully Removed from Cart";
        } catch (PDOException $e) {
            echo "Error rearranging IDs: " . $e->getMessage();
        }
    
   
}else{
    echo "request came but variable not well formated";
}
?>
