<?php include "includes/header.php";?>
<?php include "includes/dbcon.php";?>




<div id="checkout_wrapper">
	<div id="checkout_order_summary">
		<div class="captions"><p>ORDER REVISION<p></div>
			<?php
				$stmt = $conn->prepare("SELECT * FROM cart");
					$stmt->execute();

								// set the resulting array to associative
								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
								
					 $i=0; 			
						while($result = $stmt->fetch()){ ?>
							
				<div class="checkout_items">
					<table >
					  <tr>
						<td>
						<img class="check_out_img" src="<?php echo $result['Item_Image'] ?>" alt="image of cloth" >
						</td>
						<td>
						<span class ="order_summary_info"><?php echo $result['Item_type'] ?> </span> 
						<span class ="order_summary_info"><?php echo $result['Item_size'] ?> </span> 
						<span class ="order_summary_info"><?php echo $result['Item_material'] ?> </span> 
						<span class ="order_summary_info"><?php echo $result['Item_Price'] ?> </span> 
						
						
						Quantity
						<select  onchange= "update_price('#Qty<?php echo $i?>')" name="Quantity" id="Qty<?php echo $i?>">
						  <option value="1">1</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						  <option value="6">6</option>
						  <option value="7">7</option>
						  <option value="8">8</option>
						  <option value="9">9</option>
						  <option value="10">10</option>
						  
						  
						</select>
						</p>
						
						</td>
					  </tr>
					</table>
				<!-- note price is update in script file-->	
					<div class="checkout_total">Total : <?php echo $result['Item_Price'] ?></div>
					<div class="checkout_remove" onclick="removeItem(this)"><button>Remove from list <?php echo $i + 1 ?> </button></div>
					<div class="initial_total_price" style="visibility:hidden"><?php echo $result['Item_Price'] ?></div>
					
				</div>

				<?php	$i++;	}				
				?>
					<div style="visibility:hidden" class="amountOfCartITems" ><?php echo $i ?></div>
					<input type="text" name="amountOfCartITems" value="<?php echo $i ?>">
		</div>
		
		
	
	<div id="checkout_shipment" style="border-radius:10px;">
		<div class="captions"><p>SHIPMENT<p></div>
		<div class="shipmenttable_wrapper">
			<table>
				<tr><td>FirstName</td></tr>
				<tr><td><input type="text" name="FirstName" id="FirstName"></td></tr>
				<tr><td>SecondName</td></tr>
				<tr><td><input type="text" name="SecondName" id="SecondName"></td></tr>
				<tr><td>Tel</td></tr>
				<tr><td><input type="tel" name="tel" id="tel"></td></tr>
				<tr><td>Email</td></tr>
				<tr><td><input type="email" name="email" id="email"></td></tr>
				<tr><td>Address</td></tr>
				<tr><td><input type="textarea" name="address" id="address"></td></tr>
				<tr><td>State</td></tr>
				<tr><td><input type="text" name="State" id="State"></td></tr>
			</table>
		
		</div>
	</div>
	
	
	
	<div id="checkout-payment" style="border-radius:10px; padding-right:40px; padding-left:80px">
	
		<div class="captions"><p>PAYMENT<p></div>
		<div id="payment_method" >
			<p>Choose a Payment Service Provider</p>
			<table class="payment_method_table">
				<tr><td class="payemt_card"><img src="images/googlepay.png" width="20px" height="20px" > Googlepay </td><td class="payemt_card_arrow"><input type="radio" name="payment_option" value="Googlepay" id="googlepay"></td></tr>
				<tr><td class="payemt_card"><img src="images/master_card.png" width="20px" height="20px" > Master Card </td><td class="payemt_card_arrow"><input type="radio" name="payment_option" value="Master_Card" id="mastercard"></td></tr>
				<tr><td class="payemt_card"><img src="images/visacard.png" width="20px" height="20px" > Visa Card </td><td class="payemt_card_arrow"><input type="radio" name="payment_option" value="Visa_Card" id="visacard"></td></tr>
			</table>
		</div>
		<br>
		
		<div id="payment_summary" style="background-color:white;border-radius:10px">
			<p>Payment Summary</p>
			<table class="payment_summary_table">
				<tr><td id="payment_summary_item1">Total Shoping Cost </td><td class="payment_summary_cost total_shoping_cost">N23000</td></tr>
				<tr><td id="payment_summary_item2">Shipment</td><td class="payment_summary_cost shipment ">N1500</td></tr>
				<tr><td id="payment_summary_item3">VAT</td><td class="payment_summary_cost VAT">N300</td></tr>
				<tr><td id="payment_summary_item4">Discount</td><td class="payment_summary_cost discount">N2000</td></tr>
			</table>
			<div id="grand_total">
			<table>
				<tr><td>GRAND TOTAL</td><td id="final_cost">N45,000</td></tr>
			</table>	
			</div>
		</div>
		<br>
		<div id="complete_order" onclick="completeOrder();">COMPLETE ORDER</div>
		
	</div>



</div>


<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>

























<?php include "includes/footer.php" ?>