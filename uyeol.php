<?php 
    session_start();
	include("baglan.php");
    $ad=$_POST["ad"];
    $soyad=$_POST["soyad"];
    $email=$_POST["email"];
    $sifre=$_POST["sifre"];
    $telno=$_POST["tel"];
    $kontroller=$db->query("SELECT musteri_email FROM kayit WHERE musteri_email='$email'");
    $kontrol=$kontroller->fetch();
    if($kontrol["musteri_email"]!=$email){
    $uyeler=$db->query("INSERT INTO kayit (musteri_ad,musteri_soyad,musteri_sifre,musteri_email,musteri_tel)
    VALUES ('$ad','$soyad','$sifre','$email',$telno)");
    if($uyeler){
        $kayitlar=$db->query("SELECT * FROM kayit WHERE musteri_email='$email' AND musteri_sifre='$sifre'");
        $kayit=$kayitlar->fetch();
        $_SESSION["ad"]=$kayit["musteri_ad"];
        $_SESSION["soyad"]=$kayit["musteri_soyad"];
        $_SESSION["sifre"]=$kayit["musteri_sifre"];
        $_SESSION["email"]=$kayit["musteri_email"];
        $_SESSION["telefon"]=$kayit["musteri_tel"];
        $_SESSION["musteri_id"]=$kayit["musteri_id"];

        header('location:tumUrunler2.php');
    }
}
else{
    header('location:uyeol.html');
}
    
?>
    