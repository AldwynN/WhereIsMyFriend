<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test OSM</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="Leaflet/leaflet.css" rel="stylesheet" type="text/css"/>
        <script src="Leaflet/leaflet.js" type="text/javascript"></script>
        <style>
            #map {
                width: 100%;
                height: 500px;
                border: 1px solid #AAA;
            }
        </style>
    </head>
    <body onload="loadMap();">
        <h1 id="infoMsg"></h1>
        <h3>Inscrivez une adresse</h3>  
        <div id="mapdiv"></div>
        <form action="#" method="POST">
            <input type="text" name="txtRue" id="adress"/>
            <input type="button" name="btnSend" onclick="searchAdress();"/>
        </form>
        <div id="map"></div>
    </body>

    <script type="text/javascript">
//        var json = [{
//
//                "name": "Canada",
//                "url": "https://en.wikipedia.org/wiki/Canada",
//                "lat": 56.130366,
//                "lng": -106.346771
//            },
//            {
//                "name": "Anguilla",
//                "url": "https://en.wikipedia.org/wiki/Anguilla",
//                "lat": 18.220554,
//                "lng": -63.068615
//            },
//            {
//                "name": "Japan",
//                "url": "https://en.wikipedia.org/wiki/Japan",
//                "lat": 36.204824,
//                "lng": 138.252924
//            },
//            {
//                "name": "Chez le BOSS",
//                "url": "https://en.wikipedia.org/wiki/oui",
//                "lat": 46.212230,
//                "lng": 6.231510
//            },
//            {
//                "name": "Charmilles",
//                "url": "https://en.wikipedia.org/wiki/Charmilles",
//                "lat": 46.206210,
//                "lng": 6.127920
//            }
//        ]
        var map;
        function loadMap() {
            map = L.map('map', {
                center: [20.0, 5.0],
                minZoom: 2,
                zoom: 2
            });
            L.tileLayer('https://{s}.tile.thunderforest.com/transport-dark/{z}/{x}/{y}.png?apikey=d475158532e149ca821d53181f64472f', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                subdomains: ['a', 'b', 'c']
            }).addTo(map);
//            for (var i = 0; i < json.length; ++i)
//            {
//                L.marker([json[i].lat, json[i].lng])
//                        .bindPopup('<a href="' + json[i].url + '" target="_blank">' + json[i].name + '</a>')
//                        .addTo(map);
//            }
        }

        function searchAdress() {
            var adress = document.getElementById("adress");
            var url = "https://nominatim.openstreetmap.org/search/london?format=json&polygon=1&addressdetails=1"
            if (adress.value.length > 0) {
                url = "https://nominatim.openstreetmap.org/search/" + adress.value + "?format=json&polygon=1&addressdetails=1";
            }

            $.ajax({
                method: 'GET',
                url: url,
                data: {get_param: 'value'},
                dataType: 'json',
                success: function (data) {
                    var response = data[0];
                    var msg = '';
                    var longitude = parseFloat(response["lon"]);
                    var latitude = parseFloat(response["lat"]);
                    var city = response["city"];
                    L.marker([latitude, longitude])
                            .bindPopup('<a href="#">' + city + '</a>')
                            .addTo(map);
                    if (msg.length > 0)
                        $("#infoMsg").html(msg);
                }
            });
        }
    </script>

</html>
