<?php require_once 'header.php';

require_once 'sidebar.php';




?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="card card-primary col-md-12">
            <div class="card-header">
              <h3 class="card-title">Genel Ayarlar</h3> </div> <?php
                if (@$_GET['yuklenme']=="basarili") { ?>
                  <h6 style="color:green">(Yükleme İşlemi Başarılı)</h6>
                <?php }
                elseif (@$_GET['yuklenme']=="basarisiz"){ ?>
                  <h6 style="color:red">(Yükleme İşlemi Başarısız)</h6> <?php }
                elseif (@$_GET['yuklenme']=="kullanicivar"){ ?>
                <h6 style="color:red">(Bu Kullanıcı Kayıtlı!)</h6>
                <?php } ?>

            <!-- /.card-header -->
            <!-- form start -->
            <form action="İslem/İslem.php" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Resim</label>
                  <input name="resim" type="file" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Kullanıcı Adı</label>
                  <input name="kadi" type="text" class="form-control"  placeholder="Lütfen Kullanıcı Adınızı Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kullanıcı Şifre</label>
                  <input name="sifre" type="text" class="form-control"  placeholder="Lütfen Şifrenizi Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kullanıcı Ad Soyad</label>
                  <input name="adsoyad" type="text" class="form-control"  placeholder="Lütfen Adınızı ve Soyadınızı Giriniz">
                </div>

              <div class="card-footer">
                <button name="uyelerkaydet" type="submit" class="btn btn-primary">Gönder</button>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php' ?>
