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
    <link rel="stylesheet" href="siparisler.css" type="text/css">
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
            <div class="kategori" style="border-color:#FBBD08;"><a href="siparisler.php"><img src="ProjeResimler/icons8-logistics-64.png" alt=""> Siparişlerim</a></div>
            <div class="kategori"><a href="kullaniciBilgileri.php">Kullanıcı Bilgilerim</a></div>
            <div class="kategori"><a href="adresBilgilerim.php">Adres Bilgilerim</a></div>
            <div class="kategori"><a href="degerlendirmelerim.php">Değerlendirmelerim</a></div>
          </div>
           <div id="siparisler">
         <?php
         $musteri_id=$_SESSION["musteri_id"];
         $siparisler=$db->query("SELECT * FROM siparisler 
         INNER JOIN urunler ON urunler.urun_id=siparisler.urun_id
         INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
         INNER JOIN siparis_durum ON siparis_durum.durum_id=siparisler.durum_id
         INNER JOIN model ON model.model_id=urunler.model_id
         INNER JOIN kargo ON kargo.kargo_id=siparisler.kargo_id WHERE siparisler.musteri_id=$musteri_id");
         while($siparis=$siparisler->fetch()){
         ?>

            <div id="siparis">
                <div id="resim"><img src="ProjeResimler/<?=$siparis["katalog_resmi"]?>" alt=""></div>
                <div id="urunAd"><b>Ürün adı:</b> <?=$siparis["model_ad"]?> <?=$siparis["model_seri"]?></div>
                <div id="kargo"><b> Kargo:</b> <?=$siparis["kargo_ad"]?></div>
                <div id="sTarihi"><b> Sipariş Tarihi:</b> <?=$siparis["siparis_tarihi"]?></div>
                <div id="tTarihi"><b>Teslim Tarihi:</b> <?=$siparis["teslim_tarihi"]?></div>
                <div id="durum" style="<?php if($siparis["durum_id"]==4) echo "color:red";?>"><?=$siparis["durum"]?></div>
            </div>


            <?php } ?>
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