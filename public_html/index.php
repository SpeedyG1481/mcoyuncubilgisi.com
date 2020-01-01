<?php
include("./ayar/ayarlar.php");
include('head.php');

?>

<body>
    <br>
    <?php include("logo.php") ?>
    <br>
    <?php include("header.php") ?>
    <br>
    <div id="araalan">
        <div class="ara_alan_sol">
            <?php
            $tablo = $db->query("SELECT * FROM site_haberler ORDER BY haber_id DESC LIMIT $max_haber_sayisi");
            $tablo->execute();
            if ($tablo->rowCount() != 0) {
                foreach ($tablo as $tablo_oku) {
                    echo "
                    <div class='haber'>
                        <div class='baslik'>
                            <div class='haberbasligi'>
                                &nbsp;<i class='fas fa-rss'></i>&nbsp;$tablo_oku[haber_baslik]
                            </div>
                            <div class='bilgilendirme'>
                                <i class='far fa-calendar-alt'></i>&nbsp;Tarih : $tablo_oku[haber_tarih]&nbsp;
                            </div>
                        </div>
                        <div class='habericerik'>
                            <img src='$tablo_oku[haber_resim]' />
                            $tablo_oku[haber_icerik]
                        </div>
                        <div class='haberfooter'>
                           <div class='sol'> &nbsp;<i class='fas fa-feather'></i>&nbsp;Yazar: $tablo_oku[haber_yazan]</div>
                            ";
                    if (strlen($tablo_oku['haber_icerik']) > 400) {
                        echo "<div class='sag'>
                        <a href='$siteurl/haber.php?haber=$tablo_oku[haber_id]'> &nbsp;DEVAMINI OKU <i class='fas fa-angle-double-right'></i>&nbsp;</a>

                        </div>
                        ";
                    }
                    echo "
                        </div>
                    </div>
                    <br>
                    ";
                }
            } else {
                echo "
                    <div class='haber'>
                        <div class='baslik'>
                            <div class='haberbasligi'>
                                &nbsp;<i class='fas fa-rss'></i>&nbsp;SİTEMİZ GÜNCELLENDİ
                            </div>
                            <div class='bilgilendirme'>
                                <i class='far fa-calendar-alt'></i>&nbsp;Tarih : 15.05.2019&nbsp;
                            </div>
                        </div>
                        <div class='habericerik'>
                            <img src='./WT/img/4.gif' />
                            Sevgili Minecraft severler;
                            <br>
                            Yeni sitemiz kullanıma açılmıştır... Sitemiz üzerindeki market sistemi kaldırılmıştır.
                            Destek bölümü direk mail sistemi olarak güncellenmiştir. Sitemiz aylık olarak güncellenen istatistikler eklenmiştir,
                            her ay sonunda birinci, ikinci, üçüncü olanlara ödül verilecektir... Kredi yükleme sistemi aynı şekilde çalışmaktadır,
                            ürün satın almak için oyun içerisindeki SiteMarketi kullanabilirsiniz. SiteMarket'e ulaşmak için
                            <strong style='color:green;'>/sitemarket</strong> ya da <strong style='color:green;'>/sm</strong> komutlarını kullanabilirsiniz.
                        </div>
                        <div class='haberfooter'>
                            &nbsp;<i class='fas fa-feather'></i>&nbsp;Yazar: Yusuf Serhat Özgen
                        </div>
                    </div>
                    <br>
                ";
            }

            ?>
        </div>

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