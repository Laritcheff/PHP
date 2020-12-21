<?php
    require_once ROOT.'/config/app_config.php';
    class Category{
        /*получает список категоррий из БД */
        public static function getCateoryList(){
            $connect=mysqli_connect(HOST, USER, PASSWORD, DBNAME);
            $query="SELECT * FROM category";
            $result=mysqli_query($connect, $query);
            $categoryList=array();
            $i=0;
        while($row=mysqli_fetch_array($result)){
            $categoryList[$i]['id']=$row['id'];
            $categoryList[$i]['name']=$row['name'];
            $categoryList[$i]['status']=$row['status'];
        $i++;
            }        
            return $categoryList;
        }
    }
