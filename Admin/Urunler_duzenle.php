<?php require_once 'header.php';

require_once 'sidebar.php';

$urunler=$Baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id");
$urunler->execute(array(
  'urun_id'=>$_GET['id']
));
$urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);



?>


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
                    $katid=$urunlercek['kategori_id'];
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
                  <label for="exampleInputPassword1"></label>
                  <img style="width: 200px" src="Resimler/Urunler/<?php echo $urunlercek['urun_resim'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Resim </label>
                  <input value="<?php echo $urunlercek['urun_resim'] ?>" name="urunleresim" type="file" class="form-control">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ürünler Başlık</label>
                  <input value="<?php echo $urunlercek['urun_baslik'] ?>" name="urunlerbaslik" type="text" class="form-control"  placeholder="Lütfen Ürün Başlığını Giriniz">
                </div>
                <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
                <label>Ürünler Açıklama</label>
                <textarea name="urunleraciklama"  class="ckeditor" id="editor1"><?php echo $urunlercek['urun_aciklama'] ?></textarea>
                <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Sıra</label>
                  <input value="<?php echo $urunlercek['urun_sira'] ?>" name="urunlersira" type="text" class="form-control"  placeholder="Lütfen Ürün Sırasını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Model</label>
                  <input value="<?php echo $urunlercek['urun_model'] ?>" name="urunlermodel" type="text" class="form-control"  placeholder="Lütfen Ürün Modelini Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Renk</label>
                  <input value="<?php echo $urunlercek['urun_renk'] ?>" name="urunlerrenk" type="text" class="form-control"  placeholder="Lütfen Ürün Rengini Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Adet</label>
                  <input value="<?php echo $urunlercek['urun_adet'] ?>" name="urunleradet" type="text" class="form-control"  placeholder="Lütfen Ürün Adetini Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Fiyat</label>
                  <input value="<?php echo $urunlercek['urun_fiyat'] ?>" name="urunlerfiyat" type="text" class="form-control"  placeholder="Lütfen Ürün Fiyatını Giriniz">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Ürünler Anahtar Kelime</label>
                  <input value="<?php echo $urunlercek['urun_etiket'] ?>" name="urunleranahtar" type="text" class="form-control"  placeholder="Lütfen Ürünün Anahtar Kelimesini Giriniz">
                </div>
                <div class="form-group">
                  <label>Ürünler Durum</label>
                  <select name="urunlerdurum" class="form-control select2" style="width: 100%;">
                    <option <?php if($urunlercek['urun_durum']=="1") {
                      echo "selected";
                    } ?> value="1" selected="selected">Aktif</option>
                    <option <?php if($urunlercek['urun_durum']=="0") {
                      echo "selected";
                    } ?> value="0">Pasif</option>
                  </select>
                </div>
                <input type="hidden" name="id" value="<?php echo $urunlercek['urun_id'] ?>">
                <input type="hidden" name="eskiresim" value="<?php echo $urunlercek['urun_resim'] ?>">
                <div class="form-group">
                  <label>Urunler Öne Çıkar</label>
                  <select name="urunleronecikar" class="form-control select2" style="width: 100%;">
                    <option <?php if ($urunlercek['onecikan']=="1") {
                        echo "selected";
                    } ?> value="1" selected="selected">Öne Çıkar</option>
                    <option <?php if ($urunlercek['onecikan']=="0") {
                        echo "selected";
                    }?> value="0">Öne Çıkarma</option>
                  </select>
                </div>
              <div class="card-footer">
                <button name="urunduzenle" type="submit" class="btn btn-primary">Gönder</button>
              </div>
            </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php' ?>
