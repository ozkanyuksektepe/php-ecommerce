<?php require_once 'header.php';


$urunler=$Baglanti->prepare("SELECT * FROM urunler where urun_id=:urun_id order by urun_sira ASC ");
$urunler->execute(array(
    'urun_id'=>$_GET['urun_id']

));
$urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);

$katsid=$urunlercek['kategori_id'];
?>






            <title><?php echo $urunlercek['urun_baslik'] ?></title>
    <meta name="keywords" content="<?php echo $urunlercek['urun_etiket'] ?>">
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
<?php
$cokluresim=$Baglanti->prepare("SELECT * FROM cokluresim where urun_id=:urun_id order by id ASC ");
$cokluresim->execute(array(
    'urun_id'=>$_GET['urun_id']
));
while ($cokluresimcek=$cokluresim->fetch(PDO::FETCH_ASSOC)) { ?>


                                    <div  class="lg-image">
                                            <img style="height: 450px !important" src="Admin/Resimler/Cokluresim/<?php echo $cokluresimcek['resim'] ?>" alt="product image">
                                        </a>
                                    </div>
    <?php } ?>
                                </div>
                                <div class="product-details-thumbs slider-thumbs-1">
<?php
$cokluresim=$Baglanti->prepare("SELECT * FROM cokluresim where urun_id=:urun_id order by id ASC ");
$cokluresim->execute(array(
    'urun_id'=>$_GET['urun_id']
));
while ($cokluresimcek=$cokluresim->fetch(PDO::FETCH_ASSOC)) {
    ?>
                                    <div class="sm-image"><img style="height: 120px !important" src="Admin/Resimler/Cokluresim/<?php echo $cokluresimcek['resim'] ?>" alt="product image thumb"></div>
    <?php } ?>
                                </div>
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <i style="color: green"><?php if($_GET['yuklenme']=="basarili") { ?>
                                Yorum Başarıyla Kaydedildi.
                            <?php    }elseif ($_GET['yuklenme']=="basarisiz") { ?>
                              <i style="color: red">Yüklenme Başarısız.</i>
                             <?php    } ?></i>
                            <div class="product-details-view-content pt-60">
                                <div class="product-info">

                                    <h2><?php echo $urunlercek['urun_baslik'] ?></h2>
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2"><?php echo $urunlercek['urun_fiyat'] ?>₺</span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span><?php echo $urunlercek['urun_aciklama'] ?></span>
                                        </p>
                                    </div>
                                    <div class="single-add-to-cart">
                                        <form action="İslem" method="POST" class="cart-quantity">
                                            <div class="quantity">
                                                <label>Adet</label>
                                                <div class="cart-plus-minus">
                                                    <input name="adet" class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="urunid" value="<?php echo $urunlercek['urun_id'] ?>">
                                            <button name="sepeteekle" class="add-to-cart" type="submit">Sepete Ekle</button>
                                        </form>
                                    </div>
                                    <div class="product-additional-info pt-25">
                                        <div class="product-social-sharing pt-25">
                                            <ul>
                                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                                <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Açıklama</span></a></li>
                                   <li><a data-toggle="tab" href="#reviews"><span>Yorumlar</span></a></li>
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span><?php echo $urunlercek['urun_aciklama'] ?></span>
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
<?php
$yorumlar=$Baglanti->prepare("SELECT * FROM yorumlar where urun_id=:urun_id and yorum_onay=:yorum_onay order by yorum_id ASC ");
$yorumlar->execute(array(
        'urun_id'=>$_GET['urun_id'],
         'yorum_onay'=>1
));
while ($yorumlarcek=$yorumlar->fetch(PDO::FETCH_ASSOC)) {
    ?>

        <?php $yorumyapanid=$yorumlarcek['kullanici_id'];
    $kullanicilar=$Baglanti->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id  ");
    $kullanicilar->execute(array(
        'kullanici_id'=>$yorumyapanid
    ));
    $kullanicilarcek=$kullanicilar->fetch(PDO::FETCH_ASSOC);



        ?>
                                    <div class="comment-author-infos pt-25">
                                        <span><?php echo $kullanicilarcek['kullanici_adsoyad']; ?></span>
                                        <em style="color: black"><?php echo $yorumlarcek['yorum_detay'] ?></em>
                                        <hr>
                                    </div>
    <?php } ?>
                                    <div class="review-btn">
                                        <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Yorum Yaz</a>
                                    </div>
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="review-page-title">FİKRİNİZİ BELİRTİN</h3>
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-12">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <form action="Admin/İslem/İslem.php" method="POST">
                                                                            <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                                                                            <input type="hidden" name="urunid" value="<?php echo $urunlercek['urun_id'] ?>">
                                                                            <p class="feedback-form">
                                                                                <textarea name="yorum" cols="45" rows="8" ></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                                <div class="feedback-btn pb-15">
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">ÇIKIŞ</a>
                                                                                    <button class="btn btn-dark" type="submit" name="Yorumkaydet">GÖNDER</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>8 Benzer Ürünler:</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
<?php
$urunler=$Baglanti->prepare("SELECT * FROM urunler where kategori_id=:kategori_id and urun_durum=:urun_durum order by urun_sira ASC ");
$urunler->execute(array(
    'kategori_id'=>$katsid,
    'urun_durum'=>1
));
while ($urunlercek=$urunler->fetch(PDO::FETCH_ASSOC)) {
    ?>

                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="Urun_detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">
                                                    <img src="Admin/Resimler/Urunler/<?php echo $urunlercek['urun_resim'] ?>" alt="Li's Product Image">
                                                </a>
                                                <span class="sticker">Benzer</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <h4><a class="product_name" href="Urun_detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>"><?php echo $urunlercek['urun_baslik'] ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2"><?php echo $urunlercek['urun_fiyat'] ?>₺</span>
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
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Laptop Product Area End Here -->
           <?php require_once 'footer.php' ?>