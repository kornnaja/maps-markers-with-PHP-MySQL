<!-- sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
//1. เชื่อมต่อ database: 
require('db.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$place_id = $_REQUEST["id"];

//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา

$sql = "DELETE FROM markers WHERE id='$place_id' ";
$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error($conn));

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('ลบข้อมูลสำเร็จ');";
	echo "window.location = 'findAll.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to delete again');";
	echo "</script>";
}
?>