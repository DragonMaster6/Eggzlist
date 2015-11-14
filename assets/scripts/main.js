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
    var map;    // variable to hold the up to date map

    // update the map's location
    if(cities[location] != null){
      map = newMap(cities[location]);
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
        // the following variable is for temporary purposes. Each user may have only one listing active?
        var placedMarkers = [];

        $.each(msg.listings, function(value){
            var item = msg.listings[value];
            var inventoryCnt = "";    // this var will help display current inventory images
            // Determine the amount of inventory and display number of pics
            // Note: Based on 12 eggs per carton
            for(var i=0; i <= item['inventory']; i+=12){
              inventoryCnt = inventoryCnt+"<img src='"+BASE_DOMAIN+"assets/pics/chick_pic.png' class='inventory'>";
            }
          htmlOut = htmlOut+"<div class='item' id='item_"+item['listID']+"> "+inventoryCnt+
            "Seller: "+item['fname']+" "+item['lname']+
            " | Inventory: "+item['inventory']+
            " | Price/Carton: $"+item['price']+
            "<button class='seller_btn'> Contact Seller </button>"+
            "</div>";

          // Place markers upon the map now
          if($.inArray(item['userID'],placedMarkers) == -1){
            // The marker doesn't exist so place one and add to the counter
            placedMarkers.push(item['userID']);
            placeMapMarker([item['lng'], item['lat']], map, item['dname']);
          }
        });
        $("#item_container").html(htmlOut);
      }
    })
    .fail(function(){
      // The server returned an error message and couldn't get the data
      alert("There was an error getting Listing Data");
    });
	});
// When the user clicks the login button, send the request to the server and determine from there
  $("#login_btn").on("click", function(){
    var uname = $("#username").val();
    var upass = $("#password").val();      // Note this will be in plain text now

    // Do validation here: be sure to encrypt here and then decrypt in the model file

    // Send the information to the server
    $.ajax({
      type: "post",
      url: SITE_DOMAIN+"/users/login",
      dataType: "json",
      data: {user: uname, pass: upass}
    })
    .done(function(msg){
      if(msg['access'] != -1){
        gotoURL(SITE_DOMAIN);
      }else{
        // authentication failure
        $("#error_container").html("Username or Password is incorrect");
      }
    })
    .fail(function(msg){
      alert("Server Error: Authentication Process failed");
    });
  });

// When the user is ready to logout, they click this button
  $("#logout_btn").on("click", function(){
    $.ajax({
      type: "post",
      url: SITE_DOMAIN+"/users/logout",
      dataType: "json",
    })
    .done(function(msg){
      gotoURL(SITE_DOMAIN);
    })
    .fail(function(msg){
      alert("Server Error: De-Authentication Process failed");
    });
  });



// When the user changes a filter option
  $(":checkbox, :radio").on("change",function(){
    var filterSel = [];   // contains the values of checked checkboxs and radio buttons
    $(":checkbox, :radio").each(function(){
      if($(this).prop("checked")){
        // this box has been checked. Push to the variable list
        filterSel.push($(this).val());
      }
    });

    // With everything selected, make an ajax call
    // Note to Ben: Make a Listings function to keep code DRY

    alert(filterSel);
  });
// End of the Document ready function
});

function newMap(loc){
  var map = new google.maps.Map(document.getElementById("map"), {
    center: new google.maps.LatLng(loc[1],loc[0]),
    zoom: 11,
    mayTypeId: 'roadmap'
  });

  return map;
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


    // This automatically loads the default location listings: Colorado Springs
    $.ajax({
      type: "post",
      url: "index.php/listings/search",
      dataType: "json",
      data: {area: "colorado springs"}
    })
    .done(function(msg){
      // The call was successful and has the data we need
      // check to make sure there isn't an empty array and display
      var htmlOut = "";
      if(msg.listings.length === 0){
        $("#item_container").html("<div class='item'>There are no Listings for this area</div>");
      }else{
        // the following variable is for temporary purposes. Each user may have only one listing active?
        var placedMarkers = [];

        $.each(msg.listings, function(value){
            var item = msg.listings[value];
            var inventoryCnt = "";    // this var will help display current inventory images
            // Determine the amount of inventory and display number of pics
            // Note: Based on 12 eggs per carton
            for(var i=0; i <= item['inventory']; i+=12){
              inventoryCnt = inventoryCnt+"<img src='assets/pics/chick_pic.png' class='inventory'>";
            }
          htmlOut = htmlOut+"<div class='item' id='item_"+item['listID']+"> "+inventoryCnt+
            "Seller: "+item['fname']+" "+item['lname']+
            " | Inventory: "+item['inventory']+
            " | Price/Carton: $"+item['price']+
            "<button class='seller_btn'> Contact Seller </button>"+
            "</div>";

          // Place markers upon the map now
          if($.inArray(item['userID'],placedMarkers) == -1){
            // The marker doesn't exist so place one and add to the counter
            placedMarkers.push(item['userID']);
            placeMapMarker([item['lng'], item['lat']], map, item['dname']);
          }
        });
        $("#item_container").html(htmlOut);
      }
    })
    .fail(function(){
      // The server returned an error message and couldn't get the data
      alert("There was an error getting Listing Data");
    });
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

function placeMapMarker(loc, map, title){
  //var image = BASE_DOMAIN+"/assets/pics/chick_pic.png";
  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(loc[1], loc[0]),
    map: map,
    title: title
   // icon: image
  });
}
