<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
include("connectDB.php");

$location_name = $_POST['location_name'];
$location_id = $_POST['location_id'];
$location_descript = $_POST['location_descript'];
$location_map = $_POST['location_map'];
$dt_id = $_POST['dt_id'];
$location_img = $_FILES['location_img'];

$target_dir = "image/location/";

$topic_id = $conn->insert_id;
$newfilename = $location_id . "." . pathinfo($location_img['name'], PATHINFO_EXTENSION);
$target_file = $target_dir . $newfilename;

if (move_uploaded_file($location_img["tmp_name"], $target_file)) {
    $update_sql = "UPDATE location SET location_img = '$target_file', location_name = '$location_name', location_descript = '$location_descript', location_map = '$location_map', dt_id = '$dt_id' WHERE location_id = $location_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'แก้ไขมูลสำเร็จ!', 
                text: 'กรุณารอสักครู่', 
                type: 'success',
                timer: 1500, 
                showConfirmButton: false
            }, function(){
                window.location.href = 'Location.php';
            });
        }, 500);
    </script>";
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตชื่อไฟล์ในฐานข้อมูล: " . $conn->error;
        // Log the error for your reference
        error_log("Error updating location information: " . $conn->error);
    }
} else {
    echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
}

$conn->close();
?>
