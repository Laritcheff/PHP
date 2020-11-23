<?php
define ('DB_HOST','localhost');
define ('USERNAME','root');
define ('PASSWORD', '');
define ('DB_NAME', 'users');
define ('DEBUG_MODE', true);//режим отладки
define ("HOST_ROOT", $_SERVER['DOCUMENT_ROOT']."/" );

function debug_print($message){
    if(DEBUG_MODE){
        echo $message;
    }
}

function handle_error($user_error, $error_array){
    if(is_array($error_array)){
    $system_error= 'Error`s type'.$error_array['type'].'<br>ERROR:'.$error_array["message"].'<br>File:'.$error_array['file'].'<br>String:'.$error_array['line'] ;
    }
    else
    {
        $system_error=$error_array;
    }
    header("Location:show_error.php?user_error=$user_error&system_error=$system_error");
    exit();

}
// адрес картинок для браузера
function web_path($im_path){

    return str_replace($_SERVER['DOCUMENT_ROOT'],'', $im_path);
}

?>