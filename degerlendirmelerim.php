<?php
session_start();
include("baglan.php");
if(empty($_SESSION["ad"]) && empty($_SESSION["soyad"]) && empty($_SESSION["sifre"]) && empty($_SESSION["email"]) && empty($_SESSION["telefon"])){
   header("location:girisyap.html");
}
if(isset($_GET["puan"])){
    $_SESSION["puan"]=$_GET["puan"];
    
}
if(isset($_GET["id"])){
    $urun_id=$_GET["id"];
    $kayitlar=$db->query("SELECT * FROM urunler INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
    INNER JOIN model ON model.model_id=urunler.model_id WHERE urunler.urun_id=$urun_id");
    $kayit=$kayitlar->fetch();
    ?>
    <div id="formAlani">
       
        <form action="degerlendir.php?id=<?=$kayit["urun_id"]?>" method="POST">
             <div id="resim4"><img src="ProjeResimler/<?=$kayit["katalog_resmi"]?>" alt=""></div>
             <div id="urunAd"><?=$kayit["model_ad"]?> <?=$kayit["model_seri"]?></div>
             <div id="yildiz">
            <a href="degerlendirmelerim.php?puan=1&id=<?=$kayit["urun_id"]?>"><img src="ProjeResimler/<?php
            if(isset($_GET["puan"])){
                $puan=$_GET["puan"];
                if($puan==1 || $puan==2 || $puan==3 || $puan==4 || $puan==5 ){
                    echo "tamyildiz";
                }
            }
            else{ echo "bosyildiz";}
            ?>.png"></a>
            <a href="degerlendirmelerim.php?puan=2&id=<?=$kayit["urun_id"]?>"><img src="ProjeResimler/<?php
            if(isset($_GET["puan"])){
                $puan=$_GET["puan"];
                if($puan==2 || $puan==3 || $puan==4 || $puan==5 ){
                    echo "tamyildiz";
                }
                else{
                    echo "bosyildiz";
                }
            }
            else{ echo "bosyildiz";}
            ?>.png"></a>
            <a href="degerlendirmelerim.php?puan=3&id=<?=$kayit["urun_id"]?>"><img src="ProjeResimler/<?php
            if(isset($_GET["puan"])){
                $puan=$_GET["puan"];
                if($puan==3 || $puan==4 || $puan==5 ){
                    echo "tamyildiz";
                }
                else{
                    echo "bosyildiz";
                }
            }
            else{ echo "bosyildiz";}
            ?>.png"></a>
            <a href="degerlendirmelerim.php?puan=4&id=<?=$kayit["urun_id"]?>"><img src="ProjeResimler/<?php
            if(isset($_GET["puan"])){
                $puan=$_GET["puan"];
                if($puan==4 || $puan==5 ){
                    echo "tamyildiz";
                }
                else{
                    echo "bosyildiz";
                }
            }
            else{ echo "bosyildiz";}
            ?>.png"></a>
            <a href="degerlendirmelerim.php?puan=5&id=<?=$kayit["urun_id"]?>"><img src="ProjeResimler/<?php
            if(isset($_GET["puan"])){
                $puan=$_GET["puan"];
                if($puan==5 ){
                    echo "tamyildiz";
                }
                else {
                    echo "bosyildiz";
                }
            }
            else{ echo "bosyildiz";}
            ?>.png"></a>
                    </div>
                    <div id="yorum"><textarea cols="30" rows="10" placeholder="Yorum yap.." name="yorum"></textarea></div>
                    <div id="butonlar"><input type="submit" value="Gönder" name="" id=""> <a href="degerlendirmelerim.php"><input type="button" value="Vazgeç"></a></div>
        </form>
    </div>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Notebook</title>
    <link rel="stylesheet" href="degerlendirmelerim.css" type="text/css">
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
            <div class="kategori" ><a href="adresBilgilerim.php">Adres Bilgilerim</a></div>
            <div class="kategori"style="border-color:#FBBD08;"><a href="">Değerlendirmelerim</a></div>
          </div>
         <div id="degerlendirmeler">
            <?php 
            $musteri_id=$_SESSION["musteri_id"];
            $urunler=$db->query("SELECT * FROM siparisler
            INNER JOIN urunler ON urunler.urun_id=siparisler.urun_id
            INNER JOIN model ON model.model_id=urunler.model_id
            INNER JOIN urunresimler ON urunresimler.urun_id=urunler.urun_id
             WHERE siparisler.durum_id=4 AND  siparisler.musteri_id=$musteri_id");
            while($urun=$urunler->fetch()){
            ?>
            
            <div id="degerlendirme">
                <div id="resim"><img src="ProjeResimler/<?=$urun["katalog_resmi"]?>" alt=""></div>
                <div id="adSoyad"><?php echo $urun["model_ad"]." ".$urun["model_seri"] ?> </div>
                <div id="sonuclar">
                    <?php
                    $urun_id=$urun["urun_id"];
                    $degerlendirme=$db->query("SELECT *,avg(puan) as ortalama FROM degerlendirme WHERE urun_id=$urun_id");
                    $deger=$degerlendirme->fetch();
                    $ortalama=$deger["ortalama"];
                    if($ortalama==0){
                        ?>
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <?php  echo "(".round($ortalama,2).")";
                    }
                    else if($ortalama>0 && $ortalama<=0.7){
                        ?>
                        <img src="ProjeResimler/yariyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <?php echo "(".round($ortalama,2).")";
                    }
                    else if($ortalama>0.7 && $ortalama<=1.2){
                        ?>
                        <img src="ProjeResimler/tamyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <?php echo "(".round($ortalama,2).")";

                    }
                    else if($ortalama>1.2 && $ortalama<=1.7){
                        ?>
                        <img src="ProjeResimler/tamyildiz.png">
                        <img src="ProjeResimler/yariyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <?php echo "(".round($ortalama,2).")";

                    }
                    else if($ortalama>1.7 && $ortalama<=2.2){
                        ?>
                        <img src="ProjeResimler/tamyildiz.png">
                        <img src="ProjeResimler/tamyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <?php echo "(".round($ortalama,2).")";
                    }
                    else if($ortalama>2.2 && $ortalama<=2.7){
                        ?>
                        <img src="ProjeResimler/tamyildiz.png">
                        <img src="ProjeResimler/tamyildiz.png">
                        <img src="ProjeResimler/yariyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <?php echo "(".round($ortalama,2).")";
                    }
                    else if($ortalama>2.7 && $ortalama<=3.2){
                        ?>
                        <img src="ProjeResimler/tamyildiz.png">
                        <img src="ProjeResimler/tamyildiz.png">
                        <img src="ProjeResimler/tamyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <img src="ProjeResimler/bosyildiz.png">
                        <?php  echo "(".round($ortalama,2).")";
                    }
                    else if($ortalama>3.2 && $ortalama<=3.7){
                        
                            ?>
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/yariyildiz.png">
                            <img src="ProjeResimler/bosyildiz.png">
                            <?php  echo "(".round($ortalama,2).")";
                    }
                    else if($ortalama>3.7 && $ortalama<=4.2){
                        ?>
                           <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/bosyildiz.png">
                        <?php echo "(".round($ortalama,2).")";
                    }
                    else if($ortalama>4.2 && $ortalama<=4.7){
                            ?>
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/yariyildiz.png">
                            <?php echo "(".round($ortalama,2).")";
                    }
                    else if($ortalama<4.7){
                        ?>
                        <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                            <img src="ProjeResimler/tamyildiz.png">
                        <?php echo "(".round($ortalama,2).")";
                    }
                    ?>
                </div><?php
                $musteri_id=$_SESSION["musteri_id"];
                $kontroller=$db->query("SELECT * FROM degerlendirme INNER JOIN yorumlar ON yorumlar.urun_id=degerlendirme.urun_id 
                WHERE degerlendirme.urun_id=$urun_id AND degerlendirme.musteri_id=$musteri_id");
                $kontrol=$kontroller->fetch();
                ?>
                <div id="degerlendir" style="visibility:<?php if(isset($kontrol["urun_id"])) echo "hidden"; else echo "visible"; ?>"><a href="degerlendirmelerim.php?id=<?=$urun["urun_id"]?>">Ürünü Değerlendir</a></div>
                <?php
                if(isset($kontrol["urun_id"]))
                {?>
                    <div id="degerlendirildi">Değerlendirildi!</div>
                    <?php
                }
                ?>


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