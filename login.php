<?php 
	session_start();
	if (isset($_SESSION['user'])) {
		header("location: index.php");
	}
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<title>Login AJAX - Login</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<form id="loginForm">
						<div class="card mt-5">
							<div class="card-header text-center">
								Login AJAX
							</div>
							<div class="card-body">
								<span id="loading" class="text-center" style="display: none;">
									<p class="alert alert-primary">
										Loading...
									</p>
								</span>
								<div class="form-group">
									<label for="email">Email:</label>
									<input type="email" class="form-control" name="email" placeholder="Email Anda" required>
								</div>
								<div class="form-group">
									<label for="password">Password:</label>
									<input type="password" class="form-control" name="password" placeholder="Kata Sandi Anda" required>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-info" value="Login">
								</div>
								
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function(){
				$('#loginForm').submit(function(e){
					$('#loading').show();
					e.preventDefault();
					setTimeout(function(){
						$.ajax({
							type : "POST",
							url : "loginjs.php",
							data : $('#loginForm').serialize(),
							success : function(data){
								if (data === 'success') {
									window.location.replace('index.php');
								}else if(data === 'password'){
									alert('Password Salah!');
									$('#loading').hide();
								}else if(data === 'failed'){
									alert('Akun tidak terdaftar');
									$('#loading').hide();
								}else{
									alert('error');
									$('#loading').hide();
								}
							}
						})
					},2000); /*Atur waktu sesukamu, 2000 = 2 detik*/
				});
			});
		</script>
	</body>
</html>