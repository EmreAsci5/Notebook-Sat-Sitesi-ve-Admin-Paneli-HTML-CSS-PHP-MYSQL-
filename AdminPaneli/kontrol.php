<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
include("veritabani.php");
$musteri_id=$_GET["musteriid"];
$sil1=$db->query("DELETE FROM adres_tanimlari WHERE musteri_id='$musteri_id'");
$sil2=$db->query("DELETE FROM kayit WHERE musteri_id='$musteri_id'");
header("location:kullanicilar.php");
?>