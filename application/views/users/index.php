<?php
/*
 * Programmers: Ben Matson, Daniel Taylor, Patrick Anderson
 * Date Created: September, 2015
 * Purpose: This is the main page all users will see. Here they can browse eggs
 *			view listings, and contact the seller to purchase eggs
*/

?>
<?php
	// If the seller logged in, retrieve the lat and lng for their location
	if(isset($sell_lat) and isset($sell_lng)){
		echo "<input type='hidden' id='sell_lat' value='".$sell_lat."'>";
		echo "<input type='hidden' id='sell_lng' value='".$sell_lng."'>";
	}
	// Use a hidden tag to get the current user's ID
	if(isset($user)){
		echo "<input type='hidden' id='user_ID' value='".$user."'>";
	}
?>
<center>
  	<div id="message_container">
  		<?php
  			echo $flash;
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
  				echo "<button id='about_btn' onClick=\"gotoURL('".site_url('users/about')."')\"> About us </button>
				<button onClick=\"gotoURL('".site_url('users/signup')."')\">Sign Up</button></div>";
  			}else{
  				// the guest has logged in. Now show the proper tools
  				if(!empty($user_seller)){
  					echo "<button id='create_list_btn' onClick='gotoURL(\"".site_url("listings/show")."\")'> Your Listings </button>
  							<button id='profile_btn' onclick=\"gotoURL('".site_url("users/show")."')\"> Profile (".$notifications.")</button>
  							<button id='about_btn' onClick=\"gotoURL('".site_url('users/about')."')\"> About us </button>
  							<button id='logout_btn'> Logout </button>
  							<div id = 'welcome'> Welcome Back, ".$user_name."</div>";
  				}else{
  					// user is a normal buyer
  					echo "<button id='profile_btn' onclick=\"gotoURL('".site_url("users/show")."')\"> Profile (".$notifications.")</button>
  							<button id='about_btn' onClick=\"gotoURL('".site_url('users/about')."')\"> About us </button>
  							<button id='logout_btn'> Logout </button>
  							<div id = 'welcome'> Welcome Back, ".$user_name."</div>";
  				}
  			}
  		?>
  	</div>

	<!-- Filter Container -->
	<div id="filter_container">
		<b>Breeds</b><br>
		<input type="checkbox" name="breed_filter" class="breed_filter" value="leghorn">Leg horn</input>
		<input type="checkbox" name="breed_filter" class="breed_filter" value="marans">Marans</input>
		<input type="checkbox" name="breed_filter" class="breed_filter" value="silkie">Silkie</input>
		<input type="checkbox" name="breed_filter" class="breed_filter" value="other">Other</input><br>
		
		<hr>
		<b>Feed</b><br>
		<input type="checkbox" name="feed_filter" class="feed_filter" value="organic">Organic</input>
		<input type="checkbox" name="feed_filter" class="feed_filter" value="cornfeed">Corn Feed</input><br>
		<input type="checkbox" name="feed_filter" class="feed_filter" value="pikes beak">Pikes Beak</input><br>
		
		<hr>
		<b>Egg Rate(Per Week)</b><br>
		<input type="radio" name="eggrate_filter" class="eggrate_filter" value="all" checked>All</input><br>
		<input type="radio" name="eggrate_filter" class="eggrate_filter" value="1,10">1 to 10 Eggs</input><br>
		<input type="radio" name="eggrate_filter" class="eggrate_filter" value="11,20">11 to 20 Eggs</input><br>
		<input type="radio" name="eggrate_filter" class="eggrate_filter" value="21,30">21 to 30 Eggs</input><br>
		<input type="radio" name="eggrate_filter" class="eggrate_filter" value="31,999">31 and more Eggs</input><br>
		
		<hr>
		<b>Price Range</b><br>
		$<input type="text" id="price_start" class="pRange" value="1" size="3">To $<input type="text" id="price_fin" class="pRange" value="10" size="3">
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