<?php

include ("./ayar/ayarlar.php");
//Post edilenler


$post_email = $_POST['email'];
$post_kadi = $_POST['oyuncu'];
$post_sifre = $_POST['sifre'];
$post_tekrarsifre = $_POST['tekrarsifre'];



$email_varmi = "SELECT COUNT(email) AS num FROM authme WHERE email = :email";
$stmt = $db->prepare($email_varmi);
$stmt->bindValue(':email', $post_email);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>