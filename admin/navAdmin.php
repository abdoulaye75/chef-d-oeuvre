<?php session_start(); ?>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="tableVehicles.php"> Liste des véhicules </a></li>

      <!-- si l'administrateur est connecté, on a les liens "Ajouter un nouveau véhicule", "Paramètres du compte" et "Se déconnecter" dans le menu. Sinon on a simplement les liens "Liste des véhicules" et "Se connecter" -->
      <?php if (isset($_SESSION['login'], $_SESSION['password'])) { ?>
      <li> <?php echo '<a href="addVehicle.php"> Ajouter un nouveau véhicule </a>'; ?> </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li> <?php echo '<a href="updateLogins.php?login='.$_SESSION['login'].'"> Paramètres du compte </a>'; ?> </li>
      <li> <?php echo '<a href="logout.php"> Se déconnecter </a>'; ?> </li>
      <?php } else { ?>
          <li> <?php echo '<a href="index.php"> Se connecter </a>'; ?> </li>
        <?php } ?>
    </ul>
  </div>
</div>
</nav>