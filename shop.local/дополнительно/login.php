<?php include ROOT . '/views/layouts/header.php'; ?>	
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
            
                <?php if(!empty($error)): ?>
                    <p><?php echo $error; ?>
                    </p>
                <?php endif; ?>
                
                <div class="signup-form"><!--login form-->
                    <h2>Вход на сайт</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="E-mail">
                        <input type="password" name="password" placeholder="Пароль">
                        <input type="submit" name="submit" class="btn btn-default" value="Вход">
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->


<?php include ROOT . '/views/layouts/footer.php'; ?>