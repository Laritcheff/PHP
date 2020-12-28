<?php
    class Router    {
        private $routes; //запросы в адресной строке
        public function __construct() {
            $routesPath=ROOT.'/components/routes.php';
            $this->routes=include($routesPath);//сохраняем маршрут in $routes
        } 

            private function getURI(){
                if(!empty($_SERVER['REQUEST_URI'])){
                return trim($_SERVER['REQUEST_URI'],'/');//получаем содержимое адресной строки
                   } 

                }
            public function run(){
                $uri=$this->getURI();
                    //просмотр массива с маршрутами и сравниваем ключи с содержимым адресной строки
                foreach ($this -> routes as $routeKey => $path){
                    if(preg_match("~$routeKey~", $uri)){

                        $internalRoute=preg_replace('`$routeKey`', $path, $uri)
                        $segments=explode('/', $internalRoute);
                        //имя контроллера
                        $controllerName = array_shift($segments).'Controller';  
                        $controllerName=ucfirst($controllerName);   
                        //сoздаем имя метода
                        $actionName='action'.ucfirst(array_shift($segments));

                        //делаем список параметров
                        $parameters=$segments;    
                        //подключение файла контроллера
                        $controllerFile=ROOT."/controllers/$controllerName.php";
                        if(file_exists($controllerFile)){
                        include_once $controllerFile;
                        }    
                            //создание объекта
                         $controllerObject = new $controllerName;
                         $result=$controllerObject->$actionName();
                         $result=call_user_func_array(array($controllerObject, $actionName), $parameters);   


                        if($result!=null){break;}   
                    }
                }
                                    
            } 
                               
        }
    
?>