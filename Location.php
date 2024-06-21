<?php
session_start();
if(!isset($_SESSION["username"])){
        header("Location: Login.php");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลสถานที่ท่องเที่ยว</title>
    <link rel="stylesheet" type="text/css" href="Cafe.css">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>
<?php
include("connectDB.php");
include("Menu.php");
$btn = $_POST['btn'] ?? "";

switch ($btn) {
    case 'บันทึกข้อมูล':
        $location_name = $_POST['location_name']; 
        $location_descript = $_POST['location_descript']; 
        $location_map = $_POST['location_map']; 
        $dt_id = $_POST['dt_id']; 
        $location_img = $_FILES['location_img']; 

        $maxSaleIdSql = "SELECT MAX(location_id) AS max_location_id FROM location";
        $maxSaleIdResult = $conn->query($maxSaleIdSql);
        $maxSaleIdRow = $maxSaleIdResult->fetch_assoc();
        $newSaleId = $maxSaleIdRow['max_location_id'] + 1;

        $target_dir = "image/location/";
        $target_file = $target_dir . basename($location_img["name"]);

        if (move_uploaded_file($location_img["tmp_name"], $target_file)) {
                   $sql = "INSERT INTO location(location_id,location_name,location_descript,location_map,location_img,dt_id) VALUES ('$newSaleId','$location_name','$location_descript','$location_map','$target_file','$dt_id')";

            if ($conn->query($sql) === true) {
                echo "<script>
        setTimeout(function() {
            swal({
                title: 'เพิ่มข้อมูลสำเร็จ!', 
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
                echo "<script>setTimeout(function() {alert('เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error . "');},500);</script>";
            }
        } else {
            echo "<script>setTimeout(function() {alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์');},500);</script>";
        }
        break;
    case 'แก้ไขข้อมูล':
        $location_id = $_POST['location_id'] ?? "";
        if ($location_id !== "") {
            $new_location_name = $_POST['location_name'];
            $update_sql = "UPDATE location SET location_name = '$new_location_name' WHERE location_id = $location_id";
            if ($conn->query($update_sql) === true) {
                echo "<script>setTimeout(function() {alert('แก้ไขข้อมูลเรียบร้อยแล้ว'); window.location.href = 'Location.php';},1000);</script>";
            } else {
                echo "<script>setTimeout(function() {alert('Error updating district data'".$conn->error.");},1000);</script>";
            }}
        break;
}
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$recordsPerPage = 10;
$startRecord = ($page - 1) * $recordsPerPage;
$sqlcheck = "SELECT * FROM location LIMIT $startRecord, $recordsPerPage";
$result = $conn->query($sqlcheck);

?>

<h1>ข้อมูลสถานที่ท่องเที่ยว</h1>

<div class="pagination">
    <?php
    $sqlTotalRecords = "SELECT COUNT(*) as total FROM location";
    $resultTotalRecords = $conn->query($sqlTotalRecords);
    $dataTotalRecords = $resultTotalRecords->fetch_assoc();
    $totalRecords = $dataTotalRecords['total'];
    $totalPages = ceil($totalRecords / $recordsPerPage);
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i'>$i</a>";
    }
    ?>
    
</div>
<div class="add-btn">
<button type="button" class="btn button add" id="showdetail">
เพิ่มข้อมูล
</button>
</div>
<table>
    <tr>
        <th>ลำดับ</th>
        <th>ชื่อสถานที่</th>
        <th>รายละเอียด</th>
        <th>ที่อยู่</th>
        <th>รูปภาพ</th>
        <th>ประเภทอำเภอ</th>
        <th>จัดการ</th>
    </tr>
    <?php
    $no = $startRecord;
    while ($data = $result->fetch_array()) {
        $no++;
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>" . $data["location_name"] . "</td>";
       echo "<td>" . $data["location_descript"] . "</td>";
       echo "<td>" . $data["location_map"] . "</td>";
        echo "<td><img src='" . $data["location_img"] . "' width='300px'></td>";
        echo "<td>" . $data["dt_id"] . "</td>";
        echo "<td>";
    echo "<button type=\"button\" class=\"edit-button edit\" data-id=\"" . $data["location_id"] . "\">แก้ไข</button>";
    echo "<button type=\"button\" class=\"delete-button delete\" data-id=\"" . $data["location_id"] . "\">ลบ</button>";
    echo "</td></tr>";
    }
    ?>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">
      </div>
    </div>
  </div>
</div>
</div>
<script type='text/javascript'>
    $(document).ready(function(){
        $('.add').click(function(){
            $.ajax({
                url: 'Location_input.php',
                success: function(response){
                    // Add response in Modal body
                    $('.modal-body').html(response);
                    $('.modal-title').html("เพิ่มข้อมูลสถานที่ท่องเที่ยว");
                    // Display Modal
                    $('#exampleModal').modal('show');
                }
            });
        });

        $('.edit').click(function(){
            var id = $(this).data('id');
            $.ajax({
                url: 'Location_edit.php',
                type: 'GET',
                data: {location_id:id},
                success: function(response){
                    // Add response in Modal body
                    $('.modal-body').html(response);
                    $('.modal-title').html("แก้ไขข้อมูลสถานที่ท่องเที่ยว");
                    // Display Modal
                    $('#exampleModal').modal('show');
                }
            });
        });

        $('.delete').click(function () {
            var id = $(this).data('id');
            var confirmDelete = confirm("คุณต้องการลบข้อมูลหรือไม่?");
            if (confirmDelete) {
                // Perform delete operation
                $.ajax({
                    url: 'Location_delete.php', 
                    type: 'POST',
                    data: { location_id: id },
                    success: function (response) {
                        swal({
                    title: 'ลบข้อมูลสำเร็จ!', 
                    text: response,  
                    type: 'success',
                    timer: 1500, 
                    showConfirmButton: false
                }, function(){
                    window.location.reload();
                });
                    },
                    error: function () {
                        alert("เกิดข้อผิดพลาดในการลบข้อมูล");
                    }
                });
            }
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>