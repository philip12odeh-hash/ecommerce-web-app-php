
// function in the html to check screen size.
let srcnNotify = ()=>{
	let srnsz = window.innerWidth;
	if(srnsz < 600){
		alert("screen size now less than 600 :"+ srnsz );
	}
	else{
		alert("screen size more than 600 the size is now :" + srnsz);
	}
}
// event listener to check for screen resize and run function to that will display more button
window.addEventListener('resize',()=>{
	let srnsz = window.innerWidth;
	if(srnsz <= 1247){
		let moreButton = document.getElementById("More");
		moreButton.style.display = "inline";
	}
	else if(srnsz > 1247){
		moreButton = document.getElementById("More").style.display = "none";
	}
	
});

// show more button when the page load with view port lower than the level to show perfune button

window.onload = function (){
	let srnsz = window.innerWidth;
	if(srnsz <= 1247){
		let moreButton = document.getElementById("More");
		moreButton.style.display = "inline";
	}
	else if(srnsz > 1247){
		moreButton = document.getElementById("More").style.display = "none";
	}
}

// function to control how clicking the more button displays the drop button and populate it with only removed items

let drop = document.getElementById("more_Container");
	drop.style.display = "none";
	
function more(){
	dropico1 = document.getElementById("dropimg1").style.display;

	dropico2 = document.getElementById("dropimg2").style.display;
	console.log(dropico1);
	
	if(document.getElementById("dropimg1").style.display == "inline"){document.getElementById("dropimg1").style.display = "none";
	document.getElementById("dropimg2").style.display = "inline"}else if(document.getElementById("dropimg1").style.display == "none"){document.getElementById("dropimg1").style.display = "inline";
	document.getElementById("dropimg2").style.display = "none"};
	
	let srnsz = window.innerWidth;
	if(drop.style.display == "none"){
		drop.style.display = "block";
	}else{drop.style.display = "none"}
	if(srnsz <= 1247){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
		}
	if(srnsz <= 1115){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
			dropItems[1].style.display = "block";
			
		}
	if(srnsz <= 979){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
			dropItems[1].style.display = "block";
			dropItems[2].style.display = "block";
			
		}
	if(srnsz <= 868){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
			dropItems[1].style.display = "block";
			dropItems[2].style.display = "block";
			dropItems[3].style.display = "block";
			
			
		}
	if(srnsz <= 807){
		dropItems = document.getElementsByClassName("items");
		for(i=0; i < dropItems.length; i++){
			dropItems[i].style.display = "none";
		}
			dropItems[0].style.display = "block";
			dropItems[1].style.display = "block";
			dropItems[2].style.display = "block";
			dropItems[3].style.display = "block";
			dropItems[4].style.display = "block";
			dropItems[5].style.display = "block";
			dropItems[6].style.display = "block";
			
			
			
		}
		
		
		
}
//ajax for procession cart Form

function process_form() {
    event.preventDefault();
	
	// 1. Manually get values using .value
	let item_image  = document.querySelector('[name="item_image"]').value;
	
	alert(item_image1);
	
				
						
	
};


// Keep these global variables to cache the DOM elements
let total_price_div = document.querySelectorAll(".checkout_total");
let ini_total_price_elements = document.querySelectorAll(".initial_total_price");
let amountOfCartItems = Number(document.querySelector('.amountOfCartITems').textContent);



