/**
 * Create inline google map to pick a valid address
 * 
 */
function initMap() {
    var latv = document.getElementById('latitude') ? document.getElementById('latitude').value : 37.540;
    var lngv = document.getElementById('longitude') ? document.getElementById('longitude').value : -122.15;
    var hasPoint = document.getElementById('latitude') ? true : false;
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: parseFloat(latv), lng: parseFloat(lngv)},
        zoom: 10
    });
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var infowindow = new google.maps.InfoWindow();
    
    var marker = '';
    if(hasPoint){
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(latv, lngv),
            map: map
        });
    }else{
        marker = new google.maps.Marker({
            map: map
        });
    } 

    marker.addListener('click', function () {
        infowindow.open(map, marker);
    });
    autocomplete.addListener('place_changed', function () {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            return;
        }

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(16);
        }

        // Set the position of the marker using the place ID and location.
        marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
        });
        marker.setVisible(true);
        document.getElementById('google_place_id').value = place.place_id;
        if(document.getElementById('latitude')){ document.getElementById('latitude').value = place.geometry.location.lat(); } 
        if(document.getElementById('longitude')){ document.getElementById('longitude').value = place.geometry.location.lng(); } 
        //document.getElementById('address').value = place.place_id;
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                //'Place ID: ' + place.place_id + '<br>' +
                place.formatted_address);
        infowindow.open(map, marker);
    });
}