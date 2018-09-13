<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Post it</title>
	<link rel="stylesheet" href="stylesheet.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="container">
<?php include('navbar.php'); ?>

	<h1>Create a Post-It</h1>
	<div class="<?=$cssclass?> postitcreate" >
	<form action="docreatepostit.php" method="post"><br>
		<input type="text" name="headertext" placeholder="Title" class"inputchange" required><br>
		<textarea type="text" name="bodytext" placeholder="content..." required></textarea><br>
			<div class="sidebyside">
		Choice color:
	
		<select name="colorid" required>
<?php
			require_once('dbcon.php');
			$sql = 'SELECT id, colorname FROM color';
			$stmt = $link->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($cid, $cnam);
			while($stmt->fetch()){
				echo '<option value="'.$cid.'">'.$cnam.'</option>'.PHP_EOL;
			}
?>
		</select>
		
		<button class="diffbutton" type="submit">Create</button>
			
	</form>
		</div>
		</div>
</body>
</html>
	