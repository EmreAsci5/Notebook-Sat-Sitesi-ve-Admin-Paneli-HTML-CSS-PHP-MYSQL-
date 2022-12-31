<?php
include("baglan.php");
session_start();
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
$eski=$_POST["mevcut"];
$musteri_id=$_SESSION["musteri_id"];
$yeni=$_POST["yeni"];
$yeni2=$_POST["yeni2"];
$bilgiler=$db->query("SELECT * FROM kayit WHERE musteri_id=$musteri_id");
$bilgi=$bilgiler->fetch();
if($eski!=$bilgi["musteri_sifre"]){
 header("location:kullaniciBilgileri.php?yanlis=true");
}
else{
   if($yeni!=$yeni2){
      header("location:kullaniciBilgileri.php?uyusmuyor=true");
   }
   else{
      $degistir=$db->query("UPDATE kayit SET musteri_sifre='$yeni' WHERE musteri_id=$musteri_id");
      if($degistir){
        header("location:kullaniciBilgileri.php?dogrulandi=true");
      }
   }
}
?>