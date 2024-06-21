<!DOCTYPE html>
<html lang="en">
<?php

session_start();
include "connectDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql="select username,password from admin where username='$username' and password='$password'";
    $resultMenu = $conn->query($sql);
    if($resultMenu->num_rows>0){
        $_SESSION["username"] = $username;
        header("Location: Cafe.php");
        exit();
    } else {
       
        $error_message = "<div class='text-danger'> Username หรือ รหัสผ่านไม่ถูกต้อง</div>";
    }
   
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- เรียกใช้ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            border: 1px solid #ccc; /* เพิ่มเส้นขอบ */
            margin: auto; /* ทำให้ form อยู่ตรงกลาง */
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2 class="mb-4">Login</h2>
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <label for="username">username</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">password</label>
            </div>

            <button type="submit" class="btn btn-primary ">Login</button>        
            <?php
if(isset($error_message)){
 echo $error_message;}
?>
        </form>
    </div>

    <!-- เรียกใช้ Bootstrap JS และ Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


