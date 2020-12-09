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
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
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


                    
                        <p>Выбрано товаров:  шт. на сумму: руб.</p><br>

                        <div class="col-sm-4">
                            
                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                            <div class="login-form">
                                <form action="#" method="post">

                                    <p>Ваше имя</p>
                                    <input type="text" name="name" value="">

                                    <p>Номер телефона</p>
                                    <input type="text" name="phone" value="">

                                    <p>Комментарий к заказу</p>
                                    <input type="text" name="comment" placeholder="Сообщение" value="">

                                    <br>
                                    <br>
                                    <input type="submit" name="submit" class="btn btn-default" value="Оформить">
                                </form>
                            </div>
                        </div>

                    
                </div>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>