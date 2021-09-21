Feature aplikasi yang tersedia sebagai berikut :
1. login sebagai user = Dapat mengisi form pendaftaran 
2. login sebagai admin = Dapat melihat, mengedit, menghapus data yang diinputkan oleh user

Untuk mengakses page login dengan cara memasukan url localhost/verifbackup/login.php

mysqli_fetch_assoc = array asosiatif
output = nama=>1
            ttl =>2
mysqli_fetch_array = array 
Output : 
Array
(
    [0] => 1
    [noinduk] => 1
    [1] => Alfansyah
    [nama] => Alfansyah
    [2] => Jalan Merdeka
    [alamat] => Jalan Merdeka
    [3] => Bermain Bola
    [hobi] => Bermain Bola
)

mysqli_fetch_row = menampilkan data dari database melalui index yang dipanggil (ex. $row['tb_status']) / moslty 
digunakan bersama dengan while (while(mysqli_fetch_row($row)))
