<?php
	//Create the connection
	//Use the Pitt server or for your local stack use "localhost"
	echo 'hello world  <br>';
	$host = "localhost"; 
	//Your Pitt username for the Pitt server and "root" for localhost
	$user = "kgc7";
	//Your PeopleSoft ID for the Pitt server and your password, if any, for localhost
	$password = "3873115";
	//Name of your db - Pitt username for Pitt, and whatever you named it for local
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
		echo 'connecgtion successful! <br>';
	}

$createCartTable= "CREATE TABLE IF NOT EXISTS `cart` (
  `itemID` INT NOT NULL,
  `itemName` VARCHAR(45) NOT NULL,
  `price` INT NOT NULL,
  PRIMARY KEY (`itemID`))";
  
 $createCartTable2 = "CREATE TABLE IF NOT EXISTS `cart` (
  `itemID` INT NOT NULL,
  `itemName` VARCHAR(45) NULL,
  `chocType` VARCHAR(45) NULL,
  `base` VARCHAR(45) NULL,
  `sizeOfBag` VARCHAR(45) NULL,
  `price` VARCHAR(45) NULL,
  `numOrder` INT NULL,
  `users_userID` INT NOT NULL,
  PRIMARY KEY (`itemID`),
  INDEX `fk_cart_users_idx` (`users_userID` ASC),
  CONSTRAINT `fk_cart_users`
    FOREIGN KEY (`users_userID`)
    REFERENCES `mydb`.`users` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)";
$createUsersTable= "CREATE TABLE `users` (
  `userID` INT NOT NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`userID`))";
$createCustomChocTable = "CREATE TABLE `customChocolate` (
  `chocID` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `chocType` VARCHAR(45) NULL,
  `base` VARCHAR(45) NULL,
  `sizeOfBag` INT NULL,
  `price` INT NULL,
  `numOrder` INT NULL,  
  `users_userID` INT NOT NULL,
  PRIMARY KEY (`chocID`, `users_userID`),
  INDEX `fk_customChocolate_users1_idx` (`users_userID` ASC),
  CONSTRAINT `fk_customChocolate_users1`
    FOREIGN KEY (`users_userID`)
    REFERENCES `mydb`.`users` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)";
  $addbaseuser = "INSERT INTO users (userID, username, password)
VALUES ('1', 'user', 'password')";
 $dropCartTable= "DROP TABLE `cart`";
 $dropUsersTable= "DROP TABLE `users`";
  $dropCustomChocTable= "DROP TABLE `customChocolate`";



 $result1 = mysqli_query($connect, $dropCartTable );
if($result1){
	echo 'drop table cart was a successful databse query <br>';
}else{
	echo ("drop table database query categories FAILED get out.");
}
echo '<br>';

 $result2 = mysqli_query($connect, $dropCustomChocTable );
if($result2){
	echo 'drop table was a successful databse query <br>';
}else{
	echo ("drop table custom  database query categories FAILED get out.");
}
echo '<br>';

$result3 = mysqli_query($connect, $dropUsersTable );
if($result3){
	echo 'drop table users was a successful databse query <br>';
}else{
	echo ("drop table database query categories FAILED get out.");
}


echo '<br>';

   $result1 = mysqli_query($connect, $createCartTable2 );
if($result1){
	echo 'cart vers 2 was a successful databse query <br>';
}else{
	echo ("cart vers 2 database query categories FAILED get out.");
}
echo '<br>';
  $result2 = mysqli_query($connect, $createUsersTable );
if($result2){
	echo 'users create was a successful databse query <br>';
}else{
	echo ("users create database query categories FAILED get out.");
}
echo '<br>';

 $result3 = mysqli_query($connect, $createCustomChocTable );
if($result3){
	echo 'custom choc was a successful databse query <br>';
}else{
	echo ("custom choc database query categories FAILED get out.");
}
echo '<br>';
$result1 = mysqli_query($connect, $addbaseuser );
if($result1){
	echo 'add a user was success <br>';
}else{
	echo ("add a user failed");
}
echo '<br>';

// $result = mysqli_query($connect, $createCartTable );
	// if($result){
		// echo 'createCartTable was a successful databse query <br>';
	// }else{
		// echo ("CreateCartTable database query categories FAILED get out.");
	// }


?>
