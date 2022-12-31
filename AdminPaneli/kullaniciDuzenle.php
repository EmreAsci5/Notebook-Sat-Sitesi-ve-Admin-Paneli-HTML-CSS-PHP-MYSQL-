<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
if(isset($_GET["id"])){
    include("veritabani.php");
    $id=$_GET["id"];
    $ad=$_POST["ad"];
    $soyad=$_POST["soyad"];
    $sifre=$_POST["sifre"];
    $email=$_POST["email"];
    $telefon=$_POST["telefon"];
    $adresTanimi=$_POST["adresTanimi"];
    $sehir=$_POST["sehir"];
    $ilce=$_POST["ilce"];
    $adres=$_POST["adres"];
    $db->query("UPDATE kayit SET musteri_ad='$ad',musteri_soyad='$soyad',musteri_sifre='$sifre',musteri_tel=$telefon WHERE musteri_id=$id");
    $db->query("UPDATE adres_tanimlari 
    SET adres_tanimi='$adresTanimi',musteri_ad='$ad',musteri_soyad='$soyad',musteri_adres='$adres'
    ,musteri_tel=$telefon,musteri_sehir='$sehir',musteri_ilce='$ilce' WHERE musteri_id=$id");
    header("location:incele.php?musteriid=$id");
}
?>