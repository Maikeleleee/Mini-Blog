<?php

$host = 'localhost'; // Host of Database
$db   = 'miniblog'; // Name of Database
$charset = 'utf8';
$dsn = "mysql:host=$host; port=3308; dbname=$db; charset=$charset";

$user = 'root';
$pass = '';

$bdd = new PDO($dsn, $user, $pass,);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);




