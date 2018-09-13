<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	
<?php 
	if (isset($_SESSION ['users_id'])){ ?>
		Currently logged in as <?=$_SESSION['uname']?> with id=<?.$_SESSION['users_id']; ?>
	}
	<?php 
	else {
		echo 'Not logged in';
	}
?>
</body>
</html>