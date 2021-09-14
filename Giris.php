<?php require_once 'header.php'; ?>

            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="İslem.php" method="POST" >
                                <div class="login-form">
                                    <h4 class="login-title">Giriş Yap <?php if (@$_GET['durum']=="hata") { ?>
                                        <small style="color: red"> (Kullanıcı Adı yada Şifre Hatalı)</small>
                                    <?php } ?>
                                        <?php if (@$_GET['durum']=="gulegule") { ?>
                                            <small style="color:#FF4500"> (Görüşmek Üzere)</small>
                                        <?php } ?>

                                        <?php if (@$_GET['durum']=="girisyap") { ?>
                                            <small style="color:#FF4500"> (Lütfen Giriş Yapınız)</small>
                                        <?php } ?>
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Kullanıcı Adı</label>
                                            <input name="kadi" required="" class="mb-0" type="text" placeholder="Kullanıcı Adınızı Giriniz">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Şifre</label>
                                            <input name="sifre" required="" class="mb-0" type="password" placeholder="Şifrenizi Giriniz">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                                <input type="checkbox" id="remember_me">
                                                <label for="remember_me">Beni Hatırla</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="#">Şifrenizi mi Unuttunuz</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button name="login" class="register-button mt-0">GİRİŞ yap</button>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           <?php require_once 'footer.php'; ?>