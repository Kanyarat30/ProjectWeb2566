<?php
include("connectDB.php");
if (isset($_POST['dt_id'])) {
    $dt_id = $_POST['dt_id'];
    $sql = "SELECT * FROM district WHERE dt_id = '$dt_id'";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result); 
      $delete_sql = "DELETE FROM district WHERE dt_id = '$dt_id'";
      if ($conn->query($delete_sql) === true) { 
          echo "ลบข้อมูลเรียบร้อยแล้ว";
      } else {  
          echo "เกิดข้อผิดพลาดในการลบข้อมูล : " . $conn->error;
      }
  }
$conn->close();
  
?>

