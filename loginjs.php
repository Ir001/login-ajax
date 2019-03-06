<?php 
	session_start();
	include 'config.php';
	if (isset($_POST)) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		// Proses Login
		$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
		$row_user = mysqli_num_rows($cek_user);
		if ($row_user >= 1) {
			$data_user = mysqli_fetch_assoc($cek_user);
			if ($password == $data_user['password']) {
				$_SESSION['user'] = $data_user;
				echo "success";
			}else{
				echo "password";
			}
		}else{
			echo "failed";
		}
	}else{
		echo "error";
	}
 ?>