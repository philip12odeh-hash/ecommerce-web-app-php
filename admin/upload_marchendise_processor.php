<?php 
	include "includes/header.php";
	include 'includes/dbcon.php';
	
		
		$sql = "SELECT COUNT(*) FROM allmachendise";
			$result = $conn->query($sql);
			$number_of_rows = $result->fetchColumn();
		echo "<br>Starting Index : ".$index = $number_of_rows + 1;
		echo "<br>loop count : ".	$loop_count = $index + 20;
		$counter = 1;
	if(isset($_POST['submit'])){
			// grab forms values
	  for($index; $index <= $loop_count; $index++ ){
				
			echo'<br> <b>DATA FOR FORM NO :  </b>:'.$index.'<p>';
			
			echo"form connected to processor !!! and it was sent with submit button";
			echo "<br> ITEM ID : ".$post_Id = $_POST['ID'.$index];
			echo "<br> ITEM SIZE : ".$item_size = $_POST['SIZE'.$index];
			echo "<br> ITEM TYPE : ".$item_type = $_POST['TYPE'.$index];
			echo "<br> BRAND : ".$brand = $_POST['BRAND'.$index];
			echo "<br> MATERIAL  : ".$material = $_POST['MATERIAL'.$index];
			echo "<br> TIME_STAMP : ".$time_stamp = $_POST['TIME_STAMP'.$index];
			echo "<br> PRICE : ".$price = $_POST['PRICE'.$index];
			echo "<br> DESCRIPTION : ".$description = $_POST['DESCRIPTION'.$index];
			echo "<br>";
			// grab image variables
				echo "<br>IMAGE FILE_NAME : ".$fileName = $_FILES['Change_Image'.$index]['name'];
				echo "<br>IMAGE TEMP_FILE_NAME : ".$fileTmpName = $_FILES['Change_Image'.$index]['tmp_name'];
				echo "<br>IMAGE FILE_SIZE : ".$fileSize = $_FILES['Change_Image'.$index]['size'];
				echo "<br>IMAGE ERRORS : ".$fileError = $_FILES['Change_Image'.$index]['error'];
				echo "<br>IMAGE_LINK : ".$image_link = "images/c".$post_Id.".jpg";
				
				// check fields filled and update db with them
				if(isset($post_Id) && !empty($post_Id)&& isset($item_size) && !empty($item_size)&& isset($item_type) && !empty($item_type) && isset($brand) && !empty($brand)&& isset($material) && !empty($material)&& isset($time_stamp) && !empty($time_stamp) && isset($price) && !empty($price)&& isset($description) && !empty($description)&& isset($fileName) && !empty($fileName) && isset($fileTmpName) && !empty($fileTmpName) && isset($fileSize) && !empty($fileSize)&& isset($fileError)&& empty($fileError) && isset($image_link) && !empty($image_link)){
					
				img_upload($post_Id,$fileName,$fileTmpName,$fileSize,$fileError);	
				
				upd_db($item_size,$item_type,$brand,$material,$image_link,$time_stamp,$price,$description,$post_Id,$conn);	
					
					echo'<br>'.$counter .' of clothes has been added to store';
						
						$counter ++;
				}else { echo "<br> <b> THIS FIELD HAS MISSING DATA NOT SET OR EMPTY</b>";}
				
		
			
			echo '<hr>';
			}
			
			
			
		}
		// image upload function
	function img_upload($post_Id,$fileName,$fileTmpName,$fileSize,$fileError){
		
	  $fileExt = explode('.', $fileName);
	  $fileActualExt = strtolower(end($fileExt));

	  if ($fileActualExt == 'jpg' || $fileActualExt == 'jpeg') {
		if ($fileError === 0) {
		  if ($fileSize < 2000000) {
			list($width, $height) = getimagesize($fileTmpName);
			if ($width >= 1200 && $height >= 600) {
			  // Create image resource
			  $image = imagecreatefromjpeg($fileTmpName);

			  // Trim image to 1200x600
			  $newImage = imagecreatetruecolor(1200, 600);
			  imagecopyresampled($newImage, $image, 0, 0, 0, 0, 1200, 600, $width, $height);

			  // Save image as JPG
			  $fileNewName = "c".$post_Id. ".jpg";
			  $fileDestination = '..\images/' . $fileNewName;
			  imagejpeg($newImage, $fileDestination, 90);

			  echo "Image uploaded and trimmed successfully!";
			} else {
			  echo "Image dimensions must be at least 1200x600!";
			}
		  } else {
			echo "File is too big!";
		  }
		} else {
		  echo "Error uploading file!";
		}
	  } else {
		echo "Only JPG images are allowed!";
	  }

	}
	
	
// db update function

function upd_db($item_size, $item_type, $brand, $material, $image_link, $time_stamp, $price, $description, $post_Id, $conn) {
    // 1. Add colons (:) before the names in the VALUES section
    $stmt = $conn->prepare("INSERT INTO allmachendise 
        (ID, SIZE, TYPE, BRAND, MATERIAL, IMAGE_LINK, TIME_STAMP, PRICE, DESCRIPTION) 
        VALUES (:ID, :SIZE, :TYPE, :BRAND, :MATERIAL, :IMAGE_LINK, :TIME_STAMP, :PRICE, :DESCRIPTION)");
    
    // 2. Ensure your array keys match those tokens (including the colon is best practice)
    $stmt->execute([    
        ':SIZE'        => $item_size,
        ':TYPE'        => $item_type,
        ':BRAND'       => $brand,
        ':MATERIAL'    => $material,
        ':IMAGE_LINK'  => $image_link,
        ':TIME_STAMP'  => $time_stamp,
        ':PRICE'       => $price,
        ':DESCRIPTION' => $description,
        ':ID'          => $post_Id
    ]);

    echo "<br><b>Database updated successfully.</b>";
	header("location:../index.php");
}
	
	
	
	
	
	
	
	
/*
	
	function del_rec($item_size,$item_type,$brand,$material,$image_link,$time_stamp,$price,$description,$post_Id){
		
	};
	
	*/
	
include 'includes/footer.php';