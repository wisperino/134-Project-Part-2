<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- For this Assignemnt I decided to use bootstrap for my CSS because it's easy and looks neat-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style>
		body{
		background-color:#7FDBFF;
		}
		.hoveree:hover {
			background: #D050D0;
		}	
	</style>
    <title>finalSignIn</title>
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
        <li class = "hoveree"><a href="finalProjectMainPage.html">Main page </a></li>
        <li class = "hoveree"><a href="finalProjectProductPage.html">Premade Products</a></li>
		<li class = "hoveree"><a href="customCreation.html">Custom Creation</a></li>
		<li class = "hoveree"><a href="eventCreation.html">Event Recomendations</a></li>
      </ul>
	
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<h1> Sign in here:  </h1>
	<!-- This checks to see if the form has been submitted, if it hasnt later on it prints the form out -->
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
	
    <?php 
		//assuming it has been submitted:  
		$userName1 = $_POST["user"]; 
		$userPass1 = $_POST["pass"]; 
		//echo $userName1;
		//echo '<br>';
		//echo $userPass1;
		
		
		//**connect to the databse
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
			//echo 'connecgtion successful! <br>';
		}		
		//echo '<br>';

		// $query1 = "SELECT * FROM users";
		// $result1 = mysqli_query($connect, $query1);
		// if(!$result1)
		// {
			// echo 'fuck me sideways';

		// while($row = mysqli_fetch_row($result1))
		// {
			// var_dump($row);
			// echo '<br>';
		// }
		
		//**
		//**This is the query to check the user and pass vs the registered database.
		$query = "SELECT * FROM users WHERE username = '" . $userName1 ."' AND password = '" . $userPass1 . "'  ";
		$result = mysqli_query($connect, $query);
		$row = mysqli_fetch_array($result);
		
		//echo 'result = ' , $row['userID'], $row['username'];
		if(empty($row['userID']) || empty($row['username']) )
		{
			echo 'failed query, user or pass are incorect';
		}
		else {
			echo ' <br> welcome back ', $userName1, '<br>';
			$_SESSION["currentUsername"] = $userName1;
			$_SESSION["currentUserID"] = $row['userID'];
			echo '<a href="finalProjectMainPage.html" class="btn btn-default">Click here to go back to the main page.</a>';
		}
		
	?>
	<?php else: ?>
	<!--** Here i have a form thats displayed if you didnt log in.-->
	<div class="container">
		<form method = "POST" >
			<div class="form-group row">
			  <label for="user">Username:</label>
			  <input name="user" class="form-control" id="name" placeholder="Enter ur name">
			 </div>
			<div class = "form-group row">
			  <label for="pass">Password:</label>
			  <input name="pass" class="form-control" id="pass" placeholder="Enter ur password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	
	<a href="finalProjectMainPage.html" class="btn btn-default">Click here to go back to the main page.</a>

	<a href="createAccountPage.php" class="btn btn-default">Click here to create an account</a>
	</div>	
	<?php endif; ?>
	
   
    
 
</body>   
</html>
