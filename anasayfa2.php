<?php
session_start();
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
include("baglan.php");
if(isset($_GET["urunid"])){
   $urun_id=$_GET["urunid"];
   $musteri_id=$_SESSION["musteri_id"];
   $kontroller=$db->query("SELECT urun_id FROM alisveris_sepeti WHERE urun_id=$urun_id AND musteri_id=$musteri_id");
   $kontrol=$kontroller->fetch();
   if(empty($kontrol["urun_id"])){
   $db->query("INSERT INTO alisveris_sepeti (urun_id,urun_adet,musteri_id) VALUES ($urun_id,1,$musteri_id)");
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Notebook</title>
    <link rel="stylesheet" href="anasayfa2.css" type="text/css">
    <link rel="icon" size="16x16" href="ProjeResimler/favicon.png">
    <style>
      ::selection{
    color:rgb(0,0,0);
    background-color:rgb(0, 250, 250);
}
      </style>

</head>
<body>
<div id="TumSayfa">
    <div id="header">
     <div id="baslik">
        <span id="baslik">
            <div id="menuDivi">
               <ul id="Secenekler">
                <li><a href="tel:0 546 975 67 32">0 546 975 67 32</a></li>
                <li><a href="mailto:emreasci6@gmail.com">MAİL GÖNDER</a></li>
                <li></li>
                <li></li>
               </ul>
            </div>
        </span>
     </div>
     <div id="baslik2">
         <div><a href="anasayfa2.php">
            <img src="ProjeResimler/Dragon.png" alt="Dragon Notebook" id="logo">
         </div></a>
         <div id="baslik3">
            <form action="arama2.php" method="POST">
               <input type="text" placeholder="Arama Yap" required name="arama">
               <input type="image" id="arabutonu" src="ProjeResimler/icons8-search-50.png" style="width:40px;height:40px;border-color:#49494a;margin-left:3px">
               </form>
            <div style="gap:20px;width:400px;display:flex;flex-direction: row;
            justify-content: flex-end;">
             <div id="Sepetim">
                <a href="sepetim2.php">Sepetim</a>
             </div>
             <ul id="hesabimSecenekler">
               <li id="Hesabim"><a href=""><div id="hesapresim">
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
    <div id="kategoriler">
      <ul id="seceneklerBelirlemeAlani">
         <li class="tumLaptoplar"><a href="tumUrunler2.php"> TÜM LAPTOPLAR</a>
         <ul>
            <li><a href="Manta2.php" id="Manta"><img src="ProjeResimler/Manta.png" alt=""> Manta</a></li>
            <li><a href="Fire2.php" id="Fire"><img src="ProjeResimler/Fire.png" alt=""> Fire</a></li>
            <li><a href="Hydra2.php" id="Hydra"><img src="ProjeResimler/Hydra.png" alt="">&nbsp;&nbsp; Hydra</a></li>
            <li><a href="Drake2.php" id="Drake"><img src="ProjeResimler/Drake.png" alt=""> Drake</a></li>
            <li><a href="Wrym2.php" id="Wrym"><img src="ProjeResimler/Wrym.png" alt=""> Wrym</a></li>
         </ul>
         </li>
         <li class="oyunBilgisayarlari"><a href="oyunBilgisayarlari2.php">OYUN BİLGİSAYARLARI</a>
          <ul>
            <li ><a href="Manta2.php" id="Manta2"> <img src="ProjeResimler/Manta.png" alt=""> Manta</a></li>
            <li ><a href="Fire2.php" id="Fire2"><img src="ProjeResimler/Fire.png" alt=""> Fire</a></li>
            <li ><a href="Hydra2.php" id="Hydra2"><img src="ProjeResimler/Hydra.png" alt=""> Hydra</a></li>
          </ul>
         </li>
         <li class="Aksesuar"><a href="aksesuarlar2.php" >AKSESUARLAR</a>
         <ul>
            <li><a href="mouse2.php" id="Mouse" >OYUNCU MOUSE</a></li>
            <li><a href="klavye2.php" id="klavye1">OYUNCU KLAVYESİ</a></li>
            <li><a href="kulaklik2.php" id="Kulaklik">OYUNCU KULAKLIĞI</a></li>
         </ul>
         </li>
         <li class="monitor"><a href="monitor2.php">OYUNCU MONİTÖRÜ</a>
         <ul>
            <li><a href="monitor2.php" id="dragonEye"><img src="ProjeResimler/monitor.png" alt="">Dragon Eye</a></li>
         </ul>
         </li>
         <li class="isBilgisayarlari"><a href="isBilgisayarlari2.php">OFİS BİLGİSAYARLARI</a>
         <ul>
            <li><a href="Drake2.php" id="Drake2"><img src="ProjeResimler/Drake.png" alt="">Drake</a></li>
         </ul>
         </li>
         <li class="isIstasyonlari"><a href="IsIstasyonlari2.php">İŞ İSTASYONLARI</a>
         <ul>
            <li><a href="Wrym2.php" id="Wrym2"><img src="ProjeResimler/Wrym.png" alt="">Wrym</a></li>
         </ul>
         </li>
      </ul>
      </div>
      <div id="reklam2">
         <div id="aciklama2">
        <a href="tumUrunler2.php">
       <h3> INTEL CORE İŞLEMCİLİ TÜM <br> DRAGON NOTEBOOKLAR ŞİMDİ <br> 1 YILLIK NORTON 360 FOR <br> GAMERS İLE GELİYOR!</h3>
       <p> Hesaplarınızı güvende tutup oyun performansını etkilemeyen anti-virüs <br>
          hizmetinden yararlanman için, 1 Yıllık Norton 360 for Gamers, Intel® Core™ <br>
           işlemcili tüm Dragon Notebook ürünleriyle birlikte geliyor.</p>
      </a>
   </div>
      </div>
      <div id="AnaEkran">
         <div id="sayfa">
           <div id="urun1"><img src="ProjeResimler/Fire.png" alt="">
         <div id="bilgiler">
              <p id="text1"><a href="Fire2.php">Fire F100 <br></a> Güce Sahip Ol,En Güçlü Ol</p>
              <p id="text2">Yeni güçlerin buluşması! Intel 12.nesil Intel® Core™ i9-12900HK
               işlemci ile NVDIA GeForce RTX™ 3080TI ekran kartının zirvedeki 
                yerine Dragon T540 ile ortak olun.</p>
             
             <div id="fiyat">
                <h1>30,570,00TL
                  <u>'den <br> başlayan fiyatlarla</u>
                </h1>
               <div id="satinAl"><a href="#"> SATIN AL</a></div>
               <div id="Seri"><a href="Fire2.php">SERİNİN ÜRÜNLERİ</a></div>
             </div>
         </div>
      </div>
      <div id="urun2">
         <img src="ProjeResimler/Hydra.png" alt="">
         <div id="bilgiler2">
            <p id="text3"><a href="#">Hydra T500 <br></a>RTX Ekran Kartları ve 11.Nesil İşlemci ile Güç Seninle!</p>
            <p id="text4">Hydra G910 oyun bilgisayarı, çeşitli ekran kartı, işlemci, lisans, bellek,
                depolama ve hatta ekran çeşitlerinden dilediğini seçip konfigüre etmeni sağlar.
                 İhtiyacın olan oyun bilgisayarı performansına en üstün kalitede parçalar ile ulaşabilirsin.</p>
                 <div id="fiyat3"><h1> 18,500,00<u>'den <br> başlayan fiyatlarla</u></h1>
                  <div id="satinAl3"><a href="#">SATIN AL</a></div>
                 <div id="Seri3"><a href="Hydra2.php">SERİNİN ÜRÜNLERİ</a></div>
                 </div>
                 

         </div>
      </div>
      <div id="urun3">
         <img src="ProjeResimler/Manta.png" alt="">
         <div id="bilgiler3">
            <p id="text5"><a href="Manta2.php">Manta G400 <br></a>11. ve 12. Nesil İşlemciler ile Kontrol Sende</p>
            <p id="text6">Excalibur G770 oyun bilgisayarı, çeşitli ekran kartı,
                işlemci, lisans, bellek, depolama ve hatta ekran çeşitlerinden dilediğini seçip konfigüre etmeni sağlar.
                 İhtiyacın olan oyun bilgisayarı performansına en üstün kalitede parçalar ile ulaşabilirsin.</p>
                 <div id="fiyat3"><h1> 18,500,00<u>'den <br> başlayan fiyatlarla</u></h1>
                  <div id="satinAl3"><a href="#">SATIN AL</a></div>
                 <div id="Seri3"><a href="Manta2.php">SERİNİN ÜRÜNLERİ</a></div>
                 </div>
                 
         </div>
      </div>
      <div id="tumUrunlerGor">
         <div id="tumUrunlerButonu"><a href="tumUrunler2.php"> TÜM ÜRÜNLERİ GÖR</a></div>
      </div>
      
         </div>
      </div>
      <div id="altAciklamaAlani">
         <div id="altAciklama">
           <p style="color:rgb(0, 250, 250) ;"> Laptop Oyun Bilgisayarları</p>          
Oyun sektörünün büyümesi ile birlikte kendine çok farklı bir dünya yaratan oyunlarda,
 oyun bilgisayarları ile birlikte eğlence daha da artıyor. Oyuncuların Dragon kalitesi
  ile tanışması adına farklı dizüstü oyun bilgisayar modellerimiz sizler için satışta.
   Bütçe dostu olması sayesinde eğlencenizi kolayca bir üst seviyeye çıkarabilirsiniz. 
   Özellikle tek bir alanda sınırlı kalamayan, özgürlüğüne düşkün oyuncular için özel 
   olarak geliştirdiğimiz dizüstü oyun bilgisayarlarıyla gittiğiniz her yerde sınırsız bir oyun keyfi sizinle.
  <p style="color:rgb(0, 250, 250) ;"> Laptop Oyun Bilgisayar Seçenekleri</p>
Intel ve Nvidia’nın bir araya geldiği laptop oyun bilgisayarlarımızda ihtiyaç duyulan tüm performans sizinle.
 Oyunları minimum grafik ayarlarında oynama dönemini sona erdirecek birbirinden güçlü ve özel modellerimiz 
 sayesinde artık oyunların büyülü dünyasında maceradan maceraya atlayacaksınız. Üstelik deneyimini ve performansını
  daha da arttırmak isteyenler için ergonomik aksesuar desteğini de sağlıyoruz. <br> <br>
 <strong> Fire T450, Hydra G910</strong>  ve <strong> Manta A515</strong> gibi en popüler dizüstü modellerimizi mutlaka inceleyin.
 Seri dahilinde onlarca seçeneği sunduğumuz web mağazasında, üstelik modellerin özelliklerini karşılaştırabilir,
  farklı modellerin özelliklerini tek bir dizüstü bilgisayarda toplayabilirsiniz. Seçeneklerin tamamen size özgü
  olduğu online mağazamızda, 12 aya varan taksit seçeneği gibi cazip fırsatlar da alışverişinizi keyifli kılacak
 diğer detaylar arasında yer alıyor. Dragon garantisini, kalitesini ve hızlı servis desteğini elde etmek için 
   hemen yeni modellerimize göz atın. İndirimler, dönemsel kampanyalar ile birlikte sizleri Dragon’un büyülü dünyasına davet ediyoruz.
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