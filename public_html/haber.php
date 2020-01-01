<?php
include("./ayar/ayarlar.php");
include('head.php');

if (isset($_GET['haber']))
    $haber = $_GET['haber'];
?>

<body>
    <br>
    <?php include("logo.php") ?>
    <br>
    <?php include("header.php") ?>
    <br>
    <div id="araalan">

        <div class="ara_alan_sol">
            <!-- Ana Haber -->
            <?php
            $kredi_tablo = $db->query("SELECT * FROM site_haberler WHERE haber_id='$haber'");
            $kredi_tablo->execute();
            if ($kredi_tablo->rowCount() != 0) {
                foreach ($kredi_tablo as $tablo_oku) {
                    $baslik = $tablo_oku['haber_baslik'];
                    $icerik = $tablo_oku['haber_icerik'];
                    $resimyolu = $tablo_oku['haber_resim'];
                    $tarih =  $tablo_oku['haber_tarih'];
                    $yazar =  $tablo_oku['haber_yazan'];
                    echo "
            <div class='anahaber'>
            <br>
                <div class='baslik'>
                $baslik
                </div>
                <br>
                <div class='resim'>
                    <img src='$resimyolu'>
                </div>
                <br>
                <div class='icerik'>
                $icerik
                </div>

                <div class='haberfooter'>
                &nbsp;<i class='fas fa-pencil-alt'></i> Yazar; $yazar
                    <div class='sag'>
                    <i class='far fa-calendar-alt'></i> Tarih; $tarih&nbsp; 
                    </div>
                </div>
                <br>
                <br>
                <br>
            </div>
            <!-- Ana Haber -->

        </div>";
                }
            } else {
                header("location: ../");
            }   ?>

            <div class='ara_alan_bosluk'>

            </div>

            <div class='ara_alan_sag'>
                <?php include('sagtaraf.php'); ?>
            </div>
        </div>
        <br>
        <?php include("footer.php") ?>

</body>

</html>