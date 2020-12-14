<?php
require_once ROOT.'/config/app_config.php';
class User {
    //Проверка e-mail в БД
    public static function checkEmail($email) {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);
        
        $query = "SELECT email FROM user WHERE email = '$email'";
        $result = mysqli_query($connect, $query);
        
        $row = mysqli_fetch_array($result);
        
        // Если в БД найдена запись
        if (!empty($row['email'])) {
            return true;  // метод возвращает true
        } 
        return false;  // иначе - false
    
    } // end checkEmail()
    
/*
    // Регистрация
    public static function register($name, $email, $password) {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);
        
        $query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
        mysqli_query($connect, $query);
        
        return true; 
      
    } // end register()
*/

/*    
    // Проверка пользователя в БД
    public static function checkUserData($email, $password) {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);
        
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connect, $query);
        
        $user = mysqli_fetch_array($result);
        if($user) {   
            return $user['id']; // если запись найдена, метод возвращает id пользователя
        }
        return false; // если запись не найдена, метод возвращает false
        
    } // end checkUserData
*/

/*    
    // Запоминание пользователя, вошедшего на сайт
    public static function auth($userId) {
        session_start();
        $_SESSION['user'] = $userId;        
    } // end auth()
*/

/*    
    // Проверка, что пользователь выполнил вход в систему
    public static function checkLogged() {
        session_start();
        if(isset($_SESSION['user'])) {
            return $_SESSION['user']; // если сессия есть, возвращаем id пользователя
        }
        header("Location: /user/login"); // перенаправляем на страницу входа
    } //end checkLogged()
*/

/*    
    // Получение инфо о пользователе из БД по его id
    public static function getUserById($id) {
        if($id) {
            $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);
        
            $query = "SELECT * FROM user WHERE id = '$id'";
            $result = mysqli_query($connect, $query);
            
            $row = mysqli_fetch_array($result);
            return $row;    // метод возвращает всю инфо о пользователе
        }        
    } // end getUserById()
*/  

/*  
    // Проверка, авторизован ли пользователь
    public static function isGuest() {
        session_start();
        if(isset($_SESSION['user'])) {
            return false;   // если сессия есть, значит, пользователь авторизован
        }
        return true;   // сесcии нет -> пользователь не авторизован
        
    } // end isGuest()
*/

/*    
    // Редактирование данных пользователя
    public static function edit($id, $name, $password) {
        $connect = mysqli_connect(HOST, USER, PASSWORD, DBNAME);
        
        $query = "UPDATE user SET name = '$name', password = '$password' WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        
        return $result;   
    } // end edit()
*/
}
?>