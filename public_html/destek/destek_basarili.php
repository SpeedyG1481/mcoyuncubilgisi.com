<?php
include ("../ayar/ayarlar.php");
include ("../head.php");
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
            <label class="yesil_basari">Destek Talebi İşleme Alındı</label><br>
            <label class="yesil_basari">Mail adresinize bilgilendirme gönderildi, kontrol etmeyi unutmayın, eğer mail gözükmüyorsa 'Spam' klasörüne bakın.</label><br>
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