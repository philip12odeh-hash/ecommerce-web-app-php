<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "The form was submitted via POST";
	if(isset($_POST['Cart']) && !empty($_POST['Cart'])){
    if ($_POST['Cart']=== 'Add to Cart') {
        echo "Add to Cart is clicked";
    }
	
	}else{
		echo "Buy Now is Clicked";
	}
	
	
	
}
