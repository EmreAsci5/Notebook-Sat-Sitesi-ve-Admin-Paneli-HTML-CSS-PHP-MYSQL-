<?php
include("baglan.php");
session_start();
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
$musteri_id=$_SESSION["musteri_id"];
$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
$email=$_POST["email"];
$tel=$_POST["tel"];
$ekle=$db->query("UPDATE kayit SET musteri_ad='$ad',musteri_soyad='$soyad',musteri_email='$email',musteri_tel='$tel' WHERE musteri_id=$musteri_id");
if($ekle){
header("location:kullaniciBilgileri.php?dogru=true");
}
?>