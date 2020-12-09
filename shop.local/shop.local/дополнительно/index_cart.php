<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>
                    
                    <!-- товары в корзине -->
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Название</th>
                                <th>Количество, шт.</th>
                                <th>Стоимость, руб.</th>
                                <th>Удалить</th>
                            </tr>
                            
                                <tr>
                                    <td><a href="#">Название товара</a></td>
                                    <td>2</td>
                                    <td>4000</td>
                                    <td><a class="btn btn-default checkout" href="#"><i class="fa fa-times"></i></a>
                                    </td>                                    
                                </tr>
                            
                                <tr>
                                    <td colspan="2">Общая стоимость:</td>
                                    <td>8000</td>
                                    <td></td>
                                </tr>
                        </table>
                        <a href="/cart/checkout">
                        <input type="submit" name="submit" class="btn btn-default"value="Оформить заказ">
                        </a>

                </div>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>