<?php
//if($_SESSION['username']=="")
session_start();
if (!isset($_SESSION['tb_iduser'])) {
    header("location: login.php");
    exit();
} else if (isset($_SESSION['tb_iduser']) && (!$_SESSION['tb_akses'])) {
    header("location: index.php");
    exit();
}


require_once('koneksi.php');
$sql = "SELECT * FROM tb_data";
//$sql = "SELECT * FROM buku order by";
$qry = mysqli_query($koneksi, $sql);

$admin = $_SESSION['tb_iduser'];
// $userqry = mysqli_query($koneksi, "SELECT * FROM tb_registrasi where tb_iduser='$_SESSION[tb_iduser]' AND tb_akses='$_SESSION[tb_akses]'");
// $user = mysqli_fetch_array($userqry);

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- <script src="form.js"></script> -->
    <div class="alert alert-success">
        <div class="alert alert-success">
            <strong><a href="logout.php"><button type="button" class="btn btn-secondary float-left"> Logout </button></a></strong>
        </div>

        <center> <strong>PSB Online</strong> </center>
        <center> Welcome <?php echo $admin ?> </center>
    </div>

    <table class="table">
        <thead class="thead-dark">

            <tr>
                <th>ID USER</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Option </th>
                <th>Status </th>
            </tr>
            <br>
        </thead>
        <h4 class="text-center">Daftar Siswa</h4>
        <br>
        <?php
        $sql = "SELECT * FROM tb_data";

        while ($data = mysqli_fetch_array($qry)) {;
        ?>
            <tr>
                <!-- <td>< </td> -->

                <!-- <td><?php //echo $data['id']; 
                            ?> </td> -->
                <td><?php echo $data['tb_iduser']; ?> </td>
                <td><?php echo $data['tb_nama']; ?> </td>
                <td><?php echo $data['tb_ttl']; ?> </td>
                <td><?php echo $data['tb_jeniskelamin']; ?> </td>
                <td><?php echo $data['tb_alamat']; ?> </td>
                <td><?php echo $data['tb_jurusan']; ?> </td>
                <td><?php echo $data['tb_email']; ?> </td>
                <td><?php echo $data['tb_nohp']; ?> </td>
                <td><a href="edit2.php?tb_iduser=<?= $data['tb_iduser']; ?>">Edit</a>
                    | <a href="hapus2.php?id= <?php echo $data['tb_iduser']; ?>"> Hapus</a>
                <td><?php echo $data['tb_status']; ?> </td>



                <!-- <td><</td> -->
                <!-- <td><a href="edit2.php?id= <?php //echo $data['']; 
                                                ?>"> Edit</a> -->
                <!-- |<a href="hapus.php?id= "> Hapus</a> -->



            </tr>
        <?php } ?>

    </table>
</body>

</html>