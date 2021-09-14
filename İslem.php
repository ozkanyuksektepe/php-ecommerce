<?php
session_start();
require_once 'Admin/İslem/Baglanti.php';


if (isset($_POST['login'])) {
    $kadi=htmlspecialchars($_POST['kadi']);
    $sifre=htmlspecialchars($_POST['sifre']);
    $sifreguclu=md5($sifre);



    $kullanicisor=$Baglanti->prepare("SELECT * from Kullanici where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre
 and kullanici_yetki=:kullanici_yetki ");
    $kullanicisor->execute(array(
        'kullanici_adi'=>$kadi,
        'kullanici_sifre'=>$sifreguclu,
        'kullanici_yetki'=>1
    ));


    $var=$kullanicisor->rowCount();

    if ($var >0) {
        echo $_SESSION['normalgiris']=$kadi;
        Header("Location:index?durum=hosgeldin");
    }
    else{
        Header("Location:Giris?durum=hata");
    }

}


if (isset($_POST['register'])) {
    $kadi=htmlspecialchars($_POST['kadi']);
    $sifre=htmlspecialchars($_POST['sifre']);
    $sifrem=md5($sifre);
    $sifreiki=htmlspecialchars($_POST['sifretekrar']);
    $mail=htmlspecialchars($_POST['email']);
    $adsoyad=htmlspecialchars($_POST['adsoyad']);

    $kullanicisor=$Baglanti->prepare("SELECT * from Kullanici where kullanici_adi=:kullanici_adi and kullanici_yetki=:kullanici_yetki or kullanici_email=:kullanici_email");
    $kullanicisor->execute(array(
        'kullanici_adi'=>$kadi,
        'kullanici_yetki'=>1,
        'kullanici_email'=>$mail
    ));

    $var=$kullanicisor->rowCount();


   if ($var >0) {
       Header('Location:Giris?durum=kullanicivar');
   }else {
       if ($sifre==$sifreiki) {
           if (strlen($sifre)>=8) {

               $kullanicikaydet = $Baglanti->prepare("INSERT into kullanici SET

  kullanici_adi=:kullanici_adi,
  kullanici_sifre=:kullanici_sifre,
  kullanici_adsoyad=:kullanici_adsoyad,
  kullanici_yetki=:kullanici_yetki,
  kullanici_email=:kullanici_email




");

               $insert = $kullanicikaydet->execute(array(
                   'kullanici_adi' => $kadi,
                   'kullanici_sifre' => $sifrem,
                   'kullanici_adsoyad' => $adsoyad,
                   'kullanici_yetki' => 1,
                   'kullanici_email' => $mail


               ));

               if ($insert) {
                   header("location:index?durum=basarili");
               } else {
                   header("location:Giris?durum=basarisiz");
               }



           }
           else {
               Header('Location:Giris?durum=sifreeksik');
           }
       }
       else {
          Header('Location:Giris?durum=sifrehata');
       }
   }

}


if (isset($_POST['sepeteekle'])) {

    $id=$_POST['urunid'];
    $adet=$_POST['adet'];

    setcookie('sepet['.$id.']',$adet, strtotime("+7day"));

    header('location:Sepet?durum=eklendi');





}

if (isset($_GET['sepetsil'])) {

    $id = $_GET['id'];
    $adet = $_GET['adet'];

    setcookie('sepet[' . $id . ']', $adet, strtotime("-7day"));

    header('location:Sepet?durum=silindi');

}




if (isset($_POST['alisverisbitir'])) {

$toplamfiyat=$_POST['toplamfiyat'];
$kadi=$_POST['kadi'];
    foreach (@$_COOKIE['sepet'] as $key => $value) {
        $urunler = $Baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id order by urun_sira ASC ");
        $urunler->execute(array(
            'urun_id' => $key

        ));
        ($urunlercek = $urunler->fetch(PDO::FETCH_ASSOC));

$fiyat=$urunlercek['urun_fiyat'];
        $alisveriskaydet = $Baglanti->prepare("INSERT into siparisler SET

  	
  kullanici_id=:kullanici_id,	
  urun_id=:urun_id,		
  urun_adet=:urun_adet,	
  urun_fiyat=:urun_fiyat,	
  toplam_fiyat=:toplam_fiyat,	
  odeme_turu=:odeme_turu,	
  siparis_onay=:siparis_onay
  




");

        $insert = $alisveriskaydet->execute(array(
            'kullanici_id' => $kadi,
            'urun_id' => $key,
            'urun_adet' => $value,
            'urun_fiyat' => $fiyat,
            'toplam_fiyat' => $toplamfiyat,
            'odeme_turu' => $_POST['odeme'],
            'siparis_onay' => 0


        ));
    }

        if ($insert) {
            header("location:index?durum=tesekkür");
        } else {
            header("location:index?durum=basarisiz");
        }



}


if (isset($_POST['aboneol'])) {
$guvenlimail=htmlspecialchars($_POST['abone']);
        $aboneol = $Baglanti->prepare("INSERT into abone SET

 abone_email=:abone_email
  




");

        $insert = $aboneol->execute(array(
            'abone_email'=>$guvenlimail


        ));

        if ($insert) {
            header("location:index?yuklenme=basarili");
        } else {
            header("location:index?yuklenme=basarisiz");
        }
    }




?>