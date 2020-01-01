<?php
include('./ayar/ayarlar.php');

include('head.php');

if (isset($_GET['siralama'])) {
	$sirala = $_GET["siralama"];
}
?>

<body>

	<br>
	<?php include("./logo.php") ?>
	<br>
	<?php include("header.php") ?>
	<br>
	<br>

	<?php

	echo "
	<div class='ortala'>
	<div class='siralama_arkaplan'>
	<!-- ICERIK -->
	<div class='baslik'>
	<!-- IC 1 -->
	<ul>
	<!-- IC 2 -->

	<li class='dusur'>
  Vote
  	<div class='dusur-icerik'>
  		<a href='$siteurl/sw.php?siralama=vote_genel'>Tüm Zamanlar</a>
 	 	<a href='$siteurl/sw.php?siralama=vote_aylik'>Aylık</a>
 	 </div>
	</li>
	<li class='normal'><a href='$siteurl/sw.php?siralama=uzaklastirma'> Uzaklaştırma Alanlar</a></li>
	<li class='dusur'>
  UltraOP
  	<div class='dusur-icerik'>
  		<a href='$siteurl/sw.php?siralama=adaleveli_uop'>Ada Leveli</a>
		  <a href='$siteurl/sw.php?siralama=zenginlik_uop'>Zenginlik</a>
		  <a href='$siteurl/sw.php?siralama=mob_uop'>Mob Öldürme</a>
		  <a href='$siteurl/sw.php?siralama=kill_uop'>Öldürme</a>
		  <a href='$siteurl/sw.php?siralama=eod_uop'>Oynanan Süre</a>
 	 </div>
	</li>

	<br>
	<li class='dusur'>
  Normal
  	<div class='dusur-icerik'>
  		<a href='$siteurl/sw.php?siralama=adaleveli_normal'>Ada Leveli</a>
		  <a href='$siteurl/sw.php?siralama=zenginlik_normal'>Zenginlik</a>
		  <a href='$siteurl/sw.php?siralama=mob_normal'>Mob Öldürme</a>
		  <a href='$siteurl/sw.php?siralama=kill_normal'>Öldürme</a>
		  <a href='$siteurl/sw.php?siralama=eod_normal'>Oynanan Süre</a>
 	 </div>
	</li>
 <br>
	<li class='dusur'>
  Zor
  	<div class='dusur-icerik'>
  		<a href='$siteurl/sw.php?siralama=adaleveli_zor'>Ada Leveli</a>
		  <a href='$siteurl/sw.php?siralama=zenginlik_zor'>Zenginlik</a>
		  <a href='$siteurl/sw.php?siralama=mob_zor'>Mob Öldürme</a>
		  <a href='$siteurl/sw.php?siralama=kill_zor'>Öldürme</a>
		  <a href='$siteurl/sw.php?siralama=eod_zor'>Oynanan Süre</a>
 	 </div>
	</li>

