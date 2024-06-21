<?php 
include ("connectDB.php");
$data = $_GET['data'];
$condition = " WHERE cafe_name LIKE '%$data%'";
$sqlcheck = "SELECT cafe.*, district.* FROM cafe JOIN district ON cafe.dt_id = district.dt_id $condition";

$result = $conn->query($sqlcheck);

if ($result->num_rows > 0) {
    while ($data = $result->fetch_array()) {
        $cafeName = $data["cafe_name"];
        $cafeID = $data["cafe_id"];
        $cafeMap = $data["cafe_map"];
        $cafeDescription = $data["cafe_descript"];
        $cafeImagePath = $data["cafe_img"];
      ?>
        <div id="district_<?=$data['dt_id']?>" class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <img src="<?php echo $cafeImagePath ?>" class="card-img-top" alt="..." style="width: 100%; height: 200px;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $cafeName ?></h5>
            </div>
          </div>
          <div class="d-flex">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-4"  data-bs-toggle="modal" data-bs-target="#modal<?=$cafeID?>">รายละเอียด</button>

            <!-- Modal -->
            <div class="modal fade" id="modal<?=$cafeID?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$cafeName?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="<?php echo $cafeImagePath ?>" class="card-img-top" alt="..." style="width: 100%; height: 200px;">
                    <p><h3 class="mt-4"><?=$cafeName?></h3></p>
                    <p><?=$cafeDescription?></p>
                    <p class="mt-4"><?=$cafeMap?></p>
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
         <p>ไม่พบข้อมูลนี้</p>
    </div>
<?php
}
?>
