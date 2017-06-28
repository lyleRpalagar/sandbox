export const loadLocation = (lat, lng, scope) => {
    if (lat != 0 && lng != 0 && lat != null && lng != null) {
        var latlng = new google.maps.LatLng(lat, lng);
        scope.cluster.marker = google.maps.resource.getIconMarker({type: google.maps.resource.IconType.PIN, layer: scope.layer, scale: 1.25});
        scope.cluster.marker.setPosition(latlng);
        scope.map.setCenter(latlng);
        scope.map.setZoom(15);
    }
};

export const initCluster = (scope) => {
    var options = {
        layers: [scope.layer],
        iconSize: google.maps.resource.getIconSize(google.maps.resource.IconType.DOT),
        marker: getMarker(scope),
        map: scope.map
    };
    scope.cluster = new google.maps.ClusterLayer(options);
};

export const goToLocation = (location, scope) => {
    executeSearch();
    function executeSearch() {
        unloadContent();

        var query = location;
        if (scope.layerService){
            scope.layerService.search(query, {
                layers: [
                    "location", scope.layer
                ],
                bounds: scope.map.getBounds(),
                limit: 1
            }, loadSearchResults);
            return false;
        }
    }

    function loadSearchResults(results) {
        unloadContent();

        if (results && results.length) {
            var item = results[0];
            loadContent(item, true);
        }
    }

    function unloadContent() {
        if (scope.marker) {
            scope.marker.setMap(null);
            delete scope.marker;
        }
        //scope.clusters.refresh();
    }

    function loadContent(item, locate) {
        unloadContent();

        var isLocation = item.type === "location";
        if (!isLocation || item.address.street) {
            scope.marker = google.maps.resource.getIconMarker(isLocation
                ? {
                    type: google.maps.resource.IconType.PIN,
                    color: "red"
                }
                : {
                    type: google.maps.resource.IconType.PIN,
                    layer: scope.layer,
                    scale: 1.25
                }, {
                zIndex: google.maps.Marker.MAX_ZINDEX,
                position: item.position,
                map: scope.map
            });
            //scope.clusters.refresh();
        }
        if (locate) {
            gotoLocation(item);
        }

        if (!isLocation) {
            var props = [
                    "name",
                    "address.street",
                    "address.city",
                    "address.state",
                    "address.zip",
                    "phone"
                ],
                url = null;
            for (var i = 0; i < props.length; i++) {
                var prop = props[i],
                    path = prop.split("."),
                    value = item;
                for (var j = 0; j < path.length; j++) {
                    value = value[path[j]];
                }
                $("[data-prop='" + prop + "']").html(value);
            }
            var hrefs = ["directions", "url", "phone", "photo"];
            for (var i = 0; i < hrefs.length; i++) {
                var prop = hrefs[i];
                url = null;
                switch (prop) {
                    case "directions":
                        url = google.maps.resource.getDirectionsUrl(item);
                        break;
                    case "url":
                        url = item.properties.Url || "";
                        break;
                    case "phone":
                        url = "tel:" + item.phone;
                        break;
                    case "photo":
                        url = google.maps.resource.getPhotoUrl(item.id, item.type);
                        break;
                }
                $("[data-href='" + prop + "']").attr("href", url);
            }

            url = google.maps.resource.getStreetViewUrl(item.position, {
                size: new google.maps.Size(221, 75),
                pitch: 15
            });
            $("[data-src='streetview']").attr("src", url);

            url = google.maps.resource.getStreetViewUrl(item.position, {
                link: true,
                pitch: 15
            });
            $("[data-href='streetview']").attr("href", url);

            url = google.maps.resource.getPhotoUrl(item.id, item.type, {
                size: new google.maps.Size(88, 75)
            });
            $("[data-src='photo']").attr("src", url);

            $("#map-content").addClass("active");
        }
    }

    function gotoLocation(item) {
        if (item.bounds) {
            scope.map.fitBounds(item.bounds);
        } else {
            scope.map.panTo(item.position);
        }
        if (item.type === "location") {
            scope.layerService.identify(item.position, {
                nearest: 1,
                layers: [scope.layer]
            }, function(locations) {
                if (locations && locations.length) {
                    var nearest = locations[0],
                        bounds = nearest.bounds || new google.maps.LatLngBounds([nearest.position]);
                    bounds = item.bounds
                        ? bounds.union(item.bounds)
                        : bounds.extend(item.position);
                    scope.map.fitBounds(bounds);
                }
            });
        }
    }

}

export const getMarker = (scope) => {
    var type = google.maps.resource.IconType.DOT;
    var params = {
        type: type,
        layer: scope.layer
    };
    if (scope.marker) {
        var projection = scope.map.getOverlayProjection(),
            point = projection.fromLatLngToContainerPixel(cluster.position),
            markerPoint = projection.fromLatLngToContainerPixel(scope.marker.getPosition());
        if (google.maps.math.isPointInRange(point, markerPoint, new google.maps.Size(2, 2))) {
            params.scale = 0.45;
            params.symbol = google.maps.resource.IconSymbol.BLANK;
        }
    }
    return google.maps.resource.getIconMarker(params);
};

export default {
    loadLocation,
    initCluster,
    goToLocation
};
