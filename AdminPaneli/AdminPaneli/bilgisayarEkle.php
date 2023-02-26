<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
include("veritabani.php");
$kategori=$_POST["kategori"];
$modelAd=$_POST["modelAd"];
$modelSeri=$_POST["modelSeri"];
$islemci=$_POST["islemci"];
$ekranKarti=$_POST["ekranKarti"];
$ekran=$_POST["ekran"];
$ram=$_POST["ram"];
$ssd=$_POST["ssd"];
$isletim=$_POST["isletim"];
$alisFiyati=$_POST["alisFiyati"];
$satisFiyati=$_POST["satisFiyati"];
$resim=$_POST["resim"];
$stok=$_POST["stok"];

$modelID1=$db->query("SELECT model_id FROM model WHERE model_ad='$modelAd' AND model_seri='$modelSeri' ");
$kayit=$modelID1->fetch();
$modelID=$kayit["model_id"];
$urunler=$db->query("INSERT INTO urunler (kategori_id,model_id,stok) VALUES ($kategori,$modelID,$stok)");
$sonID=$db->LastInsertId();
$fiyatlar=$db->query("INSERT INTO fiyatlar (alis_fiyati,urun_id,satis_fiyati) VALUES ($alisFiyati,$sonID,$satisFiyati)");
$resimler=$db->query("INSERT INTO urunresimler (urun_id,katalog_resmi,kategori_id) VALUES ($sonID,'$resim',$kategori)");

$islemciEkle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (1,$sonID,'$islemci')");
$ekranKartiEkle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (2,$sonID,'$ekranKarti')");
$ekranEkle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (3,$sonID,'$ekran')");
$ramEkle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (4,$sonID,'$ram')");
$ssdEkle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (5,$sonID,'$ssd')");
$isletimEkle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (6,$sonID,'$isletim')");
header('location:AnaSayfa.php');
?>