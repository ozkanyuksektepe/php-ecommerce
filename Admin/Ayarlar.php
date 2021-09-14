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
                  <h6 style="color:red">(Yükleme İşlemi Başarısız)</h6>
                <?php }
                ?>

            <!-- /.card-header -->
            <!-- form start -->
            <form action="İslem/İslem.php" method="POST" >
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Site Başlığı</label>
                  <input value="<?php echo $ayarcek['baslik'] ?>" name="Baslik" type="text" class="form-control"  placeholder="Lütfen Sitenizin Başlığını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Açıklama</label>
                  <input value="<?php echo $ayarcek['aciklama'] ?>" name="aciklama" type="text" class="form-control"  placeholder="Lütfen Sitenizin Açıklamasını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Anahtar Kelime</label>
                  <input value="<?php echo $ayarcek['anahtarkelime'] ?>" name="anahtarkelime" type="text" class="form-control"  placeholder="Lütfen Sitenizin Anahtar Başlığınızı Giriniz">
                </div>

              <div class="card-footer">
                <button name="ayarkaydet" type="submit" class="btn btn-primary">Gönder</button>
              </div>
            </form>
          </div>
          <div class="card card-primary col-md-12">
            <form action="İslem/İslem.php" method="POST" enctype="multipart/form-data" >
              <div class="card-body">
                <input type="hidden" name="eskilogo" value="<?php echo $ayarcek['logo'] ?>">
                <div class="form-group">
                  <label for="exampleInputPassword1">Logo</label>
                  <img style="width:250px" src="resimler/logo/<?php echo $ayarcek['logo'] ?>" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Logo</label>
                  <input name="logo" type="file" class="form-control" >
                </div>

                <div class="card-footer">
                  <button name="logokaydet" type="submit" class="btn btn-primary">Gönder</button>
                </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php' ?>
