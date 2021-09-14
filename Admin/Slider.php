<?php require_once 'header.php';

require_once 'sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <?php
          if (@$_GET['yuklenme']=="basarili") { ?>
            <h6 style="color:green">(Yükleme İşlemi Başarılı)</h6>
          <?php }
          elseif (@$_GET['yuklenme']=="basarisiz"){ ?>
            <h6 style="color:red">(Yükleme İşlemi Başarısız)</h6>
          <?php }
          ?>
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Slider Tablosu</h3>

                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                   <a href="slider_ekle"><button style="float: right" type="submit" class="btn btn-success">Yeni Slider Ekle</button></a>
                    <thead>
                    <tr>
                      <th>Slider Resim</th>
                      <th>Slider Başlık</th>
                      <th>Slider Açıklama</th>
                      <th>Slider Button İsmi</th>
                      <th>Slider Durum</th>
                      <th>Slider Sıra</th>
                      <th>Slider Banner</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $slider=$Baglanti->prepare("SELECT * FROM slider order by slider_id ASC ");
                    $slider->execute();
                    while ($slidercek=$slider->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                      <td><img style="width: 250px" src="Resimler/Slider/<?php echo $slidercek['slider_resim'] ?>"></td>
                      <td><?php echo $slidercek['slider_baslik'] ?></td>
                      <td><?php echo $slidercek['slider_aciklama'] ?></td>
                      <td><?php echo $slidercek['slider_button'] ?></td>
                      <td><span class="tag tag-success"><?php
                          if ($slidercek['slider_durum']=="1") {
                            echo "Aktif";
                          }
                          elseif($slidercek['slider_durum']=="0") {
                            echo "Pasif";
                          } ?>
                      <td><?php echo $slidercek['slider_sira'] ?></td>
                      <td><span class="tag tag-success"><?php
                        if ($slidercek['slider_banner']=="1") {
                          echo "Slider";
                        }
                        elseif($slidercek['slider_banner']=="0") {
                          echo "Banner";
                        } ?></td>

                        </span></td>
                      <td><a href="slider_duzenle?id=<?php echo$slidercek['slider_id'] ?>"><button type="submit" class="btn btn-warning">Düzenle</button></a></td>
                      <form action="İslem/İslem.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $slidercek['slider_id']?>">
                        <input type="hidden" name="resim" value="<?php echo $slidercek['slider_resim']?>">
                      <td><button name="slidersil" type="submit" class="btn btn-danger">Sil</button></td>
                      </form>
                    </tr>
                    </tbody>
                  <?php } ?>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once 'footer.php' ?>
