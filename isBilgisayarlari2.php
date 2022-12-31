<?php
session_start();
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
?>
<?php
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
    <link rel="stylesheet" href="tumUrunler2.css" type="text/css">
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
               <li id="Hesabim"><div id="hesapresim">
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
     <hr>
    </div>
    </div>
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
              <li ><a href="Hydra2php" id="Hydra2"><img src="ProjeResimler/Hydra.png" alt=""> Hydra</a></li>
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
        <div id="tumUrunlerResim">
            <div id="golge">
            <div id="resimAciklama">
                <h1>Ofis Bilgisayarları</h1>
                <p>Adını Türk mitolojisindeki efsanevi canlılardan alan laptop
                     serileriyle masaüstü bilgisayarların performans alanındaki
                      hükümdarlığına son veren Dragon, geliştirdiği laptop 
                      modelleriyle dilediğiniz her yerde çalışmalarınızı sürdürmenizi 
                      ve güncel oyunları oynamanızı sağlıyor. Laptoplarının tamamında
                       Intel’in güçlü işlemcileri ve NVIDIA’nın oyun ya da iş istasyonlarına 
                       özel geliştirdiği GPU’lar bulunan Dragon, bu sayede en güncel oyunları 
                       ve profesyonel yazılımları performans sorunu olmadan çalıştırmanızı mümkün kılıyor.</p>
            </div>
        </div>
    </div>
    <div id="anaEkran">
        <div id="urunler">
             
        <?php
        include("baglan.php");
        $isBilgisayarlar=$db->query("SELECT * FROM urunler INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
        INNER JOIN fiyatlar ON fiyatlar.urun_id=urunler.urun_id
        INNER JOIN model ON model.model_id=urunler.model_id
        INNER JOIN kategori ON kategori.kategori_id=urunler.kategori_id
        WHERE kategori.kategori_id=2;
         ");
        while($kayit=$isBilgisayarlar->fetch())
        {
             
        ?>
        
         <div id="urun" style="height:600px"> <a href="goruntuleme2.php?urun_id=<?=$kayit["urun_id"]?>" id="gorunum">
           <div id="urunResim2"><img src="ProjeResimler/<?=$kayit["katalog_resmi"]?>" alt="" style="height:180px"></div> 
           <div id="urunBilgiler">
            <div id="urunModel"><?=$kayit["model_ad"]." ".$kayit["model_seri"]?> <br><div style="font-size:15px;"> Ofis Bilgisayarı</div></div>
            <ul>
           <?php
           $ozellikler=$db->query("SELECT * FROM ozellikdetay WHERE urun_id=".$kayit["urun_id"]);
           for($i=0;$i<6;$i++){
            $ozellik=$ozellikler->fetch();
            ?>
           <li><?=$ozellik["ozellik_detayi"]?></li><br>

           <?php } ?>
            </ul>
            <div id="fiyat">
               <h1><?=$kayit["satis_fiyati"]?> TL</h1>
            </div>
            <div id="sepeteEkle">  <a href="isBilgisayarlari2.php?urunid=<?=$kayit["urun_id"]?>" id="sepeteekle">Sepete Ekle</a></div>
           </div>
           </a>
         </div>
  <?php } ?>






        </div>
    </div>
</body>
</html>