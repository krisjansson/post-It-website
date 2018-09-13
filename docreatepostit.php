<?php session_start(); 
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Do create Post it</title>
	<link rel="stylesheet" href="stylesheet.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="container">
<?php include('navbar.php'); ?>
	
<?php
		
	$headertext = filter_input(INPUT_POST, 'headertext') or die('Missing headertext parameter');	
	$bodytext = filter_input(INPUT_POST, 'bodytext') or die('Missing bodytext parameter');
	$colorid = filter_input(INPUT_POST, 'colorid') or die('Missing colorid parameter');	
	$userid = $_SESSION['users_id'];
	
		require_once('dbcon.php');

		$sql = 'INSERT INTO postit (headertext, bodytext, color_id, users_id) VALUES (?, ?, ?, ?)';
		$stmt = $link->prepare($sql);
		$stmt->bind_param('ssii', $headertext, $bodytext, $colorid, $userid);
		$stmt->execute();

		echo '<script type="text/javascript">setTimeout("location.href=\'http://kristjansson.dk/postit/postitboard.php\'",1)</script>';


?>
	</div>

</body>
</html>