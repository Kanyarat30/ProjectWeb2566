<?php
include("connectDB.php");
if (isset($_POST['cafe_id'])) {
    $cafe_id = $_POST['cafe_id'];
    $sql = "SELECT * FROM cafe WHERE cafe_id = '$cafe_id'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
      $delete_sql = "DELETE FROM cafe WHERE cafe_id = '$cafe_id'";
      if ($conn->query($delete_sql) === true) { 
          echo "ลบข้อมูลเรียบร้อยแล้ว";
      } else {  
          echo "เกิดข้อผิดพลาดในการลบข้อมูล : " . $conn->error;
    }
  }
//$conn->close();
  
?>