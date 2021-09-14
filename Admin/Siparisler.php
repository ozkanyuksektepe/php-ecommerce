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
                  <h3 class="card-title">siparis Tablosu</h3>

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
                      <th>Sipariş İd</th>
                      <th>Kullanıcı İd</th>
                      <th>Ürün İd</th>
                      <th>Sipariş Zaman</th>
                      <th>Ürün Adet</th>
                      <th>Ürün Fiyat</th>
                      <th>Toplam Fiyat</th>
                      <th>Ödeme Durumu</th>
                      <th>Sipariş Notu</th>
                      <th>Yeni Adet Sayısı</th>
                      <th>Onayla</th>
                      <th>Reddet</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $siparis=$Baglanti->prepare("SELECT * FROM siparisler order by siparis_id DESC ");
                    $siparis->execute();
                    while ($sipariscek=$siparis->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                      <td><?php echo $sipariscek['siparis_id'] ?></td>
                      <td><?php echo $sipariscek['kullanici_id'] ?></td>
                      <td><?php echo $sipariscek['urun_id'] ?></td>
                      <td><?php echo $sipariscek['siparis_zaman'] ?></td>
                      <td><?php echo $sipariscek['urun_adet'] ?></td>
                      <td><?php echo $sipariscek['urun_fiyat'] ?></td>
                      <td><?php echo $sipariscek['toplam_fiyat'] ?></td>
                      <td><span class="tag tag-success"><?php
                        if ($sipariscek['odeme_turu']=="1") {
                          echo "Kapıda Ödeme";
                        }
                        elseif($sipariscek['odeme_turu']=="0") {
                          echo "Kart İle Ödeme";
                        } ?></td>

                        </span></td>
                      <td><?php echo $sipariscek['siparis_not'] ?></td>
                      <td><?php echo $sipariscek['siparis_yeniadet'] ?></td>
                      <?php if ($sipariscek['siparis_onay']=="0") { ?>

                      <td><a href="İslem/İslem.php?siparisonayla&id=<?php echo$sipariscek['siparis_id'] ?>"><button type="submit" class="btn btn-warning">Onayla</button></a></td>
                      <td><a href="İslem/İslem.php?siparisreddet&id=<?php echo$sipariscek['siparis_id'] ?>"><button type="submit" class="btn btn-danger">Reddet</button></a></td>
                      <td><a href="siparisguncelle?id=<?php echo$sipariscek['siparis_id'] ?>"><button type="submit" class="btn btn-success">Sipariş Güncelle</button></a></td>
                      <?php } ?>
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
