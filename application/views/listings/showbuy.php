

<center>
<div id="listing_info_container">
	<h2><?php echo $listing['title']?> - <?php echo "$".$listing['price'] ?> (<?php echo $sellerInfo['xroad']; ?>)</h2>
	<br>

	<div id = "seller_info">
		<h4> Seller Info </h4>
		Egg Inventory: <?php echo $listing['inventory']." eggs"; ?>
			<br>
			Delivery Type: 
			<?php 
				if($listing['pickup'] == 0){
					echo "Drop off";
				}else{
					echo "Pick up";
				}
			?>
		<br>
		Number of Chickens: <?php echo $sellerInfo['numChick']; ?> <br>
		Feed type: <?php echo $sellerInfo['feed']; ?> <br>
		Eggrate: <?php echo $sellerInfo['eggrate']; ?> <br>
		Breeds: <?php echo $sellerInfo['breeds']; ?> <br>
		<div id="seller_description">
			<?php echo $listing['description']; ?>
			<br>
			<button id = "contact_btn">Contact Seller </button>
		</div>
	</div>

	<div id = "seller_map">
		<script type="text/javascript">
			var map = new google.maps.Map(document.getElementById("seller_map"), {
		    	center: new google.maps.LatLng(<?php echo $location['lat'].",".$location['lng'] ?>),
		    	zoom: 15,
		    	mayTypeId: 'roadmap'
		  	});
		  	 var marker = new google.maps.Marker({
    			position: new google.maps.LatLng(<?php echo $location['lat'].",".$location['lng'] ?>),
			    map: map
			  });
		</script>

	</div>
	<div style="clear:both"></div> <!-- Used to help position the map -->
</div>
</center>
