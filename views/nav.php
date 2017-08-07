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
			else { ?> 
			<li> <?php echo '<a href="signup.php" class="navlink"> S\'inscrire </a>'; ?> </li>
			<li> <?php echo '<a href="login.php" class="navlink"> Se connecter </a>'; ?> </li>
			<?php } ?>
		</ul>
	</nav>
</header>