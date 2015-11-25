<?php
/*
 * Programmer: Daniel Taylor
 * Date Created: November 20, 2015
 * Purpose: Lets the designated seller edit their post to update their inventory, price, etc.
*/
?>

<center>
<div id='message_container' style='background-color: green'>
	<?php
		if(isset($flash)){
			echo $flash;
		}
	?>
</div>
<div id='listing_info_container'>
	<h2><?php echo $listing['title']?> - <?php echo '$'.$listing['price'] ?> (crossroad goes here)</h2>
	<br>

	<div id = 'seller_info'>
		Egg Inventory: <?php echo $listing['inventory'].' eggs'; ?>
			<br>
			Delivery Type: 
			<?php 
				if($listing['pickup'] == 0){
					echo 'Drop off';
				}else{
					echo 'Pick up';
				}
			?>
		<div id='seller_description'>
			<?php echo $listing['description']; ?><br>
			<button>Edit Listing</button> <button>Delete Listing</button>
		</div>
	</div>

	<div id = 'seller_map'>
		<script type='text/javascript'>
			var map = new google.maps.Map(document.getElementById('seller_map'), {
		    	center: new google.maps.LatLng(<?php echo $location['lat'].','.$location['lng'] ?>),
		    	zoom: 15,
		    	mayTypeId: 'roadmap'
		  	});
		  	 var marker = new google.maps.Marker({
    			position: new google.maps.LatLng(<?php echo $location['lat'].','.$location['lng'] ?>),
			    map: map
			  });
		</script>

	</div>
	<div style='clear:both'></div> <!-- Used to help position the map -->
</div>
</center>