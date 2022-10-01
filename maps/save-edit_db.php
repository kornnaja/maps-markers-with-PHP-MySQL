<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
require('db.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$place_id = $_POST['place_id'];
$name = $_POST['place_name'];
$address = $_POST['add_place'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type= $_POST['type_place'];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE markers SET
			name='$name' ,
			address='$address' , 
			lat='$lat' ,
			lng='$lng' ,
			type='$type'  
			WHERE id "; 

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'findAll.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
        echo "window.location = 'findAll.php'; ";
	echo "</script>";
}
?>