<?php
include("../ayar/ayarlar.php");
include("../mailer/class.phpmailer.php");

if($_POST){

	$oyuncu_adi 	= strip_tags($_POST["user"]);
	$miktar 	= strip_tags($_POST["credit"]);
	$telefon 	= $_POST["telefon"];
	$transid 	= $_POST["transid"];
	$guvenlik 	= $_POST["guvenlik"];
	$vip 		= $_POST["vipname"];
	$tarih = date('d.m.Y H:i');


	if ($batihost_token == $guvenlik) 
	{

		$miktar = round($miktar, 0, PHP_ROUND_HALF_DOWN);
		$kadi = $db->prepare("SELECT * FROM authme WHERE username = ?");
		$kadi->execute(array($oyuncu_adi));
		$oku = $kadi->fetch();
		
		$yeniKredi = $oku["kredi"] + $miktar;
		
		$kredi_guncelle =  $db->prepare("UPDATE authme SET kredi = ? WHERE username = ?");
	    $kredi_guncelle->execute(array($yeniKredi,$oyuncu_adi));
	 
		$tabloya_ekle = $db->prepare("INSERT INTO kredi_yukleyenler (k_adi,miktar,tarih) VALUES(?,?,?)");
		$tabloya_ekle->execute(array($oyuncu_adi,$miktar,$tarih));
		
	}
	else{
		echo "Bir hata oluştu! Lütfen yetkiliye bildiriniz...";
	}
}
?>
