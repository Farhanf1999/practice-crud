<?php

require_once('koneksi.php');

// $idx = $_GET['id'];
// $sql = "DELETE FROM tb_data WHERE id='$idx'";

#$sql = "DELETE FROM buku where ID='$idx'";
//echo $sql;
//exe
$user = $_GET['tb_iduser'];
$sql = "DELETE FROM tb_data WHERE tb_iduser = '$user'";

if (mysqli_query($koneksi, $sql)) {
    header("location:admin.php");
} else {
    echo "Gagal";
}
