<!DOCTYPE html>
<html >
	<head>
		<meta charset="UTF-8">
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Admin Login</title>
		<link href="assets/css/adminlogin.css" rel="stylesheet" >
	</head>
	<body>
		<body class="align">
				<div class="imagerubah"></div>	
			<div class="site__container">
				<div class="grid__container">
					<h1 class="white">ADMIN LOGIN</h1>
					<form action="act/act_login.php?type=admin" method="post" class="form form--login">
						<div class="form__field">
							<label id="username" for="login__username"><span class="hidden">Username</span></label>
							<input name="username"type="text" class="form__input" placeholder="Username" required>
						</div>
						<div class="form__field">
							<label for="login__password"><span class="hidden">Password</span></label>
							<input name="password" id="login__password" type="password" class="form__input" placeholder="Password" required>
						</div>
						<div class="form__field">
							<input type="submit" value="Sign In">
						</div>
					</form>
					<p class="text--center">Back to <a href="index.html">Home</a></p>
					<a href="admin.html">XXX</a>
				</div>
			</div>
		</body>
  </body>
</html>
