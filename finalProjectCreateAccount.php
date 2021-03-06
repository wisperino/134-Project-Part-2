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
	
    <title>Final project create account page</title>
  </head>
<body>
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
			<li><a href="finalSignIn.php">Sign in</a></li>
			<li><a href="cartPageFinal.php">View Cart</a></li>		
		  </ul>
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
<h1> Welcome to createAccountPage </h1>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
	<!--** Same thing,only do the actions that create the account if it's been POSTED, same as the mainpage.-->
    <?php echo 'hello world  <br>';
		$userName1 = $_POST["user"]; 
		$userPass1 = $_POST["pass"]; 
		echo 'Ty for signing up ',  $userName1;
		echo '<br>';
		//echo $userPass1;
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
		
		//**here is where I find the number of entries in the cats *categories* table
		$countQuery = mysqli_query($connect, "SELECT COUNT(*) AS NumberofColums FROM users");
		$numCollumsArray = mysqli_fetch_array($countQuery);
		//echo 'number of collums = ' . $numCollumsArray[0];
		$numCollumsArrayPlus = $numCollumsArray[0] +1;
		//echo ' <br> doing things <br> ' ;
		
		
		//**puttingAllValuezIn is a query that puts the values into the database!
		$puttingAllValuezIn = "INSERT INTO users (userID,username,password) VALUES (" . $numCollumsArrayPlus . " , '" . $userName1 . "'" . "," . "'" .$userPass1. "'" .")";
		 //$puttingAllValuezIn = "INSERT INTO users (userID,username,password) VALUES (13, 'way', 'ayy'	)";
		 //echo $puttingAllValuezIn, '<br>';
		 $result = mysqli_query($connect, $puttingAllValuezIn);
		 if($result){
			 //echo 'puttinitall IN successful databse query <br>';
		 }else{
			 echo ("database query failed get out.");
		 }
		 // $selectUsers = "SELECT * FROM users";
		
		
		
		$query = "SELECT * FROM users";
		$result1 = mysqli_query($connect, $query);
		if(!$result1)
		{
			echo 'there are no users in the database?  what?';
		}
	
		echo '<a href="finalSignIn.php" class="btn btn-success">Click here to go back and log in</a>';
	?>
	
	<!-- ** again the form for the user creatoin -->
	<?php else: ?>
	<div class="container">
		<form method = "POST" >
			<div class="form-group row">
			  <label for="user">Create Username:</label>
			  <input name="user" class="form-control" id="name" placeholder="Enter ur name">
			 </div>
			<div class = "form-group row">
			  <label for="pass">Create Password:</label>
			  <input name="pass" class="form-control" id="pass" placeholder="Enter ur password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
	
	<?php endif; ?>
	
   
    
 
</body>   
</html>
