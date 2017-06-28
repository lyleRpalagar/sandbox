export const geolocation = (scope) => {
    var map = scope.map;
    var marker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.DROP
    });

    var controlDiv = document.createElement('div');

        // styling button
        var firstChild = document.createElement('button');
        firstChild.style.backgroundColor = '#fff';
        firstChild.style.border = 'none';
        firstChild.style.outline = 'none';
        firstChild.style.width = '28px';
        firstChild.style.height = '28px';
        firstChild.style.borderRadius = '2px';
        firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
        firstChild.style.cursor = 'pointer';
        firstChild.style.marginRight = '10px';
        firstChild.style.padding = '0px';
        firstChild.title = 'Your Location';
        controlDiv.appendChild(firstChild);

        // position and styling animation of the icon geoLocation
        firstChild.appendChild(document.getElementById('geoLocation'));


        //event listener, add animation for the img when clicked and throw a call
        firstChild.addEventListener('click', function() {
            var blinkColor = '#05B1FF';
            var animationInterval = setInterval(function(){
                if(blinkColor == '#05B1FF') blinkColor = '#333333';
                else blinkColor = '#05B1FF';
                document.getElementById('geoLocation').style.color = blinkColor;
            }, 400);

            // call : request the geolocation of the user
            if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    marker.setPosition(latlng);
                    map.setCenter(latlng);
                    // once location is found setZoom RANGE from 1:World 5:Landmass/continent 10:City 15:Streets 20:Buildings
                    map.setZoom(17);
                    clearInterval(animationInterval);

                    document.getElementById('geoLocation').style.color = '#333333';
                });
            }
            else{
                clearInterval(animationInterval);

                document.getElementById('geoLocation').style.color = '#333333';
            }
        });

        //position the geolocation button on the map
        controlDiv.index = 1;
        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
};

export default {geolocation};
