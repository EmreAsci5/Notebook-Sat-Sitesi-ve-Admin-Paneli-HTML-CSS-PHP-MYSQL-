<?php
include("veritabani.php");
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
if(isset($_GET["id"])){
  $urun_id=$_GET["id"];
  ?>
  <div id="formSayfasi2">
    <form action="kontrol2.php?sil_id=<?=$urun_id?>" method="POST" id="duzenleForm2">
    Silmek istediğinize emin misiniz? 
    <input type="submit" value="Evet">
    <a href="urunler.php"><input type="button" value="Hayır"></a>
  </form>
  </div>
  <?php
  
  
}
if(isset($_GET["duzenle"])){
  $id=$_GET["duzenle"];
  $kategori=$_GET["kategori"];
  if($kategori==1 || $kategori==2 || $kategori==3){
  
  ?>

  <div id="formSayfasi">
    <?php
    $duzenle=$db->query("SELECT * FROM urunler 
    INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
    INNER JOIN fiyatlar ON fiyatlar.urun_id=urunler.urun_id
    INNER JOIN kategori ON kategori.kategori_id=urunler.kategori_id
    INNER JOIN ozellikdetay ON ozellikdetay.urun_id=urunler.urun_id
    INNER JOIN model ON urunler.model_id=model.model_id
    WHERE urunler.urun_id=$id");
    $duzen=$duzenle->fetch();
    $islemciler=$db->query("SELECT ozellik_detayi as islemci FROM ozellikdetay where ozellik_id=1 AND urun_id=$id");
    $islemci2=$islemciler->fetch();
    $ekranKartlari=$db->query("SELECT ozellik_detayi as ekranKarti FROM ozellikdetay where ozellik_id=2 AND urun_id=$id");
    $ekranKarti2=$ekranKartlari->fetch();
    $ekranlar=$db->query("SELECT ozellik_detayi as ekran FROM ozellikdetay where ozellik_id=3 AND urun_id=$id");
    $ekran2=$ekranlar->fetch();
    $ramlar=$db->query("SELECT ozellik_detayi as ram FROM ozellikdetay where ozellik_id=4 AND urun_id=$id");
    $ram2=$ramlar->fetch();
    $ssdler=$db->query("SELECT ozellik_detayi as ssd FROM ozellikdetay where ozellik_id=5 AND urun_id=$id");
    $ssd2=$ssdler->fetch();
    $isletimler=$db->query("SELECT ozellik_detayi as isletim FROM ozellikdetay where ozellik_id=6 AND urun_id=$id");
    $isletim2=$isletimler->fetch();
    ?>
<form action="duzenle1.php?guncelle=<?=$id?>" method="POST" id="duzenleForm">
kategori: <select name="kategoriler">
    <?php
    $turler=$db->query("SELECT * FROM kategori where anaKategori_id=1");
    while($tur=$turler->fetch()){
    ?>
    <option value="<?php echo $tur["kategori_id"]?>" <?php
    if($tur["kategori_id"]==$kategori) echo "selected";
    ?>><?php echo$tur["kategori_ad"]?></option>
    <?php } ?>
    </select>
    
    Model Ad: <input type='text' name="modelAd" value="<?=$duzen["model_ad"]?>">
    Model Seri: <input type='text' name="modelSeri" value="<?=$duzen["model_seri"]?>">
    İşlemci: <input type='text' name="islemci" value="<?=$islemci2["islemci"]?>">
    Ekran Kartı: <input type='text' name="ekranKarti" value="<?=$ekranKarti2["ekranKarti"]?>">
    Ekran: <input type='text' name="ekran" value="<?=$ekran2["ekran"]?>">
    Ram: <input type='text' name="ram" value="<?=$ram2["ram"]?>">
    SSD: <input type='text' name="ssd" value="<?=$ssd2["ssd"]?>">
    İşletim Sistemi: <input type='text' name="isletim" value="<?=$isletim2["isletim"]?>">
    Alış Fiyatı: <input type='text' name="alisFiyati" value="<?=$duzen["alis_fiyati"]?>">
    Satış Fiyatı: <input type='text' name="satisFiyati" value="<?=$duzen["satis_fiyati"]?>">
    Resim url: <input type='text' name="resim" value="<?=$duzen["katalog_resmi"]?>">
    <input type="submit" value="Düzenle" id="buton">
    <a href="urunler.php"><input type="button" value="Vazgeç"></a>
</form>
</div>

  <?php
  
       
      }
      else if($kategori==4 || $kategori==5 || $kategori==7){
            ?>
                 <div id="formSayfasi">
    <?php
    $duzenle2=$db->query("SELECT * FROM urunler 
    INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
    INNER JOIN fiyatlar ON fiyatlar.urun_id=urunler.urun_id
    INNER JOIN kategori ON kategori.kategori_id=urunler.kategori_id
    INNER JOIN ozellikdetay ON ozellikdetay.urun_id=urunler.urun_id
    INNER JOIN model ON urunler.model_id=model.model_id
    WHERE urunler.urun_id=$id");
    $duzen2=$duzenle2->fetch();
    $ozellikler1=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=7 AND urun_id=$id");
    $ozellik1=$ozellikler1->fetch();
    $ozellikler2=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=8 AND urun_id=$id");
    $ozellik2=$ozellikler2->fetch();
    $ozellikler3=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=9 AND urun_id=$id");
    $ozellik3=$ozellikler3->fetch();
    $ozellikler4=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=10 AND urun_id=$id");
    $ozellik4=$ozellikler4->fetch();
    $ozellikler5=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=11 AND urun_id=$id");
    $ozellik5=$ozellikler5->fetch();
    ?>
<form action="duzenle1.php?guncelle2=<?=$id?>" method="POST" id="duzenleForm">
kategori: <select name="kategoriler2">
    <?php
    $turler2=$db->query("SELECT * FROM kategori where anaKategori_id=2");
    while($tur2=$turler2->fetch()){
    ?>
    <option value="<?php echo $tur2["kategori_id"]?>" <?php
    if($tur2["kategori_id"]==$kategori) echo "selected";
    ?>><?php echo $tur2["kategori_ad"]?></option>
    <?php } ?>
    </select>
    
    Model Ad: <input type='text' name="modelAd2" value="<?=$duzen2["model_ad"]?>">
    Model Seri: <input type='text' name="modelSeri2" value="<?=$duzen2["model_seri"]?>">
    1.özellik: <input type='text' name="ozellik1" value="<?=$ozellik1["ozellik_detayi"]?>">
    2.özellik: <input type='text' name="ozellik2" value="<?=$ozellik2["ozellik_detayi"]?>">
    3.özellik: <input type='text' name="ozellik3" value="<?=$ozellik3["ozellik_detayi"]?>">
    4.özellik: <input type='text' name="ozellik4" value="<?=$ozellik4["ozellik_detayi"]?>">
    5.özellik: <input type='text' name="ozellik5" value="<?=$ozellik5["ozellik_detayi"]?>">
    Alış Fiyatı: <input type='text' name="alisFiyati2" value="<?=$duzen2["alis_fiyati"]?>">
    Satış Fiyatı: <input type='text' name="satisFiyati2" value="<?=$duzen2["satis_fiyati"]?>">
    Resim url: <input type='text' name="resim2" value="<?=$duzen2["katalog_resmi"]?>">
    <input type="submit" value="Düzenle" id="buton">
    <a href="urunler.php"><input type="button" value="Vazgeç"></a>
</form>
</div>

            <?php
      }
      else if($kategori==6){
        ?>
        <div id="formSayfasi">
<?php
$duzenle3=$db->query("SELECT * FROM urunler 
INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
INNER JOIN fiyatlar ON fiyatlar.urun_id=urunler.urun_id
INNER JOIN kategori ON kategori.kategori_id=urunler.kategori_id
INNER JOIN ozellikdetay ON ozellikdetay.urun_id=urunler.urun_id
INNER JOIN model ON urunler.model_id=model.model_id
WHERE urunler.urun_id=$id");
$duzen3=$duzenle3->fetch();
$ozellikler1=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=12 AND urun_id=$id");
$ozellik1=$ozellikler1->fetch();
$ozellikler2=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=13 AND urun_id=$id");
$ozellik2=$ozellikler2->fetch();
$ozellikler3=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=14 AND urun_id=$id");
$ozellik3=$ozellikler3->fetch();
$ozellikler4=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=15 AND urun_id=$id");
$ozellik4=$ozellikler4->fetch();
$ozellikler5=$db->query("SELECT ozellik_detayi FROM ozellikdetay where ozellik_id=16 AND urun_id=$id");
$ozellik5=$ozellikler5->fetch();
?>
<form action="duzenle1.php?guncelle3=<?=$id?>" method="POST" id="duzenleForm">
Model Ad: <input type='text' name="modelAd2" value="<?=$duzen3["model_ad"]?>">
Model Seri: <input type='text' name="modelSeri2" value="<?=$duzen3["model_seri"]?>">
Ekran: <input type='text' name="ozellik1" value="<?=$ozellik1["ozellik_detayi"]?>">
Hertz: <input type='text' name="ozellik2" value="<?=$ozellik2["ozellik_detayi"]?>">
Tepki Süresi: <input type='text' name="ozellik3" value="<?=$ozellik3["ozellik_detayi"]?>">
Hoparlör: <input type='text' name="ozellik4" value="<?=$ozellik4["ozellik_detayi"]?>">
çözünürlük: <input type='text' name="ozellik5" value="<?=$ozellik5["ozellik_detayi"]?>">
Alış Fiyatı: <input type='text' name="alisFiyati2" value="<?=$duzen3["alis_fiyati"]?>">
Satış Fiyatı: <input type='text' name="satisFiyati2" value="<?=$duzen3["satis_fiyati"]?>">
Resim url: <input type='text' name="resim2" value="<?=$duzen3["katalog_resmi"]?>">
<input type="submit" value="Düzenle" id="buton">
<a href="urunler.php"><input type="button" value="Vazgeç"></a>
</form>
</div>

   <?php
      }
 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="urunler.css">
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
      <div id="urunBilgileri">

   <?php 
   
   $urunler=$db->query("SELECT * FROM  urunler
   INNER JOIN urunresimler ON urunler.urun_id=urunresimler.urun_id
     INNER JOIN fiyatlar ON urunler.urun_id=fiyatlar.urun_id
     INNER JOIN kategori ON urunler.kategori_id=kategori.kategori_id
     INNER JOIN model ON model.model_id=urunler.model_id
     ");
    while($urun=$urunler->fetch())
    {
   ?>


        <div id="urun">
            <div id="resim"><img src="resimler/<?=$urun["katalog_resmi"]?>" alt=""></div>
            <div id="kategoriAd"><?=$urun["kategori_ad"]?></div>
            <div id="model"><?=$urun["model_ad"]?> <?=$urun["model_seri"]?></div>
            <div id="fiyat"><?=$urun["satis_fiyati"]?> TL</div>
            <div id="blok">
                <div id="sil"><a href="urunler.php?id=<?=$urun["urun_id"]?>">SİL</a></div>
                <div id="duzenle"><a href="urunler.php?duzenle=<?=$urun["urun_id"]?>&kategori=<?=$urun["kategori_id"]?>">DÜZENLE</a></div>
            </div>
        </div>

<?php } ?>

           



      </div>
      <div id="urunEkle"><a href="anaSayfa.php"> Ürün Ekle</a></div>
    </div>
</body>
</html>