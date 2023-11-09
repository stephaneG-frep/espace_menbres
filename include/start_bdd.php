<?php 

$bdd = new PDO('mysql:dbname = menbres; host=localhost','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>