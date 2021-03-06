<?php
class AdminCategoryController extends AdminBase {
    
    // Проверка прав доступа и получение списка категорий
    /*
    public function actionIndex()  {        
        self::checkAdmin(); // Проверка доступа       
        $categoriesList = Category::getCategoriesList(); // Получаем список категорий
        require_once(ROOT . '/views/admin_category/index.php');
        return true;
    } // end actionIndex()
    */

    // Удаление категории
    /*
    public function actionDelete($id) {        
        self::checkAdmin(); // Проверка доступа

        if(isset($_POST['submit'])) { // Если форма отправлена
            Category::deleteCategory($id);             
            header("Location: /admin/category"); 
        }
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    } // end actionDelete()
    */
    
    // Добавление категории
    /*
    public function actionCreate() {        
        self::checkAdmin(); // Проверка доступа

        if (isset($_POST['submit'])) { // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $status = $_POST['status'];
            
            $error = false; // Флаг ошибок в форме
            // При необходимости можно валидировать значения нужным образом
            if(!isset($name) || empty($name) ) {
                $error = '<p>Заполните все поля.</p>';
            }
            
            // Если ошибок нет
            if($error == false) {                
                // Добавляем новую категорию
                Category::createCategory($name, $status);
                
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }
        }
        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    } // end actionCreate()
    */
    
    // Редактирование категории
    /*
    public function actionUpdate($id) {        
        self::checkAdmin(); // Проверка доступа
        
        // Получаем данные о конкретной категории
        $category = Category::getCategoryById($id);
        
        if (isset($_POST['submit'])) { // Если форма отправлена               
            // Получаем данные из формы
            $name = $_POST['name'];
            $status = $_POST['status'];
            
            // Сохраняем изменения в БД
            Category::updateCategory($id, $name, $status);
            
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }

        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    } // end actionUpdate 
    */
}
?>