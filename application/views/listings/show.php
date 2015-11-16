<center>

<button type="button">Edit Listing</button> <button type="button">Delete Listing</button> 

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
		Pickup:
		<?php echo $listing['pickup'] ?>
	</td>

	<td>
		Price:
		<?php echo $listing['price'] ?>
	</td>

	<td>
		Egg Inventory:
		<?php echo $listing['inventory'] ?>
	</td>

</tr>
<tr>
	<td colspan="3">
	Description: 
	<?php echo $listing['description']; ?>
	</td>
</tr>


</table>
</center>