<?php session_start();?>
<?php include "includes/dbcon.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odeh's Shrift Store</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="font/css/all.css">
</head>
<body>

<!--- header --->

 <div class="topnav" >
  <a class="active" href="..\index.php"><img class="logo" src="../images/logo.jpg" ></a>
  <a href = "#" id="NewArrivals">New Arrivals </a>
  <a href = "#" id="trousers">Trousers</a>
  <a href = "#" id="Shirts">Shirts</a>
  <a href = "#" id="Shots">Shorts</a>
  <a href = "#" id="Jersy">jersy's</a>
  <a href = "#" id="Sweater">Sweater's</a>
  <a href = "#" id="Shoes">Shoes</a>
  <a href = "#" id="Perfumes">Perfumes</a>
  <?php if(isset($_SESSION["userid"])){
	  echo'<a href = "..\includes/logout.php" title = "LogOut" id="login_icon"><i class="fa fa-sign-out" aria-hidden="true"></i></a>'; } else{
	  echo '<a href = "..\includes/logout.php" title = "LogOut" id="login_icon"><i class="fa fa-sign-out" aria-hidden="true"></i></a>';
  }?>
  <?php
		// select total items in cart
	$stmt = $conn->query("SELECT COUNT(*) FROM cart");
	$totalItems = $stmt->fetchColumn();
  ?>
  <a href = "#" id = "cart" ><i class="fa fa-shopping-cart"><sup id="cart_count"><?php echo $totalItems ?></i></a>
<!--  <a href = "#" id="More" style="display:none;" onclick="more()">More <img id = "dropimg1" src="images/drop_1.jpg" style="display:inline"> <img id = "dropimg2" src="images/drop_2.jpg" style="display:none"></a>-->	
  
  <a class="searchbtn" ><i class="fas fa-search"></i></a>
 

 <!--<div class="scrollmenu">
  
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="#support">Support</a>
  <a href="#blog">Blog</a>
  <a href="#tools">Tools</a>  
  <a href="#base">Base</a>
  <a href="#custom">Custom</a>
  <a href="#more">More</a>
  <a href="#logo">Logo</a>
  <a href="#friends">Friends</a>
  <a href="#partners">Partners</a>
  <a href="#people">People</a>
  <a href="#work">Work</a>
</div> --> 
  
</div> 

<div id="more_Container">
			<a class="items" href="perfumes.php">Perfume's</a> <!--in the main project make this display none and use js to display it-->
			<a href="Shoes.php" id="Shoes" class="items">Shoes</a>
			<a href="Sweater.php" id="Sweater" class="items">Sweater's</a>
			<a href="Jersy.php" id="Jersy" class="items">jersy's</a>
			<a href="Shots.php" id="Shots" class="items">Short's</a>
			<a href ="trousers.php" id="trousers" class="items">Trousers</a>
			<a href ="Shirts.php" id="Shirts" class="items">Shirts</a>
			<a href ="#latest" id="NewArrivals" class="items">New Arrivals </a>
</div>
<!--<nav class="navbar navbar-dark ">
  <div class="container-fluid">
	<div class="row ">
    <div class="col-2 bg-primary"><a class="navbar-brand " href="index.php" style="text-align:center"><img src="images/logo.jpg" class="mw-100  mh-50"></a> </div>
	<div class="col-2 bg-primary"><a class="navbar-brand nav" href="index.php" style="text-align:center !important">New Arrivals</a></div>
	<div class="col-2 bg-primary"><a class="navbar-brand nav" href="index.php" style="text-align:center">Shirts</a></div>
	<div class="col-2 bg-primary"><a class="navbar-brand nav" href="index.php" style="text-align:center">Shots</a></div>
	<div class="col-2 bg-primary"><a class="navbar-brand nav" href="index.php" style="text-align:center">Jeasy's</a></div>
	<div class="col-2 bg-primary"><a class="navbar-brand nav" href="index.php" style="text-align:center">jeans</a></div>
	
   </div>	
    
	
  </div>
   demo navebar
  
  <div class="navcont">
		<a class="nav_items"> shoes</a>
		<a class="nav_items"> shoes</a>
		<a class="nav_items"> shoes</a>
		<a class="nav_items"> shoes</a>
		<a class="nav_items"> shoes</a>
		<a class="nav_items"> shoes</a>
		<a class="nav_items"> shoes</a>
		<a class="nav_items"> shoes</a>
		<a class="nav_items"> shoes</a>
		<a class="nav_items"> shoes</a>
		
  
  </div>
 
</nav>-->


<br><br><br>
<!--- header ends    ----->

<!--- Advert div-->
<div id="advertisement">
	<div class="advert1"><a href="admin/admin_home.php"></a></div>
	<div class="advert2">place adverts here</div>
	<div class="login_info">
		<?php if(isset($_SESSION["userid"])){echo "you are welcome: logged in as : ".$_SESSION["userid"]; }?>
	</div>
</div>
<!---  Advert div ends here-->
