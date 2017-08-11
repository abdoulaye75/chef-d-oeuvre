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
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php if (isset($_SESSION['login'], $_SESSION['password'])) { ?>
      <li> <?php echo '<a href="updateLogins.php?login='.$_SESSION['login'].'"> Paramètres du compte </a>'; ?> </li>
      <li> <?php echo '<a href="logout.php"> Se déconnecter </a>'; ?> </li>
      <?php } ?>
    </ul>
  </div>
</div>
</nav>