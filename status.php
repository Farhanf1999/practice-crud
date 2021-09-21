<?php
require_once('koneksi.php');


$nama = $_POST['vnama']; //false = (['']) // ('')
$email = $_POST['vemail'];
$date = $_POST['date'];
$gen = $_POST['gender'];
$id_data = $_GET['id'];

$sql = "UPDATE tb_data SET tb_nama = '$nama', tb_email = '$email', tb_tanggal = '$date', tb_gender = '$gen' WHERE id_data = '$id_data'";
echo $sql;

if (mysqli_query($koneksi, $sql)) {
    header("location:admin.php");
} else {
    echo "Gagal";
}
