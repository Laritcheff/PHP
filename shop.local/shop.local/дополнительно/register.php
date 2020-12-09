<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <div class="signup-form"><!--sign up form-->
                    <h2>Регистрация на сайте</h2>
                    <form action="#" method="post">
                        <input type="text" name="name" required placeholder="Имя" value="">
                        <input type="email" name="email" required placeholder="E-mail" value="">
                        <input type="password" name="password" required placeholder="Пароль" value="">
                        <input type="submit" name="submit" class="btn btn-default" value="Регистрация">
                    </form>
                </div><!--/sign up form-->
                
                <br>
                <br>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>