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
				<button>Edit Listing</button><button>Delete Listing</button>
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
			Create a new listings? <button> Create </button>";
	}
?>
</div>
</center>
