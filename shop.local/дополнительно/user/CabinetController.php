<?php
class CabinetController {
    // ��������� id ������������    
    public function actionIndex() {
   
        require_once ROOT.'/views/cabinet/index.php';
        return true;
    } // end actionIndex()
    
/*
    // �������������� ������ ������������
    public function actionEdit() { 
        // �������� id ������������ �� ������
        $userId = User::checkLogged();
        
        // �������� ���� � ������������ �� ��
        $user = User::getUserById($userId);
        $name = $user['name'];
        $password = $user['password'];
        
        $result=false; // ���������� ����� �������� �� ��, ��� ����������� � ������ ���������� ������
        $error=false; // ��� ������
        
        if(isset($_POST['submit'])) {  // ���� ����� ����������
            $name = $_POST['name']; // �������� ���������
            $password = $_POST['password'];
            $password = hash('ripemd128', "xx$password");
            
            if((!empty($name))&&(!empty($password))) {
                $result=User::edit($userId, $name, $password); // �������� �� ������ edit() ��� ���������� � ��, $result ���������� true
             } else {
                $error = '��� ��������� ������ ��������� ��� ����.';
            }
        }
        
        require_once ROOT.'/views/cabinet/edit.php';
        return true;    
    } // end actionEdit()
    
*/
}
?>