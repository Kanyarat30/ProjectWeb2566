<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ป้อนข้อมูลคาเฟ่</title>
   <link rel="stylesheet" href="form.css">
   <script>
    var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('show_img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    var clearform=function(){
        var image = document.getElementById('show_img');
        image.src = '';
    }
    </script>
</head>
<body>
<div class="divform">
   <form name="input" id="inputform" action="" method="post" enctype="multipart/form-data">
    <label for="cafe_name">ชื่อรายการอาหาร</label>
    <input type="text" name="cafe_name" placeholder="ชื่อคาเฟ่">
    <label for="cafe_descript">คำอธิบายรายการอาหาร</label>
    <input type="text" name="cafe_descript" placeholder="รายละเอียด">
    <label for="cafe_map">ที่อยู่</label>
    <input type="text" name="cafe_map" placeholder="ที่อยู่">
    <label for="dt_id">ประเภทอำเภอ</label>
    <select name="dt_id">
        <option value="" disabled selected>..กรุณาเลือกอำเภอ..</option>
        <?php
        include("connectDB.php");
                $sql="select * from district";
                $result = $conn->query($sql);
                while ($data = $result->fetch_array()) {    
                        echo "<option value='".$data['dt_id']."'>".$data['dt_name']."</option>";
                }
        ?>
        </select>
    <label for="cafe_img">รูปภาพคาเฟ่</label>
    <Input Type="file" Name="cafe_img" id="cafe_img" onchange="loadFile(event);" placeholder="รูปภาพคาเฟ่">
    <input type="submit" name="btn" value="บันทึกข้อมูล">
	<input type="reset" value="ยกเลิก" onclick="clearform()">
    <img src="" alt="" name="show_img" id="show_img" width="500px">
  </form>
  </div>
</body>
</html>
