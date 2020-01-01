<?php
include("../ayar/ayarlar.php");
include("../head.php");
header("Refresh:5; url=$siteurl");
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
            <p class="yesil_basari">Kayıt İşlemi Başarılı </p><br>
            <p class="yesil_basari">Anasayfaya yönlendiriliyorsunuz...</p>
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