<?php
$conn = mysqli_connect("localhost","root","","achat");
//verifier la connexion
if(!$conn) die('Erreur : '.mysqli_connect_error());