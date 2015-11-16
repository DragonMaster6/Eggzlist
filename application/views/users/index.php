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
  	<div id="error_container">
  		<?php
  			
  		?>
  	</div>
  	<div id="menu_container">
  		<?php
  			// dont forget that the JS script has a gotoURL method
  			// determine the buttons that need to be shown based on authentication
  			if(empty($user)){
  				echo "<div id = 'welcome'> Username: <input type='text' id='username'>
  						Password: <input type='password' id='password'>
  						<button id='login_btn'>Login</button> ";
  				echo "<button id='about_btn' onClick=\"gotoURL('".site_url('users/about')."')\"> About us </button></div>";
  			}else{
  				// the guest has logged in. Now show the proper tools
  				if($user_seller != null){
  					echo "<button id='create_list_btn' onClick='gotoURL(\"".site_url("listings/show")."\")'> Your Listings </button>
  							<button id='profile_btn'> Profile (Notification Count)</button>
  							<button id='about_btn' onClick=\"gotoURL('".site_url('users/about')."')\"> About us </button>
  							<button id='logout_btn'> Logout </button>
  							<div id = 'welcome'> Welcome Back, ".$user_name."</div>";
  				}else{
  					// user is a normal buyer
  					echo "<button id='profile_btn'> Profile (Notification Count)</button>
  							<button id='about_btn' onClick=\"gotoURL('".site_url('users/about')."')\"> About us </button>
  							<button id='logout_btn'> Logout </button>
  							<div id = 'welcome'> Welcome Back, ".$user_name."</div>";
  				}
  			}
  		?>
  	</div>

	<!-- Filter Container -->
	<div id="filter_container">
		<h2>Filters</h2>
		<hr>
		Breeds<br>
		<input type="checkbox" name="breed_filter" class="breed_filter" value="leghorn">Leg horn</input>
		<input type="checkbox" name="breed_filter" class="breed_filter" value="marans">Marans</input>
		<input type="checkbox" name="breed_filter" class="breed_filter" value="silkie">Silkie</input>
		<input type="checkbox" name="breed_filter" class="breed_filter" value="other">Other</input><br>
		
		<hr>
		Feed<br>
		<input type="checkbox" name="feed_filter" id="feed_filter" value="organic">Organic</input>
		<input type="checkbox" name="feed_filter" id="feed_filter" value="cornfeed">Corn Feed</input><br>
		
		<hr>
		Egg Rate(Per Week)<br>
		<input type="radio" name="eggrate_filter" id="eggrate_filter" value="all" checked>All</input><br>
		<input type="radio" name="eggrate_filter" id="eggrate_filter" value="1-10">1 to 10 Eggs</input><br>
		<input type="radio" name="eggrate_filter" id="eggrate_filter" value="11-20">11 to 20 Eggs</input><br>
		<input type="radio" name="eggrate_filter" id="eggrate_filter" value="21-30">21 to 30 Eggs</input><br>
		<input type="radio" name="eggrate_filter" id="eggrate_filter" value="31-all">31 and more Eggs</input><br>
		
		<hr>
		Price Range<br>
		$<input type="text" id="price_start" class="pRange" value="1" size="3">To $<input type="text" id="price_fin" class="pRange" value="10" size="3"><button id="price_btn">Apply</button>
	</div>

	<div id="map">This is where the map will go as soon as a valid key is given</div>
	<div id="map_search_container">
		<input type="text" id="map_search" class="input"><button id="map_search_btn" class="button">Search Listings</button>
	</div>

	<div id="listings_container">
		<div id="listings_header">
			 Listings
			<select id="sort_filter" name="sort_filter" style="float:left">
				<option value="asc_price">Ascending Price</option>
				<option value="dsc_price">Descending Price</option>
				<option value="alpha"> Alphabetial </option>
				<option value="dist"> Distance </option>
			</select>
			
		</div>
		<div id="item_container">
		</div>
	</div>

</center>