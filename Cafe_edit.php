<?php
include("connectDB.php");
if (isset($_GET['cafe_id'])) {
    $cafe_id = $_GET['cafe_id'];
    $sql = "SELECT * FROM cafe WHERE cafe_id = $cafe_id";
    $result = $conn->query($sql);

if ( $data = $result->fetch_assoc()){
        $cafe_name=$data['cafe_name'];    
        $cafe_id=$data['cafe_id'];    
        $cafe_descript=$data['cafe_descript'];
        $cafe_map=$data['cafe_map'];
        $dt_id=$data['dt_id'];
        $cafe_img=$data['cafe_img'];
         
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
    <title>แก้ไขข้อมูลคาเฟ่</title>
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
   <form name="input" id="inputform" action="Cafe_edit_action.php?cafe_id=<?=$cafe_id;?>" method="post" enctype="multipart/form-data">
    <label for="cafe_name">ชื่อคาเฟ่</label>
    <input type="text" name="cafe_name" id="cafe_name"  placeholder="ชื่อคาเฟ่" value="<?=$cafe_name;?>">
    <input type="hidden" name="cafe_id" id="cafe_id"  placeholder="ชื่อคาเฟ่" value="<?=$cafe_id;?>">

    <label for="cafe_descript">รายละเอียด</label>
    <textarea name="cafe_descript" id="cafe_descript" cols="133" rows="10" placeholder="..รายละเอียด.."><?=$cafe_descript;?></textarea>
    
    <label for="cafe_map">ที่อยู่</label>
    <input type="text" name="cafe_map" id="cafe_map"  placeholder="ที่อยู่" value="<?=$cafe_map;?>">
    
    ประเภทอาหาร
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

    <label for="cafe_img">รูปภาพคาเฟ่</label>
    <input Type="file" Name="cafe_img" id="cafe_img" onchange="loadFile(event);" placeholder="รูปภาพคาเฟ่">
    <input type="submit" name="update" value="แก้ไขข้อมูล">
	<input type="submit" name="back" value="กลับ">
    <img src="<?=$cafe_img?>" alt="" name="show_img" id="show_img" width="500px">
</form>
  </div>
</body>
</html>