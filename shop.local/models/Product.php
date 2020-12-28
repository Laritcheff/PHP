<?php
require_once ROOT.'/config/app_config.php';
    class Product{
        const SHOW_BY_DEFAULT=9;
    /*получает список последних товаров из БД
    $count- число товаров
        */
        public static function getLatestProducts ($count=self::SHOW_BY_DEFAULT){
            $count=intval($count);
            $connect=mysqli_connect(HOST, USER, PASSWORD, DBNAME);
            $productsList=array(); //для списка товаров
            $query="SELECT id,name, price, image, is_new FROM product WHERE status='1' ORDER BY id DESC LIMIT ".$count;
            $result=mysqli_query($connect, $query);
            $i=0;
            while($row=mysqli_fetch_array($result)){
                $productsList[$i]['id']=$row['id'];
                $productsList[$i]['name']=$row['name'];    
                $productsList[$i]['price']=$row['price'];
                $productsList[$i]['image']=$row['image']; 
                $productsList[$i]['is_new']=$row['is_new'];
                   $i++;  
            }       
               return $productsList;      

            }
        }
?>