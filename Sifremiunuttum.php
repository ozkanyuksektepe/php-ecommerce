<?php require_once 'header.php'; ?>

            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="sifreunuttummail" method="POST" >
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
                                        <div class="col-md-12">
                                            <button name="sifremiunuttum" class="register-button mt-0">GÖNDER</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           <?php require_once 'footer.php'; ?>