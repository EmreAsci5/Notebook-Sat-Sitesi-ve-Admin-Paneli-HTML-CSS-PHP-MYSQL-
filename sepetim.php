<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Notebook</title>
    <link rel="stylesheet" href="sepetim.css" type="text/css">
    <link rel="icon" size="16x16" href="ProjeResimler/favicon.png">
    <style>
      ::selection{
    color:rgb(0,0,0);
    background-color:rgb(0, 250, 250);
}
      </style>

</head>
<div id="TumSayfa">
    <div id="header">
     <div id="baslik">
     </div>
     <div id="baslik2">
         <div><a href="anasayfa.php">
            <img src="ProjeResimler/Dragon.png" alt="Dragon Notebook" id="logo">
         </div></a>
         <div id="baslik3">
         <div style="gap:20px;width:400px;display:flex;flex-direction: row;
            justify-content: flex-end;margin-left:600px;margin-top:30px">
            <div id="Giris">
               <a href="girisyap.html">Giriş Yap</a>
            </div>
            <div id="uyeOl">
             <a href="uyeol.html">Üye Ol</a> 
            </div>
         </div>
         </div>
        </div>
     </div>
     <hr>
    </div>
    </div>
    <div id="anaEkran">
    <?php
    if(empty($_SESSION["sepetim"])){
      ?>
      <div><h1 style="color:white;">Sepete ürün eklemediniz!</h1><br>
 <a href="tumUrunler.php" style="line-height:0.3px;color:green;font-size:20px"><b> Ürünlere</b> </a><b style="font-size:20px;color:white"> göz atabilirsiniz</b>
   </div>
      <?php }
      else{
    ?>
        <div id="sepetimAlani">
             <div id="kademeler">
               <img src="ProjeResimler/mavisepet.png" alt="" style="margin-bottom:9px;height:22px"><span style="margin-left:3px;color:rgb(0, 250, 250);font-weight:500;font-size:16px"> SEPETİM</span>
                <hr style="width:50px;float:left;margin:0 10px 0 10px;background-color:white">
               <img src="ProjeResimler/grikutu.png" alt=""><span style="color:white;font-weight:normal;font-size:16px;margin-left:3px"> TESLİMAT</span> 
               <hr style="width:50px;float:left;margin:0 10px 0 10px;background-color:white"> 
               <img src="ProjeResimler/grikart.png" alt=""><span style="color:white;font-weight:normal;font-size:16px;margin-left:3px"> ÖDEME</span>
             </div>
             <?php
             
             ?>
             <div id="sepetimYazisi">
               <h1>Sepetim</h1>
             </div>
             <div id="sepetBaslik">
               <div id="urunAd">Ürün Adı</div>
               <div id="birimFiyat">Birim Fiyat</div>
               <div id="miktar">Miktar</div>
               <div id="toplam">Toplam</div>
             </div>
             <div id="sepet">
               <?php
  $_SESSION["toplamFiyat"]=0;
               if(isset($_GET["id"])){
                  $id=$_GET["id"];
                  unset($_SESSION["sepetim"][$id]);
                  header("location:sepetim.php");
               }
               if(isset($_GET["artiid"])){
                  $arti_id=$_GET["artiid"];
                  if($_SESSION["sepetim"][$arti_id]["stok"]-1>=$_SESSION["sepetim"][$arti_id]["adet"])   
                  $_SESSION["sepetim"][$arti_id]["adet"]++;
                  header("location:sepetim.php");
               }
                  elseif(isset($_GET["eksiid"])){
                     $eksi_id=$_GET["eksiid"];
                     if($_SESSION["sepetim"][$eksi_id]["stok"]+1>=$_SESSION["sepetim"][$eksi_id]["adet"] && $_SESSION["sepetim"][$eksi_id]["adet"]-1>0)   
                     $_SESSION["sepetim"][$eksi_id]["adet"]--;
                     header("location:sepetim.php");
                  }
               foreach($_SESSION["sepetim"] as $sepet){
               ?>
               <div id="urun">
                  <div id="resim"><img src="ProjeResimler/<?=$sepet["katalog_resmi"]?>" alt=""></div>
                  <div id="uAd"><p><?=$sepet["model_ad"]?> <?=$sepet["model_seri"]?></p></div>
                  <div id="bFiyat"><p><?=$sepet["satis_fiyati"]?> TL</p></div>
                    <div id="mktar">
                     <div id="bar">
                        <div id="arti"><a href="sepetim.php?artiid=<?=$sepet["urun_id"]?>">+</a></div>
                        <div id="sayi"><?=$sepet["adet"]?></div>
                        <div id="eksi"><a href="sepetim.php?eksiid=<?=$sepet["urun_id"]?>">-</a></div>
                     </div>
                    </div>
                    <?php  ?>
                  <div id="tplam"><?=$sepet["adet"]*$sepet["satis_fiyati"];?>TL</div>
                  <div id="sil"><a href="sepetim.php?id=<?=$sepet["urun_id"]?>"><img src="ProjeResimler/icons8-close-50.png" alt=""></a></div>
               </div>
               <?php
            
            $_SESSION["toplamFiyat"]+=$sepet["adet"]*$sepet["satis_fiyati"];
                  
               }
               $_SESSION["kdv"]=$_SESSION["toplamFiyat"]*0.18;
               $_SESSION["kdvsizFiyat"]=$_SESSION["toplamFiyat"]-$_SESSION["kdv"]
             ?>
             </div>
             


             <div id="urunOzeti">
               <div id="ozetBaslik"><p>Sipariş Özeti</p> </div>
               <?php
               ?>
               <div id="ozetFiyat">
                  <div id="tFiyat"><span id="toFiyat">Toplam Fiyat:</span> <span id="topFiyat"> <?=$_SESSION["kdvsizFiyat"]?> TL</span></div>
                  <div id="kdv"><span id="kdvY">KDV:</span><span id="kdvYa"><?=$_SESSION["kdv"]?> TL</span></div>
               </div>
               <div id="kdvAlani"><span id="kdvYazisi">Toplam (KDV dahil):</span> <span id="toplamFiyat"><?=$_SESSION["toplamFiyat"]?> TL</span></div>
               <div id="devamet">
                  <div id="devamButon"><a href="girisyap.html"><span id="devamEt"> DEVAM ET</span> <img src="ProjeResimler/icons8-right-arrow-50.png"></a></div>
               </div>
             </div>
        </div>
    </div>
    <?php } ?>
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