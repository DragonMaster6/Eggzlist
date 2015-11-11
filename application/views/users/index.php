<?php
/*
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
*/
?>


<center>
  	<div id="error_container"></div>
  	<div id="menu_container">
  		<?php
  			// dont forget that the JS script has a gotoURL method
  			// determine the buttons that need to be shown based on authentication
  			if(empty($user)){
  				echo "Username: <input type='text' id='username'>
  						Password: <input type='password' id='password'>
  						<button id='login_btn'>Login</button>";
  				echo "<button id='about_btn'> About us </button>";
  			}else{
  				// the guest has logged in. Now show the proper tools
  				if($user_seller != null){
  					echo "<button id='create_list_btn'> Your Listings </button>
  							<button id='profile_btn'> Profile (Notification Count)</button>
  							<button id='about_btn'> About us </button>
  							<button id='logout_btn'> Logout </button>
  							Welcome Back ".$user_name;
  				}else{
  					// user is a normal buyer
  					echo "<button id='profile_btn'> Profile (Notification Count)</button>
  							<button id='about_btn'> About us </button>
  							<button id='logout_btn'> Logout </button>
  							Welcome Back ".$user_name."!";
  				}
  			}
  		?>
  	</div>

	<div id="filter_container">
		<!-- Patrick, this is where you will be putting your code for the filters -->
		The filter box goes here
	</div>

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