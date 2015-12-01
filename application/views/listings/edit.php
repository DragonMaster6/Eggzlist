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
	<h2><?php echo $listing['title']?> - <?php echo '$'.$listing['price'] ?> (<?php echo $listing['xroad'] ?>)</h2>
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
			<br>
			<br>




		</div>
		<br>
		
		Edit Listing:
		<br>
		<br>
		<form action="<?php echo site_url('listings/update') ?>" method="post">
			Listing Title: <input type="text" name="title" value="<?php echo $listing['title'] ?>">
			<input type="hidden" name="listID" value="<?php echo $listing['listID'] ?>">
			<br>
			Number of Eggs: <input type="text" size="3" name="inventory" value=<?php echo $listing['inventory'] ?>>
			<br>
			Price: <input type="text" name="price" size="4" value=<?php echo $listing['price'] ?>>
			<br>
			Pickup: <input type="radio" name="pickup" value="1" <?php if($listing['pickup'] == 1) echo "checked"; ?>>
			Delivery: <input type="radio" name="pickup" value="0" <?php if(!$listing['pickup']) echo "checked"; ?>><br>
			Description: <br>
			 <textarea type="text" name="descript" cols = '60' rows = '15'><?php echo $listing['description'] ?></textarea>
			<br>
			<br>
			<button>Save Changes</button> <button type="button" onclick="gotoURL('<?php echo site_url('listings/show')?>')">Cancel Changes</button> 
		</form>
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


<?php
/*
*basic entry fields, ben change these please
* from dan
*/
?>



<br>

<?php
/*
* note for ben, these buttons need to have the proper data fields changed.  Right now it contains the basic code
* for a button that I'm using from an online tutorial.
*/
?>
<!--
Breed:
<input type="radio" name="gender"
<?php if (in_array('leghorn', $listing['breed'])) echo "checked";?>
value="female">Leghorn

<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Maran

<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Silkie

<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Other

<br>

Feed:


<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Organic

<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Corn Feed

<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="female") echo "checked";?>
value="female">Pikes Beak

<br>
-->


</center>