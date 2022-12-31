<?php
session_start();
include("baglan.php");
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
if(isset($_GET["kontrol"])){
   if(isset($_SESSION["kargo_id"])){
      $kargo=$_SESSION["kargo_id"];
      header("location:odemekontrol.php?kargoid=$kargo");
   }
   elseif(empty($_GET["kargo_id"])){
      header("adres.php");
   }
}
if(isset($_GET["kargoid"])){
   $_SESSION["kargo_id"]=$_GET["kargoid"];
}
else{
   $_SESSION["kargo_id"]=null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Notebook</title>
    <link rel="stylesheet" href="adres.css" type="text/css">
    <link rel="icon" size="16x16" href="ProjeResimler/favicon.png">
    <style>
      ::selection{
    color:rgb(0,0,0);
    background-color:rgb(0, 250, 250);
}
      </style>

</head>
<div id="TumSayfa"><?php
if(isset($_GET["degistir"])){
   $id=$_GET["degistir"];
   $musteri_id=$_SESSION["musteri_id"];
   $adresler=$db->query("SELECT * FROM adres_tanimlari WHERE adres_id=$id AND musteri_id=".$musteri_id);
   $adres2=$adresler->fetch();
?>
<div id="formAlani1">
   <form action="adresDegistir.php?id=<?=$id?>" method="POST">
      Ad: <input type="text" name="ad2" id="" value="<?=$adres2["musteri_ad"]?>">
      Soyad: <input type="text" name="soyad2" id="" value="<?=$adres2["musteri_soyad"]?>">
      Adres Tanımı:<input type="text" name="adresTanimi2" id="" value="<?=$adres2["adres_tanimi"]?>">
      Adres :<input type="text" name="adres2" id="" value="<?=$adres2["musteri_adres"]?>">
      Şehir: <input type="text" value="<?=$adres2["musteri_sehir"]?>" name="sehir2">
      İlçe: <input type="text" name="ilce2" id="" value="<?=$adres2["musteri_ilce"]?>">
      <input type="submit" name="" id="" value="Değiştir">
      <a href="adres.php"><input type="button" name="" id="" value="Vazgeç"></a>
   </form>
</div>

<?php } 
if(isset($_GET["ekle"])){
   ?>
   <div id="formAlani2">
   <form action="adresEkle.php" method="POST">
      Ad: <input type="text" name="ad" id="">
      Soyad: <input type="text" name="soyad" id="">
      Telefon: <input type="tel" name="tel" id="">
      Adres Tanımı:<input type="text" name="adresTanimi" id="" >
      Adres :<input type="text" name="adres" id="" >
      Şehir: <input type="text" name="sehir">
      İlçe: <input type="text" name="ilce" id="">
      <input type="submit" name="" id="" value="EKLE">
      <a href="adres.php"><input type="button" name="" id="" value="Vazgeç"></a>
   </form>
</div>
 <?php }
 ?>
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
      
        <div id="adreslerAlani">
        <div id="kademeler">
               <img src="ProjeResimler/mavisepet.png" alt="" style="margin-bottom:9px;height:22px"><span style="margin-left:3px;color:rgb(0, 250, 250);font-weight:500;font-size:16px"> SEPETİM</span>
                <hr style="width:50px;float:left;margin:0 10px 0 10px;background-color:white">
               <img src="ProjeResimler/mavikutu.png" alt=""><span style="color:rgb(0, 250, 250);font-weight:normal;font-size:16px;margin-left:3px"> TESLİMAT</span> 
               <hr style="width:50px;float:left;margin:0 10px 0 10px;background-color:white"> 
               <img src="ProjeResimler/grikart.png" alt=""><span style="color:white;font-weight:normal;font-size:16px;margin-left:3px"> ÖDEME</span>
             </div>
             <div id="solAlan">
             <div id="teslimatYazisi">
               <h1>Teslimat</h1>
             </div>
             
             <div id="adresler">
             <?php
             $musteri_id=$_SESSION["musteri_id"];
             $adresler=$db->query("SELECT * FROM adres_tanimlari WHERE musteri_id=$musteri_id");
             
             $adres=$adresler->fetch();
             if(isset($adres["musteri_adres"])){
             ?>
             <div id="tanim">
               <div id="baslik5">Başlık</div>
               <div id="adres6">Adres</div>
               <div id="telefon3">Telefon</div>
            </div>
           <?php 

           
           
           
            $adres2=$adres["musteri_adres"];
            $sehir=$adres["musteri_sehir"];
            $ilce=$adres["musteri_ilce"];
            $adresTanimi=$adres["adres_tanimi"];
           ?>
               <div id="adres">
                  <div id="bilgiler">
                  <div id="adresTanimi"><?php echo strtoupper($adresTanimi); ?></div>
                  <div id="adresBilgileri"><?php echo mb_strtoupper($adres2,'UTF-8');  echo mb_strtoupper(" ".$sehir."/".$ilce,'UTF-8');?></div>
                  
                  </div><div id="telefon"><?=$adres["musteri_tel"]?></div>
                  <div id="islemler">
                  
                  <div id="degistir"><a href="adres.php?degistir=<?=$adres["adres_id"]?>">DEĞİŞTİR</a></div>
                  </div>
               </div>       
             
<?php }else{ ?>
                <div id="adresEkle"><a href="adres.php?ekle">Adres Ekle</a></div>
<?php } ?>
             </div>
             <div id="kargosec">Kargo Seç</div>
             <div id="kargolar">
               <div id="yurtici" style="<?php if(isset($_SESSION["kargo_id"])){
                  if($_SESSION["kargo_id"]==1){
                     echo "border-color: #00FAFA";
                  }
               } ?>"><a href="adres.php?kargoid=1"><img src="ProjeResimler/yurtici.jpg" alt=""></a></div>
               <div id="mng" style="<?php if(isset($_SESSION["kargo_id"])){
                  if($_SESSION["kargo_id"]==2){
                     echo "border-color:#00FAFA";
                  }
               } ?>"><a href="adres.php?kargoid=2"><img src="ProjeResimler/MNGKargo.jpg" alt=""></a></div>
               <div id="aras" style="<?php if(isset($_SESSION["kargo_id"])){
                  if($_SESSION["kargo_id"]==3){
                     echo "border-color:#00FAFA";
                  }
               } ?>"><a href="adres.php?kargoid=3"><img src="ProjeResimler/araskargo.jpg" alt=""></a></div>
               <div id="ups" style="<?php if(isset($_SESSION["kargo_id"])){
                  if($_SESSION["kargo_id"]==4){
                     echo "border-color:#00FAFA";
                  }
               } ?>"><a href="adres.php?kargoid=4"><img src="ProjeResimler/upskargo.jpg" alt=""></a></div>
             </div>
             </div>
             <div id="urunOzeti">
             <div id="ozetBaslik"><p>Sipariş Özeti</p> </div>
               <div id="ozetFiyat">
                  <div id="tFiyat"><span id="toFiyat">Toplam Fiyat:</span> <span id="topFiyat"> <?=$_SESSION["kdvsizFiyat"]?> TL</span></div>
                  <div id="kdv"><span id="kdvY">KDV:</span><span id="kdvYa"><?=$_SESSION["kdv"]?> TL</span></div>
               </div>
               <div id="kdvAlani"><span id="kdvYazisi">Toplam (KDV dahil):</span> <span id="toplamFiyat"><?=$_SESSION["toplamFiyat"]?> TL</span></div>
               <div id="devamet">
                  <div id="devamButon"><a href="adres.php?kontrol"><span id="devamEt"> DEVAM ET</span> <img src="ProjeResimler/icons8-right-arrow-50.png"></a></div>
               </div>
             </div>
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