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