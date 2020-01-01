<?php
include("../ayar/ayarlar.php");

include("../head.php");

$post_gelen_miktar = $_POST['amount'];
$oyuncu_adi = $_POST['oyuncu'];
$odeme_turu = $_POST['odemeturu'];

$metod_mobil = "http://batigame.com/vipgateway/viprec.php";
$metod_kredi = "https://batihost.com/vipgateway/viprec.php";

$varmi = $db->query("SELECT * from authme WHERE username = '$oyuncu_adi'");
$varmi->execute();
$toplamveri = $varmi->rowCount();

if (!$toplamveri > 0) {
  header("location: $siteurl/hata-sayfalari/hata.php?hata_tipi=kullanici_yok");
  die();
}

if ($odeme_turu == 1) {
  $gonder = $metod_kredi;
} else {
  $gonder = $metod_mobil;
}

include("../logo.php");

include("../header.php");

?>


<body onload="document.postgonder.submit()">

  <div class="ortala">

    <br><br><br><br><br><br><br><br><br>
    <label style="color: white; font-size: 35px;">Ödeme sayfasına yönlendiriliyorsunuz..</label>
    <form name="postgonder" action="<?php echo $gonder ?>" method="post">
      <input type="hidden" name="amount" value="<?php echo $post_gelen_miktar ?>" />
      <?php
      if ($odeme_turu == 1) { ?>
        <input type="hidden" name="odemeturu" value="kredikarti" />
      <?php } ?>
      <input required type="hidden" name="oyuncu" value="<?php echo $oyuncu_adi ?>"></p>
      <input required type="hidden" name="odemeolduurl" value="<?php echo $siteurl ?>/odeme/odeme_basarili.php">
      <input required type="hidden" name="odemeolmadiurl" value="<?php echo $siteurl ?>/odeme/odeme_basarisiz.php">
      <input required type="hidden" name="vipname" value="kredi">
      <input required type="hidden" name="raporemail" value="<?php echo $batihost_email ?>">
      <input required type="hidden" name="onlyemail" value="<?php echo $batihost_email ?>">
      <input required type="hidden" name="posturl" value="<?php echo $siteurl ?>/odeme/krediver.php">
      <input required type="hidden" name="batihostid" value="<?php echo $batihost_id ?>">
    </form>

  </div>
  <br>
  <div class="loader"></div><br><br><br><br><br><br><br><br>
  <?php include("footer.php"); ?>
</body>

</html>