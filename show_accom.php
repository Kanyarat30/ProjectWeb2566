<?php
include ("connectDB.php");
$data = $_GET['data'];

$condition = " WHERE accom_name LIKE '%$data%'";
$sqlcheck = "SELECT accommodation.*, district.* FROM accommodation JOIN district ON accommodation.dt_id = district.dt_id $condition";

$result = $conn->query($sqlcheck);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
        $accomName = $row["accom_name"];
        $accomID = $row["accom_id"];
        $accomMap = $row["accom_map"];
        $accomDescription = $row["accom_descript"];
        $accomImagePath = $row["accom_img"];
        ?>
        <div id="accom_<?=$row['dt_id']?>" class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
                <img src="<?php echo $accomImagePath ?>" class="card-img-top" alt="..." style="width: 100%; height: 200px; ">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $accomName ?></h5>
                </div>
            </div>
            <div class="d-flex">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mt-4"  data-bs-toggle="modal" data-bs-target="#accom<?=$accomID?>">รายละเอียด</button>

                <!-- Modal -->
                <div class="modal fade" id="accom<?=$accomID?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <!-- ... Your existing modal code ... -->
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    </div> <!-- Closing div for the row after the loop -->
    <?php
} else {
    ?>
    <div class="no-result">
        <p>ไม่พบข้อมูลนี้นี้</p>
    </div>
    <?php
}
?>
