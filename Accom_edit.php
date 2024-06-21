<?php
include("connectDB.php");
if (isset($_GET['accom_id'])) {
    $accom_id = $_GET['accom_id'];
    $sql = "SELECT * FROM accommodation WHERE accom_id = $accom_id";
    $result = $conn->query($sql);

if ( $data = $result->fetch_assoc()){
        $accom_name=$data['accom_name'];    
        $accom_id=$data['accom_id'];    
        $accom_descript=$data['accom_descript'];
        $accom_map=$data['accom_map'];
        $dt_id=$data['dt_id'];
        $accom_img=$data['accom_img'];
         
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
    <title>แก้ไขข้อมูลที่พัก</title>
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
   <form name="input" id="inputform" action="Accom_edit_action.php?accom_id=<?=$accom_id;?>" method="post" enctype="multipart/form-data">
    <label for="accom_name">ชื่อที่พัก</label>
    <input type="text" name="accom_name" id="accom_name"  placeholder="ชื่อที่พัก" value="<?=$accom_name;?>">
    <input type="hidden" name="accom_id" id="accom_id"  placeholder="" value="<?=$accom_id;?>">

    <label for="accom_descript">รายละเอียด</label>
    <textarea name="accom_descript" id="accom_descript" cols="133" rows="10" placeholder="..รายละเอียด.."><?=$accom_descript;?></textarea>
    
    <label for="accom_map">ที่อยู่</label>
    <input type="text" name="accom_map" id="accom_map"  placeholder="ที่อยู่" value="<?=$accom_map;?>">
    
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

    <label for="accom_img">รูปภาพคาเฟ่</label>
    <input Type="file" Name="accom_img" id="accom_img" onchange="loadFile(event);" placeholder="รูปภาพที่พัก">
    <input type="submit" name="update" value="แก้ไขข้อมูล">
	<input type="submit" name="back" value="กลับ">
    <img src="<?=$accom_img?>" alt="" name="show_img" id="show_img" width="500px">
</form>
  </div>
</body>
</html>