<?php
include("connectDB.php");
if (isset($_POST['btn']) && ($_POST['btn'] == 'บันทึกข้อมูล')) {
    // รับข้อมูลจากฟอร์ม
    $dt_name = $_POST['dt_name']; 
 
    $sql = "INSERT INTO district(dt_name) VALUES ('$dt_name')";
    // รันคำสั่ง SQL 
    if ($conn->query($sql) === TRUE) {
      
            echo "ข้อมูลถูกบันทึกเรียบร้อย";
      
} else {
    echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
}
}
$conn->close();
header("Location:Location.php");	
?>

