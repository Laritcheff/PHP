<?php
class AdminProductController extends AdminBase {
    
    // Проверка прав доступа
    /*
    public function actionIndex() {        
        self::checkAdmin(); // Проверка доступа
        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    } // end actionIndex() 
    */
    
    // Удаление товара
    /*
    public function actionDelete($id) {
        
        self::checkAdmin(); // Проверка доступа

        if(isset($_POST['submit'])) { // Если форма отправлена
            Product::deleteProductById($id); // Удаляем товар            
            header("Location: /admin/product"); // Перенаправляем пользователя на страницу управлениями товарами
        }

        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    } // end actionDelete()
    */
    
    // Добавление товара
    /*
    public function actionCreate() {
       
        self::checkAdmin(); // Проверка доступа        
        $categoriesList = Category::getCategoriesList(); // Получаем список категорий для выпадающего списка
        
        if (isset($_POST['submit'])) { // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $brand = $_POST['brand'];
            $availability = $_POST['availability'];
            $description = $_POST['description'];
            $is_new = $_POST['is_new'];
            $status = $_POST['status'];
            $image_name = $_SERVER['DOCUMENT_ROOT'] . '/template/images/products/no_photo.png'; // переменная для хранения изображения. Если изображение не выбрано, переменная устанавливается = файлу no_photo.png. Если изображение выбрано, значение переменной будет переопределено ниже.
            
            // Проверка ошибок заполнения формы
            $error = false; // Флаг ошибок в форме            
            if (!isset($name) || empty($name)) {
                $error = '<p>Заполните поле Название товара.</p>';
            }
            if(!is_numeric($price)) {
                $error = '<p>Введите число в поле Цена.</p>';
            }
            
            // Загрузка фото
            if(is_uploaded_file($_FILES['image']['tmp_name'])) { //'image' - атрибут name из поля для добавления фото в форме
                // Формируем имя изображению для загрузки на сервер
                $image_name = $_SERVER['DOCUMENT_ROOT'] . '/template/images/products/' . time() . '_' . $_FILES['image']['name'];         
                // Перемещаем в нужную папку
                move_uploaded_file($_FILES['image']['tmp_name'], $image_name);
                // Формируем адрес изображения для браузера (будет передан в БД)
                $image_path = web_path($image_name); 
            } else {
                $image_path = web_path($image_name); 
            }            
            
            if ($error == false) {   // Если ошибок нет
                $id = Product::createProduct($name, $price, $category_id, $brand, $availability, $description, $is_new, $status, $image_path); // Добавляем новый товар в БД  
                
                header("Location: /admin/product");// Перенаправляем пользователя на страницу управлениями товарами
            }
            
        } // end Если форма отправлена

        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    } // end actionCreate()
    */
    
    // Редактирование товара
    /*
    public function actionUpdate($id) {        
        self::checkAdmin(); // Проверка доступа
        
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesList();
        
        // Получаем данные о редактируемом товаре
        $product = Product::getProductById($id);
        
        if(isset($_POST['submit'])) { // Если форма отправлена            
            // Получаем данные из формы редактирования
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $brand = $_POST['brand'];
            $availability = $_POST['availability'];
            $description = $_POST['description'];
            $is_new = $_POST['is_new'];
            $status = $_POST['status'];
            
            // Обработка изображения
            if(is_uploaded_file($_FILES['image']['tmp_name'])) { //'image' - атрибут name из поля для добавления фото в форме
                // Формируем имя изображению для загрузки на сервер
                $image_name = $_SERVER['DOCUMENT_ROOT'] . '/template/images/products/' . time() . '_' . $_FILES['image']['name'];
                // Перемещаем в нужную папку
                move_uploaded_file($_FILES['image']['tmp_name'], $image_name);
                // Формируем адрес изображения для браузера (будет передан в БД)
                $image_path = web_path($image_name); 
            }

            // Сохраняем изменения в БД
            Product::updateProduct($id, $name, $price, $category_id, $brand, $availability, $description, $is_new, $status, $image_path); 
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    } // actionUpdate
    */
}
?>