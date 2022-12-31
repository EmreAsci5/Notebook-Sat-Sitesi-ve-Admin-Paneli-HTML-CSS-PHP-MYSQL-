<?php 
    session_start();
    if(isset($_POST["email"]) && isset($_POST["sifre"])){
    include("baglan.php");
    $email=$_POST["email"];  
    $sifre=$_POST["sifre"];
    $sonuclar=$db->query("SELECT * FROM kayit WHERE musteri_email='$email' AND musteri_sifre='$sifre'");
    $sonuc=$sonuclar->fetch();
    if($sonuc["musteri_email"]==$email && $sonuc["musteri_sifre"]==$sifre){
        $_SESSION["ad"]=$sonuc["musteri_ad"];
        $_SESSION["soyad"]=$sonuc["musteri_soyad"];
        $_SESSION["sifre"]=$sonuc["musteri_sifre"];
        $_SESSION["email"]=$sonuc["musteri_email"];
        $_SESSION["telefon"]=$sonuc["musteri_tel"];
        $_SESSION["musteri_id"]=$sonuc["musteri_id"];
        header('location:tumUrunler2.php');
    }
    else 
    header('location:girisyap.html');
}


?>