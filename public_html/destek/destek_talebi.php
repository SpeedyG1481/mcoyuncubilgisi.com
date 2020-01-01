<?php
include("../ayar/ayarlar.php");
include("../mailer/class.phpmailer.php");

//Post ile aldiklarim
if (isset($_POST['formturu']))
    $formtipi = $_POST['formturu'];


if (isset($_POST['email']))
    $gonderilecek = $_POST['email'];
if (isset($_POST['oyuncu']))
    $kullanici_adi = $_POST['oyuncu'];

$tarih = date('d/m/Y');
$ipadresi = $_SERVER['REMOTE_ADDR'];

//Hepsinde sabit!
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "" . $smtp_url . "";
$mail->Port = "" . $smtp_port . "";
$mail->SMTPAuth = true;
$mail->Username = "" . $smtp_mailadresi . "";
$mail->Password = "" . $smtp_mailsifresi . "";
$mail->SMTPSecure = 'SSL';
$mail->From = $smtp_mailadresi;
$mail->FromName = "OyuncuBilgisi Network | Destek Sistemi";
$mail->CharSet = 'UTF-8';
$mail->IsHTML(true);

if (isset($_POST['formturu'])) {
    if ($formtipi == "hilebug") {
        $tablo = $db->query("SELECT * FROM authme WHERE (username='$kullanici_adi' AND email='$gonderilecek')");
        $tablo->execute();
        if ($tablo->rowCount() != 0) {
            $mail->AddAddress($gonderilecek);
            $mail->AddAddress($smtp_mailadresi);
            $mesaj = $_POST['mesaj'];

            $mail->Subject = 'Hile&Bug Bildirimi';
            $mail->Body = $mail_body = "
       <center><img src='$siteurl/img/logo.png' width='70%' height='70%'/></center>
        <br>
        <div style='margin: auto; width: 60%; font-size: 18px; text-align: center; color: black;'>
        <h3>OB-Network Destek Sistemi</h3>
        <p>Merhaba sayın; $kullanici_adi</p>
        <p>Göndermiş olduğunuz destek talebi elimize ulaştı. En kısa sürede incelenip geri dönüş sağlanacaktır..</p>
        <br>
        <p>MESAJINIZ</p>
        </div>
        <div style='text-align: left; width: 78%; overflow: scroll; margin: auto; border: 1px solid black; color:black; font-size: 15px;'>
        $mesaj
        </div>

        <div style='margin: auto; font-size: 18px; text-align: center; color: black;'>
        <p>Saygılarımızla OB-Network</p>
        <p>Tarih; $tarih</p>
        </div>
        ";

            if ($mail->Send()) {
                header("location:../destek/destek_basarili.php");
                die();
            } else {
                header("location:../destek/destek_basarisiz.php");
                die();
            }
        } else {
            header("location: $siteurl/hata-sayfalari/hata.php?hata_tipi=kullanici_bilgileri_yanlis");
            die();
        }
    } else if ($formtipi == "sifreyenile") {

        if (isset($_POST['eskisifre'])) {
            $eskisifre = $_POST['eskisifre'];
            $eskisifremd5 = md5($eskisifre);
        }
        if (isset($_POST['yenisifre'])) {
            $yenisifre = $_POST['yenisifre'];
            $yenisifremd5 = md5($_POST['yenisifre']);
        }
        if (isset($_POST['yenisifretekrar'])) {
            $yenisifretekrar = $_POST['yenisifretekrar'];
        }

        $tablo = $db->query("SELECT * FROM authme WHERE (username='$kullanici_adi' AND email='$gonderilecek' AND password='$eskisifremd5')");
        $tablo->execute();
        if ($tablo->rowCount() != 0) {
            if ($yenisifretekrar != $yenisifre) {
                header("location: $siteurl/hata-sayfalari/hata.php?hata_tipi=sifreaynidegil");
                die();
            } else if ($eskisifre == $yenisifre) {
                header("location: $siteurl/hata-sayfalari/hata.php?hata_tipi=eski_sifreni_giremezsin");
                die();
            } else {
                $sifre_guncelle =  $db->prepare("UPDATE authme SET password = ?, token=null, token_bitis=null WHERE username = ?");
                $sifre_guncelle->execute(array($yenisifremd5, $kullanici_adi));

                $mail->AddAddress($gonderilecek);
                $mail->Subject = 'Şifreniz Değiştirildi';
                $mail->Body = $mail_body = "
                   <center><img src='$siteurl/img/logo.png' width='70%' height='70%'/></center>
                    <br>
                    <div style='margin: auto; font-size: 18px; text-align: center; color: black;'>
                    <h3>OB-Network Destek Sistemi</h3>
                    <p>Merhaba sayın; $kullanici_adi</p>
                    <p>Şifreniz az önce değiştirildi! Eğer bu aktiviteyi siz yapmadıysanız discord sunucumuz üzerinden iletişime geçiniz.</p>
                    <br>
                    <p>Yeni Şifreniz; $yenisifre</p>
                    <p>IP; $ipadresi</p>
                    </div>
            
                    <div style='margin: auto; font-size: 18px; text-align: center; color: black;'>
                    <p>Saygılarımızla OB-Network</p>
                    <p>Tarih; $tarih</p>
                    </div>
            
                    ";
                if ($mail->Send()) {
                    header("location:../destek/destek_basarili.php");
                    die();
                } else {
                    header("location:../destek/destek_basarisiz.php");
                    die();
                }
            }
        } else {
            header("location: $siteurl/hata-sayfalari/hata.php?hata_tipi=kullanici_bilgileri_yanlis");
            die();
        }
    } else if ($formtipi == "odemesorunlari") {
        $tablo = $db->query("SELECT * FROM authme WHERE (username='$kullanici_adi' AND email='$gonderilecek')");
        $tablo->execute();
        if ($tablo->rowCount() != 0) {
            if (isset($_POST['odemetarihi']))
                $odemetarihi = $_POST['odemetarihi'];

            if (isset($_POST['odememiktari']))
                $odememiktari = $_POST['odememiktari'];

            if (isset($_POST['mesaj']))
                $mesaj = $_POST['mesaj'];

            $mail->AddAddress($gonderilecek);
            $mail->AddAddress($smtp_mailadresi);
            $mail->Subject = 'Ödeme Sorunları';
            $mail->Body = $mail_body = "
                    <center><img src='$siteurl/img/logo.png' width='70%' height='70%'/></center>
                    <br>
                    <div style='margin: auto; font-size: 18px; text-align: center; color: black;'>
                    <h3>OB-Network Destek Sistemi</h3>
                    <p>Merhaba sayın; $kullanici_adi</p>
                    <p>Ödeme sorunları ile ilgili yaptığınız ödeme başarıyla bize ulaştırıldı. En kısa sürede mailinize dönüş sağlanacaktır.</p>
                    <br>
                    <p>IP; $ipadresi</p>
                    <br>
                    <p>MESAJINIZ;</p>
                    </div>
                    <div style='text-align: left; width: 78%; overflow: scroll; margin: auto; border: 1px solid black; color:black; font-size: 15px;'>
                    $mesaj
                    </div>
            
                    <div style='margin: auto; font-size: 18px; text-align: center; color: black;'>
                    <p>Saygılarımızla OB-Network</p>
                    <p>Tarih; $tarih</p>
                    </div>
            
                    ";

            if ($mail->Send()) {
                header("location:../destek/destek_basarili.php");
                die();
            } else {
                header("location:../destek/destek_basarisiz.php");
                die();
            }
        } else {
            header("location: $siteurl/hata-sayfalari/hata.php?hata_tipi=kullanici_bilgileri_yanlis");
            die();
        }
    } else if ($formtipi == "mailguncelle") {

        if (isset($_POST['yeniemail']))
            $yenimail = $_POST['yeniemail'];
        if (isset($_POST['sifre'])) {
            $yenisifremd5 = md5($_POST['sifre']);
        }
        $tablo = $db->query("SELECT * FROM authme WHERE (username='$kullanici_adi' AND email='$gonderilecek' AND password='$yenisifremd5')");
        $tablo->execute();

        if ($tablo->rowCount() != 0) {
            $sifre_guncelle =  $db->prepare("UPDATE authme SET email = ?, token=null, token_bitis=null WHERE username = ?");
            $sifre_guncelle->execute(array($yenimail, $kullanici_adi));

            $mail->AddAddress($gonderilecek);
            $mail->Subject = 'E-Mail Adresiniz Değiştirildi';
            $mail->Body = $mail_body = "
               <center><img src='$siteurl/img/logo.png' width='70%' height='70%'/></center>
                <br>
                <div style='margin: auto; font-size: 18px; text-align: center; color: black;'>
                <h3>OB-Network Destek Sistemi</h3>
                <p>Merhaba sayın; $kullanici_adi</p>
                <p>E-Mail adresiniz değiştirildi! Eğer bu aktiviteyi siz yapmadıysanız discord sunucumuz üzerinden iletişime geçiniz.</p>
                <br>
                <p>IP; $ipadresi</p>
                </div>
        
                <div style='margin: auto; font-size: 18px; text-align: center; color: black;'>
                <p>Saygılarımızla OB-Network</p>
                <p>Tarih; $tarih</p>
                </div>
        
                ";
            if ($mail->Send()) {
                header("location:../destek/destek_basarili.php");
                die();
            } else {
                header("location:../destek/destek_basarisiz.php");
                die();
            }
        } else {
            header("location: $siteurl/hata-sayfalari/hata.php?hata_tipi=kullanici_bilgileri_yanlis");
            die();
        }
    } else {
        header("location:../destek.php");
        die();
    }
} else {
    header("location:../destek.php");
    die();
}
