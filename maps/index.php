<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'header.php'

    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการเเผนที่</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Sweet Alert css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
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

        #panel {
            position: absolute;
            top: 40px;
            left: 77%;
            z-index: 5;
            background-color: #fff;
            padding: 5px;
            border: 1px solid #999;
            text-align: right;
            font-family: "Roboto", "sans-serif";
            line-height: 20px;
            padding-left: 10px;
        }
    </style>
    <script>
        let map;
        //var point = [[14.990242394849366, 103.09689032648976 ,"สนามกีฬาบรภ.บร."],[14.966114996788688, 103.09452259118268,"สนามบอล"],[14.940961695694490, 103.09403023955844,"เชากระโดง"],];
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                //จุดกึ่งกลางของmapที่จะให่้เเสดง
                center: {
                    lat: 14.990242394849366,
                    lng: 103.09689032648976
                },
                zoom: 13,

            });


            map.addListener("click", (e) => {
                addpoint(e.latLng, map);
            });
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var myObj = JSON.parse(this.responseText);
                    for (let i in myObj) {
                        var j = myObj[i];
                        var xyzoom = {
                            lat: parseFloat(j.lat),
                            lng: parseFloat(j.lon)

                        };
                        var markers = new google.maps.Marker({
                            map: map,
                            label: String(j.name_tourist),
                            position: xyzoom,
                            title: j.name
                        });
                    }
                }
            }
            xhttp.open("GET", "codirnate.php");
            xhttp.send();
        }

        function addpoint(latLng, map) {
            new google.maps.Marker({
                position: latLng,
                map: map,
            });
            document.getElementById("lat").value = latLng.lat();
            document.getElementById("lon").value = latLng.lng();
        }

        function markpoint(lat, lng, name) {
            new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lng
                },
                map,
                title: name,
            });
        }
    </script>
</head>
<?php
require("db.php");
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM type_place ORDER BY id asc"  or die("Error:" .    mysqli_error($conn));
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($conn, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>

<body>
    <div id='panel'>
        <form action="addplace_db.php" method="POST" name="form1">
            <div class="mb-1">
                <input class="form-control" type='text' name='name_p' id='name_p' placeholder="ชื่อสถานที่"><br>
            </div>
            <div class="mb-1">
                <input class="form-control" type='text' name='add_place' id='add_place' placeholder="ที่ตั้ง"><br>
            </div>
            <div class="mb-1">
            </div>
            <div class="mb-1 mt-3">
                <input class="form-control" type='text' name='lat' id='lat' placeholder="ละติจูด"><br>
            </div>
            <div class="mb-1">
                <input class="form-control" type='text' name='lon' id='lon' placeholder="ลองติจูด"><br>
            </div>
            <div class="mb-1">
                <select name="type_place" class="form-select" required>
                    <option value="">-เลือกประเภท-</option>
                    <?php foreach ($result as $results) { ?>
                        <option value="<?php echo $results["type_name"]; ?>">
                            <?php echo $results["type_name"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mt-1">
                <input class="btn btn-danger" type='reset' value='ยกเลิก'>
                <input class="btn btn-success" type='submit' value='บันทึก'>
            </div>

        </form>
    </div>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7hYWjt7ejFwxW8VGmcc4WornejitZ87c&callback=initMap&libraries=&v=weekly" async></script>

</body>

</html>