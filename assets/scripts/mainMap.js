$(document).ready(function(){

var cities = {
	"colorado springs": [ -104.820851, 38.833358],
	"denver": [-104.989284, 39.744228],
	"westminster": [-105.036921, 39.836424]
};

// creates the map that the users will interact with
var primaryMap = createMap(cities["colorado springs"]);

// ===========================================================================================
// The below is a useful example for when you want to search a street address and do not know
// the lat and long of the location - Note: this will count as a transaction with the
// geocoding service you are using - MapQuest in this case
/* $(".clickable").on("click", function(){
	var address = $("#addrIn").val();
	address = address.split(",");
	var location = "street="+address[0]+
					"&city="+address[1].replace(/ /g, '')+
					"&state="+address[2].replace(/ /g, '')+
					"&postalCode="+address[3].replace(/ /g, '');
	var url = "http://www.mapquestapi.com/geocoding/v1/address?key=KEYHERE&"+location+"&callback=renderMaps";
	url = url.replace("KEYHERE","gAnSurqCKZtLhRwKg3qR1tOO0gZc4QtP");
	//alert(url);
		var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = url;
	document.body.appendChild(script);

});


function renderMaps(response){
	var loc = response.results[0].locations[0];
	primaryMap.setView(new ol.View({
		center: ol.proj.fromLonLat([loc.latLng.lng, loc.latLng.lat]),
		zoom: 16
	}));
}
*/
// ============================================================================================

$("#searchLocButton").on("click", function(){
	var location = $("#addrIn").val();

	// should check to make sure the address is in the correct format
	// ie: is it just the city? is there a street, city, state, post code
	location = location.toLowerCase();

	// update the map's view
	mapChangeView(location);
	

	// send an ajax request to retrieve the proper listings information from the server
	$.ajax({
		type: "post",
		url: "http://localhost/index.php/listings",
		dataType: "json",
		data: {area: location}
	})
		.done(function(msg){
			// The call was successfull, now extract the information and display it
			// Reminder: remember to check for an empty array and display error message if so
			var htmlOut = "";

			// this alert is for debugging purposes
//			alert("The Message\n"+msg.listings[0]['fname']);

			$.each(msg.listings, function(value){
				var item = msg.listings[value];
				htmlOut = htmlOut+"<div class='item'> "+
					"Seller: "+item['fname']+" "+item['lname']+
					" | Inventory: "+item['inventory']+
					" | Price per carton: "+item['price']+
					"</div><br>";
			});

			$("#listings").html(htmlOut);
		})
		.fail(function(){
			alert("Error: Request for listings failed");
		});
});

function createMap(loc){

	// creates a new map based off a location by setting up with the basics
	//		needs a layer(to display)  and a view (location)
	var map = new ol.Map({
		target: 'map',
		layers: [
			new ol.layer.Tile({
				source: new ol.source.OSM()
			})
		],
		view: new ol.View({
			center: ol.proj.fromLonLat(loc),
			zoom: 13
		})
	});
	return map;
}

function mapChangeView(loc){
	primaryMap.setView(new ol.View({
		center: ol.proj.fromLonLat(cities[loc]),
		zoom: 13
	}));
}


// End of JQuery document
});