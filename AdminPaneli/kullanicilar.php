<?php
include("veritabani.php");
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
if(isset($_GET["musteriid"])){
  $musteri_id=$_GET["musteriid"];
  ?>
  <div id="formSayfasi2">
    <form action="kontrol.php?musteriid=<?=$musteri_id?>" method="POST" id="duzenleForm2">
    Silmek istediğinize emin misiniz?
    <input type="submit" value="Evet">
    <a href="kullanicilar.php"><input type="button" value="Hayır"></a>
  </form>
  </div>
  <?php
}
if(isset($_GET["a"])){
  ?>
  <div id="formSayfasi">
<form action="kullaniciEkle.php" method="POST" id="duzenleForm">
Ad: <input type="text" name="ad">
Soyad: <input type="text"  name="soyad">
Şifre: <input type="text"  name="sifre">
Email: <input type="text"  name="email">
Telefon: <input type="text"  name="telefon">
Adres Tanımı: <input type="text"  name="adresTanimi">
Şehir: <input type="text"  name="sehir">
İlçe: <input type="text"  name="ilce">
Adres: <textarea name="adres" id="" cols="30" rows="6"></textarea>
<input type="submit" value="Ekle" id="buton">
<a href="kullanicilar.php"><input type="button" value="Vazgeç"></a>

</form>


</div>


<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="kullanicilar.css">
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
         <div id="kullanicilarAlani">
          <?php
          include("veritabani.php");
          $kullanicilar=$db->query("SELECT * FROM kayit");

          while($kullanici=$kullanicilar->fetch()){
          ?>
              <div id="kullanici">
                <div id="musteriAd"><?=$kullanici["musteri_ad"]?></div>
                <div id="musteriSoyad"><?=$kullanici["musteri_soyad"]?></div>
                <div id="musteriEmail"><?=$kullanici["musteri_email"]?></div>
                <div id="blok">
                  <div id="incele"><a href="incele.php?musteriid=<?=$kullanici["musteri_id"]?>"> İncele</a></div>
                  <div id="sil"><a href="kullanicilar.php?musteriid=<?=$kullanici["musteri_id"]?>"> Sil</a></div>
                </div>
                
              </div>
              <?php } ?>


              
         </div>
         <div id="kullaniciekle"><a href="kullanicilar.php?a=true"> Kullanıcı Ekle</a></div>
    </div>
</body>
</html>