<!-- IC 2 -->
</ul>
<!-- IC 1 -->
</div>
<!-- ICERIK -->
	</div>
		<br>
		<br>
		<div class='siralama_orta'>
		"; ?>
	<?php
	if (isset($_GET['siralama'])) {
		if ($sirala == "uzaklastirma") {

			$tablo = $db->query("SELECT * FROM Punishments ORDER BY id DESC LIMIT 100");
			$tablo->execute();
			$tek = 0;
			if ($tablo->rowCount() != 0) {
				foreach ($tablo as $tablo_oku) {
					?>
					<?php
					if ($tek == 0) {
						$tek++;

						echo "
					<table class='cinereousTable'>
					<colgroup>
					<col width='5%' />
					<col width='15%' />
					<col width='15%' />
					<col width='65%' />
				</colgroup>

				<tr>
				<td>#</td>
				<td>Oyuncu</td>
				<td>Uzaklaştıran</td>
				<td>Sebep</td>
			</tr>
				</table>
			
				";
					}
					echo "


					<table class='cinereousTable'>
						<colgroup>
						<col width='5%' />
						<col width='15%' />
						<col width='15%' />
						<col width='65%' />
						</colgroup>

						<tr>
							<td><img src='https://cravatar.eu/avatar/$tablo_oku[name]/32.png'/></td>
							<td>$tablo_oku[name]</td>
							<td>$tablo_oku[operator]</td>
							<td style='max-width='50px''>$tablo_oku[reason]</td>
						</tr>
					</table>
					" ?>
				<?php
			}
		} else {
			echo '<p style="text-align:center; color: white; font-size=35px; font-family: LeviBrush; font-weight: bold;">Henüz veri oluşmamış...</p><br>';
		}
	} else if ($sirala == "vote_genel") {

		$tablo = $db->query("SELECT * FROM GALTotals ORDER BY votes DESC LIMIT 100");
		$tablo->execute();
		if ($tablo->rowCount() != 0) {
			$tek = 0;
			foreach ($tablo as $tablo_oku) {
				?>
					<?php

					if ($tek == 0) {
						$tek++;

						echo "
				<table class='cinereousTable'>
				<colgroup>
				<col width='8%' />
				<col width='22%' />
				<col width='70%' />
			</colgroup>

			<tr>
			<td>#</td>
			<td>Oyuncu</td>
			<td>Toplam Oy</td>
		</tr>
			</table>
		
			";
					}
					echo "
				<table class='cinereousTable'>
					<colgroup>
					<col width='8%' />
					<col width='22%' />
					<col width='70%' />
					</colgroup>

					<tr>
						<td><img src='https://cravatar.eu/avatar/$tablo_oku[IGN]/32.png'/></td>
						<td>$tablo_oku[IGN]</td>
						<td>$tablo_oku[votes] OY</td>
					</tr>
				</table>
				" ?>
				<?php
			}
		} else {
			echo '<p style="text-align:center; color: white; font-size=35px; font-family: LeviBrush; font-weight: bold;">Henüz veri oluşmamış...</p><br>';
		}
	}else if($sirala == "vote_aylik"){
		$montadi = "month";
		$buay = date("n");

		$tablo = $db->query("SELECT * FROM normalsb_leaderheadsplayersdata_monthly WHERE (stat_type = 'gal-votes' AND $montadi = '$buay')  ORDER BY stat_value DESC LIMIT 100");
		$tablo->execute();
		if ($tablo->rowCount() != 0) {
			$tek = 0;
			foreach ($tablo as $tablo_oku) {
				$tablo2 = $db->query("SELECT * FROM leaderheadsplayers WHERE player_id = '$tablo_oku[player_id]' LIMIT 1");
				$tablo2->execute();
				foreach ($tablo2 as $tabloic) {

					?>
						<?php

						if ($tek == 0) {
							$tek++;

							echo "
				<table class='cinereousTable'>
				<colgroup>
				<col width='10%' />
				<col width='19%' />
				<col width='46%' />
				<col width='20%' />
			</colgroup>

			<tr>
			<td>#</td>
			<td>Oyuncu</td>
			<td>Yapılan Oylama Sayısı</td>
			<td>Son Giriş</td>
		</tr>
			</table>
		
			";
						}
						echo "
				<table class='cinereousTable'>
					<colgroup>
					<col width='10%' />
					<col width='19%' />
					<col width='46%' />
					<col width='20%' />
					</colgroup>

					<tr>
						<td><img src='https://cravatar.eu/avatar/$tabloic[name]/32.png'/></td>
						<td>$tabloic[name]</td>
						<td>$tablo_oku[stat_value] OY</td>
						<td>$tabloic[last_join]</td>
					</tr>
				</table>
				" ?>
					<?php

				}
			}
		} else {
			echo '<p style="text-align:center; color: white; font-size=35px; font-family: LeviBrush; font-weight: bold;">Henüz veri oluşmamış...</p><br>';
		}
	}else if ($sirala == "adaleveli_normal") {
		$montadi = "month";
		$buay = date("n");

		$tablo = $db->query("SELECT * FROM normalsb_leaderheadsplayersdata_monthly WHERE (stat_type = 'asb-level' AND $montadi = '$buay')  ORDER BY stat_value DESC LIMIT 100");
		$tablo->execute();
		if ($tablo->rowCount() != 0) {
			$tek = 0;
			foreach ($tablo as $tablo_oku) {
				$tablo2 = $db->query("SELECT * FROM leaderheadsplayers WHERE player_id = '$tablo_oku[player_id]' LIMIT 1");
				$tablo2->execute();
				foreach ($tablo2 as $tabloic) {

					?>
						<?php

						if ($tek == 0) {
							$tek++;

							echo "
				<table class='cinereousTable'>
				<colgroup>
				<col width='10%' />
				<col width='19%' />
				<col width='46%' />
				<col width='20%' />
			</colgroup>

			<tr>
			<td>#</td>
			<td>Oyuncu</td>
			<td>Ada Leveli</td>
			<td>Son Giriş</td>
		</tr>
			</table>
		
			";
						}
						echo "
				<table class='cinereousTable'>
					<colgroup>
					<col width='10%' />
					<col width='19%' />
					<col width='46%' />
					<col width='20%' />
					</colgroup>

					<tr>
						<td><img src='https://cravatar.eu/avatar/$tabloic[name]/32.png'/></td>
						<td>$tabloic[name]</td>
						<td>$tablo_oku[stat_value] Level</td>
						<td>$tabloic[last_join]</td>
					</tr>
				</table>
				" ?>
					<?php

				}
			}
		} else {
			echo '<p style="text-align:center; color: white; font-size=35px; font-family: LeviBrush; font-weight: bold;">Henüz veri oluşmamış...</p><br>';
		}
	} else if ($sirala == "zenginlik_normal") {
		$montadi = "month";
		$buay = date("n");

		$tablo = $db->query("SELECT * FROM normalsb_leaderheadsplayersdata_monthly WHERE (stat_type = 'balance' AND $montadi = '$buay')  ORDER BY stat_value DESC LIMIT 100");
		$tablo->execute();
		if ($tablo->rowCount() != 0) {
			$tek = 0;
			foreach ($tablo as $tablo_oku) {
				$tablo2 = $db->query("SELECT * FROM leaderheadsplayers WHERE player_id = '$tablo_oku[player_id]' LIMIT 1");
				$tablo2->execute();
				foreach ($tablo2 as $tabloic) {

					?>
						<?php

						if ($tek == 0) {
							$tek++;

							echo "
				<table class='cinereousTable'>
				<colgroup>
				<col width='10%' />
				<col width='19%' />
				<col width='46%' />
				<col width='20%' />
			</colgroup>

			<tr>
			<td>#</td>
			<td>Oyuncu</td>
			<td>Toplam Bakiyesi</td>
			<td>Son Giriş</td>
		</tr>
			</table>
		
			";
						}
						echo "
				<table class='cinereousTable'>
					<colgroup>
					<col width='10%' />
					<col width='19%' />
					<col width='46%' />
					<col width='20%' />
					</colgroup>

					<tr>
						<td><img src='https://cravatar.eu/avatar/$tabloic[name]/32.png'/></td>
						<td>$tabloic[name]</td>
						<td>$tablo_oku[stat_value] <i class='fas fa-lira-sign'></i></td>
						<td>$tabloic[last_join]</td>
					</tr>
				</table>
				" ?>
					<?php

				}
			}
		} else {
			echo '<p style="text-align:center; color: white; font-size=35px; font-family: LeviBrush; font-weight: bold;">Henüz veri oluşmamış...</p><br>';
		}
	} else if ($sirala == "mob_normal") {
		$montadi = "month";
		$buay = date("n");

		$tablo = $db->query("SELECT * FROM normalsb_leaderheadsplayersdata_monthly WHERE (stat_type = 'mobkills' AND $montadi = '$buay')  ORDER BY stat_value DESC LIMIT 100");
		$tablo->execute();
		if ($tablo->rowCount() != 0) {
			$tek = 0;
			foreach ($tablo as $tablo_oku) {
				$tablo2 = $db->query("SELECT * FROM leaderheadsplayers WHERE player_id = '$tablo_oku[player_id]' LIMIT 1");
				$tablo2->execute();
				foreach ($tablo2 as $tabloic) {

					?>
						<?php

						if ($tek == 0) {
							$tek++;

							echo "
				<table class='cinereousTable'>
				<colgroup>
				<col width='10%' />
				<col width='19%' />
				<col width='46%' />
				<col width='20%' />
			</colgroup>

			<tr>
			<td>#</td>
			<td>Oyuncu</td>
			<td>Toplam Öldürülen Mob</td>
			<td>Son Giriş</td>
		</tr>
			</table>
		
			";
						}
						echo "
				<table class='cinereousTable'>
					<colgroup>
					<col width='10%' />
					<col width='19%' />
					<col width='46%' />
					<col width='20%' />
					</colgroup>

					<tr>
						<td><img src='https://cravatar.eu/avatar/$tabloic[name]/32.png'/></td>
						<td>$tabloic[name]</td>
						<td>$tablo_oku[stat_value]</td>
						<td>$tabloic[last_join]</td>
					</tr>
				</table>
				" ?>
					<?php

				}
			}
		} else {
			echo '<p style="text-align:center; color: white; font-size=35px; font-family: LeviBrush; font-weight: bold;">Henüz veri oluşmamış...</p><br>';
		}
	} else if ($sirala == "kill_normal") {
		$montadi = "month";
		$buay = date("n");

		$tablo = $db->query("SELECT * FROM normalsb_leaderheadsplayersdata_monthly WHERE (stat_type = 'kills' AND $montadi = '$buay')  ORDER BY stat_value DESC LIMIT 100");
		$tablo->execute();
		if ($tablo->rowCount() != 0) {
			$tek = 0;
			foreach ($tablo as $tablo_oku) {
				$tablo2 = $db->query("SELECT * FROM leaderheadsplayers WHERE player_id = '$tablo_oku[player_id]' LIMIT 1");
				$tablo2->execute();
				foreach ($tablo2 as $tabloic) {

					?>
						<?php

						if ($tek == 0) {
							$tek++;

							echo "
				<table class='cinereousTable'>
				<colgroup>
				<col width='10%' />
				<col width='19%' />
				<col width='46%' />
				<col width='20%' />
			</colgroup>

			<tr>
			<td>#</td>
			<td>Oyuncu</td>
			<td>Toplam Katledilen Oyuncu</td>
			<td>Son Giriş</td>
		</tr>
			</table>
		
			";
						}
						echo "
				<table class='cinereousTable'>
					<colgroup>
					<col width='10%' />
					<col width='19%' />
					<col width='46%' />
					<col width='20%' />
					</colgroup>

					<tr>
						<td><img src='https://cravatar.eu/avatar/$tabloic[name]/32.png'/></td>
						<td>$tabloic[name]</td>
						<td>$tablo_oku[stat_value]</td>
						<td>$tabloic[last_join]</td>
					</tr>
				</table>
				" ?>
					<?php

				}
			}
		} else {
			echo '<p style="text-align:center; color: white; font-size=35px; font-family: LeviBrush; font-weight: bold;">Henüz veri oluşmamış...</p><br>';
		}
	} else if ($sirala == "eod_normal") {
		$montadi = "month";
		$buay = date("n");

		$tablo = $db->query("SELECT * FROM normalsb_leaderheadsplayersdata_monthly WHERE (stat_type = 'played' AND $montadi = '$buay')  ORDER BY stat_value DESC LIMIT 100");
		$tablo->execute();
		if ($tablo->rowCount() != 0) {
			$tek = 0;
			foreach ($tablo as $tablo_oku) {
				$tablo2 = $db->query("SELECT * FROM leaderheadsplayers WHERE player_id = '$tablo_oku[player_id]' LIMIT 1");
				$tablo2->execute();
				foreach ($tablo2 as $tabloic) {

					?>
						<?php

						if ($tek == 0) {
							$tek++;

							echo "
				<table class='cinereousTable'>
				<colgroup>
				<col width='10%' />
				<col width='19%' />
				<col width='46%' />
				<col width='20%' />
			</colgroup>

			<tr>
			<td>#</td>
			<td>Oyuncu</td>
			<td>Toplam Aktif Olunan Süre</td>
			<td>Son Giriş</td>
		</tr>
			</table>
		
			";
						}
						echo "
				<table class='cinereousTable'>
					<colgroup>
					<col width='10%' />
					<col width='19%' />
					<col width='46%' />
					<col width='20%' />
					</colgroup>

					<tr>
						<td><img src='https://cravatar.eu/avatar/$tabloic[name]/32.png'/></td>
						<td>$tabloic[name]</td>
						<td>$tablo_oku[stat_value] Saat</td>
						<td>$tabloic[last_join]</td>
					</tr>
				</table>
				" ?>
					<?php

				}
			}
		} else {
			echo '<p style="text-align:center; color: white; font-size:35px; font-family: Monitiva; font-weight: bold;">HENÜZ SIRALAMA VERİSİ OLUŞMAMIŞ...</p><br>';
		}
	} else {
		echo '<p style="text-align:center; color: white; font-size:35px; font-family: Monitiva; font-weight: bold;">SANIRIM BU BÖLME ŞUAN AKTİF DEĞİL...</p><br>';
	}
} else {
	header("location:?siralama=vote");
}
?>
	<br>
	</div>
	</div>
	</div>

	<br>
	<?php
	include("footer.php") ?>
</body>

</html>