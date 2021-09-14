<?php
require_once 'Admin/İslem/Baglanti.php';
if (isset($_POST['sifremiunuttum'])) {

    $kadi=$_POST['kadi'];

    $kullanicisor=$Baglanti->prepare("SELECT * from Kullanici where kullanici_adi=:kullanici_adi and kullanici_yetki=:kullanici_yetki ");
    $kullanicisor->execute(array(
        'kullanici_adi'=>$kadi,
        'kullanici_yetki'=>1
    ));
    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
    $var=$kullanicisor->rowCount();

    $id=$kullanicicek['kullanici_id'];

    if($var=="0") {
        echo "Kullanıcı adı ya da Şifre Hatalı!";
    }else {
        $sifreolustur=rand(100,100000);
        $sifreharf="aou";
        $sifreharf2="mhg";
        $yenisifre=$sifreharf.$sifreolustur.$sifreharf2;
        $md5sifre=md5($yenisifre);



        $sifreunuttum=$Baglanti->prepare("UPDATE kullanici SET 

		kullanici_sifre=:kullanici_sifre
                       
		WHERE kullanici_id=$id

		");

        $update=$sifreunuttum->execute(array(

            'kullanici_sifre'=>$md5sifre
        ));

    }


    if($update) {
        echo "Şifre Değişti";
    }else {
        echo "Şifre Değişmedi";
    }
}

















?>