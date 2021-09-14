<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Özkan Yüksektepe E-Ticaret Giriş</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body style="background-color: black" class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a style="color: white" href="../../index2.html"><b style="color: white">Özkan </b>Yüksektepe</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <?php
      if (@$_GET['durum']=="hata") { ?>
        <p style="color: red" class="login-box-msg"> Kullanıcı Adı yada Şifre Hatalı
      <?php }
       elseif(@$_GET['durum']=="gulegule") { ?>
        <p style="color: black" class="login-box-msg"> Görüşmek Üzere
      <?php }
      else{
        echo "Lütfen Giriş Bilgilerinizi Giriniz";
      }

?>
      </p>


      <form action="İslem/İslem.php" method="post">
        <div class="input-group mb-3">
          <input name="kadi" type="text" class="form-control" placeholder="Email Adresinizi Giriniz">
          <div class="input-group-append">
            <div class="input-group-text">
              <span style="color: black" class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="sifre" type="password" class="form-control" placeholder="Şifrenizi Giriniz">
          <div class="input-group-append">
            <div class="input-group-text">
              <span style="color: black" class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Beni Hatırla
              </label>
            </div>
          </div>

          <div class="col-4">
            <button name="girisyap" type="submit" class="btn btn-success btn-block">Giriş Yap</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


</body>
</html>
