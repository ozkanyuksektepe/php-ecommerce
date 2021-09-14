<?php require_once 'header.php';


if ($var==0) {
    header("location:Giris?durum=girisyap");
}




?>

            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="Admin/İslem/İslem.php" method="POST" >
                                <div class="login-form">
                                    <h4 class="login-title">Kullanıcı Bilgileri <?php if (@$_GET['yuklenme']=="basarisiz") { ?>
                                        <small style="color: red"> (Kullanıcı Adı yada Şifre Hatalı)</small>
                                    <?php }elseif (@$_GET['yuklenme']=="basarili"){ ?>
                                            <small style="color: green"> (Başarılı)</small>
                                <?Php      } ?></h4>
                                    <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Kullanıcı Ad Soyad</label>
                                            <input value="<?php echo $kullanicicek['kullanici_adsoyad'] ?>" name="adsoyad" required="" class="mb-0" type="text" placeholder="Kullanıcı Adınızı ve Soyadınızı Giriniz">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Email</label>
                                            <input value="<?php echo $kullanicicek['kullanici_email'] ?>" name="email" required="" class="mb-0" type="text" placeholder="Email Adresinizi Giriniz">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Adres</label>
                                            <input value="<?php echo $kullanicicek['kullanici_adres'] ?>" name="adres" required="" class="mb-0" type="text" placeholder="Lütfen Adresinizi Giriniz">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Şehir</label>
                                            <input value="<?php echo $kullanicicek['kullanici_il'] ?>" name="sehir" required="" class="mb-0" type="text" placeholder="Lütfen Şehir Giriniz">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>İlçe</label>
                                            <input value="<?php echo $kullanicicek['kullanici_ilce'] ?>" name="ilce" required="" class="mb-0" type="text" placeholder="Lütfen İlçe Giriniz">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Telefon</label>
                                            <input value="<?php echo $kullanicicek['kullanici_tel'] ?>" name="telefon" required="" class="mb-0" type="text" placeholder="Lütfen Telefon Numaranızı Giriniz">
                                        </div>
                                        <div class="col-md-12">
                                            <button name="kullaniciduzenle" class="register-button mt-0">KAYDET</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="İslem.php" method="POST" >
                                <div class="login-form">
                                    <h4 class="login-title">Kayıt Ol <?php
                                        if (@$_GET['durum']=="kullanicivar"){ ?>
                                            <small  style="color: red"> (Bu kullanıcı sistemde Kayıtlı) </small>
                                       <?php } elseif(@$_GET['durum']=="sifrehata") { ?>
                                            <small  style="color: red"> (Şifreniz Uyuşmuyor!) </small>
                                       <?php } elseif(@$_GET['durum']=="sifreeksik") { ?>
                                            <small style="color: red" > (Lütfen Şifrenizi Minimum 8 karakter olacak şekilde girin!) </small>
                                       <?php } elseif (@$_GET['durum']=="basarisiz") { ?>
                                            <small style="color: red"> (İşlem Başarısız!) </small>
                                       <?php } ?>

                                            </h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Kullanıcı Adı</label>
                                            <input name="kadi" required="" class="mb-0" type="text" placeholder="Kullanıcı Adınızı Giriniz">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Ad Soyad</label>
                                            <input name="adsoyad" required="" class="mb-0" type="text" placeholder="Adınızı Soyadınızı Giriniz">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email Adres</label>
                                            <input name="email" required="" class="mb-0" type="email" placeholder="Email Adresinizi Giriniz">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Şifre</label>
                                            <input name="sifre" required="" class="mb-0" type="password" placeholder="Şifrenizi Giriniz">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Şifre Tekrar</label>
                                            <input name="sifretekrar" required="" class="mb-0" type="password" placeholder="Şifrenizi Tekrar Giriniz">
                                        </div>
                                        <div class="col-12">
                                            <button name="register" class="register-button mt-0">Kayıt Ol</button>
                                        </div>
                                    </div>
                                </div>
                            </form><a href="Cikis"><button style="margin-top: 25px" class="btn btn-danger"><i class="fa fa-times-circle"></i> Çıkış Yap</button></a>
                        </div>
                    </div>
                </div>
            </div>
           <?php require_once 'footer.php'; ?>