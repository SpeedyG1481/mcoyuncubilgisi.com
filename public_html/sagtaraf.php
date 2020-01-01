<?php

include("../ayar/ayarlar.php");
include("../ayar/MCStatus.php");

$sunucu = new MCServerStatus($ipadresi, 25565);
$online = $sunucu->online_players;
$max = $sunucu->max_players;

?>
<div class="kutucuk">
	<p class="tablo-baslik">SUNUCU BİLGİLERİ</p>
	<div class="sunucubilgi">
		<div class="baslik"><i class="fas fa-wifi fa-2x"></i></div>
		<div class="bilgi">
			<?php echo $ipadresi ?>
		</div>
		<br>
		<div class="baslik"><i class="fas fa-info-circle fa-2x"></i></div>
		<div class="bilgi">
			<?php echo $sunucusurum ?>
		</div>
		<br>
		<div class="baslik"><i class="fas fa-users fa-2x"></i></div>
		<div class="bilgi">
			<?php echo $online . "/" . $max ?>
		</div>
	</div>
</div>
<br>
<br>
<!-- Bağış Tablo -->

<div class="kutucuk">
	<p class="tablo-baslik">BAĞIŞÇILARIMIZ</p>
	<table class="cinereousTable">
		<colgroup>
			<col width="20%" />
			<col width="50%" />
			<col width="30%" />
		</colgroup>

		<tr>
			<td>#</td>
			<td>Oyuncu</td>
			<td>Miktar</td>
		</tr>
	</table>
	<?php
	$kredi_tablo = $db->query("SELECT * FROM kredi_yukleyenler ORDER BY id DESC LIMIT 5");
	$kredi_tablo->execute();
	if ($kredi_tablo->rowCount() != 0) {
		$dek = 0;
		foreach ($kredi_tablo as $tablo_oku) {
			$dek++;
			?>
			<table class="cinereousTable">
				<colgroup>
					<col width="20%" />
					<col width="50%" />
					<col width="30%" />
				</colgroup>

				<tr class="bir<?php echo $dek ?>">
					<td><img src="https://cravatar.eu/avatar/<?php echo $tablo_oku['k_adi'] ?>/32.png" /></td>
					<td><?php echo $tablo_oku['k_adi'] ?></td>
					<td><?php echo $tablo_oku['miktar'] ?> &#8378;</td>
				</tr>
			</table>
		<?php
	}
} else {
	echo "<p style='color: white; font-size: 17px; font-weight: bold;'>Tablo henüz boş..</p>";
}
?>

</div>

<!-- Kayıt Tablo -->
<br>
<br>


<div class="kutucuk">

	<p class="tablo-baslik">Kayit Olanlar</p>
	<table class="cinereousTable">
		<colgroup>
			<col width="30%" />
			<col width="70%" />
		</colgroup>

		<tr>
			<td>#</td>
			<td>Oyuncu</td>
		</tr>
	</table>

	<?php
	$kredi_tablo = $db->query("SELECT * FROM authme ORDER BY id DESC LIMIT 5");
	$kredi_tablo->execute();
	if ($kredi_tablo->rowCount() != 0) {
		$dek = 0;
		foreach ($kredi_tablo as $tablo_oku) {
			$dek++;
			?>
			<table class="cinereousTable">
				<colgroup>
					<col width="30%" />
					<col width="70%" />
				</colgroup>

				<tr class="bir<?php echo $dek ?>">
					<td><img src="https://cravatar.eu/avatar/<?php echo $tablo_oku['username'] ?>/32.png" /></td>
					<td><?php echo $tablo_oku['username'] ?></td>
				</tr>
			</table>
		<?php
	}
} else {
	echo 'Kredi yükleyen yok!';
}
?>
</div>