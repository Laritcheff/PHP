<?php
class CabinetController {
    // Получение id пользователя    
    public function actionIndex() {
   
        require_once ROOT.'/views/cabinet/index.php';
        return true;
    } // end actionIndex()
    
/*
    // Редактирование данных пользователя
    public function actionEdit() { 
        // Получаем id пользователя из сессии
        $userId = User::checkLogged();
        
        // Получаем инфо о пользователе из БД
        $user = User::getUserById($userId);
        $name = $user['name'];
        $password = $user['password'];
        
        $result=false; // переменная будет отвечать за то, что происходило с формой обновления данных
        $error=false; // для ошибок
        
        if(isset($_POST['submit'])) {  // если форма отправлена
            $name = $_POST['name']; // получаем изменения
            $password = $_POST['password'];
            $password = hash('ripemd128', "xx$password");
            
            if((!empty($name))&&(!empty($password))) {
                $result=User::edit($userId, $name, $password); // передаем их методу edit() для добавления в БД, $result становится true
             } else {
                $error = 'Для изменения данных заполните все поля.';
            }
        }
        
        require_once ROOT.'/views/cabinet/edit.php';
        return true;    
    } // end actionEdit()
    
*/
}
?>