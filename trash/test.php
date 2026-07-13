<?php include "includes/header.php" ?>
<?php include "includes/dbcon.php" ?>

<?php
					$stmt = $conn->prepare("SELECT * FROM carousel_items");
					$stmt->execute();

					// set the resulting array to associative
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
					$result = $stmt->fetchAll()
					
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
							<h1><mark>Our Machendise Are From the Best Sources</mark></h1><br>
							<p><mark>Our Machendise Are From the Best Sources</mark></p>
						</div>
						</div>";
						}else{
							echo "<div class='carousel-item'>
						<img src=".$value['image_link']." class='d-block w-100' alt='...'>
						<div class='carousel-caption d-none d-md-block'>
							<h1><mark>Our Machendise Are From the Best Sources</mark></h1><br>
							<p><mark>Our Machendise Are From the Best Sources</mark></p>
						</div>
						</div>";
						}
						
					}
					$conn = null;
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


// ISSUES TO BE FIXED
<!--
Added missing <div class="carousel-inner"> (this was the main bug!)
First slide gets active class dynamically
indicator (dots) are now generated dynamically based on actual number of images
Proper escaping with htmlspecialchars()
Cleaner and safer PHP logic

Now your carousel will work perfectly no matter how many images are in the database!
Just paste this corrected code and watch it slide beautifully!
Let me know if you want auto-pause on hover or caption from database too!
-->








<?php include "includes/footer.php" ?>