<?php 
	session_start();
	if (isset($_SESSION['kullanici']) ) {
		if ($_SESSION['yetki'] == 0) {
			header('location:adminGiris.php');
		}elseif($_SESSION['yetki'] == 1) {
			header('location:AnaSayfa.php');
		}
		
	}
    if (isset($_POST["kullanici"]) && isset($_POST["sifre"])) {
        $db=new PDO("mysql:host=localhost;dbname=veritabani;charset=UTF8","root","");

        $admin=$_POST["kullanici"];
        $sifre=$_POST["sifre"];
        $sonuclar=$db->query("SELECT * FROM adminler where admin_ad='$admin' AND admin_sifre='$sifre'");
        $sonuc=$sonuclar->fetch();
        if($sonuc["admin_ad"]==$admin && $sonuc["admin_sifre"]==$sifre){
            $_SESSION["admin_id"]=$sonuc["admin_id"];
            $_SESSION["kullanici"]=$admin;
            $_SESSION["sifre"]=$sonuc["admin_sifre"];
            $_SESSION["yetki"]=$sonuc["yetki"];
            $_SESSION["resim"]=$sonuc["admin_resim"];

            if(empty($_SESSION["kullanici"]) && empty($_SESSION["sifre"])){
                header("location:adminGiris.php");
            }
            if($sonuc["yetki"]==0){
                header('location:adminGiris.php');
            }
                elseif($sonuc["yetki"]==1){
                    header('location:AnaSayfa.php');
                }
            }else{
                header('location:adminGiris.php'); 
                
          

    }
    
          }    
        else
        header('location:adminGiris.php');
        ?>
    