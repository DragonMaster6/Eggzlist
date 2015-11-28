<?php
/*
 * Programmer: Patrick Anderson
 * Date created: November 23, 2015
 * Purpose: This allows the user to become a buyer or a seller
*/
?>

<form action="users/create" method="post">
	<div id="signup_container">
		
		<!-- Greeting and user choice -->
		<div id="seller_content">
			<b>Create new Eggzlist.com account</b><br><br>
			
			<!-- Ask the user if s/he is a buyer or seller -->
			<b>Are you a...</b><br>
			<input type="radio" name="user_type" checked>Buyer of eggs<br>
			<input type="radio" name="user_type">Seller of eggs<br>
		</div>
		
		<!-- Buyer signup -->
		<div id="seller_content">
			
			<!-- Ask for the user's first name -->
			<hr>
			<b>First Name*</b><br>
			<input type="text" name="fname"></input><br>
			
			<!-- Ask for the user's last name -->
			<hr>
			<b>Last Name*</b><br>
			<input type="text" name="lname"></input><br>
			
			<!-- Ask for the user's user/display name -->
			<hr>
			<b>User/Display name*</b><br>
			<input type="text" name="dname"></input><br>
			
			<!-- Ask for the user's Email -->
			<hr>
			<b>Email*</b><br>
			<input type="text" name="email"></input><br>
			
			<!-- Ask for the user's phone number -->
			<hr>
			<b>Phone Number*</b><br>
			<input type="text" name="phone"></input><br>
			
			<!-- Ask for the user's password -->
			<hr>
			<b>Password*</b><br>
			<input type="text" name="pass"></input><br>
			
			<!-- Required fields text-->
			<hr>
			<b>*required field</b><br><br>
			
			<!-- Sign up button -->
			<input type="submit" value="Sign up!"></input>
		</div>
		
		<!-- Seller signup -->
		<div id="seller_content">
		
			<!-- Ask for the user's first name -->
			<!--
			<hr>
			<b>First Name*</b><br>
			<input type="text" name="fname"></input><br>
			-->
			
			<!-- Ask for the user's last name -->
			<!--
			<hr>
			<b>Last Name*</b><br>
			<input type="text" name="lname"></input><br>
			-->
			
			<!-- Ask for the user's user/display name -->
			<!--
			<hr>
			<b>User/Display name*</b><br>
			<input type="text" name="dname"></input><br>
			-->
			
			<!-- Ask for the user's Email -->
			<!--
			<hr>
			<b>Email*</b><br>
			<input type="text" name="email"></input><br>
			-->
			
			<!-- Ask for the user's phone number -->
			<!--
			<hr>
			<b>Phone Number*</b><br>
			<input type="text" name="phone"></input><br>
			-->
			
			<!-- Ask for the user's password -->
			<!--
			<hr>
			<b>Password*</b><br>
			<input type="text" name="pass"></input><br>
			-->
			
			<!-- Ask for number of chickens -->
			<hr>
			<b>Number of chickens*</b><br>
			<input type="text" name="numChick"></input><br>
			
			<!-- Ask for what feed the seller is using -->
			<hr>
			<b>Name of feed*</b><br>
			<input type="text" name="feed"></input><br>
			
			<!-- Ask for the eggrate -->
			<hr>
			<b>Estimated egg rate per week*</b><br>
			<input type="text" name="eggrate"></input><br>
			
			<!-- Ask for what breeds the seller has -->
			<hr>
			<b>Name of chicken breeds*</b><br>
			<input type="text" name="breeds"></input><br>
			
			<!-- Ask for the seller's street -->
			<hr>
			<b>Enter street name of residence*</b><br>
			<input type="text" name="street"></input><br>
			
			<!-- Ask for seller's city -->
			<hr>
			<b>Enter city name of residence*</b><br>
			<input type="text" name="city"></input><br>
			
			<!-- Ask for seller's state -->
			<hr>
			<b>Enter state name of residence*</b><br>
			<input type="text" name="state"></input><br>
			
			<!-- Ask for seller's postal code -->
			<hr>
			<b>Enter postal code*</b><br>
			<input type="text" name="pcode"></input><br>
			
			<!-- Ask for seller's perfered cross roads location -->
			<hr>
			<b>Enter perfered cross roads location*</b><br>
			<input type="text" name="xroad"></input><br>
			
			<!-- Required fields text -->
			<hr>
			<b>*required field</b><br><br>
			
			<!-- Sign up button -->
			<input type="submit" value="Sign up!"></input>
		</div>
	</div>
</form>