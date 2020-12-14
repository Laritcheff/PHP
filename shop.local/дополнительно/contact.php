<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if ($result): ?>
                    <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
                <?php else: ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Обратная связь</h2>
                        <h5>Есть вопрос? Напишите нам</h5>
                        <br>
                        <form action="#" method="post">
                            <p>Ваша почта</p>
                            <input type="email" name="userEmail" placeholder="E-mail" required>
                            <p>Сообщение</p>
                            <textarea name="userText" placeholder="Сообщение"></textarea>
                            <br>
                            <input type="submit" name="submit" class="btn btn-default" value="Отправить" >
                        </form>
                    </div><!--/sign up form-->
                <?php endif; ?>


                <br>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>