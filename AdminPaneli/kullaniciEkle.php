<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
    header("location:adminGiris.php");
  }
include("veritabani.php");
  $ad=$_POST["ad"];
  $soyad=$_POST["soyad"];
  $sifre=$_POST["sifre"];
  $email=$_POST["email"];
  $telefon=$_POST["telefon"];
  $adresTanimi=$_POST["adresTanimi"];
  $sehir=$_POST["sehir"];
  $ilce=$_POST["ilce"];
  $adres=$_POST["adres"];
  $db->query("INSERT INTO kayit (musteri_ad,musteri_soyad,musteri_sifre,musteri_email,musteri_tel)
  VALUES ('$ad','$soyad','$sifre','$email',$telefon)");
  $sonID=$db->LastInsertId();
  $db->query("INSERT INTO adres_tanimlari (musteri_id,adres_tanimi,musteri_ad,musteri_soyad,musteri_adres,musteri_tel,musteri_sehir,musteri_ilce)
  VALUES ($sonID,'$adresTanimi','$ad','$soyad','$adres',$telefon,'$sehir','$ilce')");
  header("location:kullanicilar.php");
?>