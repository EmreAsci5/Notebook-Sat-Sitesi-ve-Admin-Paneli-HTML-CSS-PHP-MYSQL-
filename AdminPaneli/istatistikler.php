<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
  header("location:adminGiris.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="istatistikler.css">
    <link rel="icon" sizes="16x16" href="resimler/control-panel.png">
</head>
<body>
  <div id="baslik">
<p id="baslikYazisi">Admin Paneli</p>
</div>
    <div id="solSekme">
      <div id="logoDiv">
        AdminEA
        <img src="resimler/<?=$_SESSION["resim"]?>" alt="">
        <div id="cevrimiciBlok">
        <div id="yesil"></div>
        <div id="cevrimici">Çevrimiçi</div>
        </div>
      </div>
      <div id="anaSayfa">
      <a href="AnaSayfa.php"><img src="resimler/home.png" alt=""><p id="anaSayfaYazisi">Ana Sayfa</p></a>
      </div>
      <div id="istatistikler">
       <a href="istatistikler.php"><img src="resimler/stats.png" alt=""><p id="istatistiklerSayfaYazisi">İstatistikler</p></a>
      </div>
      <div id="Ürünler">
        <a href="urunler.php"><img src="resimler/ürün.png" alt=""><p id="ürünlerYazisi">Ürünler</p></a>
      </div>
      <div id="kullanicilar">
        <a href="kullanicilar.php"><img src="resimler/icons8-people-30.png" alt=""><p id="kullanicilarYazisi">Kullanıcılar</p></a>
      </div>
      <div id="siparisler">
        <a href="siparisler.php"><img src="resimler/icons8-shopping-bag-50.png" alt=""><p id="siparislerYazisi">Siparişler</p></a>
      </div>
      <div id="cikis">
      <a href="cikis.php"><img src="resimler/icons8-log-out-32.png" alt=""><p id="cikisYazisi">Çıkış Yap</p> </a>
      </div>
    </div>
    <div id="anaEkran">
      <?php
      include("veritabani.php");
      $uyeler=$db->query("SELECT count(musteri_id) as kayitlar FROM kayit");
      $uye=$uyeler->fetch();
      ?>
       <div id="uyeSayisi">Üye Sayısı: <?=$uye["kayitlar"]?></div>
    </div>
</body>
</html>