<center>
<div id='message_container' style='background-color: green'>
	<?php
		if(isset($flash)){
			echo $flash;
		}
	?>
</div>

<div id="listing_info_container">
<?php
	// Need to check to see if a seller even has an open listing
	if(!empty($listing)){
		echo "<h2>".$listing['title']." - $".$listing['price']." (".$listing['xroad'].") </h2>
		<br>

		<div id='seller_info'>
			Egg Inventory: ".$listing['inventory']." eggs
			<br>

			Delivery Type: ";
			$type = ($listing['pickup'] == 0 ) ? "Drop Off" : "Pick up";
			echo $type;
		echo "<div id='seller_description'>
				".$listing['description']."<br>
				<button onclick='gotoURL(\"".site_url("listings/edit")."\")'>Edit Listing</button>
				<button onclick='gotoURL(\"".site_url("listings/delete/".$listing['listID'])."\")'>Delete Listing</button>
			</div>
		</div>
		<div id='seller_map'>
			<script type='text/javascript'>
				var map = new google.maps.Map(document.getElementById('seller_map'),{
					center: new google.maps.LatLng(".$location['lat'].",".$location['lng']."),
					zoom: 15,
					mapTypeId: 'roadmap'
				});
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(".$location['lat'].",".$location['lng']."),
					map: map
				});
			</script>
		</div>
		<div style='clear:both'></div>";
	}else{
		// Since the seller doesn't have a listing posted, give them the option to create one
		echo "Looks like you don't have any eggs listed.<br>
			Create a new listings?";

		echo "<div id='create_listing'>
				<form action='".site_url('listings/create')."' method='post'>
					Title: <input type='text' name='title'><br>
					Pickup: <input type='radio' name='pickup_type' value='1' checked> Delivery: <input type='radio' name='pickup_type' value='0'><br>
					Price: $<input type='text' name='price' size='4'><br>
					Inventory: <input type='text' name='inventory' size='3'><br>
					Description: <br>
					<textarea name='description' cols='60' rows='20'></textarea><br>
					<input type='submit' value='Create'>
				</form>
			</div>";
	}
?>
</div>
</center>
