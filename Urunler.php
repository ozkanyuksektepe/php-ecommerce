<?php require_once 'header.php';

$sayibul=$Baglanti->prepare("SELECT * FROM urunler where kategori_id=:kategori_id and urun_durum=:urun_durum ");
$sayibul->execute(array(
    'kategori_id'=>$_GET['kategori_id'],
    'urun_durum'=>1
));
$urunsayisi=$sayibul->rowCount();

$kac=8;

$sayfa=$_GET['sayfa'];

$sayfa1=($sayfa*$kac)-$kac;


$urunler=$Baglanti->prepare("SELECT * FROM urunler where kategori_id=:kategori_id and urun_durum=:urun_durum order by urun_sira ASC limit $sayfa1, $kac ");
$urunler->execute(array(
    'kategori_id'=>$_GET['kategori_id'],
    'urun_durum'=>1
));

$sayfasayisi=ceil($urunsayisi/$kac);



    ?>

            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                    <div class="toolbar-amount">
                                        <span>Gösteriliyor 1 to 9 </span>
                                    </div>
                                </div>
                                <!-- product-select-box start -->
                                <div class="product-select-box">
                                    <div class="product-short">
                                        <p>Sırala:</p>
                                        <select class="nice-select">
                                            <option value="trending">İsime Göre (A - Z)</option>
                                            <option value="sales">İsime Göre (Z - A)</option>
                                            <option value="rating">Düşük Fiyat </option>
                                            <option value="date">Yüksek Fiyat </option>
                                        </select>
                                    </div>
                                </div>
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
<?php

while ($urunlercek=$urunler->fetch(PDO::FETCH_ASSOC)) {
    $urunsayisi=$urunler->rowCount();
    ?>


                                                <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="Urun_detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">
                                                                <img src="Admin/Resimler/Urunler/<?php echo $urunlercek['urun_resim'] ?>" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">Yeni</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <h4><a class="product_name" href="Urun_detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>"><?php echo $urunlercek['urun_baslik'] ?></a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price"><?php echo $urunlercek['urun_fiyat'] ?>₺</span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active"><a href="Urun_detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">Detaya GİT</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>
    <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <p style="color: black"><?php echo $urunsayisi ?> adet ürün bulundu.</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box">
                                                    <li><a href="?sayfa=<?php echo $sayfa-1 ?>" class="Previous"><i class="fa fa-chevron-left"></i> Geri</a>
                                                    </li>
                                                    <?php $i=1; while($i<=$sayfasayisi) { ?>
                                                    <li class="<?php if($i==$sayfa) { echo "active"; } ?>"><a href="?sayfa=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                    <?php $i++; } ?>
                                                    <li>
                                                      <a href="?sayfa=<?php echo $sayfa+1 ?>" class="Next"> İleri <i class="fa fa-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->
            <?php require_once 'footer.php' ?>