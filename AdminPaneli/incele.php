<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
  header("location:adminGiris.php");
}
include("veritabani.php");
$id=$_GET["musteriid"];
$bilgiler2=$db->query("SELECT * FROM adres_tanimlari WHERE musteri_id=$id");
$bilgi2=$bilgiler2->fetch();
$bilgiler=$db->query("SELECT * FROM kayit WHERE musteri_id=$id");
$bilgi=$bilgiler->fetch();
if(isset($_GET["id"])){
 $musteriid=$_GET["id"];

?>
<div id="formSayfasi">
<form action="kullaniciDuzenle.php?id=<?=$bilgi["musteri_id"]?>" method="POST" id="duzenleForm">
Ad: <input type="text" value="<?=$bilgi["musteri_ad"]?>" name="ad">
Soyad: <input type="text" value="<?=$bilgi["musteri_soyad"]?>" name="soyad">
Şifre: <input type="text" value="<?=$bilgi["musteri_sifre"]?>" name="sifre">
Email: <input type="text" value="<?=$bilgi["musteri_email"]?>" name="email">
Telefon: <input type="text" value="<?=$bilgi["musteri_tel"]?>" name="telefon">
Adres Tanımı: <input type="text" value="<?php if(isset($bilgi2["adres_tanimi"])) echo $bilgi2["adres_tanimi"];else echo "Boş";?>" name="adresTanimi">
Şehir: <input type="text" value="<?php if(isset($bilgi2["musteri_sehir"])) echo $bilgi2["musteri_sehir"];else echo "Boş";?>" name="sehir">
İlçe: <input type="text" value="<?php if(isset($bilgi2["musteri_ilce"])) echo $bilgi2["musteri_ilce"];else echo "Boş";?>" name="ilce">
Adres: <textarea name="adres" id="" cols="30" rows="6"><?php if(isset($bilgi2["musteri_adres"])) echo $bilgi2["musteri_adres"];else echo "Boş";?></textarea>
<input type="submit" value="Kaydet" id="buton">
<a href="incele.php?musteriid=<?=$bilgi["musteri_id"]?>"><input type="button" value="Vazgeç"></a>

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
    <link rel="stylesheet" href="incele.css">
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
      <div id="kisiselBilgiler">
        <div id="bilgiler">
        <h1>Kişisel Bilgileri</h1>
        <div id="ad"><b>Ad: </b><?=$bilgi["musteri_ad"]?></div>
        <div id="soyad"><b>Soyad: </b><?=$bilgi["musteri_soyad"]?></div>
        <div id="sifre"><b>Şifre: </b><?=$bilgi["musteri_sifre"]?></div>
        <div id="email"><b>Email: </b><?=$bilgi["musteri_email"]?></div>
        <div id="telefon"><b>Telefon: </b><?=$bilgi["musteri_tel"]?></div>
        </div>
      </div>
      <div id="adresBilgileri">
        <?php
        ?>
        <div id="bilgiler2">
          <h1>Adres Bilgileri</h1>
          <div id="adresTanimi"><b>Adres Tanımı: </b><?php if(isset($bilgi2["adres_tanimi"])) echo $bilgi2["adres_tanimi"];else echo "Boş";?></div>
          <div id="sehir"><b>Şehir: </b><?php if(isset($bilgi2["musteri_sehir"])) echo $bilgi2["musteri_sehir"];else echo "Boş";?></div>
          <div id="ilce"><b>İlçe: </b><?php if(isset($bilgi2["musteri_ilce"])) echo $bilgi2["musteri_ilce"];else echo "Boş";?></div>
          <div id="adres"><b>Adres: </b><?php if(isset($bilgi2["musteri_adres"])) echo $bilgi2["musteri_adres"];else echo "Boş";?></div>
        </div>
      </div>
      <div id="duzenle"><a href="incele.php?musteriid=<?=$bilgi["musteri_id"]?>&id=<?=$bilgi["musteri_id"]?>">Bilgileri Düzenle</a></div>
    </div>
</body>
</html>