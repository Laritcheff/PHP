<?php
class UserController {
   // Регистрация
    public function actionRegister() {
        // переменные для данных из формы
        $name='';
        $email='';
        $password='';
        $result='';
       
        // Получение данных из формы
        if(isset($_POST['submit'])) {            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = hash('ripemd128', "xx$password");  
            // Проверка email на существование в БД            
        }   
        
        require_once ROOT.'/views/user/register.php';
        return true;
        
    } // end actionRegister()
    
/*
    // Вход в аккаунт
    public function actionLogin() {
        // Переменные для данных из формы
        $email='';
        $password='';
        
        // Получение данных из формы
        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = hash('ripemd128', "xx$password");
            
            $error = false; //  для ошибок
            
            // Проверка, есть ли пользователь в БД
            $userId = User::checkUserData($email, $password);
            if(!$userId) {  // если $userId отсутствует
                $error = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);    // авторизация
                header("Location: /cabinet/"); // перенаправление на страницу кабинета
            }     
        }
        
        require_once ROOT.'/views/user/login.php';
        return true;        
    } // end actionLogin()
*/

/*    
    // Выход из аккаунта
    public function actionLogout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: /");   // перенаправление на главную страницу
    } // end actionLogout()
*/

}
?>