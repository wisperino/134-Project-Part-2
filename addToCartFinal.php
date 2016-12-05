<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>addToCartFinal Page</title>
  </head>
<body>
    
<h1> This is the addToCartFinal page </h1> 
	
    <?php 
		$itemID = 0;
		$itemName = $_POST["name"];
		$chocType = $_POST["chocType"];
		$base = $_POST["base"];
		$sizeOfBag = $_POST["sizeOfBag"];
		$price = $_POST["price"]; 
		$numOrder = $_POST["numOrder"];
		
		
		$_SESSION["currentUsername"] = $userName1;
		
		
		//**pull values from post method, then connect to database.
		$host = "localhost"; 		
		$user = "kgc7";
		$password = "3873115";
		$dbname = "kgc7";
		
		$connect = mysqli_connect($host, $user, $password, $dbname);
		if(mysqli_connect_errno())
		{
			die("Database connection failed: ".
				mysqli_connect_error() . 
				" (" . mysqli_connect_errno(). ")"
				);
		}
		else{
			//echo ' connecgtion successful! <br>';
		}
		//**this is where I pull the COUNT from the cart page to see how many values are in, then set the ID to be 1 higher so its unique. 
		$countQueryActualQuery = "SELECT COUNT(*) AS NumberofColums FROM cart"; 
		$countQuery = mysqli_query($connect, $countQueryActualQuery);
		$numCollumsArray = mysqli_fetch_array($countQuery);
		$itemID = $numCollumsArray[0]+1;
		
		//**Query to put in the new item. 
		$puttingAllValuezIn = "INSERT INTO cart (itemID,itemName,chocType,base,sizeOfBag,price,numOrder) VALUES (" . $itemID . ",'" . $itemName . "','" . $chocType . "','" . $base . "','" . $sizeOfBag ."','" .$price. "','" .$numOrder. "'" .")";
		 
		 $result = mysqli_query($connect, $puttingAllValuezIn);
		 if($result){
			 //echo 'puttinitall IN successful databse query <br>';
		 }else{
			 echo ("database query failed get out.");
		 }
		
		//**return to previous pages buttons.
		echo '<a href="cartPage.php" class="btn btn-default">Click here to go to your cart</a>';
		echo '<a href="finalProjectProductPage.php" class="btn btn-default">Click here to go back to product selection</a>';

	?>
	
   
    
 
</body>   
</html>
