<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
include("veritabani.php");
$modelAd=$_POST["modelAd3"];
$modelSeri=$_POST["modelSeri3"];
$ekran=$_POST["ekran3"];
$hertz=$_POST["hertz"];
$tepkiSuresi=$_POST["tepkiSuresi"];
$hoparlor=$_POST["hoparlor"];
$cozunurluk=$_POST["cozunurluk"];
$alisFiyati=$_POST["alisFiyati3"];
$satisFiyati=$_POST["satisFiyati3"];
$resim=$_POST["resim3"];
$stok=$_POST["stok3"];

$modelID1=$db->query("SELECT model_id FROM model WHERE model_ad='$modelAd' AND model_seri='$modelSeri' ");
$kayit=$modelID1->fetch();
$modelID=$kayit["model_id"];

$urunler=$db->query("INSERT INTO urunler (kategori_id,model_id,stok) VALUES (6,$modelID,$stok)");
$sonID=$db->LastInsertId();
$fiyatlar=$db->query("INSERT INTO fiyatlar (alis_fiyati,urun_id,satis_fiyati) VALUES ($alisFiyati,$sonID,$satisFiyati)");
$resimler=$db->query("INSERT INTO urunresimler (urun_id,katalog_resmi,kategori_id) VALUES ($sonID,'$resim',6)");

$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (12,$sonID,'$ekran')");
$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (13,$sonID,'$hertz')");
$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (14,$sonID,'$tepkiSuresi')");
$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (15,$sonID,'$hoparlor')");
$db->query("INSERT INTO ozellikdetay(ozellik_id,urun_id,ozellik_detayi) VALUES (16,$sonID,'$cozunurluk')");
header('location:AnaSayfa.php');
?>