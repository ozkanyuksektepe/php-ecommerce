<?php
session_start();
require_once 'Baglanti.php';

if (isset($_POST['ayarkaydet'])) {


  $duzenle = $Baglanti->prepare("UPDATE ayarlar set

baslik=:baslik,
aciklama=:aciklama,
anahtarkelime=:anahtarkelime

WHERE id=1

");

  $update = $duzenle->execute(array(
    'baslik' => $_POST['Baslik'],
    'aciklama' => $_POST['aciklama'],
    'anahtarkelime' => $_POST['anahtarkelime']


  ));

  if ($update) {
    header("location:../Ayarlar.php?yuklenme=basarili");
  } else {
    header("location:../Ayarlar.php?yuklenme=basarisiz");
}


}

if (isset($_POST['iletisimkaydet'])) {


  $duzenle = $Baglanti->prepare("UPDATE ayarlar set

telefon=:telefon,
adres=:adres,
email=:email,
mesai=:mesai

WHERE id=1

");

  $update = $duzenle->execute(array(
    'telefon' => $_POST['telefon'],
    'adres' => $_POST['adres'],
    'email' => $_POST['email'],
    'mesai' => $_POST['mesai']


  ));

  if ($update) {
    header("location:../İletisim.php?yuklenme=basarili");
  } else {
    header("location:../İletisim.php?yuklenme=basarisiz");
  }


}

if (isset($_POST['sosyalmedyakaydet'])) {


  $duzenle = $Baglanti->prepare("UPDATE ayarlar set

facebook=:facebook,
instagram=:instagram,
youtube=:youtube,
twitter=:twitter

WHERE id=1

");

  $update = $duzenle->execute(array(
    'facebook' => $_POST['facebook'],
    'instagram' => $_POST['instagram'],
    'youtube' => $_POST['youtube'],
    'twitter' => $_POST['twitter']


  ));

  if ($update) {
    header("location:../Sosyalmedya.php?yuklenme=basarili");
  } else {
    header("location:../Sosyalmedya.php?yuklenme=basarisiz");
  }


}


if (isset($_POST['logokaydet'])) {
  $uploads_dir='../resimler/logo';
  @$tmp_name=$_FILES['logo'] ["tmp_name"];
  @$name=$_FILES['logo'] ["name"];

  $sayi=rand(1,1000000);
  $sayi2=rand(1,100000);
  $sayi3=rand(10000,2000000);

  $sayilar=$sayi.$sayi2.$sayi3;
  $resimyolu=$sayilar.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


  $duzenle = $Baglanti->prepare("UPDATE ayarlar set

logo=:logo


WHERE id=1

");

  $update = $duzenle->execute(array(
    'logo' => $resimyolu


  ));

  $resimsil=$_POST['eskilogo'];
  unlink("../resimler/logo/$resimsil");

  if ($update) {
    header("location:../Ayarlar.php?yuklenme=basarili");
  } else {
    header("location:../Ayarlar.php?yuklenme=basarisiz");
  }
}


if (isset($_POST['hakkimizdakaydet'])) {


if ($_FILES['resim'] ["size"]>0) {


  $uploads_dir='../resimler/Hakkimizda';
  @$tmp_name=$_FILES['resim'] ["tmp_name"];
  @$name=$_FILES['resim'] ["name"];

  $sayi=rand(1,1000000);
  $sayi2=rand(1,100000);
  $sayi3=rand(10000,2000000);

  $sayilar=$sayi.$sayi2.$sayi3;
  $resimyolu=$sayilar.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

  $duzenle = $Baglanti->prepare("UPDATE hakkimizda set

hakkimizda_baslik=:hakkimizda_baslik,
hakkimizda_detay=:hakkimizda_detay,
hakkimizda_misyon=:hakkimizda_misyon,
hakkimizda_vizyon=:hakkimizda_vizyon,
hakkimizda_resim=:hakkimizda_resim

WHERE hakkimizda_id=1

");

  $update = $duzenle->execute(array(
    'hakkimizda_baslik' => $_POST['baslik'],
    'hakkimizda_detay' => $_POST['detay'],
    'hakkimizda_misyon' => $_POST['misyon'],
    'hakkimizda_vizyon' => $_POST['vizyon'],
    'hakkimizda_resim' => $resimyolu


  ));

  if ($update) {
    $resimsil=$_POST['eskiresim'];
    unlink("../resimler/Hakkimizda/$resimsil");
    header("location:../Hakkimizda.php?yuklenme=basarili");
  } else {
    header("location:../Hakkimizda.php?yuklenme=basarisiz");
  }
}





else{
  $duzenle = $Baglanti->prepare("UPDATE hakkimizda set

hakkimizda_baslik=:hakkimizda_baslik,
hakkimizda_detay=:hakkimizda_detay,
hakkimizda_misyon=:hakkimizda_misyon,
hakkimizda_vizyon=:hakkimizda_vizyon


WHERE hakkimizda_id=1

");

  $update = $duzenle->execute(array(
    'hakkimizda_baslik' => $_POST['baslik'],
    'hakkimizda_detay' => $_POST['detay'],
    'hakkimizda_misyon' => $_POST['misyon'],
    'hakkimizda_vizyon' => $_POST['vizyon']



  ));

  if ($update) {
    header("location:../Hakkimizda.php?yuklenme=basarili");
  } else {
    header("location:../Hakkimizda.php?yuklenme=basarisiz");
  }
}
}


if (isset($_POST['girisyap'])) {

  $kadi=htmlspecialchars($_POST['kadi']);
  $sifre=htmlspecialchars($_POST['sifre']);
  $sifreguclu=md5($sifre);



  $kullanicisor=$Baglanti->prepare("SELECT * from Kullanici where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre
  and kullanici_yetki=:kullanici_yetki");
  $kullanicisor->execute(array(
    'kullanici_adi'=>$kadi,
    'kullanici_sifre'=>$sifreguclu,
    'kullanici_yetki'=>2
  ));


  $var=$kullanicisor->rowCount();

  if ($var >0) {
    echo $_SESSION['girisbelgesi']=$kadi;
    Header("Location:../İndex?durum=hosgeldin");
  }
  else{
    Header("Location:../Login?durum=hata");
  }





}


if (isset($_POST['uyelerkaydet'])) {

  $kadi=htmlspecialchars($_POST['kadi']);
  $sifre=htmlspecialchars($_POST['sifre']);
  $adsoyad=htmlspecialchars($_POST['adsoyad']);
  $sifreguclu=md5($sifre);


  $kullanicisor=$Baglanti->prepare("SELECT * from Kullanici where kullanici_adi=:kullanici_adi and kullanici_yetki=:kullanici_yetki");
  $kullanicisor->execute(array(
    'kullanici_adi'=>$kadi,
    'kullanici_yetki'=>2
  ));

  $var=$kullanicisor->rowCount();

  if ($var >0) {
    Header("Location:../Uyeler-ekle?yuklenme=kullanicivar");
  }
  else {


    $uploads_dir = '../Resimler/Kullanici';
    @$tmp_name = $_FILES['resim'] ["tmp_name"];
    @$name = $_FILES['resim'] ["name"];

    $sayi = rand(1, 1000000);
    $sayi2 = rand(1, 100000);
    $sayi3 = rand(10000, 2000000);

    $sayilar = $sayi . $sayi2 . $sayi3;
    $resimyolu = $sayilar . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $kullanicikaydet = $Baglanti->prepare("INSERT into kullanici SET

  kullanici_adi=:kullanici_adi,
  kullanici_sifre=:kullanici_sifre,
  kullanici_adsoyad=:kullanici_adsoyad,
  kullanici_yetki=:kullanici_yetki,
  kullanici_resim=:kullanici_resim




");

    $insert = $kullanicikaydet->execute(array(
      'kullanici_adi' => $kadi,
      'kullanici_sifre' => $sifreguclu,
      'kullanici_adsoyad' => $adsoyad,
      'kullanici_yetki' => 2,
      'kullanici_resim' => $resimyolu


    ));

    if ($insert) {
      header("location:../Uyeler?yuklenme=basarili");
    } else {
      header("location:../Uyeler?yuklenme=basarisiz");
    }
  }
}

if (isset($_GET['kullanicisil'])) {

  $kullanicisil = $Baglanti->prepare("DELETE from kullanici where kullanici_id=:kullanici_id");

           $kullanicisil->execute(array(
             'kullanici_id'=>$_GET['id']
           ));

    if ($kullanicisil) {
      Header("Location:../Uyeler?durum=basarılı");
    }else {
      Header("Location:../Uyeler?durum=hata");
    }
}


if (isset($_POST['kategorikaydet'])) {
  $kategorikaydet = $Baglanti->prepare("INSERT into kategori SET

  kategori_adi=:kategori_adi,
  kategori_sira=:kategori_sira,
  kategori_durum=:kategori_durum
  




");

  $insert = $kategorikaydet->execute(array(
    'kategori_adi' => $_POST['katadi'],
    'kategori_sira' => $_POST['sira'],
    'kategori_durum' => $_POST['kategoridurum']


  ));

  if ($insert) {
    header("location:../Kategori?yuklenme=basarili");
  } else {
    header("location:../Kategori?yuklenme=basarisiz");
  }
}


if (isset($_POST['kategoriduzenle'])) {
  $kat=$_POST['katid'];
  $duzenle = $Baglanti->prepare("UPDATE kategori set

kategori_adi=:kategori_adi,
kategori_sira=:kategori_sira,
kategori_durum=:kategori_durum

WHERE kategori_id=$kat

");

  $update = $duzenle->execute(array(
    'kategori_adi' => $_POST['katadi'],
    'kategori_sira' => $_POST['sira'],
    'kategori_durum' => $_POST['kategoridurum']


  ));

  if ($update) {
    header("location:../Kategori.php?yuklenme=basarili");
  } else {
    header("location:../Kategori.php?yuklenme=basarisiz");
  }
}

if (isset($_GET['kategorisil'])) {
  $kategorisil = $Baglanti->prepare("DELETE from kategori where kategori_id=:kategori_id");

  $kategorisil->execute(array(
    'kategori_id'=>$_GET['id']
  ));

  if ($kategorisil) {
    Header("Location:../Kategori?durum=basarılı");
  }else {
    Header("Location:../Kategori?durum=hata");
  }
}



if (isset($_POST['sliderkaydet'])) {
  $uploads_dir = '../Resimler/Slider';
  @$tmp_name = $_FILES['slideresim'] ["tmp_name"];
  @$name = $_FILES['slideresim'] ["name"];

  $sayi = rand(1, 1000000);
  $sayi2 = rand(1, 100000);
  $sayi3 = rand(10000, 2000000);

  $sayilar = $sayi . $sayi2 . $sayi3;
  $resimyolu = $sayilar . $name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


  $sliderkaydet = $Baglanti->prepare("INSERT into slider SET

  slider_baslik=:slider_baslik,
  slider_aciklama=:slider_aciklama,
  slider_button=:slider_button,
  slider_sira=:slider_sira,
  slider_link=:slider_link,
  slider_durum=:slider_durum,
  slider_banner=:slider_banner,
  slider_resim=:slider_resim




");

  $insert = $sliderkaydet->execute(array(
    'slider_baslik' => $_POST['sliderbaslik'],
    'slider_aciklama' => $_POST['slideraciklama'],
    'slider_button' => $_POST['sliderbutton'],
    'slider_sira' => $_POST['slidersira'],
    'slider_link' => $_POST['sliderlink'],
    'slider_durum' => $_POST['sliderdurum'],
    'slider_banner' => $_POST['sliderbanner'],
    'slider_resim' => $resimyolu


  ));

  if ($insert) {
    header("location:../Slider?yuklenme=basarili");
  } else {
    header("location:../Slider?yuklenme=basarisiz");
  }
}


if (isset($_POST['sliderduzenle'])) {

  if ($_FILES['slideresim'] ["size"]>0) {
    $uploads_dir = '../Resimler/Slider';
    @$tmp_name = $_FILES['slideresim'] ["tmp_name"];
    @$name = $_FILES['slideresim'] ["name"];

    $sayi = rand(1, 1000000);
    $sayi2 = rand(1, 100000);
    $sayi3 = rand(10000, 2000000);

    $sayilar = $sayi . $sayi2 . $sayi3;
    $resimyolu = $sayilar . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


    $slideid = $_POST['id'];
    $duzenle = $Baglanti->prepare("UPDATE slider set

slider_baslik=:slider_baslik,
  slider_aciklama=:slider_aciklama,
  slider_button=:slider_button,
  slider_sira=:slider_sira,
  slider_link=:slider_link,
  slider_durum=:slider_durum,
  slider_banner=:slider_banner,
  slider_resim=:slider_resim

WHERE slider_id=$slideid

");

    $update = $duzenle->execute(array(
      'slider_baslik' => $_POST['sliderbaslik'],
      'slider_aciklama' => $_POST['slideraciklama'],
      'slider_button' => $_POST['sliderbutton'],
      'slider_sira' => $_POST['slidersira'],
      'slider_link' => $_POST['sliderlink'],
      'slider_durum' => $_POST['sliderdurum'],
      'slider_banner' => $_POST['sliderbanner'],
      'slider_resim' => $resimyolu


    ));


    if ($update) {
      $resimsil=$_POST['eskiresim'];
      unlink("../Resimler/Slider/$resimsil");

      header("location:../Slider.php?yuklenme=basarili");
    } else {
      header("location:../Slider.php?yuklenme=basarisiz");
    }

  }else {
    $slideid = $_POST['id'];
    $duzenle=$Baglanti->prepare("UPDATE slider set

slider_baslik=:slider_baslik,
  slider_aciklama=:slider_aciklama,
  slider_button=:slider_button,
  slider_sira=:slider_sira,
  slider_link=:slider_link,
  slider_durum=:slider_durum,
  slider_banner=:slider_banner
  

WHERE slider_id=$slideid

");

    $update=$duzenle->execute(array(
      'slider_baslik' => $_POST['sliderbaslik'],
      'slider_aciklama' => $_POST['slideraciklama'],
      'slider_button' => $_POST['sliderbutton'],
      'slider_sira' => $_POST['slidersira'],
      'slider_link' => $_POST['sliderlink'],
      'slider_durum' => $_POST['sliderdurum'],
      'slider_banner' => $_POST['sliderbanner']


    ));

    if ($update) {
      header("location:../Slider.php?yuklenme=basarili");
    } else {
      header("location:../Slider.php?yuklenme=basarisiz");
    }
  }
}

if (isset($_POST['slidersil'])) {
  $slidersil = $Baglanti->prepare("DELETE from slider where slider_id=:slider_id");

  $slidersil->execute(array(
    'slider_id'=>$_POST['id']
  ));

  if ($slidersil) {
    $resimsil=$_POST['resim'];
    unlink("../Resimler/Slider/$resimsil");
    Header("Location:../Slider?durum=basarılı");
  }else {
    Header("Location:../Slider?durum=hata");
  }
}









if (isset($_POST['urunlerkaydet'])) {

  $yonlendir=$_POST['katsid'];
  $uploads_dir = '../Resimler/Urunler';
  @$tmp_name = $_FILES['urunleresim'] ["tmp_name"];
  @$name = $_FILES['urunleresim'] ["name"];

  $sayi = rand(1, 1000000);
  $sayi2 = rand(1, 100000);
  $sayi3 = rand(10000, 2000000);

  $sayilar = $sayi . $sayi2 . $sayi3;
  $resimyolu = $sayilar . $name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


  $urunlerkaydet=$Baglanti->prepare("INSERT into urunler SET

  kategori_id=:kategori_id,
  urun_baslik=:urun_baslik,
  urun_aciklama=:urun_aciklama,
  urun_sira=:urun_sira,
  urun_model=:urun_model,
  urun_renk=:urun_renk,
  urun_adet=:urun_adet,
  urun_durum=:urun_durum,
  urun_fiyat=:urun_fiyat,
  urun_etiket=:urun_etiket,
  onecikan=:onecikan,
  urun_resim=:urun_resim




");

  $insert=$urunlerkaydet->execute(array(
    'kategori_id' => $_POST['urunlerkategori'],
    'urun_baslik' => $_POST['urunlerbaslik'],
    'urun_aciklama' => $_POST['urunleraciklama'],
    'urun_sira' => $_POST['urunlersira'],
    'urun_model' => $_POST['urunlermodel'],
    'urun_renk' => $_POST['urunlerrenk'],
    'urun_adet' => $_POST['urunleradet'],
    'urun_durum' => $_POST['urunlerdurum'],
    'urun_fiyat' => $_POST['urunlerfiyat'],
    'urun_etiket' => $_POST['urunleranahtar'],
    'onecikan' => $_POST['urunleronecikar'],
    'urun_resim' => $resimyolu


  ));

  if ($insert) {
    header("location:../Urunler?katid=$yonlendir&yuklenme=basarili");
  } else {
    header("location:../Urunler?katid=$yonlendir&yuklenme=basarisiz");
  }
}




if (isset($_POST['urunduzenle'])) {

  if ($_FILES['urunesim'] ["size"]>0) {
    $uploads_dir = '../Resimler/Urunler';
    @$tmp_name = $_FILES['urunleresim'] ["tmp_name"];
    @$name = $_FILES['urunleresim'] ["name"];

    $sayi = rand(1, 1000000);
    $sayi2 = rand(1, 100000);
    $sayi3 = rand(10000, 2000000);

    $sayilar = $sayi . $sayi2 . $sayi3;
    $resimyolu = $sayilar . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

    $yonlendir=$_POST['katsid'];
    $urunid = $_POST['id'];
    $duzenle = $Baglanti->prepare("UPDATE slider set

 kategori_id=:kategori_id,
  urun_baslik=:urun_baslik,
  urun_aciklama=:urun_aciklama,
  urun_sira=:urun_sira,
  urun_model=:urun_model,
  urun_renk=:urun_renk,
  urun_adet=:urun_adet,
  urun_durum=:urun_durum,
  urun_fiyat=:urun_fiyat,
  urun_etiket=:urun_etiket,
  onecikan=:onecikan,
  urun_resim=:urun_resim


WHERE urun_id=$urunid

");

    $update = $duzenle->execute(array(
      'kategori_id' => $_POST['urunlerkategori'],
      'urun_baslik' => $_POST['urunlerbaslik'],
      'urun_aciklama' => $_POST['urunleraciklama'],
      'urun_sira' => $_POST['urunlersira'],
      'urun_model' => $_POST['urunlermodel'],
      'urun_renk' => $_POST['urunlerrenk'],
      'urun_adet' => $_POST['urunleradet'],
      'urun_durum' => $_POST['urunlerdurum'],
      'urun_fiyat' => $_POST['urunlerfiyat'],
      'urun_etiket' => $_POST['urunleranahtar'],
      'onecikan' => $_POST['urunleronecikar'],
      'urun_resim' => $resimyolu


    ));


    if ($update) {
      $resimsil=$_POST['eskiresim'];
      unlink("../Resimler/Urunler/$resimsil");

      header("location:../Urunler?katid=$yonlendir&yuklenme=basarili");
    } else {
      header("location:../Urunler?katid=$yonlendir&yuklenme=basarisiz");
    }

  }else {
    $yonlendir=$_POST['katsid'];
    $urunid = $_POST['id'];
    $duzenle=$Baglanti->prepare("UPDATE urunler set

  kategori_id=:kategori_id,
  urun_baslik=:urun_baslik,
  urun_aciklama=:urun_aciklama,
  urun_sira=:urun_sira,
  urun_model=:urun_model,
  urun_renk=:urun_renk,
  urun_adet=:urun_adet,
  urun_durum=:urun_durum,
  urun_fiyat=:urun_fiyat,
  urun_etiket=:urun_etiket,
  onecikan=:onecikan
  
  

WHERE urun_id=$urunid

");

    $update=$duzenle->execute(array(
      'kategori_id' => $_POST['urunlerkategori'],
      'urun_baslik' => $_POST['urunlerbaslik'],
      'urun_aciklama' => $_POST['urunleraciklama'],
      'urun_sira' => $_POST['urunlersira'],
      'urun_model' => $_POST['urunlermodel'],
      'urun_renk' => $_POST['urunlerrenk'],
      'urun_adet' => $_POST['urunleradet'],
      'urun_durum' => $_POST['urunlerdurum'],
      'urun_fiyat' => $_POST['urunlerfiyat'],
      'urun_etiket' => $_POST['urunleranahtar'],
      'onecikan' => $_POST['urunleronecikar']


    ));

    if ($update) {
      header("location:../Urunler?katid=$yonlendir&yuklenme=basarili");
    } else {
      header("location:../Urunler?katid=$yonlendir&yuklenme=basarisiz");
    }
  }
}

if (isset($_POST['urunlersil'])) {

  $yonlendir=$_POST['katsid'];
  $urunlersil = $Baglanti->prepare("DELETE from urunler where urun_id=:urun_id");

  $urunlersil->execute(array(
    'urun_id'=>$_POST['id']
  ));

  if ($urunlersil) {
    $resimsil=$_POST['resim'];
    unlink("../Resimler/Urunler/$resimsil");
    header("location:../Urunler?katid=$yonlendir&yuklenme=basarili");
  }else {
    header("location:../Urunler?katid=$yonlendir&yuklenme=basarisiz");
  }
}


if (isset($_POST['cokluresimsil'])) {

  $yonlendir=$_POST['urunid'];
  $cokluresimsil = $Baglanti->prepare("DELETE from cokluresim where id=:id");

  $cokluresimsil->execute(array(
    'id'=>$_POST['id']
  ));

  if ($cokluresimsil) {
    $resimsil=$_POST['resim'];
    unlink("../Resimler/Cokluresim/$resimsil");
    Header("Location:../cokluresim?id=$yonlendir&yuklenme=basarili");
  }else {
    Header("Location:../cokluresim?id=$yonlendir&yuklenme=basarisiz");
  }
}


if (isset($_POST['kullaniciduzenle'])) {

  $id = $_POST['kullaniciid'];

  $duzenle = $Baglanti->prepare("UPDATE kullanici set
                     
 
                     

kullanici_adsoyad=:kullanici_adsoyad,
kullanici_email=:kullanici_email,
kullanici_adres=:kullanici_adres,
kullanici_il=:kullanici_il,
kullanici_ilce=:kullanici_ilce,
kullanici_tel=:kullanici_tel                     

WHERE kullanici_id=$id

");

  $update = $duzenle->execute(array(
    'kullanici_adsoyad' => $_POST['adsoyad'],
    'kullanici_email' => $_POST['email'],
    'kullanici_adres' => $_POST['adres'],
    'kullanici_il' => $_POST['sehir'],
    'kullanici_ilce' => $_POST['ilce'],
    'kullanici_tel' => $_POST['telefon']


  ));

  if ($update) {
    header("location:../../Kullanici?yuklenme=basarili");
  } else {
    header("location:../../Kullanici?yuklenme=basarisiz");
  }
}






if (isset($_POST['Yorumkaydet'])) {
  $gelenurl=$_SERVER['HTTP_REFERER'];
  $yorumkaydet=$Baglanti->prepare("INSERT into yorumlar SET 



		yorum_detay=:yorum_detay,
		urun_id=:urun_id,
		kullanici_id=:kullanici_id,
        yorum_onay=:yorum_onay
		");

  $insert=$yorumkaydet->execute(array(
    'yorum_detay'=>$_POST['yorum'],
    'urun_id'=>$_POST['urunid'],
    'kullanici_id'=>$_POST['kullaniciid'],

    'yorum_onay'=>0


  ));
  if ($insert) {

    header("Location:$gelenurl?yuklenme=basarili");
  }
  else{
    header("Location:$gelenurl?yuklenme=basarisiz");
  }
}


if (isset($_POST['yorumonayla'])) {

  $yorumid=$_POST['yorumid'];

  $duzenle=$Baglanti->prepare("UPDATE yorumlar SET 



		yorum_onay=:yorum_onay
	

		WHERE yorum_id=$yorumid

		");


  $update=$duzenle->execute(array(

    'yorum_onay'=>1



  ));
  if ($update) {

    header("Location:../Yorumlar.php?yuklenme=basarili");
  }
  else{
    header("Location:../Yorumlar.php?yuklenme=basarisiz");
  }
}




if (isset($_GET['yorumlarsil'])) {

  $yorumlarsil = $Baglanti->prepare("DELETE from yorumlar where yorum_id=:yorum_id");

  $yorumlarsil->execute(array(
    'yorum_id'=>$_GET['id']
  ));

  if ($yorumlarsil) {
    Header("Location:../Yorumlar?durum=basarılı");
  }else {
    Header("Location:../Yorumlar?durum=hata");
  }
}




if (isset($_GET['siparisonayla'])) {

  $siparisid=$_GET['id'];

  $duzenle=$Baglanti->prepare("UPDATE siparisler SET 



		siparis_onay=:siparis_onay
	

		WHERE siparis_id=$siparisid

		");


  $update=$duzenle->execute(array(

    'siparis_onay'=>1



  ));
  if ($update) {

    header("Location:../Siparisler.php?yuklenme=basarili");
  }
  else{
    header("Location:../Siparisler.php?yuklenme=basarisiz");
  }
}



if (isset($_GET['siparisreddet'])) {

  $siparisid=$_GET['id'];

  $duzenle=$Baglanti->prepare("UPDATE siparisler SET 



		siparis_onay=:siparis_onay
	

		WHERE siparis_id=$siparisid

		");


  $update=$duzenle->execute(array(

    'siparis_onay'=>2



  ));
  if ($update) {

    header("Location:../Siparisler?yuklenme=basarili");
  }
  else{
    header("Location:../Siparisler?yuklenme=basarisiz");
  }
}


if (isset($_GET['abonesil'])) {
  $abonesil = $Baglanti->prepare("DELETE from abone where abone_id=:abone_id");

  $abonesil->execute(array(
    'abone_id'=>$_GET['id']
  ));

  if ($abonesil) {
    Header("Location:../abone?yuklenme=basarili");
  }else {
    Header("Location:../abone?yuklenme=basarisiz");
  }
}



if (isset($_POST['siparisguncelle'])) {
  $siparisid=$_POST['siparisnumara'];
  $duzenle = $Baglanti->prepare("UPDATE siparisler set

siparis_yeniadet=:siparis_yeniadet,
siparis_not=:siparis_not

WHERE siparis_id=$siparisid

");

  $update = $duzenle->execute(array(
    'siparis_yeniadet' => $_POST['yenıadet'],
    'siparis_not' => $_POST['not']


  ));

  if ($update) {
    header("location:../../Siparisler.php?yuklenme=guncellendi");
  } else {
    header("location:../../Siparisler.php?yuklenme=basarisiz");
  }
}


if (isset($_POST['sipduzenle'])) {
  $siparisid=$_POST['sipid'];
  $duzenle = $Baglanti->prepare("UPDATE siparisler set

urun_adet=:urun_adet


WHERE siparis_id=$siparisid

");

  $update = $duzenle->execute(array(
    'urun_adet' => $_POST['adet'],



  ));

  if ($update) {
    header("location:../Siparisler.php?yuklenme=guncellendi");
  } else {
    header("location:../Siparisler.php?yuklenme=basarisiz");
  }
}

