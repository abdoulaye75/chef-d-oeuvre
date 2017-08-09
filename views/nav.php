<?php session_start(); ?>
<header>
	<div class="icon" id="hamburger_menu">
		<span></span>
	</div>
	<nav class="navbar" id="myNavbar">
		<ul>
			<li> <a href="index.php" class="navlink"> Accueil </a> </li>
			<li> <a href="vehicles.php" class="navlink"> Nos véhicules </a> </li>
			<?php if (isset($_SESSION['login'], $_SESSION['password'])) { ?>
				<li> <?php echo '<a href="reservations.php" class="navlink"> Mes réservations </a>'; ?> </li>
				<li> <?php echo '<a href="settings.php?login='.$_SESSION['login'].'" class="navlink"> Paramètres du compte </a>'; ?> </li>
				<li> <?php echo '<a href="logout.php" class="navlink"> Se déconnecter </a>'; ?> </li>
			<?php }
			elseif (isset($_SESSION['loginAccompagnist'], $_SESSION['passwordAccompagnist'])) { ?>
				<li> <?php echo '<a href="sessions.php" class="navlink"> Les séances </a>'; ?> </li>
				<li> <?php echo '<a href="settings.php?login='.$_SESSION['loginAccompagnist'].'" class="navlink"> Paramètres du compte </a>'; ?> </li>
				<li> <?php echo '<a href="logout.php" class="navlink"> Se déconnecter </a>'; ?> </li>
			<?php }
			else { ?> 
				<div class="dropdown" id="dropdown1">
					<li> <?php echo '<a href="#" class="navlink dropbtn"> S\'inscrire <i class="material-icons">&#xe5c5;</i> </a>'; ?> </li>
					<div class="dropdown-content" id="dropdown-content1">
						<a href="signupDriver.php" class="navlink"> Jeune conducteur </a>
						<a href="signupAccompanist.php" class="navlink"> Accompagnateur </a>
					</div>
				</div>
				<div class="dropdown" id="dropdown2">
					<li> <?php echo '<a href="#" class="navlink dropbtn"> Se connecter <i class="material-icons">&#xe5c5;</i> </a>'; ?> </li>
					<div class="dropdown-content" id="dropdown-content2">
						<a href="loginDriver.php" class="navlink"> Jeune conducteur </a>
						<a href="loginAccompanist.php" class="navlink"> Accompagnateur </a>
					</div>
				</div>
			<?php } ?>
		</ul>
	</nav>
</header>