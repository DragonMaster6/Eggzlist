<div id="menu_container">
	<h4> This is the Menu </h4>
	<hr>
	Option 1 <br>
	Option 2 <br>
	Option 3 <br>
</div>
<div id="main_container">
	<div id="map" class="map"></div>

	<input type="text" id="addrIn">
	<input type="button" id="searchLocButton" value="Click me">

	<table>
		<tr>
			<th> Name </th>
			<th> Phone </th>
			<th> Email </th>
			<th> SellerID </th>
		</tr>
	<?php
		foreach($contacts as $person){
			$seller = "NA";
			if(!empty($this->Seller_model->getSellerInfo($person['sellerID']))){
				$sellerInfo = $this->Seller_model->getSellerInfo($person['sellerID']);
				$seller = "<a href=".site_url('seller/'.$sellerInfo['sellerID']).">Seller page </a>";
			}
			echo "<tr>";
			echo "<td>".$person['fname']." ".$person['lname']."</td>";
			echo "<td>".$person['phone']."</td>";
			echo "<td>".$person['email']."</td>";
			echo "<td>".$seller."</td>";
			echo "</tr>";
		}
	?>
	</table>

	<div id="listing_container">
		<center><h2> Listings </h2></center>
		<div id="listings">
		</div>
	</div>
</div>