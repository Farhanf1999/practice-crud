<?php



require_once('koneksi.php');

//$login = mysqli_query($koneksi, "SELECT * FROM tb_login");

if (isset($_POST['register'])) {
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
				<h2> Pendaftaran Siswa Baru </h2>
			</center>
			<label>Username</label>
			<input type="text" name="username" id="username" class="form_login" placeholder="Username ..">


			<label><br>Password</label>
			<input type="password" name="pwd" id="pwd" class="form_login" placeholder="Password ..">

			<input type="submit" class="tombol_login" name="signup" id="signup" value="signup"> </input>
			<?php
			if (isset($_REQUEST['username'])) {
				$username = ($_REQUEST['username']);
				$password = ($_REQUEST['pwd']);
				//$user = "admin";

				$query = "INSERT INTO tb_registrasi (tb_iduser, tb_password, tb_akses) VALUES ('$username', '$password','admin')";
				//$query .= "INSERT INTO tb_data (tb_iduser) VALUES('$username')";
				// if ($query == true) {

				// 	$user = "admin";
				// 	//$query = "INSERT INTO tb_registrasi (tb_akses) VALUES ('$user')";
				// 	$query = "ALTER TABLE tb_registrasi (tb_akses) VALUES ('$user')";
				// }

				//$userdb = "SELECT tb_iduser FROM tb_registrasi";
				$result = mysqli_query($koneksi, $query);

				if ($result) {
					$query = "INSERT INTO tb_data (tb_iduser, tb_status) VALUES ('$username','Menunggu Pendaftaran')";
					$result = mysqli_query($koneksi, $query);
					echo "<div class='form'>
                          <h3>You are registered successfully.</h3><br/>
                          <p class='link'>Click here to <a href='login.php'>Login</a></p>
                          </div>";
				} else {
					echo "<div class='form'>
                          <h3>Required fields are missing.</h3><br/>
                          <p class='link'>Click here to <a href='signup.php'>registration</a> again.</p>
                          </div>";
				}
			}

			?>

	</form>

	</div>


</body>

</html>