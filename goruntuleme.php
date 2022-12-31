<?php
session_start();
include("baglan.php");
if(isset($_GET["urunid"])){
   $urun_id=$_GET["urunid"];
   $sepetim=$db->query("SELECT * FROM urunler INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
   INNER JOIN fiyatlar ON fiyatlar.urun_id=urunler.urun_id
   INNER JOIN model ON model.model_id=urunler.model_id
   WHERE urunler.urun_id=$urun_id");
   $sepet=$sepetim->fetch();
   $urun=array(
      "model_ad"=>$sepet["model_ad"],
      "model_seri"=>$sepet["model_seri"],
      "katalog_resmi"=>$sepet["katalog_resmi"],
      "satis_fiyati"=>$sepet["satis_fiyati"],
      "urun_id"=>$sepet["urun_id"],
      "stok"=>$sepet["stok"],
      "adet"=>1,
      "tFiyat"=>0
   );
   $_SESSION["sepetim"][$urun_id]=$urun;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Notebook</title>
    <link rel="stylesheet" href="goruntuleme.css" type="text/css">
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
         <div><a href="anasayfa.php">
            <img src="ProjeResimler/Dragon.png" alt="Dragon Notebook" id="logo">
         </div></a>
         <div id="baslik3">
         <form action="arama.php" method="POST">
               <input type="text" placeholder="Arama Yap" required name="arama">
               <input type="image" id="arabutonu" src="ProjeResimler/icons8-search-50.png" style="width:40px;height:40px;border-color:#49494a;margin-left:3px">
               </form>
            <div style="gap:20px;width:400px;display:flex;flex-direction: row;
            justify-content: flex-end;">
            <div id="Sepetim">
               <a href="sepetim.php"><?php if(isset($_SESSION["sepetim"])) echo "(".count($_SESSION["sepetim"]).")"; else echo "";?>Sepetim</a>
            </div>
          <div id="Giris">
               <a href="girisyap.html">Giriş Yap</a>
            </div>
            <div id="uyeOl">
             <a href="uyeol.html">Üye Ol</a> 
            </div>
         </div>
        </div>
     </div>
     <hr>
    </div>
    </div>
    <div id="kategoriler">
        <ul id="seceneklerBelirlemeAlani">
           <li class="tumLaptoplar"><a href="tumUrunler.php"> TÜM LAPTOPLAR</a>
           <ul>
              <li><a href="Manta.php" id="Manta"><img src="ProjeResimler/Manta.png" alt=""> Manta</a></li>
              <li><a href="Fire.php" id="Fire"><img src="ProjeResimler/Fire.png" alt=""> Fire</a></li>
              <li><a href="Hydra.php" id="Hydra"><img src="ProjeResimler/Hydra.png" alt="">&nbsp;&nbsp; Hydra</a></li>
              <li><a href="Drake.php" id="Drake"><img src="ProjeResimler/Drake.png" alt=""> Drake</a></li>
              <li><a href="Wrym.php" id="Wrym"><img src="ProjeResimler/Wrym.png" alt=""> Wrym</a></li>
           </ul>
           </li>
           <li class="oyunBilgisayarlari"><a href="oyunBilgisayarlari.php">OYUN BİLGİSAYARLARI</a>
            <ul>
              <li ><a href="Manta.php" id="Manta2"> <img src="ProjeResimler/Manta.png" alt=""> Manta</a></li>
              <li ><a href="Fire.php" id="Fire2"><img src="ProjeResimler/Fire.png" alt=""> Fire</a></li>
              <li ><a href="Hydra.php" id="Hydra2"><img src="ProjeResimler/Hydra.png" alt=""> Hydra</a></li>
            </ul>
           </li>
           <li class="Aksesuar"><a href="aksesuarlar.php" >AKSESUARLAR</a>
           <ul>
              <li><a href="mouse.php" id="Mouse" >OYUNCU MOUSE</a></li>
              <li><a href="klavye.php" id="klavye1">OYUNCU KLAVYESİ</a></li>
              <li><a href="kulaklik.php" id="Kulaklik">OYUNCU KULAKLIĞI</a></li>
           </ul>
           </li>
           <li class="monitor"><a href="monitor.php">OYUNCU MONİTÖRÜ</a>
           <ul>
              <li><a href="monitor.php" id="dragonEye"><img src="ProjeResimler/monitor.png" alt="">Dragon Eye</a></li>
           </ul>
           </li>
           <li class="isBilgisayarlari"><a href="isBilgisayarlari.php">OFİS BİLGİSAYARLARI</a>
           <ul>
              <li><a href="Drake.php" id="Drake2"><img src="ProjeResimler/Drake.png" alt="">Drake</a></li>
           </ul>
           </li>
           <li class="isIstasyonlari"><a href="IsIstasyonlari.php">İŞ İSTASYONLARI</a>
           <ul>
              <li><a href="Wrym.php" id="Wrym2"><img src="ProjeResimler/Wrym.png" alt="">Wrym</a></li>
           </ul>
           </li>
        </ul>
        </div>
        <div id="tumUrunlerResim">
            <div id="golge">
            <div id="resimAciklama">
                <h1>Bilgiler</h1>
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
          <div id="urun">
            <?php
            include("baglan.php");
            $urun_id=$_GET["urun_id"];
            $urunler=$db->query("SELECT * FROM urunler INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
            INNER JOIN fiyatlar ON fiyatlar.urun_id=urunler.urun_id
            INNER JOIN model ON model.model_id=urunler.model_id
            INNER JOIN kategori ON kategori.kategori_id=urunler.kategori_id WHERE urunler.urun_id='$urun_id'");
            $urun=$urunler->fetch();
            ?>
            <div id="bolme1">
             <div id="resim10"><img src="ProjeResimler/<?=$urun["katalog_resmi"]?>" alt=""></div>
             <div id="tamir"><img src="ProjeResimler/icons8-open-end-wrench-30.png" alt=""><p> Ömür boyu ücretsiz bakım garantisi</p></div>
             <div id="garanti"><img src="ProjeResimler/icons8-update-left-rotation-50.png" alt=""><p>İlk 15 gün içinde koşulsuz iade garantisi</p></div>
             <div id="degisimgaranti"><img src="ProjeResimler/icons8-pro-display-xdr-50.png" alt=""><p>İlk 30 gün içinde 1 adet ölü pixel çıksa bile birebir panel <br> değişimi garantisi</p></div>
             <div id="Degerlendirme">

                <?php
                $degerlendirme=$db->query("SELECT * FROM degerlendirme WHERE urun_id=$urun_id");
                    
                  while($deger=$degerlendirme->fetch()){
                   $yorumlar=$db->query("SELECT * FROM yorumlar
                INNER JOIN kayit ON kayit.musteri_id=yorumlar.musteri_id WHERE yorumlar.urun_id=$urun_id");
                   $yorum=$yorumlar->fetch();
      
                  if(isset($yorum["yorum_id"])){
                  ?>
             <div id="yorumlar">
                <div id="yildiz">
                   <?php
                  if($deger["puan"]==1){
                   ?>
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
                   <?php
                  }
                  else if($deger["puan"]==2){?>
                      <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
                      <?php
                  }
                  else if($deger["puan"]==3){?>
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
<?php
                  }
                  else if($deger["puan"]==4){
                   ?><img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/bosyildiz.png">
                   <?php
                  }
                  else if($deger["puan"]==5){
                   ?>
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <img src="ProjeResimler/tamyildiz.png">
                   <?php
                  }
           ?>
                </div>
                <div id="yorum"><?=$yorum["yorum"]?></div>
                <div id="adsoyad"><?=$yorum["musteri_ad"]?> <?=$yorum["musteri_soyad"]?></div>
             </div>
             <?php }
          
          } ?>
             </div>
            </div>
            <div id="bolme2">
            <div id="modeladseri"><?=$urun["model_ad"]?> <?=$urun["model_seri"]?></div>
            <div id="kategoriadi"><?=$urun["kategori_ad"]?></div>
            <div id="fiyat10"><?=$urun["satis_fiyati"]?> TL</div>
            <div id="ekle10"><a href="goruntuleme.php?urunid=<?=$kayit["urun_id"]?>"><input type="button" value="SEPETE EKLE"></a></div>
            <div id="teknikOzellikler">
            <ul>
               <?php
               $ozellikler=$db->query("SELECT * FROM ozellikdetay
               INNER JOIN urunler ON urunler.urun_id=ozellikdetay.urun_id WHERE urunler.urun_id=".$urun_id);
            if($urun["kategori_id"]==1 || $urun["kategori_id"]==2 || $urun["kategori_id"]==3){
           for($i=0;$i<6;$i++){
            $ozellik=$ozellikler->fetch();
            ?>
           <li><?=$ozellik["ozellik_detayi"]?></li>
           <?php }}
           else if($urun["kategori_id"]==4 || $urun["kategori_id"]==5 || $urun["kategori_id"]==6 || $urun["kategori_id"]==7){
            for($i=0;$i<5;$i++){
                $ozellik=$ozellikler->fetch();
                ?>
               <li><?=$ozellik["ozellik_detayi"]?></li>
               <?php }} ?>
               <li>Alüminyum İle Güçlendirilmiş Kasa</li>
               <li>Dragon Sırt Çantası Hediye</li>
            </ul>
         </div>
            </div>
          </div>
    </div>
</body>
</html>