function update_price(id) {
    // 1. Select elements
    let selectedElement = document.querySelector(id);
  //  let amountOfCartItems = Number(document.querySelector('.amountOfCartITems').textContent);

    // 2. Extract index number safely from the ID string
    let place_holder = Number(id.replace(/[^0-9.]/g, ""));
    
    // 3. Get the base price for this specific item
    let base_price = Number(ini_total_price_elements[place_holder].textContent.replace(/[^0-9.]/g, ""));
    
    // 4. Get the selected quantity number safely
    let selectedOption = Number(selectedElement.options[selectedElement.selectedIndex].text);

    // 5. Calculate new item total and update DOM row immediately
    let total_price = base_price * selectedOption;
    total_price_div[place_holder].textContent = "Total N " + total_price;

    // 6. Reset the overall shopping cost to 0 before recalculating
    let shoping_cost = 0;

    // 7. Loop through ALL rows to sum up the new grand total
    for (let i = 0; i < amountOfCartItems; i++) {
        let row_total = Number(total_price_div[i].textContent.replace(/[^0-9.]/g, ""));
        shoping_cost += row_total;
    }

    // 8. Log or update your UI with the final total
    console.log("Grand Total Shopping Cost: N " + shoping_cost);
    
    // If you have a grand total element on your page, update it here:
    document.querySelector(".total_shoping_cost").textContent = "N " + shoping_cost;

	// grab and convert shipment, VAT  and discount to number 

	let shipment = Number(document.querySelector(".shipment").textContent.replace(/[^0-9.]/g, "")) ;
	//alert(shipment);

	let vat = Number(document.querySelector(".VAT").textContent.replace(/[^0-9.]/g, "")) ;
	//alert(vat);

	let discount = Number(document.querySelector(".discount").textContent.replace(/[^0-9.]/g, "")) ;
	//alert(discount);

	let grand_total = shoping_cost + shipment + vat - discount;
	//alert(grand_total);

	document.querySelector("#final_cost").textContent = "N" + grand_total;

}
	// update total shoping cost on load of page

	let initial_total_shoping_cost = 0; 
	for(let i = 0; i< amountOfCartItems; i++){
	   initial_total_shoping_cost += Number(ini_total_price_elements[i].textContent.replace(/[^0-9.]/g, ""));
	}
	// write shoping cost
	document.querySelector(".total_shoping_cost").textContent = "N" + initial_total_shoping_cost;
	document.querySelector("#final_cost").textContent = "N" +  (initial_total_shoping_cost + 1800 - 2000);


