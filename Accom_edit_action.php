<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
include("connectDB.php");

$accom_name = $_POST['accom_name'];
$accom_id = $_POST['accom_id'];
$accom_descript = $_POST['accom_descript'];
$accom_map = $_POST['accom_map'];
$dt_id = $_POST['dt_id'];
$accom_img = $_FILES['accom_img'];

$target_dir = "image/accom/";

$topic_id = $conn->insert_id;
$newfilename = $accom_id . "." . pathinfo($accom_img['name'], PATHINFO_EXTENSION);
$target_file = $target_dir . $newfilename;

if (move_uploaded_file($accom_img["tmp_name"], $target_file)) {
    $update_sql = "UPDATE accommodation SET accom_img = '$target_file', accom_name = '$accom_name', accom_descript = '$accom_descript', accom_map = '$accom_map', dt_id = '$dt_id' WHERE accom_id = $accom_id";

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
                window.location.href = 'Accom.php';
            });
        }, 500);
    </script>";
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตชื่อไฟล์ในฐานข้อมูล: " . $conn->error;
        // Log the error for your reference
        error_log("Error updating accommodation information: " . $conn->error);
    }
} else {
    echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
}

$conn->close();
?>
