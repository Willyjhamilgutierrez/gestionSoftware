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
      var map = L.map('map').setView([-17.387321383930942, -66.14852180605335], 18);
      L.tileLayer('https://api.maptiler.com/maps/basic-v2/{z}/{x}/{y}.png?key=j8m8OfFtt5NY8iG7G0kl',{
        tileSize: 512,
        zoomOffset: -1,
        minZoom: 1,
        attribution: "\u003ca href=\"https://www.maptiler.com/copyright/\" target=\"_blank\"\u003e\u0026copy; MapTiler\u003c/a\u003e \u003ca href=\"https://www.openstreetmap.org/copyright\" target=\"_blank\"\u003e\u0026copy; OpenStreetMap contributors\u003c/a\u003e",
        crossOrigin: true
      }).addTo(map);

      var polygon = L.polygon([
			[-17.38498184944302, -66.14834478020329],
			[-17.387480082133443, -66.15066220860393],
			[-17.388800855305185, -66.15040471655942],
			[-17.388841809359665, -66.14961078275549],
			[-17.385975003408436, -66.14766886358643]
		]).addTo(map);

		polygon.bindPopup("Zona Hospitalaria y Facultad de Medicina").openPopup();
    </script>    
  </body>
</html>
