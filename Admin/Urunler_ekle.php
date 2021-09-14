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
              <h3 class="card-title">Urunler</h3> </div> <?php
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
                  <label>Kategori Seç</label>
                  <select name="urunlerkategori" class="form-control select2" style="width: 100%;">
                    <?php
                    $katid=$_GET['katid'];
                    $kategori=$Baglanti->prepare("SELECT * FROM kategori order by kategori_id ASC ");
                    $kategori->execute();
                    while ($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)) {
                      $kategoriid=$kategoricek['kategori_id'];
                    ?>
                    <option <?php if ($katid==$kategoriid) {
                      echo "selected";
                    }?> value="<?php echo $kategoriid ?>"><?php echo $kategoricek['kategori_adi'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Resim </label>
                  <input name="urunleresim" type="file" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ürünler Başlık</label>
                  <input name="urunlerbaslik" type="text" class="form-control"  placeholder="Lütfen Urunler Başlığını Giriniz">
                </div>
                <label>Ürünler Açıklama</label>
                <textarea name="urunleraciklama"  class="ckeditor" id="editor1"></textarea>
                <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Sıra</label>
                  <input name="urunlersira" type="text" class="form-control"  placeholder="Lütfen Urunler Sırasını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Model</label>
                  <input name="urunlermodel" type="text" class="form-control"  placeholder="Lütfen Urunler Linkini Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Renk</label>
                  <input name="urunlerrenk" type="text" class="form-control"  placeholder="Lütfen Urunler Button Adını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Adet</label>
                  <input name="urunleradet" type="text" class="form-control"  placeholder="Lütfen Urunler Button Adını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Fiyat</label>
                  <input name="urunlerfiyat" type="text" class="form-control"  placeholder="Lütfen Urunler Button Adını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Anahtar Kelime</label>
                  <input name="urunleranahtar" type="text" class="form-control"  placeholder="Lütfen Urunler Button Adını Giriniz">
                </div>
                <div class="form-group">
                  <label>Ürünler Durum</label>
                  <select name="urunlerdurum" class="form-control select2" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Urunler Öne Çıkar</label>
                  <select name="urunleronecikar" class="form-control select2" style="width: 100%;">
                    <option value="1" selected="selected">Öne Çıkar</option>
                    <option value="0">Öne Çıkarma</option>
                  </select>
                </div>
              <div class="card-footer">
                <button name="urunlerkaydet" type="submit" class="btn btn-primary">Gönder</button>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php' ?>
