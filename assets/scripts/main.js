/* Programmers: Ben Matson, Patrick, Daniel
 * Date Created: November 1, 2015
 * Purpose: This will contain the User interaction functions for the eggzlist site such as
 *			Button clicks, AJAX calls, etc
*/

// This is the domain of the website passed by CodeIgniter
var cities = {
  "colorado springs": [ -104.820851, 38.833358],
  "denver": [-104.989284, 39.744228],
  "westminster": [-105.036921, 39.836424]
};

$(document).ready(function(){
  var BASE_DOMAIN = $('#base_url').val();
  var SITE_DOMAIN = $('#site_url').val();

	$("#map_search_btn").on("click", function(){
		// Extract the user input
		var location = $("#map_search").val().toLowerCase();

    // update the map's location
    if(cities[location] != null){
      newMap(cities[location]);
    }

		// Do some validation as well as search type: City only, Address search

		// Send an AJAX request to get Listings according to the search
		$.ajax({
			type: "post",
			url: "index.php/listings/search",
			dataType: "json",
			data: {area: location}
		})
		.done(function(msg){
			// The call was successful and has the data we need
			// check to make sure there isn't an empty array and display
			var htmlOut = "";
			if(msg.listings.length === 0){
				$("#item_container").html("<div class='item'>There are no Listings for this area</div>");
			}else{
				$.each(msg.listings, function(value){
						var item = msg.listings[value];
            var inventoryCnt = "";    // this var will help display current inventory images
            // Determine the amount of inventory and display number of pics
            // Note: Based on 12 eggs per carton
            for(var i=0; i < item['inventory']; i+=12){
              inventoryCnt = inventoryCnt+"<img src='"+BASE_DOMAIN+"assets/pics/chick_pic.png' class='inventory'>";
            }
					htmlOut = htmlOut+"<div class='item'> "+inventoryCnt+
						"Seller: "+item['fname']+" "+item['lname']+
						" | Inventory: "+item['inventory']+
						" | Price/Carton: "+item['price']+
            "<button class='seller_btn'> Contact Seller </button>"+
						"</div>";
				});
				$("#item_container").html(htmlOut);
			}
		})
		.fail(function(){
			// The server returned an error message and couldn't get the data
			alert("There was an error getting Listing Data");
		});
	});
});

function newMap(loc){
  var map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(loc[1],loc[0]),
    zoom: 13,
    mayTypeId: 'roadmap'
  });
}

function gotoURL(loc){
	location.href=loc;
}

function load() {
	// Create a new google map to display on the main page
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(38.8922, -104.801246),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      /*
      downloadUrl("phpsqlajax_genxml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
*/
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
