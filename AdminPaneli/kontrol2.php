<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
include("veritabani.php");
$urun_id=$_GET["sil_id"];
$db->query("DELETE FROM urunresimler WHERE urun_id=$urun_id");
$db->query("DELETE FROM ozellikdetay WHERE urun_id=$urun_id");
$db->query("DELETE FROM fiyatlar WHERE urun_id=$urun_id");
$db->query("DELETE FROM urunler WHERE urun_id=$urun_id");
header("location:urunler.php");
?>