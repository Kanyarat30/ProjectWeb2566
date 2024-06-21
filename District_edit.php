<?php
include("connectDB.php");
if (isset($_GET['dt_id'])) {
    $dt_id = $_GET['dt_id'];
    $sql = "SELECT * FROM district WHERE dt_id = $dt_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $dt_name = $row['dt_name'];
      
    } else {
        echo '<script>alert("ไม่พบข้อมูลที่ต้องการแก้ไข");</script>'; 
        exit();
    }
} else
{ 
    echo '<script>alert("กรุณาระบุข้อมูลอำเภอที่ต้องการแก้ไข");</script>'; 
    exit();
}
// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลหน่วยงาน</title>
   <link rel="stylesheet" href="form.css">
</head>
<body>  
   <form name="input" id="inputform" action="" method="post" enctype="multipart/form-data">
    <label for="dt_name">ชื่ออำเภอ</label>
    <input type="hidden" name="dt_id" value="<?=$dt_id;?>">
    <input type="text" name="dt_name" value="<?=$dt_name;?>" placeholder="ชื่ออำเภอ..">
    <input type="submit" name="btn" value="แก้ไขข้อมูล">
</form>
</body>
</html>

