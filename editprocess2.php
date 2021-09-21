<?php
require_once('koneksi.php');


$nama = $_POST['vnama']; //false = (['']) // ('')
$ttl = $_POST['vdate'];
$gender = $_POST['vgender'];
$alamat = $_POST['valamat'];
$jurusan = $_POST['vjurusan'];
$email = $_POST['vemail'];
$nohp = $_POST['vnohp'];
$stat = $_POST['vstatus'];
$statStatic = 'Menunggu Persetujuan Admin';
//$id_data = $_GET['id'];
$id_data = $_GET['tb_iduser'];
$sql = "UPDATE tb_data SET tb_nama = '$nama', tb_ttl = '$ttl', tb_jeniskelamin = '$gender', tb_alamat = '$alamat', tb_jurusan = '$jurusan', tb_email = '$email', tb_nohp = '$nohp', tb_status = '$stat' WHERE tb_iduser = '$id_data'";
//echo $sql;


if (mysqli_query($koneksi, $sql)) {
    header("location:admin.php");
} else {
    echo "Gagal";
}
