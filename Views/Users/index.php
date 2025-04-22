

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">


<!-- Mirrored from themesflat.co/html/ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:40:41 GMT -->
<head>
    <meta charset="utf-8">
    <title>Ecomus - Ultimate HTML</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- font -->
   <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
   <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
   <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
   <link rel="stylesheet" href="assets/Users/css/animate.css">
   <link rel="stylesheet"type="text/css" href="assets/Users/css/styles.css"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/Users/images/logo/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/Users/images/logo/favicon.png">

</head>

<body class="preload-wrapper popup-loader">

    <!-- RTL -->
    <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-hover-btn btn-fill">RTL</a>
    <!-- /RTL  -->

    <!-- preload -->
  
    <!-- /preload -->
    <div id="wrapper">
        <!-- Top Bar -->
  
          <?php include 'app/Views/Users/layouts/contact.php'?>
        </div>
        <!-- /Top Bar -->
        <!-- Header -->
        <?php include 'app/Views/Users/layouts/header.php'?>
        <!-- /Header -->
        
        <?php include 'app/Views/Users/layouts/slideshow.php'?>
        <!-- /Slider -->
        <!-- Marquee -->
        <?php include 'app/Views/Users/layouts/marquee.php'?>
        <!-- /Marquee -->
        <!-- Categories -->
        <section class="flat-spacing-4 flat-categorie">
            <div class="container-full">
               <div class="flat-title-v2">
                    <div class="box-sw-navigation">
                        <div class="nav-sw nav-next-slider nav-next-collection"><span class="icon icon-arrow-left"></span></div>
                        <div class="nav-sw nav-prev-slider nav-prev-collection"><span class="icon icon-arrow-right"></span></div>
                    </div>
                    <span class="text-3 fw-7 text-uppercase title wow fadeInUp" data-wow-delay="0s">SHOP BY CATEGORIES</span>
               </div>
               <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-8">
                        <div dir="ltr" class="swiper tf-sw-collection" data-preview="3" data-tablet="2" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-loop="false" data-auto-play="false">
                            <div class="swiper-wrapper">
                                <?php foreach($listCategory as $key => $value): ?>
                                <div class="swiper-slide" lazy="true">
                                    <div class="collection-item style-left hover-img">
                                        <div class="collection-inner">
                                            <?php
// Mảng chứa đường dẫn đến các ảnh
$images = [
    "assets/Users/images/collections/1.jpg",
    "assets/Users/images/collections/2.jpg",
    "assets/Users/images/collections/3.png",
    "assets/Users/images/collections/4.jpg",
    "assets/Users/images/collections/5.jpg",
    "assets/Users/images/collections/6.jpg",
    "assets/Users/images/collections/7.jpg",
    "assets/Users/images/collections/8.png",
    "assets/Users/images/collections/9.png",

];

// Lấy ngẫu nhiên 1 ảnh từ mảng
$randomImage = $images[array_rand($images)];
?>

<a href="<?= BASE_URL ?>?act=shop&category_id=<?= $value->id ?>" class="collection-image img-style">
    <img class="lazyload" data-src="<?= $randomImage ?>" alt="">
</a>
                                            <!-- <a href="<?= BASE_URL?>?act=shop&category_id=<?= $value->id ?>" class="collection-image img-style">
                                                <img class="lazyload" data-src="assets/Users/images/collections/1.png"  alt=""> 
                                              
                                                
                                            </a> -->
                                            <div class="collection-content">
                                                <a href="<?= BASE_URL?>?act=shop&category_id=<?= $value->id ?>" class="tf-btn collection-title hover-icon fs-15"><span>
                                                    <?= $value->name ?>
                                                </span><i class="icon icon-arrow1-top-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <div class="discovery-new-item">
                            <h5>Discovery all new items</h5>
                            <a href="shop-collection-list.html"><i class="icon-arrow1-top-left"></i></a>
                        </div>
                    </div>
               </div>
               
            </div>
        </section>
        <!-- /Categories -->
        <!-- Seller -->
        <section class="flat-spacing-5 pt_0 flat-seller">
            <div class="container">
                <div class="flat-title">
                    <span class="title wow fadeInUp" data-wow-delay="0s">Best Seller</span>
                    <p class="sub-title wow fadeInUp" data-wow-delay="0s">Shop the Latest Styles: Stay ahead of the curve with our newest arrivals</p>
                </div>
                <div class="grid-layout loadmore-item wow fadeInUp" data-wow-delay="0s" data-grid="grid-4">
                    <!-- card product 1 -->
                     <?php foreach($listProduct as $key =>$value):?>
                    <div class="card-product fl-item">
                        <div class="card-product-wrapper">
                            <a href="<?= BASE_URL ?>?act=product-detail&product_id=<?= $value->id?>" class="product-img">
                                <img class="lazyload img-product" data-src="<?=$value->image_main?>" src="<?=$value->image_main?>" alt="image-product">
                                <img class="lazyload img-hover" data-src="<?=$value->image_main?>" src="<?=$value->image_main?>" alt="image-product">
                            </a>
                            <div class="list-product-btn">
                                <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                    <span class="icon icon-bag"></span>
                                    <span class="tooltip">Quick Add</span>
                                </a>
                                <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                
                                <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                    <span class="icon icon-view"></span>
                                    <span class="tooltip">Quick View</span>
                                </a>
                            </div>
                       
                        </div>
                        <div class="card-product-info">
                            <a href="<?= BASE_URL ?>?act=product-detail&product_id=<?= $value->id?>" class="title link"><?=$value->name?></a>
                            <div style="display: flex;">
                           
                            <?php if($value->price_sale!= null) : ?>
                                <span class="price" style="margin-right: 5px; text-decoration: line-through;">
                                <?= number_format($value->price)?>VNĐ
                            </span>
                            <span class="price price-sale">
                                 <?=number_format($value->price_sale)?> VNĐ
                            </span>
                            <?php else: ?>
                                <span class="price" style="margin-right: 5px; ">
                                <?= number_format($value->price)?>VNĐ
                            </span>
                            <?php endif;?>
                            </div>
                           
                          
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <!-- card product 2 -->
                   
                
                </div>
                <div class="tf-pagination-wrap view-more-button text-center">
                    <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span class="text">Load more</span></button>
                </div>
            </div>
        </section>
        <!-- /Seller -->
        <!-- Lookbook -->
        
        <!-- /Lookbook -->
        <!-- Testimonial -->
       
        <!-- /Testimonial -->
        <!-- brand -->
        <?php include 'app/Views/Users/layouts/brand.php'?>
        <!-- /brand -->
        <!-- Shop Gram -->
       
        <!-- /Shop Gram -->
        <!-- Iconbox -->
        
        <!-- /Icon box -->
        <!-- Footer -->
        <?php include 'app/Views/Users/layouts/footer.php'?>
        <!-- /Footer -->
        
    </div>
     


    <!-- shoppingCart -->
    <div class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="header">
                    <div class="title fw-5">Shopping cart</div>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
             
            </div>
        </div>
    </div>
    <!-- /shoppingCart -->

  


    <!-- Javascript -->
    <script type="text/javascript" src="assets/Users/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/carousel.js"></script>
    <script type="text/javascript" src="assets/Users/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/lazysize.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/count-down.js"></script>
    <script type="text/javascript" src="assets/Users/js/wow.min.js"></script>
    <script type="text/javascript" src="assets/Users/js/multiple-modal.js"></script>
    <script type="text/javascript" src="assets/Users/js/main.js"></script>
</body>


<!-- Mirrored from themesflat.co/html/ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:42:11 GMT -->
</html>