<?php
class AdminController extends AdminBase {
    
// Отображение админпанели
    public function actionIndex() {
        self::checkAdmin();     // проверка доступа
        require_once ROOT.'/views/admin/index.php';
        return true;
    } //end actionIndex()
  
}
?>