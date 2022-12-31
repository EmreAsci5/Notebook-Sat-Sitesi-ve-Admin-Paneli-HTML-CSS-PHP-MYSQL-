<?php
include("baglan.php");
session_start();
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
$musteri_id=$_SESSION["musteri_id"];
$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
$telefon=$_POST["tel"];
$adresTanimi=$_POST["adresTanimi"];
$adres=$_POST["adres"];
$sehir=$_POST["sehir"];
$ilce=$_POST["ilce"];
$db->query("INSERT INTO adres_tanimlari (musteri_id,adres_tanimi,musteri_ad,musteri_soyad,musteri_adres,musteri_tel,musteri_sehir,musteri_ilce)
VALUES ($musteri_id,'$adresTanimi','$ad','$soyad','$adres',$telefon,'$sehir','$ilce')");
header("location:adres.php");
?>