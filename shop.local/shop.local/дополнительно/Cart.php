<?php
class Cart {
/*//Сохранение товара в сессии
public statis function addProduct($id) {
    $id = intval($id);
    $productsInCart = array(); // массив для товаров в корзине
    
    // если в корзине уже есть товары (они хранятся в сессии), то заполняем наш массив товарами
    if(isset($_SESSION['products'])) {
        $productsInCart = $_SESSION['products'];
    }
    
    // если товар уже есть в корзине, но был добавлен еще раз, прибавляем его
    if(array_key_exists($id, $productsInCart)) {
        $productsInCart[$id]++;
    } else {
        $productsInCart[$id] = 1; // если товара в корзине еще нет, кладем его туда
    }
    
    $_SESSION['products'] = $productsInCart; // сохраняем массив с товарами в сессию
    
    // проверка
    echo '<pre>';
    print_r($_SESSION['products']);
    die();               
    
} // end addProduct($id)
*/


/*
// Подсчет кол-ва товаров в корзине
public static function countItems() {
    
    // если товары есть в корзине (=в сессии), считаем их кол-во, если нет, возвращаем 0
    if(isset($_SESSION['products'])) {
        $count = 0;
        foreach($_SESSION['products'] as $id => $quantity) {
            $count = $count+$quantity;
        }
        return $count;
    } else {
        return 0;
    }       
    
} // end countItems()
*/

/*
// Получаем из сессии список id товаров
public static function getProducts() {
    if(isset($_SESSION['products'])) {
        return $_SESSION['products'];
    }
    return false;
} // end getProducts()
 */   


/*
// Подсчет общей стоимости товаров в корзине
public static function getTotalPrice($products) {
    $productsInCart = self::getProducts();
    if($productsInCart) {
        $total = 0;
        foreach($products as $item) {
            $total += $item['price'] * $productsInCart[$item['id']];
        }
    }
    return $total;
} // end getTotalPrice()
*/



/*
// Очистка корзины
public static function clear() {
    if(isset($_SESSION['products'])) {
        unset $_SESSION['products'];
    }
} // end clear()
*/


/*
public static function productDelete($id) {
    $productsInCart = self::getProducts(); // получаем из сессии массив с товарами
    
    unset($productsInCart[$id]); // удаляем товар с конкр. id
    
    $_SESSION['products'] = $productsInCart; // заново записываем товары в сессию
    
} // end productDelete($id)
*/

}
?>