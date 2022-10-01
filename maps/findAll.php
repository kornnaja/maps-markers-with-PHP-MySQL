<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'header.php'
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<?php
require("db.php");
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM markers ORDER BY id asc"  or die("Error:" .    mysqli_error($conn));
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($conn, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
echo ' <table class="table table-hover">';
//หัวข้อตาราง 
  echo "
    <tr class='fs-5 bg-info'>
    <td>id</td>
    <td>ชื่อสถานที่</td>
    <td>ที่ตั้ง</td>
    <td>ประเภท</td>
    <td>ละติจูด</td>
    <td>ลองติจูด</td>
    <td>เเกไข</td>
    <td>ลบ</td>
  </tr>";

while($row = mysqli_fetch_array($result)) {
echo "<tr>";
  echo "<td>" .$row["id"] .  "</td> ";
  echo "<td>" .$row["name"] .  "</td> ";
  echo "<td>" .$row["address"] .  "</td> ";
  echo "<td>" .$row["type"] .  "</td> ";
  echo "<td>" .$row["lat"] .  "</td> ";
  echo "<td>" .$row["lng"] .  "</td> ";
  //แก้ไขข้อมูล
  echo "<td><a class='btn btn-warning' href='form-edit.php?id=$row[0]'>เเก้ไข</ิ></td> ";
  //ลบข้อมูล
  echo "<td><a href='delete_db.php?id=$row[0]' onclick=\"return confirm('คุณต้องการลบข้อมูลนี้ใช่ หรือ ไม่ ?')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
echo "</tr>";
}
echo "</table>";
?>
</body>

</html>