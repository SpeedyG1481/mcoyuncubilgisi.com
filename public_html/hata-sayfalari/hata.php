<?php
include("../ayar/ayarlar.php");
include("../head.php");

if (isset($_GET['hata_tipi'])) {
    $hatatipi = $_GET['hata_tipi'];
} else {
    header("location: $siteurl");
    die();
}
?>

<body>
    <br>
    <?php include("../logo.php") ?>
    <br>
    <?php include("../header.php") ?>
    <br>
    <br>
    <div class="ortala">
        <div class="hata">
            <?php
            if ($hatatipi == "sifreaynidegil") {
                echo "
            <br>
            <br>
            <div class='sol'><img src='$siteurl/img/tnt.gif' /></div>Hata!
            <br>
            <p>Girdiğiniz şifreler birbiri ile uyumuşmuyor! Lütfen tekrar kayıt olmayı deneyiniz...</p>
            <br>
            <br>
           ";
                header("Refresh:6; url=$siteurl");
            } else if ($hatatipi == "kullanici_yok") {
                echo "            
                <br>
                <br>
                <div class='sol'><img src='$siteurl/img/tnt.gif'/></div>Hata!
                <br>
                <p>Bu kullanıcı adı oyuna kayıtlı değil! Lütfen öncelikle kayıt olunuz.! </p>
                <br>
                <br>";
                header("Refresh:6; url=$siteurl");
            } else if ($hatatipi == "kadi_var") {
                echo "            
                <br>
                <br>
                <div class='sol'><img src='$siteurl/img/tnt.gif' /></div>Hata!
                <br>
                <p>Bu kullanıcı adı zaten oyuna kayıtlı! Lütfen bilgileri doğru girdiğinizden emin olunuz.. </p>
                <br>
                <br>";
                header("Refresh:6; url=$siteurl");
            } else if ($hatatipi == "mail_var") {
                echo "            
                <br>
                <br>
                <div class='sol'><img src='$siteurl/img/tnt.gif' /></div>Hata!
                <br>
                <p>Bu mail adresi ile oyuna zaten kayıt olunmuş! Lütfen farklı bir mail adresi ile tekrar deneyiniz!</p>
                <br>
                <br>";
                header("Refresh:6; url=$siteurl");
            } else if ($hatatipi == "sifrenizyanlis") {
                echo "            
                <br>
                <br>
                <div class='sol'><img src='$siteurl/img/tnt.gif' /></div>Hata!
                <br>
                <p>Eski şifrenizi yanlış girdiniz! Lütfen kontrol ederek tekrar deneyiniz!</p>
                <br>
                <br>";
                header("Refresh:6; url=$siteurl");
            } else if ($hatatipi == "eski_sifreni_giremezsin") {
                echo "            
                <br>
                <br>
                <div class='sol'><img src='$siteurl/img/tnt.gif' /></div>Hata!
                <br>
                <p>Eski şifreniz ile yeni şifreniz aynı olamaz! Lütfen tekrar deneyiniz..</p>
                <br>
                <br>";
                header("Refresh:6; url=$siteurl");
            } else if ($hatatipi == "mailadresi_yanlis") {
                echo "            
                <br>
                <br>
                <div class='sol'><img src='$siteurl/img/tnt.gif' /></div>Hata!
                <br>
                <p>Mail adresi ile hesap uyuşmuyor! Lütfen eğer mail hesabınızı güncellemediyseniz öncelikkle mailinizi güncelleyiniz.</p>
                <br>
                <br>";
                header("Refresh:6; url=$siteurl");
            } else if ($hatatipi == "kullanici_bilgileri_yanlis") {
                echo "            
                <br>
                <br>
                <div class='sol'><img src='$siteurl/img/tnt.gif' /></div>Hata!
                <br>
                <p>Hesap bilgilerini yanlış girdiniz..! Lütfen tekrar deneyiniz.</p>
                <br>
                <br>";
                header("Refresh:6; url=$siteurl");
            } else {
                header("location: $siteurl");
                die();
            }

            ?>
        </div>
        <br>
    </div>
    <br>
    <?php include("../footer.php") ?>
</body>

</html>