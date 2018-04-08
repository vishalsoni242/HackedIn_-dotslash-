// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var map;
var infowindow;

function initMap() {
  var svnit = {
    lat: 21.1652,
    lng: 72.7826
  };

  map = new google.maps.Map(document.getElementById('map'), {
    center: svnit,
    zoom: 15
  });


  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: svnit,
    radius: 2000,
    type: ['pharmacy']
  }, callback);
}

function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    //position: place.geometry.location
  });

  infowindow = new google.maps.InfoWindow({maxWidth : 200});

  var service = new google.maps.places.PlacesService(map);

          service.getDetails({
            placeId: place.place_id
          }, function(place, status) {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
              var image = "https://www.google.co.in/maps/vt/icon/name=assets/icons/poi/tactile/pinlet_shadow-2-medium.png,assets/icons/poi/tactile/pinlet_outline_v2-2-medium.png,assets/icons/poi/tactile/pinlet-2-medium.png,assets/icons/poi/quantum/pinlet/pharmacy_pinlet-2-medium.png&highlight=ff000000,ffffff,db4437,ffffff&color=ff000000?scale=1.25"
              var marker = new google.maps.Marker({
                map: map,
                icon : image,
                position: place.geometry.location,
                animation: google.maps.Animation.DROP
              });

              google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                  place.formatted_address + '</div>');
                infowindow.open(map, this);
              });
            }
          });
        }
