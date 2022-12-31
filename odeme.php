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
    <link rel="stylesheet" href="odeme.css" type="text/css">
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
               <li><a href="">Kullanıcı Bilgilerim</a></li>
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
               <img src="ProjeResimler/mavikart.png" alt=""><span style="color:rgb(0, 250, 250);font-weight:normal;font-size:16px;margin-left:3px"> ÖDEME</span>
             </div>
             <div id="solAlan">
             <div id="teslimatYazisi">
               <h1>Ödeme Türü</h1>
             </div>
             
             <div id="odemeler">
                <div id="secenekler">
                    <div id="kart">Kredi Kartı Taksit / Tek Çekim</div>
                </div>
               <div id="odeme">
                  <form action="odemekontrol.php" method="POST">
                <div id="kartno1">
               *Kart Numarası<input type="text" name="kartno" id="kartno" maxlength="16">
               *Son Kullanma Tarihi <select name="ay" id="month">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
               </select>

               <select name="yil" id="year">
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                  <option value="2024">2024</option>
                  <option value="2025">2025</option>
                  <option value="2026">2026</option>
                  <option value="2027">2027</option>
                  <option value="2028">2028</option>
                  <option value="2029">2029</option>
                  <option value="2030">2030</option>
                  <option value="2031">2031</option>
                  <option value="2032">2032</option>
                  <option value="2033">2033</option>
                  <option value="2034">2034</option>
                  <option value="2035">2035</option>
                  <option value="2036">2036</option>
                  <option value="2037">2037</option>
               </select>
              
                 </div>
                 <div id="cvcbilgi">
                  *CVC <input type="text" name="cvc" id="cvc">
                  *Kart Üzerindeki İsim <input type="text" name="isim" id="isim">
               </div>
               
               <div id="odeme2"><a href="odeme.php?odemeid=1"><input type="button" value="Nakit" style="<?php
               if(isset($_GET["odemeid"])){
                  if($_GET["odemeid"]==1){
                     $_SESSION["odeme_secenek"]=$_GET["odemeid"];
                  echo "border-color:rgb(0, 250, 250)";
                  }
                  else echo "";
               }
               ?>"></a> <a href="odeme.php?odemeid=2"><input type="button" value="Taksit" style="<?php
               if(isset($_GET["odemeid"])){
                  if($_GET["odemeid"]==2){
                     $_SESSION["odeme_secenek"]=$_GET["odemeid"];
                  echo "border-color:rgb(0, 250, 250)";
                  }
                  else echo "";
               }
               ?>"></a></div>
               <div id="taksit" style="<?php
               if(isset($_GET["odemeid"])){
                  if($_GET["odemeid"]==2){
                  echo "visibility:visible";
                  }
                  else echo "visibility:hidden";
               }
               else echo "visibility:hidden";
               ?>">
               Ödeyeceğiniz miktar <?php echo floor($_SESSION['toplamFiyat']/12); ?>*12 Ay</div>
               </div>

             

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
                  <div id="devamButon"><input type="submit" value="Sipariş ver"></div>
               </div>
               </form>
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