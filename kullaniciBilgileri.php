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
    <link rel="stylesheet" href="kullaniciBilgileri.css" type="text/css">
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
               <li><a href="">Değerlendirmelerim</a></li>
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
            <div class="kategori" style="border-color:#FBBD08;"><a href="kullaniciBilgileri.php">Kullanıcı Bilgilerim</a></div>
            <div class="kategori"><a href="adresBilgilerim.php">Adres Bilgilerim</a></div>
            <div class="kategori"><a href="degerlendirmelerim.php">Değerlendirmelerim</a></div>
          </div>
          <?php
          $musteri_id=$_SESSION["musteri_id"];
          $bilgilerim=$db->query("SELECT * FROM kayit WHERE musteri_id=$musteri_id");
          $bilgi=$bilgilerim->fetch();
          ?>
          <div id="uyeBilgileri">
            <h3 style="color:#FBBD08;font-family:'infinitY'">Üyelik Bilgilerim</h3>
            <div id="uyari" style="color:green"><?php
            if(isset($_GET["dogru"])){
               echo "Başarıyla kaydedildi!";
            }
            ?></div>
            <form action="kullaniciGuncelle.php" method="POST">
            <div id="adSoyad"><div id="ad">Ad<input type="text" name="ad" id="" value="<?=$bilgi["musteri_ad"]?>"></div>
               <div id="soyad">Soyad<input type="text" name="soyad" value="<?=$bilgi["musteri_soyad"]?>"></div>
         </div>
         <div id="email">Email <input type="email" name="email" id="" value="<?=$bilgi["musteri_email"]?>"></div>
         <div id="tel">Cep Telefonu <input type="tel" name="tel" id="" value="<?=$bilgi["musteri_tel"]?>"></div>
         <div id="guncelle"><input type="submit" name="" id="" value="Güncelle"></div>
         </form>

          </div>


          <div id="sifreYenileme">
          <h3 style="color:#FBBD08;font-family:'infinitY'">Şifre Yenileme</h3>
          <div id="uyari2" style="<?php if(isset($_GET["dogrulandi"])) echo "color:green"; else echo "color:red"; ?>">
            <?php
            if(isset($_GET["yanlis"])){
               echo "Girdiğiniz şifre yanlış!";
            }
            elseif(isset($_GET["uyusmuyor"])){
               echo "Girdiğiniz şifreler uyuşmuyor!";
            }
            elseif(isset($_GET["dogrulandi"])){
               echo "Başarıyla değiştirildi!";
            }
            ?>
          </div>
          <form action="sifreGuncelle.php" method="POST">
            <div id="mevcut">Şu Anki Şifre <input type="password" name="mevcut" id=""></div>
            <div id="yeni">Yeni Şifre <input type="password" name="yeni"></div>
            <div id="yeni">Yeni Şifre(Tekrar) <input type="password" name="yeni2"></div>
            <div id="degistir"><input type="submit" name="" id="" value="Değiştir"></div>
          </form>
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