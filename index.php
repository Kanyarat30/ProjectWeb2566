<?php 
  include "./connectDB.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>สถานที่ท่องเที่ยวเชียงราย</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script>
        function showCafe(str) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("content_cafe").innerHTML =
                this.responseText;
            }
            xhttp.open("GET", "show_cafe.php?data="+str);
            xhttp.send();
            }
    </script>

<script>
        function showLocation(str) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("content_location").innerHTML =
                this.responseText;
            }
            xhttp.open("GET", "show_location.php?data="+str);
            xhttp.send();
            }
    </script>

    <script>
        function showAccom(str) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("content_accom").innerHTML =
                this.responseText;
            }
            xhttp.open("GET", "show_accom.php?data="+str);
            xhttp.send();
            }
    </script>
    
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
 <!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-lg-between">
    <h1 class="logo me-auto me-lg-0"><a href="">TamuTamiTour</a></h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">หน้าหลัก</a></li>
        <li><a class="nav-link scrollto" href="#about">เกี่ยวกับ</a></li>
        <li><a class="nav-link scrollto" href="#cafe">คาเฟ่</a></li>
        <li><a class="nav-link scrollto" href="#location">สถานที่เที่ยว</a></li>
        <li><a class="nav-link scrollto" href="#accom">ที่พัก</a></li>
        <li><a class="nav-link scrollto" ><div class="search">
        <form id="searchForm" class="form">
    <div class="form-group">
        <label for="Code"><h2>ค้นหาข้อมูล</h2></label>
        <input type="text" class="form-control" id="code" placeholder="ค้นหาสถานที่" name="code" required onkeyup="showAccom(this.value),showCafe(this.value),showLocation(this.value)">
    </div>
</form>
    </div> </a></li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
    <a href="" class="get-started-btn scrollto">รีเฟรช</a>
  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
      <div class="col-xl-6 col-lg-8">
        <h1>สถานที่ท่องเที่ยว เชียงราย</h1>
        <h2>คุณกำลังตามหาสถานที่ท่องเที่ยวบรรยายกาศดีๆ และที่พักสวยๆใช่ไหม ?</h2>
      </div>
    </div>
    <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
      <div class="col-xl-2 col-md-4">
      <a href="#cafe"><div class="icon-box">
          <i class="ri-cake-3-line"></i>
          <h3>คาเฟ่</h3>
        </div></a>
      </div>
      <div class="col-xl-2 col-md-4">
      <a href="#location"><div class="icon-box">
          <i class="ri-mv-fill"></i>
          <h3>สถานที่ท่องเที่ยว</h3>
        </div></a>
      </div>
      <div class="col-xl-2 col-md-4">
      <a href="#accom"><div class="icon-box">
          <i class="ri-home-heart-fill"></i>
          <h3>ที่พัก</h3>
        </div></a>
      </div>
    </div>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
          <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
          <h3>ต้องการความสบายใจเวลาท่องเที่ยวใช่ไหม?</h3>
          <p class="fst-italic">TamuTamiTour มีคำแนะนำในการเลือกคาเฟ่ สถานที่ท่องเที่ยวและที่พักที่สวยงามให้คุณได้เลือกค่ะ</p>
          <ul>
            <li><i class="ri-check-double-line"></i> คาเฟ่เทสไอจีแต่ละอำเภอ</li>
            <li><i class="ri-check-double-line"></i> สถานที่ท่องเที่ยวที่น่าสนใจ</li>
            <li><i class="ri-check-double-line"></i> ที่พักคุ้มราคาไม่มีผิดหวัง</li>
          </ul>
          <p>ค้นหาความสุขในการเดินทางของคุณกับ TamuTamiTour !</p>
        </div>
      </div>
    </div>
  </section><!-- End About Section -->

