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
    <?php

    require_once 'koneksi.php';

    /*
       $idx = $_GET['id'];
       $sql = "SELECT * FROM buku where id='$idx'";
       $qry = mysqli_query($koneksi, $sql);

       
       $jdl = $_POST['vjudul']; //false = (['']) // ('')
                    $isbn = $_POST['visbn'];
                    $pengarang = $_POST['vpengarang'];

        //mengembalikan nilai array 1 - sd
        $data = mysqli_fetch_array($qry);
      */

    //query untuk menampilkan data buku
    //$id_data = $_GET['id'];
    //$sql = "SELECT * FROM tb_data where id = $id_data";
    $id_data = $_GET['tb_iduser'];
    $sql = "SELECT * FROM tb_data WHERE tb_iduser = '$id_data'";

    //echo $sql;
    //hasil eksekusi query
    $qry = mysqli_query($koneksi, $sql); //exe

    $row = mysqli_fetch_assoc($qry); //return nilai
    // $data = mysqli_fetch_array($qry);
    //sql
    //qry



    ?>

    <div class="alert alert-success">
        <strong>Form Data Buku</strong>
    </div>

    <script src="form.js"></script>

    <form action="editprocess2.php?tb_iduser=<?= $row['tb_iduser'] ?>" method="POST" name="formbuku" onsubmit="return validateForm()">
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
                <input class="form-check-input" type="radio" id="vgender" name="vgender" value="Laki-laki" <?php if ($row['tb_jeniskelamin'] == "Laki-laki") {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                <label class="form-check-label" for="flexRadioDefault1">
                    Laki-laki
                </label>
                <br><input class="form-check-input" type="radio" id="vgender" name="vgender" value="Perempuan" <?php if ($row['tb_jeniskelamin'] == "Perempuan") {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
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

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <input type="text-box" class="form-control" id="vnohp" name="vnohp" value="<?= $row['tb_nohp'] ?>">
            </div>
        </div>
        <center>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled>
                <label class="form-check-label" for="flexCheckDisabled">
                    <?= $row['tb_status']; ?>
                </label>
            </div>
        </center>
        <center>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="vstatus" value="Telah di ACC" <?php if ($row['tb_status'] == "Telah di ACC") {
                                                                                                        echo "checked";
                                                                                                    } ?> id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    <?= $row['tb_status']; ?>
                </label>
            </div>
        </center>
        <center><input type="submit" class="btn btn-info" value="simpan"></center>
        <!-- <h4 class="text-center">Status</h4> -->
        <!-- <br><select name="gender" id="gender"> -->
        <!-- <option value="status" value="">Belum Diterima</option> -->
        <!-- <option value="status" value="">Diterima</option> -->
        <!-- <option value = "M">Male</option> -->
        <!-- <option value = "F">Female</option> -->
        <!-- </select> -->


    </form>




</body>

</html>