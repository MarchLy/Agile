<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">


<!-- Mirrored from themesflat.co/html/ecomus/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:40:41 GMT -->

<head>
    <meta charset="utf-8">
    <title>SHOP</title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="assets/Users/fonts/fonts.css">
    <link rel="stylesheet" href="assets/Users/fonts/font-icons.css">
    <link rel="stylesheet" href="assets/Users/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/Users/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/Users/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/Users/css/styles.css" />

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

        <!-- /Top Bar -->
        <!-- Header -->
        <?php include 'app/Views/Users/layouts/header.php' ?>
        <!-- /Header -->


    </div>

    <div class="tf-page-title style-2">
        <div class="container-full">
            <div class="heading text-center">
                <?php if (isset($category)) {
                    echo $category->name;
                } else {
                    echo "    New Arrival";
                }
                ?>

            </div>
        </div>
    </div>

    <section class="flat-spacing-2">
        <div class="container">
            <div class="tf-shop-control grid-3 align-items-center">
                <div class="tf-control-filter">
                    <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filter</span></a>
                </div>
                <ul class="tf-control-layout d-flex justify-content-center">
                    <li class="tf-view-layout-switch sw-layout-2" data-value-grid="grid-2">
                        <div class="item"><span class="icon icon-grid-2"></span></div>
                    </li>
                    <li class="tf-view-layout-switch sw-layout-3" data-value-grid="grid-3">
                        <div class="item"><span class="icon icon-grid-3"></span></div>
                    </li>
                    <li class="tf-view-layout-switch sw-layout-4 active" data-value-grid="grid-4">
                        <div class="item"><span class="icon icon-grid-4"></span></div>
                    </li>
                    <li class="tf-view-layout-switch sw-layout-5" data-value-grid="grid-5">
                        <div class="item"><span class="icon icon-grid-5"></span></div>
                    </li>
                    <li class="tf-view-layout-switch sw-layout-6" data-value-grid="grid-6">
                        <div class="item"><span class="icon icon-grid-6"></span></div>
                    </li>
                </ul>
                <div class="tf-control-sorting d-flex justify-content-end">
                    <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                        <div class="btn-select">
                            <span class="text-sort-value">Featured</span>
                            <span class="icon icon-arrow-down"></span>
                        </div>
                        <div class="dropdown-menu">
                            <div class="select-item active">
                                <span class="text-value-item">Featured</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Best selling</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Alphabetically, A-Z</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Alphabetically, Z-A</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Price, low to high</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Price, high to low</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Date, old to new</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Date, new to old</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="wrapper-control-shop">
                <div class="meta-filter-shop"></div>
                <div class="grid-layout wrapper-shop" data-grid="grid-4">
                    <!-- card product 1 -->

                    <?php foreach ($listProduct as $key => $value): ?>
                        <div class="card-product" data-price="<?= $value->price ?>" data-color="orange black white">
                            <div class="card-product-wrapper">
                                <a href="<?=BASE_URL?>?act=product-detail&product_id=<?= $value->id ?>" class="product-img">
                                    <img class="img-product ls-is-cached lazyloaded"
                                        data-src="<?= $value->image_main ?>" src="<?= $value->image_main ?>" alt="image-product">
                                    <img class="img-hover ls-is-cached lazyloaded"
                                        data-src="<?= $value->image_main ?>" src="<?= $value->image_main ?>" alt="image-product">
                                </a>
                                <div class="list-product-btn absolute-2">
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
                                <a href="<?=BASE_URL?>?act=product-detail&product_id=<?= $value->id ?>" class="title link"><?= $value->name ?></a>
                                <div style="display: flex;">

                                    <?php if ($value->price_sale != null) : ?>
                                        <span class="price" style="margin-right: 5px; text-decoration: line-through;">
                                            <?= number_format($value->price) ?>VNĐ
                                        </span>
                                        <span class="price price-sale">
                                            <?= number_format($value->price_sale) ?> VNĐ
                                        </span>
                                    <?php else: ?>
                                        <span class="price" style="margin-right: 5px; ">
                                            <?= number_format($value->price) ?>VNĐ
                                        </span>
                                    <?php endif; ?>
                                </div>
                               
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
                <!-- pagination -->
                <ul class="tf-pagination-wrap tf-pagination-list tf-pagination-btn">
                    <li class="active">
                        <a href="#" class="pagination-link">1</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">2</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">3</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">4</a>
                    </li>
                    <li>
                        <a href="#" class="pagination-link animate-hover-btn">
                            <span class="icon icon-arrow-right"></span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </section>


    <!-- Fitel -->
    <div class="offcanvas offcanvas-start canvas-filter " id="filterShop" aria-modal="true" role="dialog">
        <div class="canvas-wrapper">
            <header class="canvas-header">
                <div class="filter-icon">
                    <span class="icon icon-filter"></span>
                    <span>Filter</span>
                </div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </header>
            <div class="canvas-body">
                <div class="widget-facet ">
                    <div class="facet-title" data-bs-target="#product-name" data-bs-toggle="collapse" aria-expanded="true" aria-controls="product-name">
                        <span>Product name</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="product-name" class="collapse show">
                        <form action="<?= BASE_URL ?>" method="GET">
                           <div class="d-flex mb-5">
                              <input type="hidden" name="act" value="shop">
                              <input type="text" placeholder="Search product" name="product-name">
                              <button class="btn btn-success">Submit</button>
                             </div>
                        </form>
                    </div>
                </div>
                <div class="widget-facet wd-categories">
                    <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                        <span>Product categories</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="categories" class="collapse show">
                        <ul class="list-categoris current-scrollbar mb_36">

                            <?php foreach ($listCategory as $key => $value): ?>
                                <li class="cate-item <?php
                                                        if (isset($_GET['category_id']) && $_GET['category_id'] == $value->id): ?>
                                current
                                
                                <?php endif; ?>
                                ">


                                    <a href="<?= BASE_URL ?>?act=shop&category_id=<?= $value->id ?>"><span><?= $value->name ?></span></a>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div>
                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#availability" data-bs-toggle="collapse" aria-expanded="true" aria-controls="availability">
                            <span>Availability</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="availability" class="collapse show">
                            <ul class="tf-filter-group current-scrollbar mb_36">
                                <li class="list-item d-flex gap-12 align-items-center">

                                    <a
                                        <?php if (isset($_GET['category_id'])) {
                                            echo 'href="' . BASE_URL . '?act=shop&category_id=' .
                                                $_GET['category_id'] . '&instock=true" ';
                                        } else {
                                            echo 'href="' . BASE_URL . '?act=shop&instock=true" ';
                                        }


                                        ?>



                                        class="label"><span>In stock</span>&nbsp;<span>(<?= $stock[0]->instock ?>)</span></a>
                                </li>
                                <li class="list-item d-flex gap-12 align-items-center">

                                    <a
                                        <?php if (isset($_GET['category_id'])) {
                                            echo 'href="' . BASE_URL . '?act=shop&category_id='
                                                . $_GET['category_id'] . '&outstock=true" ';
                                        } else {
                                            echo 'href="' . BASE_URL . '?act=shop&outstock=true" ';
                                        }
                                        ?>
                                        class="label"><span>Out of stock</span>&nbsp;<span>(<?= $stock[1]->outstock ?>)</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget-facet">
                        <div class="facet-title" data-bs-target="#price" data-bs-toggle="collapse" aria-expanded="true" aria-controls="price">
                            <span>Price</span>
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div id="price" class="collapse show">
                            <form action="<?= BASE_URL ?>" method="GET">
                                <div class="widget-price filter-price">

                                    <div style="display: flex; justify-content: space-between;">
                                        <input type="hidden" name="act" value="shop">
                                        <input type="number" placeholder="min" class="me-2" name="min">
                                        <input type="number" placeholder="max" name="max">
                                    </div>
                                    <button class="btn btn-success mt-2 btn-sm">SUBMIT</button>
                                </div>
                            </form>


                        </div>
                    </div>
                
                 
                </div>
            </div>

        </div>
    </div>




    <!-- Footer -->
    <?php include 'app/Views/Users/layouts/footer.php' ?>
    <!-- /Footer -->




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