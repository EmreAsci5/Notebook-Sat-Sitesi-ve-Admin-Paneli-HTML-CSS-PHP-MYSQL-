<?php
session_start();
include("baglan.php");
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
   $musteri_id=$_SESSION["musteri_id"];
   $kargo=$_GET["kargoid"];
   $siparistarihi = date('Y-m-d');
   $sepetim=$db->query("SELECT * FROM alisveris_sepeti WHERE musteri_id=$musteri_id");
   while($sepet=$sepetim->fetch()){
    $urun_id=$sepet["urun_id"];
    $adet=$sepet["urun_adet"];
   $db->query("INSERT INTO siparisler (urun_id,durum_id,kargo_id,siparis_tarihi,musteri_id,urun_adet) 
   VALUES ($urun_id,1,$kargo,'$siparistarihi',$musteri_id,$adet)");
   }
   $db->query("DELETE FROM alisveris_sepeti WHERE musteri_id=$musteri_id");
   header("location:siparissonuc.php");
?>