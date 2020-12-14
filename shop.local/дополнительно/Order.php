<?php
require_once ROOT.'/config/app_config.php';

class Order {
    
    // Передача заказа в БД
/*
    public static function save($name, $phone, $comments, $userId, $products) {
             
        $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);
        
        $query = "INSERT INTO product_order (name, phone, comments, user_id, products) VALUES ('$name', '$phone', '$comments', '$userId','$products')";
        $result = mysqli_query($connect, $query);        
        
        return $result;
        
    } // end save()
*/
    
    // Возвращает список заказов
/*
    public static function getOrdersList()  {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);
        
        $query = 'SELECT id, name, phone, date, status FROM product_order ORDER BY status ASC';
        $result = mysqli_query($connect, $query);
        
        $ordersList = array(); // массив для хранения списка заказов
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['name'] = $row['name'];
            $ordersList[$i]['phone'] = $row['phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    } // end getOrdersList() 
*/
    
    /* Расшифровка статуса заказа:
     1 - Новый заказ, 2 - В обработке, 3 - Доставляется, 4 - Закрыт
    */
/*
    public static function getStatusText($status) {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    } // end getStatusText()    
*/
    
    // Получение данных о конкр. заказе
/*
    public static function getOrderById($id) {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);        
        $query = "SELECT * FROM product_order WHERE id = '$id'";
        $result = mysqli_query($connect, $query);        
        return mysqli_fetch_array($result);
    } // end getOrderById()
*/
    
    // Редактирование заказа с заданным id
/*
    public static function updateOrder($id, $userName, $userPhone, $userComment, $date, $status) {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

        $query = "UPDATE product_order SET 
                name = '$userName', 
                phone = '$userPhone', 
                comments = '$userComment', 
                date = '$date', 
                status = '$status' 
            WHERE id = '$id'";
        $result = mysqli_query($connect, $query);

    } // end updateOrder() 
*/
    
    // Удаляет заказ с заданным id
/*
    public static function deleteOrderById($id) {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);

        $query = "DELETE FROM product_order WHERE id = '$id'";        
        $result = mysqli_query($connect, $query);
    } // deleteOrderById   
*/
}
?>