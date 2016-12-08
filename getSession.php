<?php 
session_start();
//This is where I grab the session info to determine if they're logged in.  If the username is not set it's put up as guest. 
 if(!isset($_SESSION["currentUsername"]) || ($_SESSION["currentUsername"] == "guest"))
	{
		//echo "USER IS NULL CHANGING IT TO A VALUE";
		$_SESSION["currentUsername"] = "guest";
		echo "Welcome " , $_SESSION["currentUsername"] , "!</br> ", "<a href='finalSignIn.php'>Sign in  </a> <a href='cartPageFinal.php'>View Cart</a>";
		//echo "<li><a href='finalSignIn.php'>Sign in</a></li> <li><a href='cartPageFinal.php'>View Cart</a></li>";   
		
	} 
	else
	{
		//echo "NOT NULL" ;
		
		echo "Hello " , $_SESSION["currentUsername"] , "</br><a href='cartPageFinal.php'>View Cart  </a><a href='finalSignOut.php'>Sign Out</a>";
		//echo "<li><a href='cartPageFinal.php'>View Cart</a></li><li><a href='finalSignOut.php'>Sign Out</a></li>";   
	}
//echo "current username = " , $_SESSION["currentUsername"];
//echo "this is my login " + 

?>