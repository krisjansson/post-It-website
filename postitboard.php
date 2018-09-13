<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Post it wall</title>
<link rel="stylesheet" href="stylesheet.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<div class="container">
	<?php include('navbar.php'); ?>
	
	<div class="postit_container background">
	
		<?php
			require_once('dbcon.php');
			$sql = 'SELECT postit.id AS pid, date(createdate), headertext, bodytext, users.id as uid, username, cssclass
			FROM postit, users, color
			WHERE users_id = users.id
			AND color_id = color.id;';
			$stmt = $link->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($pid, $createdate, $htext, $btext, $uid, $username, $cssclass);
			while($stmt->fetch()){ ?>

			<div class="<?=$cssclass?> postit" >
				<?php
		if (isset($_SESSION['users_id']) AND $_SESSION['users_id'] == $uid OR $_SESSION['users_id'] === 12){ ?>	
				<form action="dodeletepostit.php" method="post">
					<input type="hidden" name="pid" value="<?=$pid?>">
					<input type="image" width="30px" src="x3.png" alt="Delete" class="delete-icon">
				</form>
						<?php } else { ?>

		<?php } ?>
				<time><?=$createdate?></time>
				<h2><?=$htext?></h2>
				<p><?=$btext?></p>
				<p class="author"><?=$username?></p>
				

			</div>

		<?php	
			}
		?>
	</div>
	</div> <!-- Container End -->
</body>
</html>
