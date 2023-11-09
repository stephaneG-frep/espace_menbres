<?php session_start();?>

<!DOCTYPE html>
<html>
<head>

    <link  rel="stylesheet" href="include/bootstrap.min.css">

<style>
    body {
  margin: 0;
  padding: 0;
  background-color: #3d5e43ec;
  height: 100vh;
}
#login .container #login-row #login-column #login-box {
  margin-top: 20px;
  margin-bottom: 50px;
  max-width: 600px;
  height: auto;
  border: 4px solid cadetblue;
  background-color: #dcc72e;
  box-shadow:  20px 20px 20px black;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 30px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}

    </style>

<div class="navbar navbar-expand navbar-dark bg-dark">
<nav class="navbar bg-body-tertiary">
<form class="container-fluid justify-content-start">
  <a class="navbar-brand m-2 text-white" href="index.php">Accueil</a>
  <ul class="navbar-nav ">
  <li class="nav-item mx-2"><a class="nav-link text-muted" href="euro_million.html">Euro-millon</a></li>
  <li class="nav-item mx-2 "><a class="nav-link text-white-50" href="loto.html">LOTO</a></li>
  <li class="nav-item mx-2"><a class="nav-link text-light" href="#">A propos</a></li>
  </ul>

  <ul class="navbar-nav">

  <?php
  if(isset($_SESSION['id'])){
  ?>
  <button type="button" class="btn btn-danger btn-outline mx-2"><a href="deconnexion.php"> Deconnexion</a></button>
  <button type="button" class="btn btn-danger btn-outline mx-2"><a href="profil.php">Profil</a></button>
  <?php
  }
  else{ ?>
    <button type="button" class="btn btn-warning btn-outline mx-2"><a href="inscription.php">Inscription</a></button>
    <button type="button" class="btn btn-warning btn-outline mx(2"><a href="connexion.php">Connexion</a></button>
  </ul>
  </nav>
  </form>


  </div>
  <?php

  }
  ?>

