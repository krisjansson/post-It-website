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
			
<?php
			
		if (password_verify($pw, $pwhash)){
			echo '
	<nav>
		<ul>
			<li>
			<a href="postitboard.php" class="logo"><strong>POST-IT WALL</strong></a>
			</li>	
			
			<li>
				<a href="createpostit.php">Create Post-it</a>	
			</li>
			
			<li>		
				<a href="logout.php" name="cmd" value="logout">Logout</a>				
		</li>
		</ul>
	</nav>';
		}
			else {
				echo '
	<nav>
		<ul>
			<li><a href="postitboard.php" class="logo"><strong>POST-IT WALL</strong></a>
			</li>	

			<li>
					<a href="index.php">Sign up</a>
			</li>
	
			<li>	
				<a href="index.php">Login</a>				
			</li>
		</ul>
	</nav>';
			}
?>
	
<?php 
	
	$un = filter_input(INPUT_POST, 'un') or die ('Missing or illeagal un parameter');
	$pw = filter_input(INPUT_POST, 'pw') or die ('Missing or illeagal pw parameter');
	
		
	require_once ('dbcon.php');
	
	$sql = 'SELECT id, pwhash FROM users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($id, $pwhash);
	
	while ($stmt->fetch()){
		
		if (password_verify($pw, $pwhash)){
			echo '<h4>You are now logged in as <span class="bold">'.$un.'</h4>'.
				'<h5><p class="proceed">You can now 
				<a href="createpostit.php" class="atag-style">
				create a post-it</a> or check out the 
				<a href="postitboard.php" class="atag-style">
				Post-it wall
				</a>
				</p></h5>';	
			$_SESSION['users_id'] = $id;
			$_SESSION['uname'] = $un;
		}
		else 'Illegal username/password combination';
	}


	
?>
	</div>
</body>
</html>
