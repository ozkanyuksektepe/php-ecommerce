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
            <form action="İslem/İslem.php" method="POST" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Resim</label>
                  <img style="width:250px" src="resimler/hakkimizda/<?php echo $hakkimizdacek['hakkimizda_resim'] ?>" >
                </div>
                <input type="hidden" name="eskiresim" value="<?php echo $hakkimizdacek['hakkimizda_resim'] ?>">
                <div class="form-group">
                  <label for="exampleInputPassword1">Resim</label>
                  <input name="resim" type="file" class="form-control" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Hakkımızda Başlık</label>
                  <input value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>" name="baslik" type="text" class="form-control"  placeholder="Lütfen Başlığınızı Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Misyon</label>
                  <input value="<?php echo $hakkimizdacek['hakkimizda_misyon'] ?>" name="misyon" type="text" class="form-control"  placeholder="Lütfen Misyonunuzu Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Vizyon</label>
                  <input value="<?php echo $hakkimizdacek['hakkimizda_vizyon'] ?>" name="vizyon" type="text" class="form-control"  placeholder="Lütfen Vizyonunuzu Giriniz">
                </div>
                <label>Hakkımızda Detay</label>
                <textarea name="detay"  class="ckeditor" id="editor1"><?php echo $hakkimizdacek['hakkimizda_detay'] ?></textarea>

              <div class="card-footer">
                <button name="hakkimizdakaydet" type="submit" class="btn btn-primary">Gönder</button>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php' ?>
