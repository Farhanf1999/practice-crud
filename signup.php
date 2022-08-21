<?php

require_once('koneksi.php');


if (isset($_POST['register'])) {
	$username = mysqli_escape_string($koneksi, $_POST['username']);
	$password = $_POST['pwd'];


	if ($username == "" || $password == "") {
		$message = "Username / Password harus diisi";
		echo "<script type='text/javascript'>alert('$message');
			history.back(self);
			</script>";
		exit;
	}

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_registrasi WHERE tb_iduser='$username' AND tb_password='$password'");
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
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> -->

</head>

<body>

	<div class='container'>
		<form action="" method="post">
			<div class="kotak_login">
				<center>
					<p class="tulisan_login">
					<h2> Pendaftaran Siswa Baru </h2>
				</center>

				<label>Nama</label>
				<input type="text" name="nama" id="nama" class="form_login" placeholder="Nama ..">
				<label for="example-date-input" class="col-2 col-form-label">Tanggal lahir</label>
				<div class="col-10">
					<input class="form-control" type="date" name="vdate" id="vdate" value="<?= $row['tb_ttl'] ?>">
				</div>
				<label>Username</label>
				<input type="text" name="username" id="username" class="form_login" placeholder="Username ..">
				<label><br>Password</label>
				<input type="password" name="pwd" id="pwd" class="form_login" placeholder="Password ..">
				<label><br>Confirm Password</label>
				<input type="password" name="confirm_pwd" id="confirm_pwd" class="form_login" placeholder="Confirm Password ..">
				<label><br>Email</label>
				<input type="text" name="email" id="email" class="form_login" placeholder="Email">


				<input type="submit" class="tombol_login" name="submit" id="submit" value="submit"> </input>
				<p>
					<a href='login.php'> Login </a>
				</p>


			</div>
			<?php
			if (isset($_POST['username'])) {
				$nama = ($_REQUEST['nama']);
				$ttl = ($_REQUEST['vdate']);
				$username = ($_REQUEST['username']);
				$password = ($_REQUEST['pwd']);
				$confirm_pass = ($_REQUEST['confirm_pwd']);
				$email = ($_REQUEST['email']);
				// password_hash($password, PASSWORD_DEFAULT);
				// password_hash($confirm_pass, PASSWORD_DEFAULT);

				$query = "INSERT INTO tb_registrasi (tb_nama, tb_tt, tb_iduser, tb_password, tb_confirmpassword, tb_email) VALUES ('$nama', '$ttl', '$username', '$password','$confirm_pass','$email')";

				$result = mysqli_query($koneksi, $query);

				if ($result) {
					$query = "INSERT INTO tb_data (tb_iduser, tb_status, tb_nama, tb_ttl, tb_email VALUES ('$username','Menunggu Pendaftaran', '$nama', '$ttl', '$email')";
					$result = mysqli_query($koneksi, $query);
					echo "<div class='form'>
                          <h3>You are registered successfully.</h3><br/>
                          <p class='link'>Click here to <a href='login.php'>Login</a></p>
                          </div>";
				} else if ($password !== $confirm_pass) {
					echo "<div class='form'>
                          <h3>Password tidak sama !</h3><br/>
                          </div>";
					return 0;
				} else {
					echo "<div class='form'>
                          <h3>Required fields are missing.</h3><br/>
                          <p class='link'>Click here to <a href='signup.php'>registration</a> again.</p>
                          </div>";
					return 0;
				}
			}

			?>

		</form>

	</div>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>