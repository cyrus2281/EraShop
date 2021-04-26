<?php include "includes/header.php" ?>
<title>Era Shop || Login</title>
<!-- login css -->
<link rel="stylesheet" href="css/login.css">
</head>

<body>

	<!-- cart -->
	<?php include "includes/cart.php" ?>
	<!-- header, nav, banner, and skills -->
	<?php include "includes/navigation.php" ?>



	<?php
	//hashed parrsowd and username
	$hashed_password = password_hash("123", PASSWORD_BCRYPT, array('cost' => 10));
	$hashed_username = password_hash("admin", PASSWORD_BCRYPT, array('cost' => 10));

	$message = '';
	if (isset($_POST['login'])) {
		//checking the input
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if (!(empty($username) && empty($password))) {
			$username = escape($username);
			$password = escape($password);
			//verifying the account
			if (password_verify($username, $hashed_username) && password_verify($password, $hashed_password)) {
				$_SESSION['user_id'] = '1';
				$_SESSION['username'] = 'admin';
				$_SESSION['user_role'] = 'admin';
				//moving to admin page
				redirect("admin");
			} else {
				//giving error message
				$message = '<h5 class="alert-danger">Username or Password is wrong!</5><br>';
			}
		}
	}
	?>

	<!-- Page Content -->
	<div class="login">
		<div class="icon-container">
			<h3><i class="fa fa-user fa-4x login-icon"></i></h3>
		</div>
		<h2 class="login-title">Login</h2>
		<!-- login form -->
		<form id="login-form" role="form" autocomplete="on" class="form" action="" method="post">

			<div class="form-group">
				<div class="input-group">
					<input name="username" type="text" class="form-control" placeholder="Enter Username" required>
				</div>
			</div>

			<div class="form-group">
				<div class="input-group">
					<input name="password" type="password" class="form-control" placeholder="Enter Password" required>
				</div>
			</div>

			<div class="form-group">
				<input name="login" class="btn btn-primary" value="Login" type="submit">
			</div>

		</form>
		<?php echo $message; ?>
	</div>

	<!-- footer -->
	<?php include "includes/footer.php" ?>