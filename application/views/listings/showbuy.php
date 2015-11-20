<center>

<div id = "seller_map">

</div>


<table>
<tr>
	<th colspan = "3">
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
	<td colspan = 3>
		<?php echo $listing['description']; ?>
My eggs are the best eggs in town!  Lorem Ipsum nonsense yada yada stuff here!  Come buy my stuff.
My eggs are the best eggs in town!  Lorem Ipsum nonsense yada yada stuff here!  Come buy my stuff.
My eggs are the best eggs in town!  Lorem Ipsum nonsense yada yada stuff here!  Come buy my stuff.
My eggs are the best eggs in town!  Lorem Ipsum nonsense yada yada stuff here!  Come buy my stuff.
My eggs are the best eggs in town!  Lorem Ipsum nonsense yada yada stuff here!  Come buy my stuff.
My eggs are the best eggs in town!  Lorem Ipsum nonsense yada yada stuff here!  Come buy my stuff.
My eggs are the best eggs in town!  Lorem Ipsum nonsense yada yada stuff here!  Come buy my stuff.


	</td>

</tr>



</table>


</center>