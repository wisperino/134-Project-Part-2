<?php
// Start the session
session_start();
?>

<!-- GENERATE CHOCOLATE IS UNUSED 
Rather it's effects aren't noticed.  I was planning on saving the custom creations to their own database and getting them to be able to quickly get your favorite creations
but I've run out of time and it woudlnt' be anything new that I havent done already. 
-->




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>addToCustoms Page</title>
  </head>
<body>
    
<h1> This is the addToCustoms page. </h1> 

    <?php 
		
		$itemID= 0;
		$itemName = $_POST["name"]; 
		$base = $_POST["base"]; 
		$chocType = $_POST["chocType"]; 
		$bagSize = $_POST["bagSize"]; 
		$price = $_POST["price"];
		$numOrder = $_POST["numOrder"];
		//**pull values from post method, then connect to database.
		$host = "localhost"; 		
		$user = "kgc7";
		$password = "3873115";
		$dbname = "kgc7";
		$userID = null;
		$userID = $_SESSION["currentUserID"];
		
		echo $userID;
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
		$puttingAllValuezIn = "INSERT INTO cart (itemID,itemName,price,numOrder) VALUES (" . $itemID . "," . "'" . $itemName . "'" . "," . "'" .$price. "'" .$numOrder. "'" .")";
		 
		 

		if ($userID = null)
		{
			echo '<br> userid null <br>';
			$puttingAllValuezIn = "INSERT INTO customChocolate (chocID,name,chocType,filling,sizeOfBag,price,users_userID) VALUES (" . $chocID . "," . "'" . $itemName . "','" .$chocType. 
		"','" .$base. "','" .$bagSize.	"','" .$price."','1'" .")";		
		}
		else
		{
			echo '<br> userid not null <br>';
			$puttingAllValuezIn = "INSERT INTO customChocolate (chocID,name,chocType,filling,sizeOfBag,price,users_userID) VALUES (" . $chocID . "," . "'" . $itemName . "','" .$chocType. 
		"','" .$base. "','" .$bagSize.	"','" .$price. "','" .$_SESSION["currentUserID"]. "'" .")";
		
		}
		
		$result = mysqli_query($connect, $puttingAllValuezIn);
		 if($result){
			 echo 'puttinitall IN CART  successful databse query <br>';
		 }else{
			 echo ("database CART query failed get out.");
		 }

	
		

	?>
	
   
    
 
</body>   
</html>
