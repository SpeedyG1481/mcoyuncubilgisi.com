<?php
include("../ayar/ayarlar.php");
include("../head.php");
header("Refresh:10; url=$siteurl");
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

            <br>
            <div class="sol">
                <div class="tiks">&#10004;</div>
            </div>
            <font color="green">Başarılı!</font>
            <br>
            <label class="yesil_basari">Ödeme başarılı! Anasayfaya yönlendiriliyorsunuz... </label><br>
            <label class="yesil_basari">Kredi harcamak için oyun içerisinden <strong>/sm ya da /sitemarket</strong> komutunu kullanabilirsiniz... </label>
            <br>
            <br>
            <br>
        </div>
        <br>
    </div>
    <br>
    <?php include("../footer.php") ?>
</body>

</html>