<?php

$ip = "localhost";
$kadi = "";
$sifre = "";
$database = "";

// localhost
 // mcoyunc1_erkan
 // fAZ99_n8
 // mcoyunc1_erkan

try {
     $db = new PDO("mysql:host=$ip;dbname=$database;charset=utf8", "$kadi", "$sifre");
} catch ( PDOException $e ){
     print $e->getMessage();
}
