<?php

session_start();
if (isset($_SESSION['tb_iduser'])) {
	header("location: index.php");
	exit();
}


require_once('koneksi.php');

if (isset($_POST['login'])) {
	$username = mysqli_escape_string($koneksi, $_POST['username']);
	//$username = $_POST['username'];
	$password = $_POST['pwd'];

	if ($username == "" || $password == "") {
		$message = "Username / Password harus diisi";
		echo "<script type='text/javascript'>alert('$message');
			history.back(self);
			</script>";
		exit;
	}

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_registrasi WHERE tb_iduser='$username' AND tb_password='$password'");

	if (mysqli_num_rows($sql) != 0) {
		//$_SESSION['id_user'] = 1;
		$qry = mysqli_fetch_array($sql);
		$_SESSION['tb_iduser'] = $qry['tb_iduser'];

		$_SESSION['tb_nama'] = $qry['tb_nama'];
		$_SESSION['tb_jeniskelamin'] = $qry['tb_jeniskelamin'];
		$_SESSION['tb_alamat'] = $qry['tb_alamat'];
		$_SESSION['tb_jurusan'] = $qry['tb_jurusan'];
		$_SESSION['tb_email'] = $qry['tb_email'];
		$_SESSION['tb_nohp'] = $qry['tb_nohp'];
		$_SESSION['tb_status'] = $qry['tb_status'];

		$_SESSION['tb_akses'] = $qry['tb_akses'];

		session_start();
		if (isset($_SESSION['tb_iduser']) && (!$_SESSION['tb_akses'])) {
			header("Location: index.php");
		} else if (isset($_SESSION['tb_iduser']) && ($_SESSION['tb_akses'])) {
			header("Location: admin.php");
		}
	}

	if (mysqli_num_rows($sql) != 1) {
		$messagee = "Username / Password salah";
		echo "<script type='text/javascript'>alert('$messagee');
				history.back(self);
				</script>";
	}
}



?>

<!DOCTYPE html>


<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>


	<form action="" method="post">

		<div class="kotak_login">
			<center>
				<p class="tulisan_login">
				<h2> PSB Online </h2>
			</center>
			<label>Username</label>
			<input type="text" name="username" id="username" class="form_login" placeholder="Username ..">


			<label><br>Password</label>
			<input type="password" name="pwd" id="pwd" class="form_login" placeholder="Password ..">



			<input type="submit" class="tombol_login" name="login" id="login" value="login"> </input>


	</form>
	<form action="signup.php">
		<p><input type="submit" class="tombol_login" name="register" id="register" value="register"> </input>
	</form>
	</div>


</body>

</html>