<!DOCTYPE html>
<?php
include 'header.php'
?>

<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>Using MySQL and PHP with Google Maps</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
    #map {
      height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
</head>

<html>

<body>
  <div id="map"></div>

  <script>
    var customLabel = {
      restaurant: {
        label: 'R'
      },
      bar: {
        label: 'B'
      }
    };

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        //ละติจูด&ลองตติจูด ในหน้าหลัก
        center: new google.maps.LatLng(15.000524, 103.103131),
        //การขยายเเผนที่
        zoom: 12
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP or XML file
      downloadUrl('http://localhost/map-2/maps/xml.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function(markerElem) {
          var id = markerElem.getAttribute('id');
          var name = markerElem.getAttribute('name');
          var address = markerElem.getAttribute('address');
          var type = markerElem.getAttribute('type');
          var site = google.com

          var point = new google.maps.LatLng(
            parseFloat(markerElem.getAttribute('lat')),
            parseFloat(markerElem.getAttribute('lng')));

          var infowincontent = document.createElement('div');
          var strong = document.createElement('strong');
          strong.textContent = name
          infowincontent.appendChild(strong);
          infowincontent.appendChild(document.createElement('br'));

          var text = document.createElement('text');
          text.textContent = address
          infowincontent.appendChild(text);
          infowincontent.appendChild(document.createElement('br'));
          
          var text = document.createElement('text');
          text.textContent = type
          infowincontent.appendChild(text);


          var icon = customLabel[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            label: icon.label
          });
          marker.addListener('click', function() {
            infoWindow.setContent(infowincontent);
            infoWindow.open(map, marker);
          });
        });
      });
    }



    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7hYWjt7ejFwxW8VGmcc4WornejitZ87c&callback=initMap&libraries=&v=weekly" async></script>
</body>

</html>