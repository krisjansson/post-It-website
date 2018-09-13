<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Delete Post it</title>
</head>

<body>
	<div class="container">
	<?php include('navbar.php'); ?>
<?php
	$postitid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT) 
		or die('Missing or illegal id parameter');
	$userid = $_SESSION['users_id'];
	
	require_once('dbcon.php');
	

	if (intval($userid) === 12) {
   // admin 
   $mysqlstring = 'DELETE FROM postit WHERE id=?';
   $stmt = $link->prepare($mysqlstring);
   $stmt ->bind_param('i', $postitid);
 } else {
   $mysqlstring = 'DELETE FROM postit WHERE id=? AND users_id=?';
   $stmt = $link->prepare($mysqlstring);
   $stmt ->bind_param('ii', $postitid, $userid);
 }
	/* $mysqlstring = 'DELETE FROM postit WHERE id=? AND users_id=? OR users_id=1';
	$stmt = $link->prepare($mysqlstring);
	$stmt ->bind_param('iii', $postitid, $userid, $userid); */
	$stmt -> execute();
	
	
		echo '<script type="text/javascript">setTimeout("location.href=\'http://kristjansson.dk/postit/postitboard.php\'",1)</script>';
		
	
?>
</div>
</body>
</html>