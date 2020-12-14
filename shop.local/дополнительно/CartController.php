<?php
class CartController {
    
    // Добавление товара в корзину = сохранение товаров в сессию
/*
    public function actionAdd($id) {    
        
        Cart::addProduct($id); // добавление товара в корзину
        
        // возвращение пользователя на ту страницу, с к-ой пришел
        $referrer = $_SERVER['HTTP_REFERER']; 
        header("Location: $referrer"); 
    } // end actionAdd() 
*/
    
    // Вывод инфо о товарах в корзине
/*
    public function actionIndex() {
        
        // отображение списка категорий товаров
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $productsInCart = false; // массив для товаров в корзине (пустой)
        $productsInCart = Cart::getProducts(); // получаем товары из сессии
        
        // Если товары есть, получаем о них полную информацию
        if($productsInCart) { 
            $productsIds = array_keys($productsInCart); // $productsIds - массив с id товаров, к-ые в корзине. Это делает ф-ция array_keys(), которой передают массив, чьи ключи надо получить. А ключами у нас являются id товаров
            $products = Product::getProductsListToCart($productsIds); // полученные id передаем методу getProductsListToCart, который возвращает всю инфо по этим товарам в массиве
            
            // получаем стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }
        
        require_once ROOT.'/views/cart/index.php';
        return true;
        
    } // end actionIndex()
*/
    
    
    // Оформление заказа
/*
    public function actionCheckout() {
        
        // отображение списка категорий
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $result = false; // статус успешного формления заказа
        $userId = '';// статус авторизации пользователя
        
        // Проверка авторизации пользователя 
        if(User::isGuest()) {
            $userId = false;
            header("Location: /user/login"); // перенаправить на страницу входа 
        } else {
            $userId = User::checkLogged();  // получаем данные о пользователе из сессии
            $user = User::getUserById($userId); // получаем всю инфо о пользователе из БД
            
            // Есть ли товары в корзине?
            $productsInCart = Cart::getProducts(); // получаем товары из сессии
            if(!$productsInCart) {   // если нет
                header("Location: /"); // перенаправляем на главную страницу сайта
            } else {  
                // получаем всю инфо о товарах
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsListToCart($productsIds);
                $totalPrice = Cart::getTotalPrice($products); // получаем сумму
                $totalQuantity = Cart::countItems();  // получаем кол-во товаров                   
            } // end проверка наличия товаров в корзине
            
            // объявляем переменные для получения данных из формы
            $name = $user['name']; // берем из инфо о пользователе
            $phone = '';
            $comments = '';
            
            // форма отправлена?
            if(isset($_POST['submit'])) {  // если да
                // получаем инфо из формы
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $comments = $_POST['comment'];
                
                // проверяем, все ли нужные поля заполнены
                $errors = array(); // массив для ошибок
                if(empty($name)) {
                    $errors[] = '<p>Заполните имя!</p>';
                }
                if(empty($phone)) {
                    $errors[] = '<p>Укажите номер телефона!</p>';
                }
                
                // если форма заполнена правильно
                if(empty($errors)) {   
                    $result = Order::save($name, $phone, $comments, $userId, $productsInCart); // сохраняем всю инфо из формы + список товаров из сессии в БД. Рез-т сохраняем в $result, к-ая раньше была объявлена созначением false
                    
                    if($result) { // если запрос в БД выполнен успешно
                        // отправляем письмо админу
                        $adminEmail = 'mail@yandex.ru';
                        $message = '';
                        $subject = 'Новый заказ';
                        mail($adminEmail, $subject, $message);
                        
                        // очистка корзины
                        Cart::clear();
                    } // end если запрос в БД выполнен успешно
                } // end Проверка форма заполнена правильно
            } // end  Форма отправлена?
        } // end Проверка авторизации пользователя
        
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
        
    } // end actionCheckout()
*/
    
    
    // Удаление товаров из корзины
/*
    public function actionDelete($id) {        
        Cart::productDelete($id); // удаляем товар из корзины
        header("Location: /cart");  // возвращаем пользователя в корзину
    } // end actionDelete()
*/
}
?>
