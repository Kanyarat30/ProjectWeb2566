<?php
include("connectDB.php");
if (isset($_POST['accom_id'])) {
    $accom_id = $_POST['accom_id'];
    $sql = "SELECT * FROM accommodation WHERE accom_id = '$accom_id'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
      $delete_sql = "DELETE FROM accommodation WHERE accom_id = '$accom_id'";
      if ($conn->query($delete_sql) === true) { 
          echo "ลบข้อมูลเรียบร้อยแล้ว";
      } else {  
          echo "เกิดข้อผิดพลาดในการลบข้อมูล : " . $conn->error;
    }
  }
$conn->close();
  
?>