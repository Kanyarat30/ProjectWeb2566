<?php 
include ("connectDB.php");
$data = $_GET['data'];
$condition = " WHERE location_name LIKE '%$data%'";
$sqlcheck = "SELECT location.*, district.* FROM location JOIN district ON location.dt_id = district.dt_id $condition";

$result = $conn->query($sqlcheck);

if ($result->num_rows > 0) {
    while ($data = $result->fetch_array()) {
        $locationName = $data["location_name"];
        $locationID = $data["location_id"];
        $locationMap = $data["location_map"];
        $locationDescription = $data["location_descript"];
        $locationImagePath = $data["location_img"];
      ?>
        <div id="location_<?=$data['dt_id']?>" class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <img src="<?php echo $locationImagePath ?>" class="card-img-top" alt="..." style="width: 100%; height: 200px;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $locationName ?></h5>
            </div>
          </div>
          <div class="d-flex">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-4"  data-bs-toggle="modal" data-bs-target="#location<?=$locationID?>">รายละเอียด</button>

            <!-- Modal -->
            <div class="modal fade" id="location<?=$locationID?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$locationName?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="<?php echo $locationImagePath ?>" class="card-img-top" alt="..." style="width: 100%; height: 200px;">
                    <p><h3 class="mt-4"><?=$locationName?></h3></p>
                    <p><?=$locationDescription?></p>
                    <p class="mt-4"><?=$locationMap?></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
<?php
} else {
?>
    <div class="no-result">
         <p>ไม่พบหัวข้ออบรมนี้</p>
    </div>
<?php
}
?>
