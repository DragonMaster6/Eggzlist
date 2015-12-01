<?php
/*
 * Programmer: Ben Matson
 * Date Created: November 20, 2015
 * Purpose: Display a current user in the system their personal information whether
 * 			they are a buyer/seller, current transactions, any notifications they have
*/
?>


<div id="profile_container">
	<div id="user_data">
	<h3 style="text-align:center"> <?php echo $profile['fname']." ".$profile['lname']." Profile"; ?> </h3>
	<hr>
		<?php
			echo "Username: ".$profile['dname']."<br>
			Email: ".$profile['email']."<br>
			Phone: ".$profile['phone']."<br>";

			if(isset($profile['sellerID'])){
				echo "<br><b><h3> Seller info </h3></b>".
					"<table>".
					"<tr><td>Number of Chickens: </td><td>".$profile['numChick']."</td></tr>
					 <tr><td>Feed type: </td><td>".$profile['feed']."</td></tr>
					 <tr><td>Average Eggrate: </td><td>".$profile['eggrate']."</td></tr>
					 <tr><td>Chicken breeds: </td><td>".$profile['breeds']."</td></tr>
					 <tr><td>Street: </td><td>".$profile['street']."</td></tr>
					 <tr><td>City: </td><td>".$profile['city']."</td></tr>
					 <tr><td>State: </td><td>".$profile['state']."</td></tr>
					 <tr><td>Postal Code: </td><td>".$profile['pcode']."</td></tr>
					 <tr><td>Cross road: </td><td>".$profile['xroad']."</td></tr>
					 </table><br>

					 <button> Edit Profile </button>";

				echo "<div id='profile_listings'>
						<h4 style='text-align:center'>Current Listings</h4><hr>";
						if(!empty($listing)){
							echo "List ID: ".$listing['listID']." | inventory: ".$listing['inventory'];
						}else{
							echo "You don't have any open listings";
						}
					  echo "</div>";
			}
		?>
	</div>
</div>

<div id="note_container">
	<h3 style="text-align:center">Current Notifications</h3>
	<?php
		if(!empty($notes)){
			foreach($notes as $note){
				echo "<div class='note'>
						<h4 style='text-align:center'>".$note['subject']."</h4><hr>
						From: ".$this->User_model->getUserName($note['fromUserID'])."<br>
						Requested Eggs: ".$note['eggs']." from listing: ".$listing['listID']."
						<br> Posted: ".$note['posted']."<br><hr>
						<b>Message: </b><br>".$note['message']."<br>
						<button class='note_reply_btn'>Reply</button><button class='note_delete_btn' value='".$note['noteID']."''>Delete</button>
					</div>";
			}
		}else{
			echo "<h4 style='text-align: center'>You have no notifications at this time :) </h4>";
		}
	?>
</div>