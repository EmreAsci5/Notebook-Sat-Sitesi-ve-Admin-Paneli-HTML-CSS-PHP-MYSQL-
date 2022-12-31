<?php
session_start();
include("baglan.php");
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Notebook</title>
    <link rel="stylesheet" href="adresBilgilerim.css" type="text/css">
    <link rel="icon" size="16x16" href="ProjeResimler/favicon.png">
    <style>
      ::selection{
    color:rgb(0,0,0);
    background-color:rgb(0, 250, 250);
}
      </style>

</head>
    <div id="header">
     <div id="baslik">
     </div>
     <div id="baslik2">
         <div><a href="anasayfa2.php">
            <img src="ProjeResimler/Dragon.png" alt="Dragon Notebook" id="logo">
         </div></a>
         <div id="baslik3">
         <div style="gap:20px;width:400px;display:flex;flex-direction: row;
            justify-content: flex-end;margin-left:600px;margin-top:30px">
            <ul id="hesabimSecenekler">
               <li id="Hesabim"><div id="hesapresim"><a href="">
                  <img src="ProjeResimler/icons8-user-50.png" alt="" id="hesapresim2">
               </div><?=ucfirst($_SESSION["ad"])?><br><?=ucfirst($_SESSION["soyad"])?>
                  <ul>
                  <li><a href="siparisler.php">Siparişlerim</a></li>
               <li><a href="degerlendirmelerim.php">Değerlendirmelerim</a></li>
               <li><a href="kullaniciBilgileri.php">Kullanıcı Bilgilerim</a></li>
               <li><a href="cikisyap.php">Çıkış Yap</a></li>
                  </ul>
               </a>
            </li>
             </ul>
         </div>
         </div>
        </div>
     </div>
     <hr>
    </div>
    </div>
    
    <div id="anaEkran">
      <div id="hesabimAlani">
          <div id="solSekme">
            <div class="kategori" ><a href="siparisler.php"><img src="ProjeResimler/icons8-logistics-64.png" alt=""> Siparişlerim</a></div>
            <div class="kategori" ><a href="kullaniciBilgileri.php">Kullanıcı Bilgilerim</a></div>
            <div class="kategori" style="border-color:#FBBD08;"><a href="adresBilgilerim.php">Adres Bilgilerim</a></div>
            <div class="kategori"><a href="degerlendirmelerim.php">Değerlendirmelerim</a></div>
          </div>
         <div id="adresim">
            <?php
            $musteri_id=$_SESSION["musteri_id"];
            $adresim=$db->query("SELECT * FROM adres_tanimlari WHERE musteri_id=$musteri_id");
            $adres=$adresim->fetch();
            ?>
            <div id="adres">
                
                <form action="adresGuncelle.php" method="POST">
                <div id="uyari" style="width:300px;height:40px;color:green"><?php if(isset($_GET["dogru"])) echo "Başarıyla kaydedildi!"; ?></div>
                <div id="adresTanimi">Adres Başlığı <input type="text" name="baslik" value="<?=$adres["adres_tanimi"]?>"></div>
                <div id="aliciAd">Alıcının Adı <input type="text" name="ad" id="" value="<?=$adres["musteri_ad"]?>"></div>
                <div id="aliciSoyad">Alıcının Soyadı <input type="text" name="soyad" id="" value="<?=$adres["musteri_soyad"]?>"></div>
                <div id="adres2">Adres <textarea name="adres" id="" cols="30" rows="10"><?=$adres["musteri_adres"]?></textarea></div>
                <div id="aliciTel">Alıcının Telefon Numarası <input type="tel" name="tel" id="" value="<?=$adres["musteri_tel"]?>"></div>
                <div id="sehir">Şehir <input type="text" name="sehir" id="" value="<?=$adres["musteri_sehir"]?>"></div>
                <div id="ilce">İlçe <input type="text" name="ilce" id="" value="<?=$adres["musteri_ilce"]?>"></div>
                <div id="submit"> <input type="submit" id="" value="Kaydet"></div>
                </form>
            </div>
         </div>


      </div>
    </div>
    <div id="enAltAlan">
         <div id="enAlt">
            <div id="taksitAciklama"><b> 12 aya varan taksit seçeneği</b> 
              <p> Anlaşmalı kredi kartlarına 12 aya varan taksit seçenekleri Dragon'da.</p></div>
            <div id="kargoAciklama"><b>Aynı Gün Teslim 1 Günde Kargo</b>
               <p>Seçili ürünler Aynı Gün Teslim! Konfigüre ürünler 1 Günde Kargoda!</p>
            </div>
            <div id="hizAciklama"><b>Hızlı ve GüvenliServis</b>
            <p>1 Saatte servis, Jet servis ve Turbo servis seçenekleri Dragon'da!</p></div>
            <div id="destekAciklama"><b>Canlı Destek Hizmeti</b>
            <p>Ürünlerinizle ilgili Dragon Canlı Destek hizmeti her daim sizinle.</p></div>
         </div>
         <div id="telif">
            <p>© 2022 Dragon Bilgisayar Sistemleri A.Ş. Tüm Hakları Saklıdır</p>
         </div>
      </div>
</body>
</html>