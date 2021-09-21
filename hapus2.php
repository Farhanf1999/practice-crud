<?php

require_once('koneksi.php');

$idx = $_GET['id'];
#$sql = "DELETE FROM buku where ID='$idx'";
$sql = "DELETE FROM tb_data WHERE id='$idx'";
//echo $sql;
//exe

if (mysqli_query($koneksi, $sql)) {
    header("location:admin.php");
} else {
    echo "Gagal";
}
