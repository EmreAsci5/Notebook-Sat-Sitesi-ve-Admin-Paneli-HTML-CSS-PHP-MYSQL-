<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
include("veritabani.php");
$kategori=$_POST["kategori2"];
$modelAd=$_POST["modelAd2"];
$modelSeri=$_POST["modelSeri2"];
$ozellik1=$_POST["ozellik1"];
$ozellik2=$_POST["ozellik2"];
$ozellik3=$_POST["ozellik3"];
$ozellik4=$_POST["ozellik4"];
$ozellik5=$_POST["ozellik5"];
$alisFiyati=$_POST["alisFiyati2"];
$satisFiyati=$_POST["satisFiyati2"];
$resim=$_POST["resim2"];
$stok=$_POST["stok2"];

$modelID1=$db->query("SELECT model_id FROM model WHERE model_ad='$modelAd' AND model_seri='$modelSeri' ");
$kayit=$modelID1->fetch();
$modelID=$kayit["model_id"];

$urunler=$db->query("INSERT INTO urunler (kategori_id,model_id,stok) VALUES ($kategori,$modelID,$stok)");
$sonID=$db->LastInsertId();
$fiyatlar=$db->query("INSERT INTO fiyatlar (alis_fiyati,urun_id,satis_fiyati) VALUES ($alisFiyati,$sonID,$satisFiyati)");
$resimler=$db->query("INSERT INTO urunresimler (urun_id,katalog_resmi,kategori_id) VALUES ($sonID,'$resim',$kategori)");

$ozellik1Ekle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (7,$sonID,'$ozellik1')");
$ozellik2Ekle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (8,$sonID,'$ozellik2')");
$ozellik3Ekle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (9,$sonID,'$ozellik3')");
$ozellik4Ekle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (10,$sonID,'$ozellik4')");
$ozellik5Ekle=$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (11,$sonID,'$ozellik5')");
header('location:AnaSayfa.php');
?>