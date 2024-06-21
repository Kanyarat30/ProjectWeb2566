<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="Menu.css">
</head>
<body>
<ul class="sidenav">
<li><h3 style="text-align:center;margin-top:5%;padding:1%;">Admin</h3></li>
<?php
$menuItems = array(
 "ข้อมูลอำเภอ" => "District.php",
 "ข้อมูลคาเฟ่" => "Cafe.php",
 "ข้อมูลสถานที่ท่องเที่ยว" => "Location.php",
 "ข้อมูลที่พัก" => "Accom.php",
 "ออกจากระบบ" => "Logout.php");
 $url = $_SERVER['REQUEST_URI'];
 $path = parse_url($url, PHP_URL_PATH);
 foreach ($menuItems as $menuText => $value) {
 $menutext=explode('.', $value);
$isActive = strpos(strtolower($path),strtolower($menutext[0])) !== false;
 ?>
<li><a class="<?= $isActive ? ' active' : ''; ?>" href="<?= $value; ?>"><?= $menuText; ?></a></li>
<?php
}
?>
</ul>
</body>
</html>

