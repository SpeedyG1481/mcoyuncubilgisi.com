<?php
include('./ayar/ayarlar.php');
include('head.php'); 

?>

<body>
  <br>
  <?php include("logo.php") ?>
  <br>
  <?php include("header.php") ?>
  <br>
  <div class="ortala">
    <br>
    <br>
    <p class="tazeust">KREDİ YÜKLEME SİSTEMİ</p><br><br>
    <form name="gonder" class="kredi-yukle" action="<?php echo $siteurl ?>/odeme/post_kredi_yukle.php" method="post">
      <br>
      <p class="taze">Ödeme türünü seçiniz:<br>
        <select name="odemeturu">
          <option value='2'>Mobil Ödeme</option>
          <option value='1'>Kredi Kartı</option>
        </select></p>
      <br>
      <p class="taze">Miktar giriniz:<br>
        <input style="margin-top: 4px; min-width: 218px;" min="1" max="250" type="number" name="amount" required placeholder="Yüklemek istediğiniz miktarı giriniz.." /></p>
      <br>
      <p class="taze"> Kullanıcı Adınızı Giriniz:<br>
        <input required type="text" id="oyuncuadi" name="oyuncu" placeholder="Oyuncu adınızı giriniz.."></p>
        <br>
      <input required type="checkbox" id="test1" />
      <label class="taze" for="test1">
        <ac id="modalButonu">Sözleşmeyi okudum ve kabul ediyorum!</ac>
      </label>
      <br><button name="kredi-yukle" style="margin-top: 12px;" class="krediyuklebuton" type="submit">Ödeme Yap</button>
      <br>
      <br>
    </form>
    <br>
    <br>
  </div>
  <br>
  <?php include("footer.php") ?>


  <?php include("sozlesme.php") ?>

  <script>
    var modal = document.getElementById("sozlesme");

    $(document).ready(function() {
      $("ac").click(function() {
        modal.style.display = "block";
      });
    });


    $(document).ready(function() {
      $("kapat").click(function() {
        modal.style.display = "none";
      });
    });
  </script>
  <br>

</body>

</html>