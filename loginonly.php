<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create user or Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="stylesheet.css">
</head>

<body>
	<div class="container">
			<?php include('navbar.php'); ?>
		<div class="wrapper">
	<div class="create-login">
		<form action="login.php" method="post" autocomplete="off" >
			
			<h1>Login</h1>
			<input type="text" name="un" autocomplete="off" placeholder="Username ex. John Doe" required >
			<input type="password" name="pw" autocomplete="off" placeholder="Password" required >
			<button class="button">Login</button>
			
	</form>
		</div>
			</div>
	</div>
	<script>
			if (document.getElementsByTagName) {

		var inputElements = document.getElementsByTagName(“input”);

		for (i=0; inputElements[i]; i++) {

		if (inputElements[i].className && (inputElements[i].className.indexOf(“disableAutoComplete”) != -1)) {

		inputElements[i].setAttribute(“autocomplete”,”off”);

		}

		}

		}
	</script>
</body>
</html>
