<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create User</title>
	<link rel="stylesheet" href="stylesheet.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="container">
<?php include('navbar.php'); ?>
<?php
	
	$un = filter_input(INPUT_POST, 'un') or die('Missing or illegal un parameter');	
	$pw = filter_input(INPUT_POST, 'pw') or die('Missing or illegal pw parameter');	
	$pwhash = password_hash($pw, PASSWORD_DEFAULT);
	
	
	require_once('dbcon.php');
	
	$sql = 'INSERT INTO users (username, pwhash) VALUES (?, ?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ss', $un, $pwhash);
	$stmt->execute();
	
	if($stmt->affected_rows > 0){
		echo '<h4>User was successfully created :-)'.
			'and you are now logged in as <span class="bold">'.$un.'</h4>'.
				'<h5><p class="proceed">You can now 
				<a href="createpostit.php" class="atag-style">
				Create a Post-it</a> or check out the 
				<a href="postitboard.php" class="atag-style">
				POST-IT WALL
				</a>
				</p></h5>';
		$_SESSION['users_id'] = $stmt->insert_id;
		$_SESSION['uname'] = $un;
	}
	else{
		echo '<h4 class="bad">Could not create user username <span class="bold"> '.$un.'</span> because it already exists</h4>'.'
		<br>
		<a href="index.php" class="link"><h4>Try again</a> or <a href="index.php" class="link">Login</a></h4>';
	}
	
?>
	</div>
	
</body>
</html>
