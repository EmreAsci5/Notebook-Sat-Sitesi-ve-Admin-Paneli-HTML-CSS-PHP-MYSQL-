<?php
session_start();
if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
  header("location:adminGiris.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="AnaSayfa.css">
    <link rel="icon" sizes="16x16" href="resimler/control-panel.png">
</head>
<body>
  <div id="baslik">
<p id="baslikYazisi">Admin Paneli</p>
</div>
    <div id="solSekme">
      <div id="logoDiv">
        AdminEA
        <img src="resimler/<?=$_SESSION["resim"]?>" alt="">
        <div id="cevrimiciBlok">
        <div id="yesil"></div>
        <div id="cevrimici">Çevrimiçi</div>
        </div>
      </div>
      <div id="anaSayfa">
      <a href="AnaSayfa.php"><img src="resimler/home.png" alt=""><p id="anaSayfaYazisi">Ana Sayfa</p></a>
      </div>
      <div id="istatistikler">
       <a href="istatistikler.php"><img src="resimler/stats.png" alt=""><p id="istatistiklerSayfaYazisi">İstatistikler</p></a>
      </div>
      <div id="Ürünler">
        <a href="urunler.php"><img src="resimler/ürün.png" alt=""><p id="ürünlerYazisi">Ürünler</p></a>
      </div>
      <div id="kullanicilar">
        <a href="kullanicilar.php"><img src="resimler/icons8-people-30.png" alt=""><p id="kullanicilarYazisi">Kullanıcılar</p></a>
      </div>
      <div id="siparisler">
        <a href="siparisler.php"><img src="resimler/icons8-shopping-bag-50.png" alt=""><p id="siparislerYazisi">Siparişler</p></a>
      </div>
      <div id="cikis">
      <a href="cikis.php"><img src="resimler/icons8-log-out-32.png" alt=""><p id="cikisYazisi">Çıkış Yap</p> </a>
      </div>
    </div>
    <div id="anaEkran">
      <div id="bilgisayarEkle">
        <h1 style="margin-left:100px;color:white">Bilgisayar Ekle</h1>
          <form action="bilgisayarEkle.php" method="POST">
              Kategori:<select name="kategori" id="kategori">
                <option value="1">Oyun Bilgisayarı</option>
                <option value="2">Ofis Bilgisayarı</option>
                <option value="3">İş İstasyonu</option>
              </select><br>
              Model Ad:<input type="text" name="modelAd" required><br>
              Model Seri:<input type="text" name="modelSeri" required><br>
              İşlemci: <input type="text" name="islemci" required><br>
              Ekran Kartı: <input type="text" name="ekranKarti" required><br>
              Ekran: <input type="text" name="ekran" required> <br>
              Ram Belleği: <input type="text" name="ram" required><br>
              SSD: <input type="text" name="ssd" required><br>
              İşletim Sistemi: <input type="text" name="isletim" required><br>
              Alış Fiyatı:<input type="text" name="alisFiyati" required><br>
              Satış Fiyatı:<input type="text" name="satisFiyati" required><br>
              Resim Url:<input type="text" name="resim" required><br>
              Stok: <input type="text" name="stok" required><br>
              <input type="submit" value="EKLE">
          </form>
      </div>
      <div id="aksesuarEkle">
        <h1 style="color:white">Aksesuar Ekle</h1>
        <form action="aksesuarEkle.php" method="POST">
          Kategori: <select name="kategori2" id="kategori2">
               <option value="4">Mouse</option>
               <option value="5">Klavye</option>
               <option value="7">Kulaklık</option>
          </select><br>
          Model Ad: <input type="text" name="modelAd2"><br>
          Model Seri: <input type="text" name="modelSeri2"><br>
          1. Özellik: <input type="text" name="ozellik1"><br>
          2. Özellik: <input type="text" name="ozellik2"><br>
          3. Özellik: <input type="text" name="ozellik3"><br>
          4. Özellik: <input type="text" name="ozellik4"><br>
          5. Özellik: <input type="text" name="ozellik5"><br>
          Alış Fiyatı: <input type="text" name="alisFiyati2"><br>
          Satış Fiyatı: <input type="text" name="satisFiyati2"><br>
          Resim url: <input type="text" name="resim2"><br>
          Stok: <input type="text" name="stok2" required><br>
          <input type="submit" value="EKLE">
        </form>
      </div>
      <div id="monitorEkle">
        <h1 style="color:white">Monitor Ekle</h1>
        <form action="monitorEkle.php" method="POST">
        Model Ad: <input type="text" name="modelAd3"><br>
          Model Seri: <input type="text" name="modelSeri3"><br>
          Ekran: <input type="text" name="ekran3"><br>
          Hertz: <input type="text" name="hertz"><br>
          Tepki Süresi: <input type="text" name="tepkiSuresi"><br>
          Hoparlör: <input type="text" name="hoparlor"><br>
          Çözünürlük: <input type="text" name="cozunurluk"><br>
          Alış Fiyatı: <input type="text" name="alisFiyati3"><br>
          Satış Fiyatı: <input type="text" name="satisFiyati3"><br>
          Resim url: <input type="text" name="resim3"><br>
          Stok: <input type="text" name="stok3" required><br>
          <input type="submit" value="EKLE">
        </form>
      </div>
    </div>
</body>
</html>