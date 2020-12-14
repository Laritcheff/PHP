<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li class="active">Редактировать товар</li>
                </ol>
            </div>

            <h4>Добавить новый товар</h4>
            <br>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название товара</p>
                        <input type="text" name="name" placeholder="" value="">
                        <p>Стоимость, руб.</p>
                        <input type="text" name="price" placeholder="" value="">
                        <p>Категория</p>
                        <select name="category_id">
                            <option value="">Категория</option>
                            <option value="">Категория</option>
                            <option value="">Категория</option>                    
                        </select>

                        <br><br>

                        <p>Производитель</p>
                        <input type="text" name="brand" placeholder="" value="">
                        <p>Изображение товара</p>
                        <input type="file" name="image" placeholder="" value="">
                        <p>Детальное описание</p>
                        <textarea name="description" value=""></textarea>

                        <br><br>

                        <p>Наличие на складе</p>
                        <select name="availability">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br><br>

                        <p>Новинка</p>
                        <select name="is_new">
                            <option value="1" selected="selected">Да</option>
                            <option value="0">Нет</option>
                        </select>

                        <br><br>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" selected="selected">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>