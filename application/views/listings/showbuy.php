
<center>


<div id = "seller_map">

</div>


<table>
<tr>
	<th colspan = "3">

		<?php echo $listing['title']?> - <?php echo "$".$listing['price'] ?> (crossroad goes here)
<br>
<br>


<button id = "contact_btn">Contact Seller </button>
<br>
<br>


			Egg Inventory:
		<?php echo $listing['inventory']." eggs"; ?>
		<br>
				Delivery Type: 
		<?php 
			if($listing['pickup'] == 0){
				echo "Drop off";
			}else{
				echo "Pick up";
			}
			?>

			


	</th>
</tr>





<tr>
	<td colspan = 3>
		<br>
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
