<?php
require "_init.php";

// $uri تم نقله للتغليف

// echo $uri;
// الطريقة الثانية
// $routes = [
//     '' => 'app/Controllers/index.php',
//     'about' => 'app/Controllers/about.php'
// ];
// if (array_key_exists($uri, $routes)) {
//     require $routes[$uri];
// }else{
//     throw new Exception("page ($uri) not found");
// }

// الطريقة الثالثه تم انشاء كائن وتغليق العملية
// Router::make([
//     '' => 'app/Controllers/index.php',
//     'about' => 'app/Controllers/about.php',
//     'task/create' => 'app/Controllers/task.create.php',
// ])->resolve(Requset::uri());

//الطريقة 4 لتعريف نوع الطلب
// Router::make()
// ->get('','app/Controllers/index.php')
// ->get('about','app/Controllers/about.php')
// ->post('task/create','app/Controllers/task.create.php')
// ->resolve(Requset::uri(),Requset::method());

//الطريقة 5   بعد عمل mvs
Router::make()
->get('',[TaskController::class, 'index'])
->post('task/create',[TaskController::class, 'create'])
->get('task/delete',[TaskController::class, 'delete'])
->get('task/update',[TaskController::class, 'update'])
->resolve(Requset::uri(),Requset::method());



// الطريقة الاولى
/*switch ($uri) {
    case '':
        require "app/Controllers/index.php";
        break;
    case 'about';
        require "app/Controllers/about.php";
        break;
    
    default:
        throw new Exception("page ($uri) not found");
        break;
}*/