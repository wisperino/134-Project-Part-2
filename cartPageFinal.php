<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
	@keyframes carMove {
	/*0%: height:100px;
	50%: height: 200px;   #810043
	100% height:400px;*/
	from{
		margin-left:0px;
		width:100px;
	}
	to {
		margin-left: 500px;
		width: 100px; 
	}
	}
	img.cart{
		width:  100px;
		height: 100px;
		animation-name: carMove;
		animation-duration: 2s;
		animation-delay: 1s;
		animation-direction: alternate;
		animation-iteration-count: infinite;
	}
  </style>
  <!-- Here I'm using bootstrap for basic css to look nice -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>cartPage.php</title>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brandmane for Chocolate Covered Goodness -->
		<div class="navbar-header">
		  <a class="navbar-brand" href="#">Chocolate Covered Goodness!</a>
		</div>

		<!-- Navbar came from https://getbootstrap.com/components/#navbar -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="finalProjectMainPage.html">Main page <span class="sr-only">(current)</span></a></li>
			<li><a href="finalProjectProductPage.php">Premade Products</a></li>
			<li><a href="customCreation.html">Custom Creation</a></li>
			<li><a href="eventCreation.html">Event Recomendations</a></li>
		  </ul>
		  <form class="navbar-form navbar-left">
			
		  </form>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="finalProjectCreateAccount.php">Create account</a></li>
			<li><a href="finalSignIn.php">Sign in</a></li>
			<li><a href="cartPageFinal.php">View Cart</a></li>		
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	
	
  </head>
<body>
    
<h1> This is the FINAL Cart page </h1> 
	<img class = "cart" src="pics\cart icon.png" alt="Cool moving icon">
    <?php 
		//**here I pull the data from the post method. 
		echo "
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
            <script>
			$(document).ready(function(){
				$('#clearCart').on('click', function(){
					$.ajax(
					{	
						type: 'POST',
						url: 'http://studentprojects.sis.pitt.edu/fall2016/kgc7/cartClear.php',   
						success: function (result) 
						{
							alert('cleared cart!');
							//http://stackoverflow.com/questions/18490026/refresh-reload-the-content-in-div-using-jquery-ajax
							//TY to this stackoverflow thread for the next line.
							$('#mydiv').load(location.href + ' #mydiv');
							}
					});
				});
			});
			</script>
        ";
		// echo 'price = ',  $price;
		// echo '<br>';
		// echo 'ID = ',  $itemID;
		// echo '<br>';
		//**connect to the database
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
		
		//**query and find all the vlaues in the cart.
		$query = "SELECT * FROM cart";
		$result1 = mysqli_query($connect, $query);
		if(!$result1)
		{
			echo 'There is nothing in your cart';
		}
		// `itemID` INT NOT NULL,
		  // `itemName` VARCHAR(45) NULL,
		  // `chocType` VARCHAR(45) NULL,
		  // `base` VARCHAR(45) NULL,
		  // `sizeOfBag` VARCHAR NULL,
		  // `price` VARCHAR(45) NULL,
		  // `numOrder` INT NULL,
		  // `users_userID` INT NOT NULL,
		//**print out a table with the values.
		echo '<br>
			
			<div class="container" id="mydiv">			   
			  <table class="table table-hover">
				<thead>
				  <tr>
					<th>item number</th>
					<th>Product Name</th>
					<th>Chocolate Type</th>
					<th>Base filling</th>
					<th>Size of the Bag</th>
					<th>Number of Orders (how many bags you order)</th>
					<th>Price</th>
				  </tr>
				</thead>
				<tbody>'; 
				while($row = mysqli_fetch_assoc($result1))
				{
					echo '<tr>
						<td>',$row["itemID"],'</td>				
						<td>',$row["itemName"],'</td>
						<td>',$row["chocType"],'</td>				
						<td>',$row["base"],'</td>
						<td>',$row["sizeOfBag"],'</td>
						<td>',$row["numOrder"],'</td>
						<td>$',$row["price"],'</td>
						</tr>';
				}

				echo '</tbody>
					</table>
					</div>';
		
		
		//**go back to previous pages
		
	?>
	<button name="clearcartbutton" class="btn btn-primary" id = "clearCart"> Clear cart button </button>
   
    
 
</body>   
</html>
