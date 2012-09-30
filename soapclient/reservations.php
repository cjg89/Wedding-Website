<?php

//Include the database connection and new libraries
include("Lib/Database.php");
include("Lib/menuItems.php"); //needs to be changed


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reservations</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="content">
    <div id="brent">
      <div id="header">
          <div id="logo"><img src="images/logo.png" width="269" height="65" alt="Logo"/></div>
          <div id="linkbar"> 
            <ul class="tabs">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="./menu.php">Menu</a></li>
                <li><a href="./reservations.php">Reservations</a></li>
                <li><a href="./orders.php">Order Online</a></li>
                <li><a href="./newsandevents.php">Events &amp; News</a></li>
                <li><a href="./locations.php">Locations</a></li>
            </ul>
          </div>
         
      </div>
      <div id="reservations">
	      <?php
		      try {
		      	//Open a database connection
		      	$mySforceconnection = Database::login();
		      	
		      	//Create a menuItems instance
		     	//$menu = new MenuItems();
		      	
		      	//Pull the menu items
		      	//$menuItems = $menu->getMenuItems($mySforceconnection);
		      	
		      	//Print the menu to the page
		      	//$menu->printMenuItems($menuItems);
		      	
		      	//Logout of the database
		      	Database::logout($mySforceconnection);
		      	
		      } catch (Exception $e) {
		      	Database::logout($mySforceconnection);
		      	echo $e->faultstring;
		      	
		      }

	   	  ?>
      
      	
      </div> 
      
</div>


  <div id="footer">Copyright 2012: THIS SITE FOR IS A SCHOOL PROJECT, IT IS NOT A REAL WEBSITE</div>

	</div>
</div>
</body>
</html>
