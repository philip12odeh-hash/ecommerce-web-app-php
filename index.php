<?php include 'includes/header.php' ?>
<?php include 'includes/dbcon.php' ?>
<?php
					$stmt = $conn->prepare("SELECT * FROM carousel_items");
					$stmt->execute();

					// set the resulting array to associative
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
					$result = $stmt->fetchAll();
					
?>	
<?php
	if($totalItems > 0){	echo '<a href="check_out.php" class="finish-shopping-btn">
			<i class="fas fa-shopping-cart"></i>
			Finish Shopping
	</a>';}

?>
 
<!--- splash screen start here --->	
<div id="carouselExampleCaptions"  class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500" data-bs-pause="false">
	
		<div class="carousel-indicators">
		<?php
			$i=1;
			foreach($result as $value){
				if($value['indicator'] == 1){
					
				echo"<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>";
				}else{
				echo	"<button type='button' data-bs-target='#carouselExampleCaptions' data-bs-slide-to='".$i."' aria-label='Slide"." " .$value['indicator']." '></button>"." ";
				$i++;
				}
			}
			
			
		?>	
			
		</div>

	<div class="carousel-inner">
		
				<?php	
					
					foreach($result as $value){
						if($value['id']== 1){
							echo "<div class='carousel-item active'>
						<img src=".$value['image_link']." class='d-block w-100' alt='...'>
						<div class='carousel-caption d-none d-md-block'>
							<h1><mark>".$value['caption']."</mark></h1><br>
							<p><mark>".$value['caption2']."</mark></p>
						</div>
						</div>";
						}else{
							echo "<div class='carousel-item'>
						<img src=".$value['image_link']." class='d-block w-100' alt='...'>
						<div class='carousel-caption d-none d-md-block'>
							<h1><mark>".$value['caption']."</mark></h1><br>
							<p><mark>".$value['caption2']."</mark></p>
						</div>
						</div>";
						}
						
					}
					//$conn = null;
				?>	
										
			
				

		
					
	</div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		  </button>
</div>

		
<!--- splash screen ends here --->
<hr>
<br>

<!--- lastest stock dispay  starts here --->

<div class="newArrivals">
	<h2 id="latest"><strong> LATEST AVAILABLE STOCKS.</strong></h2><p>
	 
</div>
<br>
<hr>
</div>
<div class="container-fluid">
	<?php
					$stmt = $conn->prepare("SELECT * FROM allmachendise WHERE ID <= 4");
					$stmt->execute();

					// set the resulting array to associative
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
					
					
					
	?>
	<?php
	
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			//echo "The form was submitted via POST";
			if(isset($_POST['Cart']) && !empty($_POST['Cart'])){
			if ($_POST['Cart']=== 'Add to Cart') {
				echo "Add to Cart is clicked<br>";
				echo "<br>". $item_image =$_POST["item_image"];
			    echo "<br>". $item_price =$_POST["item_price"];
				echo "<br>". $item_type = $_POST["TYPE"];
				echo "<br>". $item_size = $_POST["SIZE"];
				echo "<br>". $item_brand = $_POST["BRAND"];
				echo "<br>". $item_material = $_POST["MATERIAL"];
				echo "<br>". $ITEM_NO = $_POST["ITEM_NO"];
				echo "<br>". $Quantity = 1;
		// 1. Check if the item is already there
				$checkStmt = $conn->prepare("SELECT COUNT(*) FROM cart WHERE ITEM_NO = :ITEM_NO");
				$checkStmt->execute([':ITEM_NO' => $ITEM_NO]);
				$itemExists = $checkStmt->fetchColumn();

				if ($itemExists > 0) {
					// 2. If it exists, show message and stop
					echo "<script>alert('Item is already in your cart!'); window.location.href='index.php';</script>";
				} else {
					// 3. If it's new, proceed with insertion
					$stmt = $conn->prepare("INSERT INTO cart (Item_Image, Item_Price, item_type, item_size, item_brand, item_material, Quantity, ITEM_NO)VALUES (:Item_Image, :Item_Price, :item_type, :item_size, :item_brand, :item_material, :Quantity, :ITEM_NO)");
					
					$stmt->execute([    
						':Item_Image' => $item_image,
						':Item_Price' => $item_price,
						':item_type' => $item_type,
						':item_size' => $item_size,
						':item_brand' => $item_brand,
						':item_material' => $item_material,
						':Quantity'   => $Quantity,
						':ITEM_NO'    => $ITEM_NO
					]);
    
    echo "Item added to cart successfully!";
}
			
		echo "<script>alert('Item added to cart successfully!'); window.location.href='index.php';</script>";				
			}elseif(($_POST['Cart']=== 'Buy Now')){
		
						echo "Buy Now Clicked<br>";
							echo "Add to Cart is clicked<br>";
				echo "<br>". $item_image =$_POST["item_image"];
			    echo "<br>". $item_price =$_POST["item_price"];
				echo "<br>". $item_type = $_POST["TYPE"];
				echo "<br>". $item_size = $_POST["SIZE"];
				echo "<br>". $item_brand = $_POST["BRAND"];
				echo "<br>". $item_material = $_POST["MATERIAL"];
				echo "<br>". $ITEM_NO = $_POST["ITEM_NO"];
				echo "<br>". $Quantity = 1;
					// 1. Check if the item is already there
							$checkStmt = $conn->prepare("SELECT COUNT(*) FROM cart WHERE ITEM_NO = :ITEM_NO");
							$checkStmt->execute([':ITEM_NO' => $ITEM_NO]);
							$itemExists = $checkStmt->fetchColumn();

							if ($itemExists > 0) {
								// 2. If it exists, show message and stop
								echo "<script>alert('Item Already in Cart'); window.location.href='check_out.php';</script>";
							} else {
								// 3. If it's new, proceed with insertion
								$stmt = $conn->prepare("INSERT INTO cart 
									(Item_Image, Item_Price, item_type, item_size, item_brand, item_material, Quantity, ITEM_NO)
									VALUES (:Item_Image, :Item_Price, :item_type, :item_size, :item_brand, :item_material, :Quantity, :ITEM_NO)");
								
								$stmt->execute([    
									':Item_Image' => $item_image,
									':Item_Price' => $item_price,
									':item_type' => $item_type,
									':item_size' => $item_size,
									':item_brand' => $item_brand,
									':item_material' => $item_material,
									':Quantity'   => $Quantity,
									':ITEM_NO'    => $ITEM_NO
								]);
				
				
			}
						
						echo "<script>alert('Item Added to cart Successfully'); window.location.href='check_out.php';</script>";
	
		
			}
		}
			
			
		
		}
		
		
	?>
	<div class="col-12">
		<div class="card-group">
		<!-- OPEN THE PHP HERE-->
			<?PHP
			
					while($result = $stmt->fetch()){

						echo ' <div class="card m-2 border my-hover-card">
							<img src="'.$result["IMAGE_LINK"].'" class="card-img-top" alt="...">
							<div class="card-body">
							  <h5 class="card-title"><span> '.$result["DESCRIPTION"].'</span></h5>
							  <p class="card-text"><strong>Type : '.$result["TYPE"].'.</strong><br>
								<strong> Size : '.$result["SIZE"].'. </strong><br>
								<strong> Brand : '.$result["BRAND"].'. </strong><br>
								<strong> Material : '.$result["MATERIAL"].'. </strong><br>
								<strong> Price : '.$result["PRICE"].'. </strong></p>
								<strong> Item No: '.$result["ITEM_NO"].'. </strong></p>
								
							
							<form method="POST">
							<input type="text" name = "item_image" value="'.$result["IMAGE_LINK"].'" hidden>
							<input type="text" name = "item_price" value="'.$result["PRICE"].'" hidden>
							<input type="text" name = "ITEM_NO" value="'.$result["ITEM_NO"].'" hidden>
							<input type="text" name = "TYPE" value="'.$result["TYPE"].'" hidden>
							<input type="text" name = "SIZE" value="'.$result["SIZE"].'" hidden>
							<input type="text" name = "BRAND" value="'.$result["BRAND"].'" hidden>
							<input type="text" name = "MATERIAL" value="'.$result["MATERIAL"].'" hidden>
							
							<input class="add_to_cart_btn"  type="submit" name="Cart" value = "Add to Cart">
							<input class="add_to_cart_btn"  type="submit" name="Cart" value = "Buy Now">
							</form>
							<!---<a href="#" class="btn btn-primary">Buy Now</a>-->
							<!---<a href="#" class="btn btn-primary">Add to Cart</a>-->
							</div>
							<div class="card-footer">
							  <small class="text-body-secondary">Updated on '.$result["TIME_STAMP"].'</small>
							</div>
						  </div> ';
						  
						  
						
					}
			
			
			?>
			
		
		<!-- CLOSE THE PHP HERE-->  
		</div>
	</div>	
	
	<!--- SECOND SECTION ---->
	
	<?php
					$stmt = $conn->prepare("SELECT * FROM allmachendise WHERE ID >4 AND ID <=8");
					$stmt->execute();

					// set the resulting array to associative
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
					
					
					
	?>
	<div class="col-12">
		<div class="card-group">
		<!-- OPEN THE PHP HERE-->
			<?PHP
					while($result = $stmt->fetch()){
					
						echo ' <div class="card m-2 border my-hover-card">
							<img src="'.$result["IMAGE_LINK"].'" class="card-img-top" alt="...">
							<div class="card-body">
							  <h5 class="card-title"><span> '.$result["DESCRIPTION"].'</span></h5>
							  <p class="card-text"><strong>Type : '.$result["TYPE"].'.</strong><br>
								<strong> Size : '.$result["SIZE"].'. </strong><br>
								<strong> Brand : '.$result["BRAND"].'. </strong><br>
								<strong> Material : '.$result["MATERIAL"].'. </strong><br>
								<strong> Price : '.$result["PRICE"].'. </strong></p>
								<strong> Item No: '.$result["ITEM_NO"].'. </strong></p>
								
							<form method="POST">
							<input type="text" name = "item_image" value="'.$result["IMAGE_LINK"].'" hidden>
							<input type="text" name = "item_price" value="'.$result["PRICE"].'" hidden>
							<input type="text" name = "ITEM_NO" value="'.$result["ITEM_NO"].'" hidden>
							<input type="text" name = "TYPE" value="'.$result["TYPE"].'" hidden>
							<input type="text" name = "SIZE" value="'.$result["SIZE"].'" hidden>
							<input type="text" name = "BRAND" value="'.$result["BRAND"].'" hidden>
							<input type="text" name = "MATERIAL" value="'.$result["MATERIAL"].'" hidden>
							
							<input class="add_to_cart_btn"  type="submit" name="Cart" value = "Add to Cart">
							<input class="add_to_cart_btn"  type="submit" name="Cart" value = "Buy Now">
							</form>
							<!---<a href="#" class="btn btn-primary">Buy Now</a>-->
							<!---<a href="#" class="btn btn-primary">Add to Cart</a>-->
							
							</div>
							<div class="card-footer">
							  <small class="text-body-secondary">Updated on '.$result["TIME_STAMP"].'</small>
							</div>
						  </div> ';
						
					}
			
			
			?>
			
		
		<!-- CLOSE THE PHP HERE-->  
		</div>
	</div>	
	
	<!-- A BETTER WAY TO DO THE ABOVE IS TO USE GRIDE LAYOUT AND LOOP ALL CONTENTS AT ONCE-->
		
	
</div>

	

<!--- lastest stock dispay  ends here --->

<?php include 'includes/footer.php' ?>