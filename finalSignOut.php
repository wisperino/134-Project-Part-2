<?php 
session_start();
//I decided to have an actuall signed out page as a confirnmation to the user that they infact did sign out.  All this does is set the session username to guest and ID to 1. 
	$_SESSION["currentUsername"] = "guest";
	$_SESSION["currentUserID"] = 1;
	
//echo "current username = " , $_SESSION["currentUsername"];
echo "
<nav class='navbar navbar-default'>
  <div class='container-fluid'>
    <!-- Brandmane for Chocolate Covered Goodness -->
    <div class='navbar-header'>
      <a class='navbar-brand' href='#'>Chocolate Covered Goodness!</a>
    </div>

    <!-- Navbar came from https://getbootstrap.com/components/#navbar -->
    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
      <ul class='nav navbar-nav'>
        <li id = 'hoveree'><a href='finalProjectMainPage.html'>Main page </a></li>
        <li id = 'hoveree'><a href='finalProjectProductPage.html'>Premade Products</a></li>
		<li id = 'hoveree'><a href='customCreation.html'>Custom Creation</a></li>
		<li id = 'hoveree'><a href='eventCreation.html'>Event Recomendations</a></li>
      </ul>
	
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


You're signed out, click here to go to the main page: 
<a href='finalProjectMainPage.html' class='btn btn-default'>Click here to go back to the main page.</a>";


?>