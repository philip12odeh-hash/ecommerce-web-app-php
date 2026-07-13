<?php
// 1. The raw JSON input string
$json_data = '{
    "summary":["Short Jeans ","30 Large ","Pure Cotton ","N 3000 ","Jean Short ","25 Medium ","Polyester ","N 5000 ","Jean Short ","40 Medium ","Polyester ","N 3500 ","Jean Short ","40 Medium ","Polyester ","N 4000 ","Jean Short ","40 Medium ","Polyester ","N 4000 ","Short Jeans ","20 Medium ","Rubber Polyesterine ","N 2000 "],
    "shipment_first_name":"Philip",
    "shipment_second_name":"Odeh",
    "shipment_telephone_number":"23424332423",
    "shipment_email":"philip12odeh@googlemail.com",
    "shipment_address":"No 22 Wanbai street unguwan Romi Kaduna south",
    "shipment_state":"Kaduna",
    "card":"Visa_Card",
    "Total":"N21300"
}';

// 2. Decode JSON into an associative array
$data = json_decode($json_data, true);

// 3. Extract and sanitize top-level variables
$firstName = htmlspecialchars(trim($data['shipment_first_name']));
$lastName  = htmlspecialchars(trim($data['shipment_second_name']));
$phone     = htmlspecialchars(trim($data['shipment_telephone_number']));
$email     = htmlspecialchars(trim($data['shipment_email']));
$address   = htmlspecialchars(trim($data['shipment_address']));
$state     = htmlspecialchars(trim($data['shipment_state']));
$card      = htmlspecialchars(trim($data['card']));
$total     = htmlspecialchars(trim($data['Total']));

// 4. Extract the flat summary array
$summary = $data['summary'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 20px; color: #333; }
        h3 { border-bottom: 2px solid #333; padding-bottom: 5px; margin-top: 30px; }
        ul { list-style-type: none; padding: 0; }
        li { margin-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .bold { font-weight: bold; }
        
        /* Pay Now Button Styling */
        .btn-paynow {
            background-color: #1e7e34;
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
            background-color: #155d27;
        }
        .btn-paynow:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

    <h3>Customer & Shipping Information</h3>
    <ul>
        <li><span class="bold">Name:</span> <?php echo "$firstName $lastName"; ?></li>
        <li><span class="bold">Phone Number:</span> +<?php echo $phone; ?></li>
        <li><span class="bold">Email:</span> <?php echo $email; ?></li>
        <li><span class="bold">Shipping Address:</span> <?php echo "$address, $state State."; ?></li>
    </ul>

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
            <?php 
            // Chunk through the array in groups of 4 elements (Item, Size, Material, Price)
            for ($i = 0; $i < count($summary); $i += 4) {
                // Check to prevent errors if the JSON array structure is cut short
                if (isset($summary[$i+3])) {
                    $itemDescription = htmlspecialchars(trim($summary[$i]));
                    $quantitySize    = htmlspecialchars(trim($summary[$i+1]));
                    $material        = htmlspecialchars(trim($summary[$i+2]));
                    $price           = htmlspecialchars(trim($summary[$i+3]));
                    
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
        <li><span class="bold">Total Amount:</span> <?php echo str_replace('N', '₦ ', $total); ?></li>
    </ul>

    <form action="process_payment.php" method="POST">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="total_amount" value="<?php echo $total; ?>">
        
        <button type="submit" class="btn-paynow">Pay Now</button>
    </form>

</body>
</html>