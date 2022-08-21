<?php
//Session ketika berhasil login maka id_user pada index.php
session_start();
if (!isset($_SESSION['tb_iduser'])) {
    header("location: login.php");
    exit();
}
?>

<?php
//memanggil database 
require_once('koneksi.php');

//percobaan
//$nama = $_SESSION['id_user'];
// foreach ($nama as $sesi) {
//     # code...
//     echo $sesi;
// }
//$user = mysqli_query($koneksi, "SELECT * FROM tb_registrasi where tb_iduser='$nama', tb_password='$password'");
$userqry = mysqli_query($koneksi, "SELECT * FROM tb_registrasi where tb_iduser='$_SESSION[tb_iduser]'");
$user = mysqli_fetch_array($userqry);


//sampai sini 22/6/2021 jam 12
// $sql = "SELECT * FROM tb_data";
// //$sql = "SELECT * FROM buku order by";
// //mengeksekusi yg ada pada var $koneksi dan $sql
// $qry = mysqli_query($koneksi, $sql);
// $row = mysqli_fetch_assoc($qry);

$tampilpage = $_SESSION['tb_iduser'];
$sesi = "SELECT * FROM tb_data WHERE tb_iduser = '$tampilpage'";
$sesiExe = mysqli_query($koneksi, $sesi);
$row = mysqli_fetch_assoc($sesiExe);

//$qry - mysqli_query($koneksi, $tampilpage)



//$tampil = "SELECT * FROM tb_login "
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="form.css"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


</head>

<body>

    <div class="alert alert-success">
        <div class="alert alert-success">
            <strong><a href="logout.php"><button type="button" class="btn btn-secondary float-left"> Logout </button></a></strong>

            <center> <strong>PSB Online</strong> </center>
            <center> <strong>Welcome <?php echo $user['tb_iduser']; ?></strong> </center>
        </div>

    </div>

    <form action="" method="POST">

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="vnama" name="vnama" value="<?= $row['tb_nama'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-date-input" class="col-2 col-form-label">Tanggal lahir</label>
            <div class="col-10">
                <input class="form-control" type="date" name="vdate" id="vdate" value="<?= $row['tb_ttl'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="vgender" class="col-2 col-form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="vgender" <?php if ($row['tb_jeniskelamin'] == "Laki-laki") echo "checked"; ?> value="Laki-laki">
                <label class="form-check-label" for="flexRadioDefault1">
                    Laki-laki
                </label>
                <br><input class="form-check-input" type="radio" name="vgender" <?php if ($row['tb_jeniskelamin'] == "Perempuan") echo "checked"; ?> value="Perempuan">
                <label class="form-check-label" for="flexRadioDefault1">
                    Perempuan
                </label></br>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="valamat" name="valamat" value="<?= $row['tb_alamat'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text-box" class="form-control" id="vjurusan" name="vjurusan" value="<?= $row['tb_jurusan'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text-box" class="form-control" id="vemail" name="vemail" value="<?= $row['tb_email'] ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">No. HP</label>
            <div class="col-sm-10">
                <input type="text-box" class="form-control" id="vnohp" name="vnohp" value="<?= $row['tb_nohp'] ?>">
            </div>
        </div>


        <center><input type="submit" name="submit" value="Daftar" class="btn btn-info"></center>
        <center><input type="" name="vstatus" value="<?= $row['tb_status']; ?>" class="btn btn-secondary"></center><br>

        <center>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" <?php if ($row['tb_status'] == "Telah di ACC") {
                                                                                                        ?> checked disabled <?php } else { ?> disabled <?php } ?>>

                <label class="form-check-label" for="flexCheckCheckedDisabled">
                    <?php echo $row['tb_status'];
                    // if ($row['tb_status'] == "Telah di ACC") {
                    // }
                    ?>
                </label>
            </div>
        </center>



    </form>

    <?php
    if (isset($_POST['submit'])) {
        //$id = $_POST['id'];
        $nama = $_POST['vnama']; //false = (['']) // ('')
        $ttl = $_POST['vdate'];
        $gender = $_POST['vgender'];
        $alamat = $_POST['valamat'];
        $jurusan = $_POST['vjurusan'];
        $email = $_POST['vemail'];
        $nohp = $_POST['vnohp'];
        $stat = $_POST['vstatus'];

        //  $stat = $_STATUS['status'];
        //$genre = $_POST['vgenre'];
        //$id_data = $_GET['id'];

        //$sql = "UPDATE tb_data SET tb_nama = '$nama', tb_email = '$email', tb_tanggal = '$date', tb_gender = '$gen' WHERE id_data = '$id_data'";
        //$sql = "INSERT INTO tb_data (tb_nama, tb_ttl, tb_jeniskelamin, tb_alamat, tb_jurusan, tb_email, tb_nohp) VALUES ('$nama', '$ttl', '$gender', '$alamat', '$jurusan', '$email', '$nohp')";
        $sql = "UPDATE tb_data SET tb_nama = '$nama', tb_ttl = '$ttl', tb_jeniskelamin = '$gender', tb_alamat = '$alamat',
         tb_jurusan = '$jurusan', tb_email = '$email', tb_nohp = '$nohp', tb_status = 'Menunggu Persetujuan Admin' WHERE tb_iduser = '$tampilpage'";
        //UPDATE `tb_data` SET `tb_nama` = 'aa' WHERE `tb_data`.`tb_iduser` = 'farhan';
        if (mysqli_query($koneksi, $sql)) {
            //  echo 'aaa';
            $message = "Success";
            echo "<script type='text/javascript'>alert('$message');
                history.back(self);
                </script>";
            exit;
            //$sql = "UPDATE tb_data SET tb_status = 'Menunggu Konfimasi'";
            header("location:index.php");
        } else {
            echo 'Error ';
        }
    }
    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
<!-- 
    <table class="table">
        <thead class="thead-dark" <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            </tr>
            <br>
        </thead>
         -->

<!-- <br> -->



<!-- </table> -->