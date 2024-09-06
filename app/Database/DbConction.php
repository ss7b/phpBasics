<?php
class Dbconction{
    
    private static $pdo;

    public static function make($config) {

        try {
            self::$pdo = self::$pdo ? :new PDO("mysql:host={$config['host']};dbname={$config['name']}", $config['user'], $config['password']);
            return self::$pdo;
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }
}