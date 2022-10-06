<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <style>
      #map {position: absolute; top: 0; right: 0; bottom: 0; left: 0;}
    </style>
  </head>
  <body>
    <div id="map">
      <a href="https://www.maptiler.com" style="position:absolute;left:10px;bottom:10px;z-index:999;"><img src="https://api.maptiler.com/resources/logo.svg" alt="MapTiler logo"></a>
    </div>
    <p><a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a></p>
    <script>
      var map = L.map('map').setView([-17.39290645374646, -66.14999702108986], 17);
      L.tileLayer('https://api.maptiler.com/maps/basic-v2/{z}/{x}/{y}.png?key=j8m8OfFtt5NY8iG7G0kl',{
        tileSize: 512,
        zoomOffset: -1,
        minZoom: 1,
        attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
        crossOrigin: true
      }).addTo(map);

      var ruta = {"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"LineString","coordinates":[[-66.15815489,-17.39566057],[-66.15834361,-17.39459201],[-66.14481824,-17.39223874],[-66.14523343,-17.39013759],[-66.14123244,-17.38927311]]},"id":"a80aed0b-ee2e-483a-bb5b-e907bf3861fc","properties":{"name":"Paseo1km"}}]};

	  L.geoJSON(ruta).addTo(map);

	  ruta.bindPopup("Paseo de 1km hacia el teleférico de El Cristo").openPopup();
    </script> 
  </body>
</html>
