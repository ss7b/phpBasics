<?php 
require "app/App.php";
require "app/helpers.php";

require "app/Database/DbConction.php";
require "app/Database/QueryBuilder.php";
require "app/Core/Router.php";
require "app/Core/Request.php";
require "app/Controllers/TaskController.php";

App::set('config', require 'config.php');


QueryBuilder::make(
    Dbconction::make(App::get('config')['database'])
);