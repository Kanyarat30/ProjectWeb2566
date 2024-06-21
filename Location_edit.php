<?php
include("connectDB.php");
if (isset($_GET['location_id'])) {
    $location_id = $_GET['location_id'];
    $sql = "SELECT * FROM location WHERE location_id = $location_id";
    $result = $conn->query($sql);

if ( $data = $result->fetch_assoc()){
        $location_name=$data['location_name'];    
        $location_id=$data['location_id'];    
        $location_descript=$data['location_descript'];
        $location_map=$data['location_map'];
        $dt_id=$data['dt_id'];
        $location_img=$data['location_img'];
         
} else {
    echo '<script>alert("ไม่พบข้อมูลที่ต้องการแก้ไข");</script>'; 
    exit();
}}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลสถานที่</title>
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
<div class="divform content">
   <form name="input" id="inputform" action="Location_edit_action.php?location_id=<?=$location_id;?>" method="post" enctype="multipart/form-data">
    <label for="location_name">ชื่อสถานที่</label>
    <input type="text" name="location_name" id="location_name"  placeholder="ชื่อสถานที่" value="<?=$location_name;?>">
    <input type="hidden" name="location_id" id="location_id"  placeholder="ชื่อสถานที่" value="<?=$location_id;?>">

    <label for="location_descript">รายละเอียด</label>
    <textarea name="location_descript" id="location_descript" cols="133" rows="10" placeholder="..รายละเอียด.."><?=$location_descript;?></textarea>
    
    <label for="location_map">ที่อยู่</label>
    <input type="text" name="location_map" id="location_map"  placeholder="ที่อยู่" value="<?=$location_map;?>">
    
    อำเภอ
    <select name="dt_id">
        <?php
                $sqllecturer="select * from district";
                $resultlecturer = $conn->query($sqllecturer);
                while ($row = $resultlecturer->fetch_array()) { 
                    $selected=$row['dt_id']==$dt_id?" selected":"";
                    echo "<option value='".$row['dt_id']."'$selected>".$row['dt_name']."</option>";
                }
        ?>
        </select>

    <label for="location_img">รูปภาพสถานที่</label>
    <input Type="file" Name="location_img" id="location_img" onchange="loadFile(event);" placeholder="รูปภาพสถานที่">
    <input type="submit" name="update" value="แก้ไขข้อมูล">
	<input type="submit" name="back" value="กลับ">
    <img src="<?=$location_img?>" alt="" name="show_img" id="show_img" width="500px">
</form>
  </div>
</body>
</html>