<?php
/*
 * Programmer: Patrick Anderson
 * Date created: November 23, 2015
 * Purpose: This allows the user to become a buyer or a seller
*/
?>

<form action="users/create" method="post">
	<div id="signup_container">
		<div id="seller_content">
			<b>Create new Eggzlist.com account</b><br><br>
			
			<!-- Ask the user if s/he is a buyer or seller -->
			<b>Are you a...</b><br>
			<input type="radio" name="user_type" checked>Buyer of eggs<br>
			<input type="radio" name="user_type">Seller of eggs<br>
			
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
			
			<!-- required fields -->
			<hr>
			<b>*required field</b><br><br>
			
			<!-- Signup button -->
			<input type="submit" value="Signup!"></input>
		</div>
	</div>
</form>