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

    <title>addToCustoms Page</title>
  </head>
<body>
    
<h1> This is the addToCustoms page. </h1> 
	
    <?php 
		$chocID = 0;
		$itemName = $_POST["name"]; 
		$base = $_POST["base"]; 
		$chocType = $_POST["chocType"]; 
		$bagSize = $_POST["bagSize"]; 
		$price = $_POST["price"];
		//**pull values from post method, then connect to database.
		$host = "localhost"; 		
		$user = "kgc7";
		$password = "3873115";
		$dbname = "kgc7";
		$userID = null;
		$userID = $_SESSION["currentUserID"];
		echo '<br> current userID =';
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
		$countQueryActualQuery = "SELECT COUNT(*) AS NumberofColums FROM customChocolate"; 
		$countQuery = mysqli_query($connect, $countQueryActualQuery);
		$numCollumsArray = mysqli_fetch_array($countQuery);
		$chocID = $numCollumsArray[0]+1;
		
		//**Query to put in the new item. 
		// `chocID` INT NOT NULL,
		  // `name` VARCHAR(45) NULL,
		  // `chocType` VARCHAR(45) NULL,
		  // `filling` VARCHAR(45) NULL,
		  // `sizeOfBag` INT NULL,
		  // `price` INT NULL,
			// `users_userID` INT NOT NULL,
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
		 echo $puttingAllValuezIn;
		 $result = mysqli_query($connect, $puttingAllValuezIn);
		 if($result){
			 echo '<br> puttinitall IN successful databse query <br>';
		 }else{
			 echo ("<br> database query failed get out. <br>");
		 }
		
		//**return to previous pages buttons.
		echo '<a href="cartPage.php" class="btn btn-default">Click here to go to your cart</a>';
		echo '<a href="finalProjectProductPage.php" class="btn btn-default">Click here to go back to product selection</a>';

	?>
	
   
    
 
</body>   
</html>
