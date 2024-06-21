<?php
include("connectDB.php");
if (isset($_POST['location_id'])) {
    $location_id = $_POST['location_id'];
    $sql = "SELECT * FROM location WHERE location_id = '$location_id'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
      $delete_sql = "DELETE FROM location WHERE location_id = '$location_id'";
      if ($conn->query($delete_sql) === true) { 
          echo "ลบข้อมูลเรียบร้อยแล้ว";
      } else {  
          echo "เกิดข้อผิดพลาดในการลบข้อมูล : " . $conn->error;
    }
  }
$conn->close();
  
?>