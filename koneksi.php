<?php

$servername = "localhost";
$username = "root";
$password = "";
// $db = "db_psb";
$db = "db_smbkedua";
//mysql extension (mysql_connect)
$koneksi = mysqli_connect($servername, $username, $password, $db); 

/*
if ($koneksi == true){
    echo "Success";
}
*/
/*
if (!$koneksi){
    die ("Koneksi Gagal");
}
else{
    echo "Success";
}
*/
