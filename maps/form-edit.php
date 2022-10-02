<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<?php
//1. เชื่อมต่อ database: 
require('db.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//ตรวจสอบถ้าว่างให้เด้งไปหน้าหลัก
if ($_GET["id"] == '') {
  echo "<script type='text/javascript'>";
  echo "alert('Error Contact Admin !!');";
  echo "window.location = 'findAll.php'; ";
  echo "</script>";
}

//รับค่าไอดีที่จะแก้ไข
$place_id = mysqli_real_escape_string($conn, $_GET['id']);

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM markers WHERE id='$place_id' ";
$result = mysqli_query($conn, $sql) or die("Error in query: $sql " . mysqli_error($conn));
$row = mysqli_fetch_array($result);
extract($row);
?>

<form action="save-edit_db.php" method="post" name="updateuser" id="updateuser">
  <table class="flid" width="650" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40" colspan="2" align="center" bgcolor="#D6D5D6"><b>เเก้ไขข้อมูลสถานที่</b></td>
    </tr>
    
      <tr>
        <td align="right" bgcolor="#EBEBEB">ID : </td>
        <td bgcolor="#EBEBEB">
  <p><input type="text" name="place_id" value="<?php echo $place_id; ?>" disabled='disabled' />
<input type="hidden" name="place_id" value="<?php echo $place_id; ?>" />
        </td>
      </tr>
      <tr>
        <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
        <td bgcolor="#EBEBEB">&nbsp;</td>
      </tr>
      <tr>
        <td width="117" align="right" bgcolor="#EBEBEB">ชื่อสถานที่
          :</td>
        <td bgcolor="#EBEBEB"><input name="place_name" type="text" id="place_name" value="<?= $name; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" "/></td>
    </tr>
    <tr>
      <td align=" right" bgcolor="#EBEBEB">&nbsp;</td>
        <td bgcolor="#EBEBEB">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" bgcolor="#EBEBEB">ที่ตั้ง
          <label> :</label>
        </td>
        <td bgcolor="#EBEBEB"><input name="add_place" type="text" id="add_place" value="<?= $address; ?>" size="30" placeholder="ภาษาไทยเท่านั้น" required="required" "/></td>
    </tr>
    <tr>
      <td align=" right" bgcolor="#EBEBEB">&nbsp;</td>
        <td bgcolor="#EBEBEB">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" bgcolor="#EBEBEB">ประเภทสถานที่ :</td>
        <td bgcolor="#EBEBEB"><input type="text" name="type_place" id="type_place" value="<?= $type; ?>" size="30" placeholder="ตัวเลขหรือภาษาอังกฤษเท่านั้น" required="required" /></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
        <td bgcolor="#EBEBEB">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" bgcolor="#EBEBEB">ละติจูด :
          <label> </label>
        </td>
        <td bgcolor="#EBEBEB"><input type="text" name="lat_place" id="lat_place" value="<?= $lat; ?>" size="30" placeholder="ตัวเลขหรือภาษาอังกฤษเท่านั้น" required /></td>
      </tr>
      <tr>
        <td align="right" bgcolor="#EBEBEB">&nbsp;</td>
        <td bgcolor="#EBEBEB">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" bgcolor="#EBEBEB">ลองติจูด : </td>
        <td bgcolor="#EBEBEB"><input name="lng_place" type="text" id="lng_place" value="<?= $lng; ?>" size="30" placeholder="ตัวอย่าง pisit.bow@gmail.com" required="required" /></td>
      </tr>
      <tr>
        <td bgcolor="#EBEBEB">&nbsp;</td>
        <td bgcolor="#EBEBEB">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#EBEBEB">&nbsp;</td>
        <td bgcolor="#EBEBEB">&nbsp;
          <input class="btn btn-danger" type="button" value=" ยกเลิก " onclick="window.location='findAll.php' " /> <!-- ถ้าไม่แก้ไขให้กลับไปหน้าแสดงรายการ -->
          &nbsp;
          <input class="btn btn-primary"type="submit" name="Update" id="Update" value="บันทึก" />
        </td>
      </tr>
   
    <tr>
      <td bgcolor="#EBEBEB">&nbsp;</td>
      <td bgcolor="#EBEBEB">&nbsp;</td>
    </tr>
  </table>
</form>