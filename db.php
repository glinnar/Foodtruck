<?php

$servername="localhost";
$dbname="";
$username="";
$pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username);
$pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
