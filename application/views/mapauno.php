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
      var map = L.map('map').setView([-17.39386885001805, -66.15699222226488], 18);
      L.tileLayer('https://api.maptiler.com/maps/basic-v2/{z}/{x}/{y}.png?key=j8m8OfFtt5NY8iG7G0kl',{
        tileSize: 512,
        zoomOffset: -1,
        minZoom: 1,
        attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
        crossOrigin: true
      }).addTo(map);

      var marker=L.marker([-17.392640258162807, -66.15866592069838]).addTo(map);

      marker.bindPopup("<h1>Hamburguesas <br>Porkys</h1>").openPopup();
    </script>    
  </body>
</html>
