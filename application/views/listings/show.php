<center>

<div id="error_container">
</div>

<div id = "seller_map">
</div>


<table>

<tr>
	<th colspan="3">
		<?php echo $listing['title'] ?>
	</th>
</tr>

<tr>
	<td>
		Delivery Type: 
		<?php 
			if($listing['pickup'] == 0){
				echo "Drop off";
			}else{
				echo "Pick up";
			}
		?>
	</td>

	<td>
		Price:
		<?php echo "$".$listing['price'] ?>
	</td>

	<td>
		Egg Inventory:
		<?php echo $listing['inventory']." eggs"; ?>
	</td>

</tr>
<tr>
	<td colspan="3">
	Description: 
	<?php echo $listing['description']; ?>
	</td>
</tr>
<tr>
	<td colspan="3">
		<button style="float:right" type="button">Delete Listing</button> <button style="float:right" type="button">Edit Listing</button>
	</td>
</tr>


</table>
</center>