<?php
    include "includes/header.php";
    include "includes/dbcon.php";
    
?>



<h1> Welcome Back</h1>
<h3> Please Login</h3>

<div class="form_container">

<form action= "includes/login_processor.php" method="post" >

Store_Name or Email or phone Number
<br><input type ="text" placeholder= "Enter your first uique identity" name="userid" required minlength="8" >

Password <br><input type ="password" placeholder= "Enter a password" name="password" required minlength="8"  >


<input type="submit" name ="action_source" value="Login">

</form>

</div>
























<?php
    include "includes/footer.php";
?>