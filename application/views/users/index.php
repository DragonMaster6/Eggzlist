<?php
/*
=======
<div id="map" class="map"></div>
=======
<div id="menu_container">
	<h4> This is the Menu </h4>
	<hr>
	Option 1 <br>
	Option 2 <br>
	Option 3 <br>
</div>
<div id="main_container">
	<div id="map" class="map"></div>
>>>>>>> Modified DB and played with CSS

	<input type="text" id="addrIn">
	<input type="button" id="searchLocButton" value="Click me">

<<<<<<< HEAD
>>>>>>> Basic Storyboard template for Tuesday's meeting
<table>
	<tr>
		<th> Name </th>
		<th> Phone </th>
		<th> Email </th>
		<th> SellerID </th>
	</tr>
*/
?>
<?php
/* Daniel and Patrick:
 * Below is a template of how data from the database can be extracted and displayed
   Let me know when you are ready to extract data and I can provide you with the
   proper variables to get the data
   ==============================================================================
*/

/*
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
<<<<<<< HEAD
*/
?>


<center>
  <button onClick="gotoURL('<?php echo site_url('users/create');?>')"> Create New Listing (Working)</button>

  <button onclick="location.href = '/Applications/xampp/htdocs/application/views/create';" id="create" class="float-left submit-button" >Create New Listing</button>
  <button onclick="location.href = '/Applications/xampp/htdocs/application/views/create';" id="viewlistings" class="float-left submit-button" >View Listings</button>

  <button onclick="location.href = '/Applications/xampp/htdocs/application/views/create';" id="login" class="float-left submit-button" >About Eggzlist</button>

  <button onclick="location.href = '/Applications/xampp/htdocs/application/views/create';" id="login" class="float-right submit-button" >Login</button>
  <button onclick="location.href = '/Applications/xampp/htdocs/application/views/create';" id="user" class="float-right submit-button" >User Page</button>

	<div id="map">This is where the map will go as soon as a valid key is given</div>
	<div id="map_search_container">
		<input type="text" id="map_search" class="input"><button id="map_search_btn" class="button">Search Listings</button>
	</div>

	<div id="listings_container">
		<div id="listings_header"> <h2> Listings </h2></div>
		<div id="item_container">
		</div>
	</div>

</center>


