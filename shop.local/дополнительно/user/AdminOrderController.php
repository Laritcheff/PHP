<?php
// Управление заказами в админпанели
class AdminOrderController extends AdminBase {
    
    //  Управление заказами
    /*
    public function actionIndex() {        
        self::checkAdmin(); // Проверка доступа        
        $ordersList = Order::getOrdersList(); // Получаем список заказов

        require_once(ROOT . '/views/admin_order/index.php');
        return true;
    } // end actionIndex()
    */
    
    // Просмотр заказа
    /*
    public function actionView($id) {
        self::checkAdmin(); // Проверка доступа
        
        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);
        
        // Получаем массив с идентификаторами и количеством товаров. Массив хранится в формате json, в к-ом есть только id и кол-во товаров.  
        $productsQuantity = json_decode($order['products'], true);        
        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);
        
        // Получаем список товаров в заказе        
        $products = Product::getProductsListToCart($productsIds);

        require_once(ROOT . '/views/admin_order/view.php');
        return true;
    } //end actionView()
    */
    
    // Редактирование заказа
    /*
    public function actionUpdate($id) {        
        self::checkAdmin(); // Проверка доступа
        
        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);
        
        if (isset($_POST['submit'])) { // Если форма отправлена               
            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];
            
            // Сохраняем изменения
            Order::updateOrder($id, $userName, $userPhone, $userComment, $date, $status);
            // Перенаправляем пользователя на страницу управлениями заказами
            header("Location: /admin/order/view/$id");
        }

        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    } // end actionUpdate
    */
    
    // Удаление заказа
    /*
    public function actionDelete($id) {       
        self::checkAdmin(); // Проверка доступа

        if (isset($_POST['submit'])) { // Если форма отправлена
            // Удаляем заказ
            Order::deleteOrderById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/order");
        }

        require_once(ROOT . '/views/admin_order/delete.php');
        return true;
    } // end actionDelete($id)
    */
}
?>