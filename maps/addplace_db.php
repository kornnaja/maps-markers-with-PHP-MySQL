<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html><meta charset="utf-8">
<?php
include("db.php");
$name = $_POST['name_p'];
$address = $_POST['add_place'];
$lat = $_POST['lat'];
$lng = $_POST['lon'];
$type= $_POST['type_place'];
// Check connection
if (empty($name) or empty($lat) or empty($lng) or empty($address) or empty($type)) {
    // echo('กรอกข้อมูลไม่ครบ');
    echo '<script type="text/javascript">
    swal("กรอกใหม่อีกครั้ง", "กรอกข้อมูลไม่ครบ !!", "error");
    </script>';
    exit();
}
$sql = "INSERT INTO  markers (name,address, lat, lng, type)
	VALUES ('$name','$address', '$lat', '$lng', '$type')";
if (mysqli_query($conn, $sql)) {
    //$last_id = mysqli_insert_id($conn);
    //echo('เพิ่มข้อมูลสำเร็จ');
    /*
    echo '<script type="text/javascript">
    swal("Success", "เพิ่มข้อมูลสำเร็จ !!", "success");
    </script>';
*/
    //echo '<meta http-equiv="refresh" content="1;url=admin_list_user.php" />';
    echo '<script type="text/javascript">sweetAlert("Congratulations !","เพิ่มที่อยู่สำเร็จ","success")
    </script>' ;
    //echo "<script>window.location='index.php'</script>";
   // echo "<script type='text/javascript'>";
	//echo "alert('เเก้ไขข้อมูลสำเร็จ');";
	//echo "window.location = 'findAll.php'; ";
	//echo "</script>";
}

mysqli_close($conn);


?>