<!-- ======= Cafes Section ======= -->  
<section id="cafe" class="services">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>คาเฟ่</h2>
      <p>คาเฟ่ที่น่าสนใจในเชียงราย</p>

      <div class="container d-flex align-items-center justify-content-lg-between">
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li class="dropdown">
          <a href="#cafe"><span style="color:black;">อำเภอ</span> <i class="bi bi-chevron-down" style="color:black;"></i></a>
          <ul>
            <?php 
              $sql_dis = "SELECT * FROM district";
              $rs = $conn->query($sql_dis);
              while ($roww = $rs->fetch_array()) {
            ?>
            <li><a class="nav-link scrollto" href="#district_<?=$roww['dt_id']?>"><?=$roww['dt_name']?></a></li>
            <?php }?>
          </ul>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
    </div>
    <div class="row" id="content_cafe">
      <?php
      $sqlcheck = "SELECT cafe.*, district.* FROM cafe JOIN district ON cafe.dt_id = district.dt_id";
      $result = $conn->query($sqlcheck);
      while ($data = $result->fetch_array()) {
        $cafeName = $data["cafe_name"];
        $cafeID = $data["cafe_id"];
        $cafeMap = $data["cafe_map"];
        $cafeDescription = $data["cafe_descript"];
        $cafeImagePath = $data["cafe_img"];
      ?>
        <div id="district_<?=$data['dt_id']?>" class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <img src="<?php echo $cafeImagePath ?>" class="card-img-top" alt="..." style="    width: 100%; height: 200px; ">
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
      <img src="<?php echo $cafeImagePath ?>" class="card-img-top" alt="..." style="    width: 100%; height: 200px; ">
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
    <div class="text-center mt-4">
      <a href="#cafe" class="btn btn-primary">กลับสู่เมนูคาเฟ่</a>
    </div>
  </div>
</section>
<!-- End Cafes Section -->

<!-- ======= Location Section ======= -->
<section id="location" class="services">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>สถานที่ท่องเที่ยว</h2>
      <p>สถานที่ท่องเที่ยวที่น่าสนใจในเชียงราย</p>

      <div class="container d-flex align-items-center justify-content-lg-between">
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li class="dropdown">
          <a href="#location"><span style="color:black;">อำเภอ</span> <i class="bi bi-chevron-down" style="color:black;"></i></a>
          <ul>
            <?php 
              $sql_dis = "SELECT * FROM district";
              $rs = $conn->query($sql_dis);
              while ($roww = $rs->fetch_array()) {
            ?>
            <li><a class="nav-link scrollto" href="#location_<?=$roww['dt_id']?>"><?=$roww['dt_name']?></a></li>
            <?php }?>
          </ul>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
    </div>
    <div class="row" id="content_location">
      <?php
      $sqlcheck = "SELECT location.*, district.* FROM location JOIN district ON location.dt_id = district.dt_id";
      $result = $conn->query($sqlcheck);
      while ($data = $result->fetch_array()) {
        $locationName = $data["location_name"];
        $locationID = $data["location_id"];
        $locationMap = $data["location_map"];
        $locationDescription = $data["location_descript"];
        $locationImagePath = $data["location_img"];
      ?>
        <div id="location_<?=$data['dt_id']?>" class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <img src="<?php echo $locationImagePath ?>" class="card-img-top" alt="..." style="    width: 100%; height: 200px; ">
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
      <img src="<?php echo $locationImagePath ?>" class="card-img-top" alt="..." style="    width: 100%; height: 200px; ">
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
    <div class="text-center mt-4">
      <a href="#location" class="btn btn-primary">กลับสู่เมนูสถานที่</a>
    </div>
  </div>
</section>
<!-- End Location Section -->

<!-- ======= Accommodation Section ======= -->
<section id="accom" class="services">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>ที่พัก</h2>
      <p>ที่พักที่น่าสนใจในเชียงราย</p>

      <div class="container d-flex align-items-center justify-content-lg-between">
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li class="dropdown">
          <a href="#accom"><span style="color:black;">อำเภอ</span> <i class="bi bi-chevron-down" style="color:black;"></i></a>
          <ul>
            <?php 
              $sql_dis = "SELECT * FROM district";
              $rs = $conn->query($sql_dis);
              while ($roww = $rs->fetch_array()) {
            ?>
            <li><a class="nav-link scrollto" href="#accom_<?=$roww['dt_id']?>"><?=$roww['dt_name']?></a></li>
            <?php }?>
          </ul>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
    </div>
    <div class="row" id="content_accom">
      <?php
      $sqlcheck = "SELECT accommodation.*, district.* FROM accommodation JOIN district ON accommodation.dt_id = district.dt_id";
      $result = $conn->query($sqlcheck);
      while ($data = $result->fetch_array()) {
        $accomName = $data["accom_name"];
        $accomID = $data["accom_id"];
        $accomMap = $data["accom_map"];
        $accomDescription = $data["accom_descript"];
        $accomImagePath = $data["accom_img"];
      ?>
        <div id="accom_<?=$data['dt_id']?>" class="col-lg-4 col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <img src="<?php echo $accomImagePath ?>" class="card-img-top" alt="..." style="    width: 100%; height: 200px; ">
            <div class="card-body">
              <h5 class="card-title"><?php echo $accomName ?></h5>
            </div>
          </div>
          <div class="d-flex">
          <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-4"  data-bs-toggle="modal" data-bs-target="#accom<?=$accomID?>">รายละเอียด</button>

<!-- Modal -->
<div class="modal fade" id="accom<?=$accomID?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$accomName?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="<?php echo $accomImagePath ?>" class="card-img-top" alt="..." style="    width: 100%; height: 200px; ">
        <p><h3 class="mt-4"><?=$accomName?></h3></p>
        <p><?=$accomDescription?></p>
        <p class="mt-4"><?=$accomMap?></p>
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
    <div class="text-center mt-4">
      <a href="#accom" class="btn btn-primary">กลับสู่เมนูที่พัก</a>
    </div>
  </div>
</section>
<!-- End Accommodation Section -->

</main><!-- End #main -->



  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <h3>TamuTamiTour</h3>
      <p>เราหวังว่าคุณจะชื่นชอบสิ่งที่เราแนะนำให้และสนุกสนานไปกับมัน</p>
      <div class="social-links">
        <a href="https://www.facebook.com/pin.kyr2003/" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/pinx.mumu/" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://www.linkedin.com/in/kanyatat-intarat-b1329726a/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
