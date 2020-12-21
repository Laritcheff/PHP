<?php
    include ROOT.'/views/layouts/header.php';
?>

 <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products">
                                <?php foreach($categories as $categoryItem):?>
                                       <?php if($categoryItem['status']): ?> 

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="/category/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name']; ?></a></h4>
                                    </div>
                               </div>
                                <?php endif; ?>
                                <?php endforeach;?>
                        </div>
                    </div>
                </div>
                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="img"><img src="images/products/i001.jpg" alt=""></div>
                                            <h2>56 р.</h2>
                                            <p>Название товара</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="img"><img src="images/products/i002.jpg" alt=""></div>
                                            <h2>56 р.</h2>
                                            <p>Название товара</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="img"><img src="images/products/i003.jpg" alt=""></div>
                                            <h2>56 р.</h2>
                                            <p>Название товара</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="img"><img src="images/products/i004.jpg" alt=""></div>
                                            <h2>56 р.</h2>
                                            <p>Название товара</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <img src="images/home/new.png" class="new" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="img"><img src="images/products/i005.jpg" alt=""></div>
                                            <h2>56 р.</h2>
                                            <p>Название товара</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <div class="img"><img src="images/products/i016.jpg" alt=""></div>
                                            <h2>56 р.</h2>
                                            <p>Название товара</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>

<?php
    include ROOT.'/views/layouts/footer.php';
?>