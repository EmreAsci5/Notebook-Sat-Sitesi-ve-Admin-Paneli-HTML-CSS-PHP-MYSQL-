<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
include("veritabani.php");
if(isset($_GET["urunid"]) && isset($_GET["durum"])){
    $urunid=$_GET["urunid"];
    $durumid=$_GET["durum"];
    $musteri_id=$_GET["musteriid"];
    $siparis_id=$_GET["siparis"];
    if($durumid==1){
       $db->query("UPDATE siparisler SET durum_id=2 WHERE urun_id=$urunid AND musteri_id=$musteri_id AND siparis_id=$siparis_id");
       $kontroller=$db->query("SELECT teslim_tarihi FROM siparisler WHERE urun_id=$urunid AND musteri_id=$musteri_id AND siparis_id=$siparis_id");
       $kontrol=$kontroller->fetch();
      
        $db->query("UPDATE siparisler SET teslim_tarihi=null WHERE urun_id=$urunid AND musteri_id=$musteri_id AND siparis_id=$siparis_id");
       
    }
    elseif($durumid==2){
        $db->query("UPDATE siparisler SET durum_id=3 WHERE urun_id=$urunid AND musteri_id=$musteri_id AND siparis_id=$siparis_id");
        $kontroller=$db->query("SELECT teslim_tarihi FROM siparisler WHERE urun_id=$urunid AND musteri_id=$musteri_id AND siparis_id=$siparis_id");
       $kontrol=$kontroller->fetch();
      
        $db->query("UPDATE siparisler SET teslim_tarihi=null WHERE urun_id=$urunid AND musteri_id=$musteri_id AND siparis_id=$siparis_id");
    }
    elseif($durumid==3){
        $tarih=date("Y-m-d");
        $db->query("UPDATE siparisler SET durum_id=4,teslim_tarihi='$tarih' WHERE urun_id=$urunid AND musteri_id=$musteri_id AND siparis_id=$siparis_id");
        
    }
}
if(isset($_GET["urnid"])){
    $urnid=$_GET["urnid"];
    $siparis_id=$_GET["siparis"];
    $guncellemeler=$db->query("SELECT * FROM siparisler
                INNER JOIN siparis_durum ON siparisler.durum_id=siparis_durum.durum_id
                INNER JOIN kargo ON kargo.kargo_id=siparisler.kargo_id
                INNER JOIN urunler ON urunler.urun_id=siparisler.urun_id
                INNER JOIN fiyatlar ON fiyatlar.urun_id=urunler.urun_id
                INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
                INNER JOIN model ON model.model_id=urunler.model_id
                WHERE siparisler.urun_id=$urnid AND siparisler.siparis_id=$siparis_id");
                $guncelle=$guncellemeler->fetch();
                ?>
<div id="formSayfasi">
    <form action="siparisDuzenle.php?id=<?=$guncelle["urun_id"]?>&siparisid=<?=$guncelle["siparis_id"]?>" method="POST" id="duzenleForm">
        Model Ad: <input type="text" name="modelAd" value="<?=$guncelle["model_ad"]?>">
        Model Seri: <input type="text" name="modelSoyad" value="<?=$guncelle["model_seri"]?>">
        Fiyat: <input type="text" name="fiyat" value="<?=$guncelle["satis_fiyati"]?>">
        Sipariş Tarihi(yyyy-aa-gg): <input type="text" name="tarih" value="<?=$guncelle["siparis_tarihi"]?>">
        Kargo: <select name="kargo">
            <?php
            $kargolar=$db->query("SELECT * FROM kargo");
            while($kargo=$kargolar->fetch()){
            ?>
            <option value="<?=$kargo["kargo_id"]?>"
             <?php if($guncelle["kargo_id"]==$kargo["kargo_id"]) echo "selected";?> ><?=$kargo["kargo_ad"]?></option>
          <?php } ?>
        </select>
        Durum: <select name="durum">
            <?php
            $durumlar=$db->query("SELECT * FROM siparis_durum");
            while($durum=$durumlar->fetch()){
            ?>
            <option value="<?=$durum["durum_id"]?>"
            <?php
            if($durum["durum_id"]==$guncelle["durum_id"])
            echo "selected";
            ?>
            ><?=$durum["durum"]?></option>
             <?php } ?>
        </select>
        <input type="submit" value="Kaydet">
        <a href="siparisler.php"><input type="button" value="Vazgeç"></a>
    </form>
</div>
<?php
}
if(isset($_GET["sil_id"])){
  $id=$_GET["sil_id"];
  $siparis_id=$_GET["siparis"];
  $db->query("DELETE FROM siparisler WHERE urun_id=$id AND siparis_id=$siparis_id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="siparisler.css">
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
        <div id="onayYazi"><h1>Onaylanmayı Bekleyen Siparişler</h1></div>
         <div id="siparisAlani">
         <div id="tanim"><div id="ad">Model</div> <div id="seri">Seri</div> <div id="fiyat2">Tutar</div>
        <div id="sTarihi">Sipariş Tarihi</div> <div id="kargo2">Kargo</div> <div id="bilgiler2">İletişim Bilgileri</div>
      <div id="durum2">Durum</div> <div  id="adet2">Adet</div></div>
         <?php
                include("veritabani.php");
                $siparisler=$db->query("SELECT * FROM siparisler
                INNER JOIN siparis_durum ON siparisler.durum_id=siparis_durum.durum_id
                INNER JOIN kargo ON kargo.kargo_id=siparisler.kargo_id
                INNER JOIN urunler ON urunler.urun_id=siparisler.urun_id
                INNER JOIN fiyatlar ON fiyatlar.urun_id=urunler.urun_id
                INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
                INNER JOIN kayit ON kayit.musteri_id=siparisler.musteri_id
                INNER JOIN model ON model.model_id=urunler.model_id where siparis_durum.durum_id IN(1,2,3)");
                while($siparis=$siparisler->fetch()){
                ?>

            <div id="siparis">     
                <div id="resim"><img src="resimler/<?=$siparis["katalog_resmi"]?>" alt=""></div>
                <div id="modelAd"><?=$siparis["model_ad"]?></div>
                <div id="modelSeri"><?=$siparis["model_seri"]?></div>
                <div id="fiyat"><?php echo $siparis["satis_fiyati"]*$siparis["urun_adet"]?> TL</div>
                <div id="siparisTarihi"><?=$siparis["siparis_tarihi"]?></div>
                <div id="kargo"><?=$siparis["kargo_ad"]?></div>
                <div id="bilgiler">
                <?=$siparis["musteri_ad"]?>
                <?=$siparis["musteri_soyad"]?>
                Mail:<?=$siparis["musteri_email"]?>
                Tel:<?=$siparis["musteri_tel"]?>

                </div>
                <div id="durum"><?=$siparis["durum"]?></div>
                <div id="adet"><?=$siparis["urun_adet"]?></div>
                <div id="blok">
                    <div id="onay"><a href="siparisler.php?durum=<?=$siparis["durum_id"]?>&urunid=<?=$siparis["urun_id"]?>
                    &musteriid=<?=$siparis["musteri_id"]?>&siparis=<?=$siparis["siparis_id"]?>">Onayla</a></div>
                    <div id="guncelle"><a href="siparisler.php?urnid=<?=$siparis["urun_id"]?>&siparis=<?=$siparis["siparis_id"]?>">Düzenle</a></div>
                    <div id="sil"><a href="siparisler.php?sil_id=<?=$siparis["urun_id"]?>&siparis=<?=$siparis["siparis_id"]?>">Sil</a></div>
                </div>
            </div>
            <?php } ?>
         </div>
         <div id="onaylananYazi"><h1>Onaylanan Siparişler</h1></div>
         <div id="siparisAlani">
         <div id="tanim"><div id="ad">Model</div> <div id="seri">Seri</div> <div id="fiyat2">Tutar</div>
        <div id="sTarihi">Sipariş Tarihi</div> <div id="kargo2">Kargo</div> <div id="bilgiler2">İletişim Bilgileri</div>
      <div id="durum2">Durum</div> <div  id="adet2">Adet</div></div>
         <?php
                include("veritabani.php");
                $siparisler=$db->query("SELECT * FROM siparisler
                INNER JOIN siparis_durum ON siparisler.durum_id=siparis_durum.durum_id
                INNER JOIN kargo ON kargo.kargo_id=siparisler.kargo_id
                INNER JOIN urunler ON urunler.urun_id=siparisler.urun_id
                INNER JOIN fiyatlar ON fiyatlar.urun_id=urunler.urun_id
                INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
                INNER JOIN kayit ON kayit.musteri_id=siparisler.musteri_id
                INNER JOIN model ON model.model_id=urunler.model_id where siparis_durum.durum_id=4");
                while($siparis=$siparisler->fetch()){
                ?>

            <div id="siparis">     
                <div id="resim"><img src="resimler/<?=$siparis["katalog_resmi"]?>" alt=""></div>
                <div id="modelAd"><?=$siparis["model_ad"]?></div>
                <div id="modelSeri"><?=$siparis["model_seri"]?></div>
                <div id="fiyat"><?=$siparis["satis_fiyati"]?> TL</div>
                <div id="siparisTarihi"><?=$siparis["teslim_tarihi"]?></div>
                <div id="kargo"><?=$siparis["kargo_ad"]?></div>
                <div id="bilgiler">
                <?=$siparis["musteri_ad"]?>
                <?=$siparis["musteri_soyad"]?>
                Mail:<?=$siparis["musteri_email"]?>
                Tel:<?=$siparis["musteri_tel"]?>

                </div>
                <div id="durum" style="color:red"><?=$siparis["durum"]?></div>
                <div id="adet"><?=$siparis["urun_adet"]?></div>
                <div id="blok">
                    <div id="onay"><a href="siparisler.php?durum=<?=$siparis["durum_id"]?>&urunid=<?=$siparis["urun_id"]?>
                    &musteriid=<?=$siparis["musteri_id"]?>&siparis=<?=$siparis["siparis_id"]?>">Onayla</a></div>
                    <div id="guncelle"><a href="siparisler.php?urnid=<?=$siparis["urun_id"]?>&siparis=<?=$siparis["siparis_id"]?>">Düzenle</a></div>
                    <div id="sil"><a href="siparisler.php?sil_id=<?=$siparis["urun_id"]?>&siparis=<?=$siparis["siparis_id"]?>">Sil</a></div>
                </div>
            </div>
            <?php } ?>

         </div>
    </div>
</body>
</html>