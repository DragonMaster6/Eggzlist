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
					"Number of Chickens: ".$profile['numChick']."<br>
					 Feed type: ".$profile['feed']."<br>
					 Average Eggrate: ".$profile['eggrate']."<br>
					 Chicken breeds: ".$profile['breeds']."<br>
					 Street: ".$profile['street']."<br>
					 City: ".$profile['city']."<br>
					 State: ".$profile['state']."<br>
					 Postal Code: ".$profile['pcode']."<br>
					 Cross road: ".$profile['xroad']."<br>";

				echo "<div id='profile_listings'>
						<h4 style='text-align:center'>Current Listings</h4><hr>";
						if(!empty($listing)){
							echo "List ID: ".$listing['listID']." | inventory: ".$listing['inventory'];
						}else{
							echo "You don't have any open listings";
						}
					  "</div>";
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
						Requested Eggs: ".$note['eggs']."
						<br> Posted: ".$note['posted']."<br><hr>
						<b>Message: </b><br>".$note['message']."<br>
						<button id='note_reply_btn'>Reply</button><button id='note_delete_btn'>Delete</button>
					</div>";
			}
		}else{
			echo "<h4 style='text-align: center'>You have no notifications at this time :) </h4>";
		}
	?>
</div>