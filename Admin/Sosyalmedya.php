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
              <h3 class="card-title">Sosyal Medya Ayarları</h3> </div> <?php
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
                  <label for="exampleInputEmail1">Facebook</label>
                  <input value="<?php echo $ayarcek['facebook'] ?>" name="facebook" type="text" class="form-control"  placeholder="Lütfen Facebook Adresinizi Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">İnstagram</label>
                  <input value="<?php echo $ayarcek['instagram'] ?>" name="instagram" type="text" class="form-control"  placeholder="Lütfen İnstagram Adresinizi Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Youtube</label>
                  <input value="<?php echo $ayarcek['youtube'] ?>" name="youtube" type="text" class="form-control"  placeholder="Lütfen Youtube Adresinizi Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Twitter</label>
                  <input value="<?php echo $ayarcek['twitter'] ?>" name="twitter" type="text" class="form-control"  placeholder="Lütfen Facebook Adresinizi Giriniz">
                </div>

              <div class="card-footer">
                <button name="sosyalmedyakaydet" type="submit" class="btn btn-primary">Gönder</button>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php' ?>
