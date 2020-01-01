<?php

include("../ayar/ayarlar.php");
//Post edilenler


$post_email = $_POST['email'];
$post_kadi = $_POST['oyuncu'];
$post_sifre = $_POST['sifre'];
$post_tekrarsifre = $_POST['tekrarsifre'];
$tarih = date('d.m.Y');
if (!isset($post_email) || !isset($post_kadi) || !isset($post_sifre) || !isset($post_tekrarsifre)) {
    header("$siteurl");
    die();
}

$tablo = $db->query("SELECT * FROM authme WHERE username = '$post_kadi'");
$tablo->execute();
if ($tablo->rowCount() > 0) {
    header("location: ../hata-sayfalari/hata.php?hata_tipi=kadi_var");
    die();
}

$tablo = $db->query("SELECT * FROM authme WHERE email = '$post_email'");
$tablo->execute();
if ($tablo->rowCount() > 0) {
    header("location: ../hata-sayfalari/hata.php?hata_tipi=mail_var");
    die();
}

if ($post_sifre != $post_tekrarsifre) {
    header("location: ../hata-sayfalari/hata.php?hata_tipi=sifreaynidegil");
    die();
}

$kaydol = $db->prepare("INSERT INTO authme (username,password,ip,lastlogin,x,y,z,world,email,isLogged,tarih) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
$kaydol->execute(array($post_kadi, md5($post_sifre), $_SERVER['REMOTE_ADDR'], '0', '0', '0', '0', 'world', $post_email, '0', $tarih));

header("location:../kaydolma/kayitbasarili.php");
