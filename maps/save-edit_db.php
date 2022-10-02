<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('db.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$place_id = $_POST["place_id"];
	$place_name = $_POST["place_name"];
	$add_place = $_POST["add_place"];
	$type_place = $_POST["type_place"];
	$lat_place = $_POST["lat_place"];
	$lng_place = $_POST["lng_place"];	

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	$sql = "UPDATE markers SET  
			name='$place_name' ,
			address='$add_place' , 
			type='$type_place' ,
			lat='$lat_place' ,
			lng='$lng_place'  
			WHERE id='$place_id' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));

mysqli_close($conn); //ปิดการเชื่อมต่อ database 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เเก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'findAll.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('เกิดข้อผิดพลาด!โปรดลองอีกครั้ง');";
        echo "window.location = 'findAll.php'; ";
	echo "</script>";
}
?>