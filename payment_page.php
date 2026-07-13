<?php include "includes/header.php";?>




<?php
// Pickup session variables
$items_purchased = $_SESSION['Summary'];

$items_purchased;
$shipment_first_name = $_SESSION["FirstName"];
$shipment_second_name =  $_SESSION["SecondName"];
$shipment_telephone_number = $_SESSION["PhoneNumber"];
$shipment_email =  $_SESSION["Email"];
$shipment_address = $_SESSION["Address"];
$shipment_state = $_SESSION["State"];
$card = $_SESSION["Card"];
$Total = $_SESSION["Total"]; 


?>

    <style>
        .wrapper{ font-family: helvetica, sans-serif; line-height: 1.6; margin: 20px; color: #333; }
        h3 { border-bottom: 2px solid #333; padding-bottom: 5px; margin-top: 30px; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .bold { font-weight: bold; }
        
        /* Pay Now Button Styling */
        .btn-paynow {
            background-color:#FBC02D;
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            padding: 12px 35px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            margin-top: 15px;
            display: inline-block;
        }
        .btn-paynow:hover {
            background-color:#2C3E50;
        }
        .btn-paynow:active {
            transform: scale(0.98);
        }
    </style>
<div class ="wrapper">
    <h3>Customer & Shipping Information</h3>
    <ul>
        <li><span class="bold">Name:</span> <?php echo "$shipment_first_name $shipment_second_name"; ?></li>
        <li><span class="bold">Phone Number:</span> +<?php echo $shipment_telephone_number; ?></li>
        <li><span class="bold">Email:</span> <?php echo $shipment_email; ?></li>
        <li><span class="bold">Shipping Address:</span> <?php echo "$shipment_address, $shipment_state State."; ?></li>
    </ul>

    <h3>Order Items</h3>
    <table>
        <thead>
            <tr>
                <th>Item Description</th>
                <th>Size</th>
                <th>Material</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Chunk through the array in groups of 4 elements (Item, Size, Material, Price)
            for ($i = 0; $i < count($items_purchased); $i += 4) {
                // Check to prevent errors if the JSON array structure is cut short
                if (isset($items_purchased[$i+3])) {
                    $itemDescription = htmlspecialchars(trim($items_purchased[$i]));
                    $quantitySize    = htmlspecialchars(trim($items_purchased[$i+1]));
                    $material        = htmlspecialchars(trim($items_purchased[$i+2]));
                    $price           = htmlspecialchars(trim($items_purchased[$i+3]));
                    
                    // Format Naira symbol nicely if it starts with 'N'
                    $priceFormatted = str_replace('N', '₦ ', $price);

                    echo "<tr>
                            <td class='bold'>$itemDescription</td>
                            <td>$quantitySize</td>
                            <td>$material</td>
                            <td>$priceFormatted</td>
                          </tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <h3>Payment Details</h3>
    <ul>
        <li><span class="bold">Payment Method:</span> <?php echo str_replace('_', ' ', $card); ?></li>
        <li><span class="bold">Total Amount:</span> <?php echo str_replace('N', '₦ ', $Total); ?></li>
    </ul>

    <form action="process_payment.php" method="POST">
        <input type="hidden" name="email" value="<?php echo $shipment_email; ?>">
        <input type="hidden" name="total_amount" value="<?php echo $Total; ?>">
    </form>

            

            <div class="modal-overlay" id="paymentModal">
                <div class="modal-box">
                    <div id="loaderStatus">
                        <div class="loader"></div>
                        <p class="modal-text">Processing Payment...</p>
                    </div>

                    <div id="successStatus">
                        <div class="success-icon">✓</div>
                        <p class="modal-text">Payment Successful!</p>
                        <button class="close-btn" id="closeModalBtn" onclick="redirectToPayment()">Close</button>
                    </div>
                </div>
            </div>

            <button class="trigger-btn" onclick="openModal()">Pay Now</button>
</div>




<?php
/*
// 2. Check if the payment data actually exists in the session
if (isset($_SESSION['Summary'])) {
    
    // 3. Extract the data into a local variable
    $items_purchased = $_SESSION['Summary'];

       print_r($items_purchased);
        echo"<br>";
        echo $shipment_first_name = $_SESSION["FirstName"];
        echo"<br>";
        echo $shipment_second_name =  $_SESSION["SecondName"];
        echo"<br>";
        echo $shipment_telephone_number = $_SESSION["PhoneNumber"];
        echo"<br>";
        echo $shipment_email =  $_SESSION["Email"];
        echo"<br>";
        echo $shipment_address = $_SESSION["Address"];
        echo"<br>";
        echo $shipment_state = $_SESSION["State"];
        echo"<br>";
        echo $card = $_SESSION["Card"];
        echo"<br>";
        echo $Total = $_SESSION["Total"]; 
    // Example: Accessing specific fields inside your JSON/Array
    // $amount = $payment_data['amount'];
    // $currency = $payment_data['currency'];

    // put items_purchased inside a table well formated
    echo"
              <h3>Order Items</h3>
    <table>
        <thead>
            <tr>
                <th>Item Description</th>
                <th>Quantity / Size</th>
                <th>Material</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        ";


    for ($i = 0; $i < count($items_purchased); $i += 4) {
        // Check to prevent errors if the JSON array structure is cut short
        if (isset($items_purchased[$i+3])) {
            $itemDescription = htmlspecialchars(trim($items_purchased[$i]));
            $quantitySize    = htmlspecialchars(trim($items_purchased[$i+1]));
            $material        = htmlspecialchars(trim($items_purchased[$i+2]));
            $price           = htmlspecialchars(trim($items_purchased[$i+3]));
            
            // Format Naira symbol nicely if it starts with 'N'
            $priceFormatted = str_replace('N', '₦ ', $price);

            echo "<tr>
                    <td class='bold'>$itemDescription</td>
                    <td>$quantitySize</td>
                    <td>$material</td>
                    <td>$priceFormatted</td>
                  </tr>";
        }
    }
        echo"
            </tbody>
            </table>
        ";
} else {
    // Handle the error if someone accesses this page directly without sending data
    echo "Error: No payment data found. Please restart the checkout process.";
    exit();
}

*/?> 

<?php include "includes/footer.php" ?>