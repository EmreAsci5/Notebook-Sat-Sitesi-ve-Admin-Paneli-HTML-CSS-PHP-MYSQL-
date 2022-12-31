<?php
session_start();
include("baglan.php");
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
$id=$_GET["id"];
$yorum=$_POST["yorum"];
$musteri_id=$_SESSION["musteri_id"];
$puan=$_SESSION["puan"];
$yorumlar=$db->query("INSERT INTO yorumlar(yorum,urun_id,musteri_id) VALUES ('$yorum',$id,$musteri_id)");
$degerlendirme=$db->query("INSERT INTO degerlendirme (puan,urun_id,musteri_id) VALUES ($puan,$id,$musteri_id)");
if($yorumlar && $degerlendirme){
    header("location:degerlendirmelerim.php");
}
?>