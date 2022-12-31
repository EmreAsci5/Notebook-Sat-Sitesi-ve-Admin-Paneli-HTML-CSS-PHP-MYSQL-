<?php
include("baglan.php");
session_start();
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
$ad=$_POST["ad2"];
$id=$_GET["id"];
$soyad=$_POST["soyad2"];
$adresTanimi=$_POST["adresTanimi2"];
$adres=$_POST["adres2"];
$sehir=$_POST["sehir2"];
$ilce=$_POST["ilce2"];
$db->query("UPDATE adres_tanimlari SET musteri_ad='$ad',musteri_soyad='$soyad',adres_tanimi='$adresTanimi',musteri_adres='$adres',
musteri_sehir='$sehir',musteri_ilce='$ilce' WHERE adres_id=$id");
header("location:adres.php");
?>