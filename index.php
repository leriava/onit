<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/2.13.1/OpenLayers.js"></script>
    <style>
        #map {
            width: 100%;
            height: 500px;
        }
    </style>
</head>
  <body>
        <div id="map"></div>
    <form>
        Широта: <input type="text" id="lat" name="lat"><br>
        Долгота: <input type="text" id="lon" name="lon"><br>
        <input type="button" value="Найти" onclick="zoomToLonLat()">
    </form>
    <script>
        var map = new OpenLayers.Map("map");
        var mapnik = new OpenLayers.Layer.OSM();

        map.addLayer(mapnik);
        map.setCenter(
            new OpenLayers.LonLat(37.617633, 55.755786).transform(
                new OpenLayers.Projection("EPSG:4326"),
                map.getProjectionObject()
            ),
            13
        );

        function zoomToLonLat() {
            var lon = parseFloat(document.getElementById('lon').value);
            var lat = parseFloat(document.getElementById('lat').value);

            if (isNaN(lon) || isNaN(lat)) {
                alert('Введите координаты');
                return;
            }

            map.setCenter(
                new OpenLayers.LonLat(lon, lat).transform(
                    new OpenLayers.Projection("EPSG:4326"),
                    map.getProjectionObject()
                ),
                13
            );
        }
    </script>
  </body>
</html>