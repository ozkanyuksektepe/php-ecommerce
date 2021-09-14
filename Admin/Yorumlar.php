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
                  <h3 class="card-title">Yorumlar Tablosu</h3>

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
                    <thead>
                    <tr>
                      <th>Yorum Zaman</th>
                      <th>Yorum Detayı</th>
                      <th>Ürün İd</th>
                      <th>Kullanıcı İd</th>
                      <th>Onayla</th>
                      <th>Sil</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $yorumlar=$Baglanti->prepare("SELECT * FROM yorumlar order by yorum_id ASC ");
                    $yorumlar->execute();
                    while ($yorumlarcek=$yorumlar->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                      <td><?php echo $yorumlarcek['yorum_zaman'] ?></td>
                      <td><?php echo $yorumlarcek['yorum_detay'] ?></td>
                      <td><?php echo $yorumlarcek['urun_id'] ?></td>
                      <td><?php echo $yorumlarcek['kullanici_id'] ?></td>

                      <td>
                        <form action="İslem/İslem.php" method="POST" >
                          <input type="hidden" name="yorumid" value="<?php echo $yorumlarcek['yorum_id'] ?>">
                        <button <?php if ($yorumlarcek['yorum_onay']=="1") {
                           echo "disabled";
                        } ?>
                          name="yorumonayla" type="submit" class="btn btn-success">Onayla</button></td>
                      </form>
                      <td><a href="İslem/İslem.php?yorumlarsil&id=<?php echo$yorumlarcek['yorum_id'] ?>"><button type="submit" class="btn btn-danger">Sil</button></a></td>
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
