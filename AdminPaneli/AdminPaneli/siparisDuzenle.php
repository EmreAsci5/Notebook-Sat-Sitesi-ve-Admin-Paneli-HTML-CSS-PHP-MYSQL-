<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
include("veritabani.php");
$id=$_GET["id"];
$siparis_id=$_GET["siparisid"];
$modelAd=$_POST["modelAd"];
$modelSeri=$_POST["modelSeri"];
$fiyat=$_POST["fiyat"];
$siparisTarihi=$_POST["tarih"];
$kargo=$_POST["kargo"];
$durum=$_POST["durum"];
$db->query("UPDATE siparisler SET durum_id=$durum,siparis_tarihi='$siparisTarihi',kargo_id=$kargo WHERE urun_id=$id AND siparis_id=$siparis_id");
if($durum==1 || $durum==2 || $durum==3){
  $db->query("UPDATE siparisler SET teslim_tarihi=null WHERE urun_id=$id  AND siparis_id=$siparis_id");
}
header("location:siparisler.php");
?>