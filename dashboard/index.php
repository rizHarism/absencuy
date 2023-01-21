<?php
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

if ($status != "login") {
  header("location:../index.php?message=silahkan login terlebih dahulu!");
}

if (isset($_POST['logout'])) {
  session_destroy();
  header("location:../index.php?message=Terimakasih sudah berkunjung");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="style-dashboard.css">
  <title>DASHBOARD</title>
</head>

<body>
  <nav>
    <a href="index.php?page=absensi">Dashboard</a> |
    <a href="index.php?page=izin">Izin</a>
  </nav>

  <p>
    <?php
    if (isset($_GET['message'])) {
      echo $_GET['message'];
    }
    ?>
  </p>

  <i>Halo <?= $nama_lengkap ?></i>
  <p>Status kepegawaian: <?= $role ?></p>
  <br />

  <div class="container">
    <!-- showing page from data get -->
    <?php
    $paramater = $_GET['page'];
    if ($paramater == "izin") {
      include('izin.php');
    } elseif ($paramater == "absensi") {
      include('absensi.php');
    } elseif ($paramater == "request") {
      include('request.php');
    } else {
      include('absensi.php');
    };
    ?>
    <form action="" method="POST">
      <button type="submit" name="logout">logout</button>
    </form>
  </div>
</body>

</html>