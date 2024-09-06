<?php 

class Requset{
    //دالة جلب الرابط
    public static function uri(){
        // $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);//لجلب الرابط فقط بدون الكويريز
        //  $uri = trim( $_SERVER['REQUEST_URI'] , '/') ;
        // $uri = str_replace("learn","", $uri);

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $uri;
        $uri = str_replace(home(), '', $uri);
        return trim($uri, '/');
    }

    public static function get($key, $default = null){
        return $_GET[$key] ?? $_POST[$key] ?? $default;
    }

    //دالة لمعرفة نوع الطلب
    public static function method()  {
        return strtolower($_SERVER["REQUEST_METHOD"]); 
    }
}