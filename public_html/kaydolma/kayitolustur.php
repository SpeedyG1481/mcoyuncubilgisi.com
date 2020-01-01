<?php
include('../ayar/ayarlar.php');
include('../head.php');

?>

<body>
  <br>
  <?php include("../logo.php") ?>
  <br>
  <?php include("../header.php") ?>
  <br>
  <div class="ortala">
    <br>
    <br>
    <p class="kayit-tazeust">KAYIT SİSTEMİ</p><br><br>
    <form name="gonder" class="kayit-ol" action="<?php echo $siteurl ?>/kaydolma/kaydol_post.php" method="post">
      <br>
      <br>
      <!-- Kullanıcı Adı -->
      <p class="taze"> KULLANICI ADI GİRİNİZ<br>
        <input required type="text" name="oyuncu" placeholder="Bir kullanıcı adı giriniz..."></p>
      <br>
      <br>
      <!-- Email -->
      <p class="taze"> E-MAİL ADRESİ GİRİNİZ<br>
        <input required type="email" name="email" placeholder="E-Mail adresinizi giriniz.."></p>
      <br>
      <br>
      <!-- Şifre -->
      <p class="taze"> Şİfre GİRİNİZ:<br>
        <input required type="password" name="sifre" placeholder="Şifre giriniz.."></p>
      <br>
      <br>
      <!-- Tekrar Şifre -->
      <p class="taze"> Tekrar Şİfre GİRİNİZ:<br>
        <input required type="password" name="tekrarsifre" placeholder="Tekrar şifrenizi giriniz.."></p>
      <br>
      <br>


      <input required type="checkbox" id="test1" />
      <label class="taze" for="test1">
        <ac id="modalButonu">Kayıt sözleşmesini odukum ve kabul ediyorum!</ac>
      </label>
      <br><button name="kredi-yukle" style="margin-top: 12px;" class="krediyuklebuton" type="submit">Kayıt Ol</button>
      <br>
      <br>

    </form>
    <br>
    <br>
  </div>
  <br>
  <?php include("../footer.php") ?>


  <?php include("kayit_sozlesme.php") ?>

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
  <br>

</body>

</html>