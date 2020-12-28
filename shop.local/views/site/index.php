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
                                <?php foreach($latestProducts as $product): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                             <a href="/product/<?php echo $product['id']; ?>">
                                            <div class="img"><img src="<?php echo $product['image']; ?>" alt=""></div>
                                            </a>
                                            <h2><?php echo $product['price']; ?> р.</h2>
                                            <p><a href="/product/<?php echo $product['id']; ?>">
                                                   <?php echo $product['name']; ?> 
                                            </a>
                                                </p>
                                            <a href="/product/<?php echo $product['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div><!--features_items-->

                    </div>
                </div>
            </div>
        </section>

<?php
    include ROOT.'/views/layouts/footer.php';
?>