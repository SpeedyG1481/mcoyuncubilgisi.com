<?php
include('./ayar/ayarlar.php');
include('head.php');

if (isset($_GET['turu'])) {
  $destek = $_GET['turu'];
}

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
    <p class="kayit-tazeust">DESTEK SİSTEMİ</p><br><br>
    <?php
    if (isset($_GET['turu'])) {
      if ($destek == "hilebug") {
        echo "

      <form class='destek' action='$siteurl/destek/destek_talebi.php' method='post'>
      <br>
      <br>
      <p class='tazedestek'>HİLE VE BUG BİLDİRİMİ  | Destek Bölümü</p>
      <br>
      <input type='hidden' name='formturu' value='hilebug'>
    <br>
    <br>
    <!-- Kullanıcı Adı -->
    <p class='taze'> KULLANICI ADI GİRİNİZ<br>
      <input required type='text' name='oyuncu' placeholder='Oyuncu adınızı giriniz...'></p>
    <br>
    <br>
    <!-- Email -->
    <p class='taze'> E-MAİL ADRESİNİZİ GİRİNİZ<br>
      <input required type='email' name='email' placeholder='E-Mail adresinizi giriniz...'></p>
      <br>
      <br>
      <!-- Mesaj -->
      <p class='taze'> MESAJ İÇERİĞİNİ GİRİNİZ<br>
        <textarea required maxlength='5000' rows='8' name='mesaj' placeholder='Bu alana hile ya da bug yapan kişininin kullanıcı adını yazmanız ve fotoğraf ile ispat göstermeniz gerekmektedir.
Ekstra söylemek istediklerinizi ekleyebilirsiniz. Fakat fotoğraf ve kullanıcı adı bulunmayan 
ticketler değerlendirmeye alınmaz. 
Geri bildirimi mail olarak alacaksınız...'></textarea></p>
    <br><button style='margin-top: 12px;' class='krediyuklebuton' type='submit'>Gönder</button>
    <br>
    <br>

    </form>";
      } else if ($destek == "sifreyenile") {

        echo " <form class='destek' action='$siteurl/destek/destek_talebi.php' method='post'>
<br>
<br>
<p class='tazedestek'>ŞİFRE YENİLEME | Destek Bölümü</p>
<br>
<input type='hidden' name='formturu' value='sifreyenile'>
<br>
<br>
<!-- Kullanıcı Adı -->
<p class='taze'> KULLANICI ADI GİRİNİZ<br>
<input required type='text' name='oyuncu' placeholder='Oyuncu adınızı giriniz...'></p>
<br>
<br>
<!-- Email -->
<p class='taze'> E-MAİL ADRESİNİZİ GİRİNİZ<br>
<input required type='email' name='email' placeholder='E-Mail adresinizi giriniz...'></p>
<br>
<br>

<!-- Eski Şifre -->
<p class='taze'> Eski Şifrenizi Giriniz<br>
<input required type='password' name='eskisifre' placeholder='Eski şifrenizi giriniz..'></p>
<br>
<br>

<!-- Yeni Şifre -->
<p class='taze'> Yeni Şifrenizi Giriniz<br>
<input required type='password' name='yenisifre' placeholder='Yeni şifrenizi giriniz..'></p>
<br>
<br>

<!-- Yeni Şifre Tekrar -->
<p class='taze'> Yeni Şifrenizi Tekrar Giriniz<br>
<input required type='password' name='yenisifretekrar' placeholder='Yeni şifrenizi tekrar giriniz..'></p>
<br>
<br>
<br><button style='margin-top: 12px;' class='krediyuklebuton' type='submit'>Şifre Değiştir</button>
    <br>
    <br>
</form>";
      } else if ($destek == "odemesorunlari") {

        echo " <form class='destek' action='$siteurl/destek/destek_talebi.php' method='post'>
<br>
<br>
<p class='tazedestek'>ÖDEME SORUNLARI | Destek Bölümü</p>
<br>
<input type='hidden' name='formturu' value='odemesorunlari'>
<br>
<br>
<!-- Kullanıcı Adı -->
<p class='taze'> KULLANICI ADI GİRİNİZ<br>
<input required type='text' name='oyuncu' placeholder='Oyuncu adınızı giriniz...'></p>
<br>
<br>
<!-- Email -->
<p class='taze'> E-MAİL ADRESİNİZİ GİRİNİZ<br>
<input required type='email' name='email' placeholder='E-Mail adresinizi giriniz...'></p>
<br>
<br>

<!-- Ödeme Tarihi -->
<p class='taze'>ÖdemE YAPTIĞINIZ TARİH<br>
<input required type='text' name='odemetarihi' placeholder='Ödeme yaptığınız tarihi giriniz...'></p>
<br>
<br>

<!-- Miktar -->
<p class='taze'>ÖdemE YAPTIĞINIZ MİKTAR<br>
<input required type='number' name='odememiktari' placeholder='Ödeme yaptığınız miktarı giriniz...'></p>
<br>
<br>
<!-- Mesaj -->
<p class='taze'>EKLEMEK İSTEDİKLERİNİZ<br>
  <textarea required maxlength='5000' rows='8' name='mesaj' placeholder='Eklemek istediklerinizi giriniz...'></textarea></p>

<br><button style='margin-top: 12px;' class='krediyuklebuton' type='submit'>Gönder</button>
<br>
<br>
</form>";
      } else if ($destek == "emailguncelle") {
        echo " <form class='destek' action='$siteurl/destek/destek_talebi.php' method='post'>
<br>
<br>
<p class='tazedestek'>E-MAİL GÜNCELLE | Destek Bölümü</p>
<br>
<input type='hidden' name='formturu' value='mailguncelle'>
<br>
<br>
<!-- Kullanıcı Adı -->
<p class='taze'> KULLANICI ADI GİRİNİZ<br>
<input required type='text' name='oyuncu' placeholder='Oyuncu adınızı giriniz...'></p>
<br>
<br>
<!-- Eski E-Mail -->
<p class='taze'>ESKİ E-MAİL ADRESİNİZİ GİRİNİZ<br>
<input required type='email' name='email' placeholder='Eski e-mail adresinizi giriniz...'></p>
<br>
<br>

<!-- Yeni E-Mail -->
<p class='taze'>YENİ E-MAİL ADRESİNİZİ GİRİNİZ<br>
<input required type='email' name='yeniemail' placeholder='Yeni e-mail adresinizi giriniz...'></p>
<br>
<br>

<!-- Şifre -->
<p class='taze'>ŞİFRENİZİ GİRİNİZ<br>
<input required type='password' name='sifre' placeholder='Şifrenizi giriniz..'></p>
<br>
<br>
<br><button style='margin-top: 12px;' class='krediyuklebuton' type='submit'>Gönder</button>
<br>
<br>
</form>";
      } else {
        header("location: $siteurl/destek.php");
      }
    } else {
      echo "
    <div class='destek'>
      <br>
      <br>
      <br>
      <p class='tazedestek'>Destek almak İSTEDİĞİNİZ bölümü seçiniz..</p>
      <br>
      <select name='forma' onchange='javascript:hareketeGecir(this)'>
        <option class='gizle' disabled selected>Seçim yapınız..</option>
        <option value='sifreyenile'>Şifremi Yenile</option>
        <option value='hilebug'>Hile/Bug Bildirimi</option>
        <option value='odemesorunlari'>Ödeme Sorunları</option>
        <option value='emailguncelle'>E-Mail Güncelle</option>
      </select>

      <br>
      <br>
      <div class='tazeaciklama'>
        <br>
        <br>
        <p>Lütfen destek almak istediğiniz bölümü seçiniz. Daha sonrasında gerekli bilgi alanlarını doldurunuz ve formu gönderiniz.
          Yönetim ve destek ekibi en geç 7 gün içerisinde(yoğunluğa bağlı olarak) gerekli işlemleri ve geri dönüşleri sağlayacaklardır.
          Eğer daha hızlı destek almak istiyorsanız discord sunucumuza girebilirsiniz.
          <br>
          <br>

          <a href='https://discord.gg/g4DNmqy'><i class='fab fa-discord fa-3x'></i></a>
          <br>
          <br>
      </div>
    </div>


    ";
    } ?>
    <br>
    <br>
  </div>
  <br>
  <?php include("footer.php");

  echo "<script type='text/javascript'>
    function hareketeGecir(deger) {
      window.location = '$siteurl/destek.php?turu=' + deger.value;
    }
  </script>";
  ?>
</body>

</html>