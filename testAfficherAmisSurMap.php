<?php
$idUser = 7;
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Test OSM</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="server/Leaflet/leaflet.css" rel="stylesheet" type="text/css"/>
        <script src="server/Leaflet/leaflet.js" type="text/javascript"></script>
        <style>
            #map {
                width: 100%;
                height: 500px;
                border: 1px solid #AAA;
            }
        </style>
    </head>
    <body onload="loadMap()">
        <h1 id="infoMsg"></h1>
        <h3>Localisation des lieux de domiciles de vos amis</h3>  
        <div id="mapdiv"></div>
        <form action="#" method="POST">
            <input type="button" name="btnSend" id="btnSearch"/>
        </form>
        <div id="map"></div>
    </body>

    <script type="text/javascript">
        var map;
        $("#btnSearch").click(function () {
            getFriendsInfosForUser();
        });
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

        function getFriendsInfosForUser() {
            $.ajax({
                type: 'GET',
                url: 'server/ajax/ajaxGetFriendsAdress.php',
                dataType: 'json',
                data: {"id": <?= $idUser ?>},
                success: function (returnedData) {
                    var friends = returnedData.Result;
                    for (var i = 0; i < friends.length; i++) {
                        var user = friends[i];
                        searchAdress(user);
                    }
                }, error: function (xhr, tst, err) {
                    console.log(err);
                }
            });
        }

        function searchAdress(user = null) {
            var adress = "";
            if (user !== null) {
                adress = user.adress;
            }
            var url = "https://nominatim.openstreetmap.org/search/london?format=json&polygon=1&addressdetails=1"
            if (adress.length > 0) {
                url = "https://nominatim.openstreetmap.org/search/" + adress + "?format=json&polygon=1&addressdetails=1";
            }

            $.ajax({
                method: 'GET',
                url: url,
                data: {get_param: 'value'},
                dataType: 'json',
                success: function (data) {
                    var response = data[0];
                    var msg = '';
                    if (response !== null) {
                        var longitude = parseFloat(response["lon"]);
                        var latitude = parseFloat(response["lat"]);
                        L.marker([latitude, longitude])
                                .bindPopup('<a href="#">' + user.firstName + '</a>')
                                .addTo(map);
                        if (msg.length > 0)
                            $("#infoMsg").html(msg);
                    }else{
                        alert("L'adresse : "+adress+" n'existe pas sur 'Nominatim'. Désolé " + user.firstName);
                    }
                }
            });
        }
    </script>

</html>
