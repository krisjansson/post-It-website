<nav>
		<ul>
			<li><a href="postitboard.php" class="logo"><strong>POST-IT WALL</strong></a>
			</li>	
			
			<li>
				<?php
					if (isset($_SESSION['users_id'])){ ?>	
						<a href="createpostit.php">Create Post-it</a>
				<?php } else { ?>

				<?php } ?>
				
				</li>
			
			<li>
				<?php
					if (isset($_SESSION['users_id'])){ ?>	
						
				<?php } else { ?>
						<a href="signup.php">Sign up</a>
				<?php } ?>
				</li>
			
			<li>	
				<?php
					if (isset($_SESSION['users_id'])){ ?>	
						<a href="logout.php" name="cmd" value="logout">Logout</a>
				<?php } else { ?>
						<a href="loginonly.php">Login</a>
				<?php } ?>
				
		</li>
		</ul>
	</nav>