// process the remove item button

	function removeItem(element){
		let itemSN = element.textContent;
		itemSN = Number(itemSN.replace(/[^0-9.]/g, ""));
	//	alert(itemSN);
// encode for sending via ajax send method;

		//serialNumber = "SN =" + encodeURIComponent(itemSN); 

//fire up ajax to process deletion of desire item summery
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			  if (xhttp.readyState == 4 && xhttp.status == 200) {
			 alert(xhttp.responseText);
			 window.location.reload();
			  } 
			};
			
			xhttp.open("POST", "includes/remove_item_summary.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhttp.send("SN=" + encodeURIComponent(itemSN));
		  
	}


	function completeOrder(){
		
		// collect stuff in order summary column

		let order_summary_info = document.querySelectorAll(".order_summary_info");
		
		//console.log(order_summary_info[5].textContent);
		let order_summary = [];
		for( let i = 0; i< (amountOfCartItems * 4); i++){
			let item = order_summary_info[i].textContent;
			order_summary.push(item);
				

		}

		console.log(`ITEMS INSIDE ORDER SUMMARY :  ${order_summary}`);

		/*let shipment_info_first_name = document.getElementById("FirstName").value;
		let shipment_info_second_name = document.getElementById("SecondName").value;
		let shipment_info_telephone_number = document.getElementById("tel").value;
		let shipment_info_email = document.getElementById("email").value;
		let shipment_info_address = document.getElementById("address").value;
		let shipment_info_state = document.getElementById("State").value;

		console.log(shipment_info_first_name, shipment_info_second_name,shipment_info_telephone_number,shipment_info_email,shipment_info_address,shipment_info_state); */

		// collect stuffs in shipment address column

		// 1. Grab the raw element values
			let raw_first_name = document.getElementById("FirstName").value;
			let raw_second_name = document.getElementById("SecondName").value;
			let raw_telephone_number = document.getElementById("tel").value;
			let raw_email = document.getElementById("email").value;
			let raw_address = document.getElementById("address").value;
			let raw_state = document.getElementById("State").value;

			// 2. Helper function to sanitize text (removes trailing spaces and encodes HTML tokens)
			function sanitizeInput(str) {
				return str
					.trim()
					.replace(/&/g, "&amp;")
					.replace(/</g, "&lt;")
					.replace(/>/g, "&gt;")
					.replace(/"/g, "&quot;")
					.replace(/'/g, "&#x27;");
			}

			// 3. Sanitize all inputs
			let shipment_info_first_name = sanitizeInput(raw_first_name);
			let shipment_info_second_name = sanitizeInput(raw_second_name);
			let shipment_info_telephone_number = raw_telephone_number.trim().replace(/[\s-()]/g, ''); // Removes spaces, dashes, and parentheses
			let shipment_info_email = raw_email.trim().toLowerCase();
			let shipment_info_address = sanitizeInput(raw_address);
			let shipment_info_state = sanitizeInput(raw_state);

			// 4. Validation Rules (Regex expressions)
			const nameRegex = /^[A-Za-z\s\-']{2,50}$/; // 2-50 chars: letters, spaces, hyphens, apostrophes
			const phoneRegex = /^\+?[0-9]{7,15}$/;    // Supports optional '+' and 7 to 15 digits
			const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic secure email validation

			// 5. Run Validation Checks
			let errors = [];

			if (!nameRegex.test(shipment_info_first_name)) {
				errors.push("Invalid first name. Use letters only (2-50 characters).");
			}
			if (!nameRegex.test(shipment_info_second_name)) {
				errors.push("Invalid second name. Use letters only (2-50 characters).");
			}
			if (!phoneRegex.test(shipment_info_telephone_number)) {
				errors.push("Invalid phone number. Provide a valid 7-15 digit number.");
			}
			if (!emailRegex.test(shipment_info_email)) {
				errors.push("Invalid email format.");
			}
			if (shipment_info_address.length < 5) {
				errors.push("Address is too short.");
			}
			if (shipment_info_state === "" || shipment_info_state === "default") {
				errors.push("Please select or enter a state.");
			}

			// 6. Handle the result
			if (errors.length > 0) {
				// Stop the process and alert the user
				console.error("Validation Failed:", errors);
				alert(errors.join("\n"));
			} else {
				// Data is clean and ready to process
				console.log("Validation Passed! Ready to ship.");
				console.log({
					shipment_info_first_name,
					shipment_info_second_name,
					shipment_info_telephone_number,
					shipment_info_email,
					shipment_info_address,
					shipment_info_state
				});
			}

			// collect selected payment option
			let googlepay = document.querySelector("#googlepay");
			let mastercard = document.querySelector("#mastercard");
			let visacard = document.querySelector("#visacard");
			let selected_card = "no card selected"
			if (googlepay.checked) {
				selected_card = googlepay.value
			  } else if (mastercard.checked) {
				selected_card = mastercard.value;
			  } else if(visacard.checked){
				selected_card = visacard.value;
			  }
			  else {
				console.log(selected_card);
			  }
			  	//alert(selected_card);


			// grab  grand total
			  
			let final_cost = document.querySelector("#final_cost").textContent;
			//alert(final_cost);

			// convert all varibles to  json object

			
			let params = {
				summary : order_summary, 
				shipment_first_name: shipment_info_first_name,
				shipment_second_name: shipment_info_second_name,
				shipment_telephone_number:shipment_info_telephone_number,
				shipment_email:shipment_info_email,
				shipment_address: shipment_info_address,
				shipment_state:shipment_info_state,
				card: selected_card,
				Total : final_cost
							}
			
			params = JSON.stringify(params);
			console.log(params);
			
		//fire ajax and send data to order_summary.php 
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			  if (xhttp.readyState == 4 && xhttp.status == 200) {
			 //alert(xhttp.responseText);
			 window.location.href ="payment_page.php";
			 
			  } 
			};
			
			xhttp.open("POST", "includes/payment_page_processor.php", true);
			xhttp.setRequestHeader("Content-Type", "application/json");
			// Send the raw string
			xhttp.send(params);

			
		
	}

/*payment success modal */


	


function openModal() {
	const modal = document.getElementById('paymentModal');
const loaderStatus = document.getElementById('loaderStatus');
const successStatus = document.getElementById('successStatus');
const successIcon = document.querySelector('.success-icon');
const closeModalBtn = document.getElementById('closeModalBtn');
	// Reset states just in case
	loaderStatus.style.display = 'block';
	successStatus.style.display = 'none';
	successIcon.style.display = 'none';
	closeModalBtn.style.display = 'none';
	
	// Show modal
	modal.classList.add('active');

	// Trigger the 3-second simulation
	setTimeout(() => {
		// Hide loader section
		loaderStatus.style.display = 'none';
		
		// Show success section elements
		successStatus.style.display = 'block';
		successIcon.style.display = 'block';
		closeModalBtn.style.display = 'block';
	}, 3000); // 3000 milliseconds = 3 seconds
}

function redirectToPayment() {
	window.location.href = 'includes/clear_payment.php';
}

/* payment seccess modal ends */

/*
// updating totals in order summary

		// 1. Grab the initial base total price once when the page loads
		
		//alert(ini_total_price);
		let total_price_div = document.querySelectorAll(".checkout_total");
		//let ini_total_price = document.querySelectorAll(".initial_total_price");
		
		let shoping_cost = 0;
		let tracker = 0;
			function update_price(id) {
				// 2. Select the elements
				let selectedElement = document.querySelector(id);
				let ini_total_price = document.querySelectorAll(".initial_total_price");
				let amountOfCartITems = document.querySelector('.amountOfCartITems').textContent;
			
			
				//alert(amountOfCartITems);
				//alert(ini_total_price);
				// 3. Extract index number from the ID string (e.g., "#qty-2" becomes 2)
				let place_holder = Number(id.replace(/[^0-9.]/g, ""));
				
				
				ini_total_price = Number(ini_total_price[place_holder].textContent.replace(/[^0-9.]/g, ""));
				
				//alert(ini_total_price);
				// 4. Get the selected quantity number safely
				let selectedOption = Number(selectedElement.options[selectedElement.selectedIndex].text);

				// 5. Calculate new total
				let total_price = ini_total_price * selectedOption;

				// 6. Update the correct DOM element immediately
				total_price_div[place_holder].textContent = "Total N " + total_price;

				for(tracker; tracker < amountOfCartITems; tracker++){

					shoping_cost += Number(total_price_div[tracker].textContent.replace(/[^0-9.]/g, ""));
					console.log(shoping_cost);
				}
			}

			// 7. How to call it correctly on page event:
			// Example: If you have a dropdown with id "#qty-0", listen to it directly:
			//document.querySelector("#qty-0").addEventListener('change', () => {
			//	update_price(id); 
		//}); */
		
	

		/* const ini_total_price = document.querySelector(".checkout_total").textContent;
				// alert(ini_total_price);
function update_price(id){
	//let i=3;
	
			 let selectedElement = document.querySelector(id);
			let amountOfCartITems = document.querySelector('.amountOfCartITems').textContent;
			
			
				//alert(amountOfCartITems);
					//alert(amount_of_orders);
		
             selectedElement.addEventListener('change',(event)=>{
				selectedText = selectedElement.options[selectedElement.selectedIndex].text;
              //  alert(selectedText);
                selectedText = Number(selectedText);
                total_price = ini_total_price.replace(/[^0-9.]/g, "");
                total_price = Number(total_price);
                total_price = total_price * selectedText;
				let place_holder = id.replace(/[^0-9.]/g, "");
				place_holder= Number(place_holder);
				//alert(typeof(place_holder));
               // alert(total_price);
               // alert(selectedText);
                total_price_div = document.querySelectorAll(".checkout_total");
                total_price_div[place_holder].textContent = "Total N " + total_price;
                
               
			});	

  }; */		

/*
    
    
    let item_price = document.getElementById('item_price').value;
    let ITEM_NO = document.getElementById('ITEM_NO').value;

    // 2. Create the connection
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/cart_processor.php", true);

    // 3. IMPORTANT: You must manually set this header when not using FormData
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let reply = xhr.responseText;
			alert(reply)
        }
    };

    // 4. Send as a URL-encoded string
    // use encodeURIComponent to handle special characters like & or +
    let data = "item_image=" + encodeURIComponent(item_image) + "&item_price=" + encodeURIComponent(item_price) + "&ITEM_NO=" + encodeURIComponent(ITEM_NO);
    xhr.send(data);*/



						// backup code
/*
	document.getElementById('cart_form').onsubmit = function(e) {
    e.preventDefault();

    // 1. Manually get values using .value
    let item_image  = document.getElementById('item_image').value;
    let item_price = document.getElementById('item_price').value;
    let ITEM_NO = document.getElementById('ITEM_NO').value;

    // 2. Create the connection
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "includes/cart_processor.php", true);

    // 3. IMPORTANT: You must manually set this header when not using FormData
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let reply = xhr.responseText;
			alert(reply)
        }
    };

    // 4. Send as a URL-encoded string
    // use encodeURIComponent to handle special characters like & or +
    let data = "item_image=" + encodeURIComponent(item_image) + "&item_price=" + encodeURIComponent(item_price) + "&ITEM_NO=" + encodeURIComponent(ITEM_NO);
    xhr.send(data);
};
*/
