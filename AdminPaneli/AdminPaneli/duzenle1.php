<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
if(isset($_GET["guncelle"])){
    include("veritabani.php");
    $id=$_GET["guncelle"];
    $kategoriler=$_POST["kategoriler"];
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
    $modelID1=$db->query("SELECT * FROM model WHERE model_ad='$modelAd' AND model_seri='$modelSeri'");
    $modelID=$modelID1->fetch();
    $modelid=$modelID["model_id"];
    $db->query("UPDATE urunler SET kategori_id=$kategoriler,model_id=$modelid WHERE urun_id=$id");
    $db->query("UPDATE urunresimler SET katalog_resmi='$resim',kategori_id='$kategoriler' WHERE urun_id=$id");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$islemci' WHERE urun_id=$id AND ozellik_id=1");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ekranKarti' WHERE urun_id=$id AND ozellik_id=2");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ekran' WHERE urun_id=$id AND ozellik_id=3");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ram' WHERE urun_id=$id AND ozellik_id=4");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ssd' WHERE urun_id=$id AND ozellik_id=5");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$isletim' WHERE urun_id=$id AND ozellik_id=6");
    $db->query("UPDATE fiyatlar SET alis_fiyati=$alisFiyati,satis_fiyati=$satisFiyati WHERE urun_id=$id");
    header("location:urunler.php");
   }
   if(isset($_GET["guncelle2"])){
    include("veritabani.php");
    $id2=$_GET["guncelle2"];
    $kategoriler2=$_POST["kategoriler2"];
    $modelAd2=$_POST["modelAd2"];
    $modelSeri2=$_POST["modelSeri2"];
    $ozellik1=$_POST["ozellik1"];
    $ozellik2=$_POST["ozellik2"];
    $ozellik3=$_POST["ozellik3"];
    $ozellik4=$_POST["ozellik4"];
    $ozellik5=$_POST["ozellik5"];
    $alisFiyati2=$_POST["alisFiyati2"];
    $satisFiyati2=$_POST["satisFiyati2"];
    $resim2=$_POST["resim2"];
    $modelID2=$db->query("SELECT * FROM model WHERE model_ad='$modelAd2' AND model_seri='$modelSeri2'");
    $modelID1=$modelID2->fetch();
    $modelid2=$modelID1["model_id"];
    $db->query("UPDATE urunler SET kategori_id=$kategoriler2,model_id=$modelid2 WHERE urun_id=$id2");
    $db->query("UPDATE urunresimler SET katalog_resmi='$resim2',kategori_id='$kategoriler2' WHERE urun_id=$id2");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik1' WHERE urun_id=$id2 AND ozellik_id=7");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik2' WHERE urun_id=$id2 AND ozellik_id=8");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik3' WHERE urun_id=$id2 AND ozellik_id=9");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik4' WHERE urun_id=$id2 AND ozellik_id=10");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik5' WHERE urun_id=$id2 AND ozellik_id=11");
    $db->query("UPDATE fiyatlar SET alis_fiyati=$alisFiyati2,satis_fiyati=$satisFiyati2 WHERE urun_id=$id2");
    header("location:urunler.php");
   }
   if(isset($_GET["guncelle3"])){
    include("veritabani.php");
    $id2=$_GET["guncelle3"];
    $modelAd2=$_POST["modelAd2"];
    $modelSeri2=$_POST["modelSeri2"];
    $ozellik1=$_POST["ozellik1"];
    $ozellik2=$_POST["ozellik2"];
    $ozellik3=$_POST["ozellik3"];
    $ozellik4=$_POST["ozellik4"];
    $ozellik5=$_POST["ozellik5"];
    $alisFiyati2=$_POST["alisFiyati2"];
    $satisFiyati2=$_POST["satisFiyati2"];
    $resim2=$_POST["resim2"];
    $modelID2=$db->query("SELECT * FROM model WHERE model_ad='$modelAd2' AND model_seri='$modelSeri2'");
    $modelID1=$modelID2->fetch();
    $modelid2=$modelID1["model_id"];
    $db->query("UPDATE urunler SET kategori_id=6,model_id=$modelid2 WHERE urun_id=$id2");
    $db->query("UPDATE urunresimler SET katalog_resmi='$resim2',kategori_id=6 WHERE urun_id=$id2");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik1' WHERE urun_id=$id2 AND ozellik_id=7");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik2' WHERE urun_id=$id2 AND ozellik_id=8");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik3' WHERE urun_id=$id2 AND ozellik_id=9");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik4' WHERE urun_id=$id2 AND ozellik_id=10");
    $db->query("UPDATE ozellikdetay SET ozellik_detayi='$ozellik5' WHERE urun_id=$id2 AND ozellik_id=11");
    $db->query("UPDATE fiyatlar SET alis_fiyati=$alisFiyati2,satis_fiyati=$satisFiyati2 WHERE urun_id=$id2");
    header("location:urunler.php");
   }
?>