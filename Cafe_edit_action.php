<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
include("connectDB.php");

$cafe_name = $_POST['cafe_name'];
$cafe_id = $_POST['cafe_id'];
$cafe_descript = $_POST['cafe_descript'];
$cafe_map = $_POST['cafe_map'];
$dt_id = $_POST['dt_id'];
$cafe_img = $_FILES['cafe_img'];

$target_dir = "image/cafe/";

$topic_id = $conn->insert_id;
$newfilename = $cafe_id . "." . pathinfo($cafe_img['name'], PATHINFO_EXTENSION);
$target_file = $target_dir . $newfilename;

if (move_uploaded_file($cafe_img["tmp_name"], $target_file)) {
    $update_sql = "UPDATE cafe SET cafe_img = '$target_file', cafe_name = '$cafe_name', cafe_descript = '$cafe_descript', cafe_map = '$cafe_map', dt_id = '$dt_id' WHERE cafe_id = $cafe_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>
        setTimeout(function() {
            swal({
                title: 'แก้ไขข้อมูลสำเร็จ!', 
                text: 'กรุณารอสักครู่', 
                type: 'success',
                timer: 1500, 
                showConfirmButton: false
            }, function(){
                window.location.href = 'Cafe.php';
            });
        }, 500);
    </script>";
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตชื่อไฟล์ในฐานข้อมูล: " . $conn->error;
        // Log the error for your reference
        error_log("Error updating cafe information: " . $conn->error);
    }
} else {
    echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
}

$conn->close();
?>
