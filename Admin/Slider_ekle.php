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
              <h3 class="card-title">Slider</h3> </div> <?php
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
                  <label for="exampleInputPassword1">Slider Resim </label>
                  <input name="slideresim" type="file" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slider Başlık</label>
                  <input name="sliderbaslik" type="text" class="form-control"  placeholder="Lütfen Slider Başlığını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Slider Açıklama</label>
                  <input name="slideraciklama" type="text" class="form-control"  placeholder="Lütfen Slider Açıklamasını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Slider Sıra</label>
                  <input name="slidersira" type="text" class="form-control"  placeholder="Lütfen Slider Sırasını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Slider Link</label>
                  <input name="sliderlink" type="text" class="form-control"  placeholder="Lütfen Slider Linkini Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Slider Button Adı</label>
                  <input name="sliderbutton" type="text" class="form-control"  placeholder="Lütfen Slider Button Adını Giriniz">
                </div>
                <div class="form-group">
                  <label>slider Durum</label>
                  <select name="sliderdurum" class="form-control select2" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>slider Banner</label>
                  <select name="sliderbanner" class="form-control select2" style="width: 100%;">
                    <option value="1" selected="selected">Slider Yap</option>
                    <option value="0">Banner Yap</option>
                  </select>
                </div>
              <div class="card-footer">
                <button name="sliderkaydet" type="submit" class="btn btn-primary">Gönder</button>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php' ?>
