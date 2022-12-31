<?php
session_start();
include("baglan.php");
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
$musteri_id=$_SESSION["musteri_id"];
$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
$baslik=$_POST["baslik"];
$adres=$_POST["adres"];
$tel=$_POST["tel"];
$sehir=$_POST["sehir"];
$ilce=$_POST["ilce"];
$degistir=$db->query("UPDATE adres_tanimlari
 SET adres_tanimi='$baslik',musteri_ad='$ad',musteri_soyad='$soyad',musteri_adres='$adres',musteri_tel='$tel',musteri_sehir='$sehir',musteri_ilce='$ilce'
 WHERE musteri_id=$musteri_id");
 if($degistir){
    header("location:adresBilgilerim.php?dogru=true");
 }

?>