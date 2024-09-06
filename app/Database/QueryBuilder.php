<?php

class QueryBuilder{
    
    private static $pdo;

    public static function make(PDO $pdo) {
        self::$pdo = $pdo;
    }
    // استعلام الجلب
    public static function get(string $table, $where = null){
        $query = "SELECT * FROM {$table}";
        if (is_array($where)) {
            $whereClause = implode('',  $where);
            $query .= " WHERE " . $whereClause;
        }
        
        //الاستعلام
        $stm = self::$pdo->prepare($query);//تجهيز الاستعلام 
        $stm->execute();//تشغيل الاستعلام
        return $stm->fetchAll(PDO::FETCH_CLASS);
        /*
        PDO::FETCH_OBJجلب البيانات ك مصفوفة 
        PDO::FETCH_CLASS, "Tasks")جلب البيانات وتحويل السجلات الى كائنات 
        */
        
    }

    // استعلام الرفع او ارسال
    public static function insert($table, $data) {
        /* $data= [
             "description"=> "hello php",
             "completed"=> 0,
         ];*/

        $fields = array_keys($data);//لجلب المفاتيح من المصفوفة
        $fieldsStr = implode(", " , $fields);//لتحويل المصفوفة الى سلسة نصية
        $valueStr = str_repeat("?,", count($fields) -1) . "?";//لعد عدد العناصر في المصفوفة وعمل استفهام على حسب العدد
        $values =array_values($data);
        
        $query = "INSERT INTO {$table} ($fieldsStr) VALUE ($valueStr)";//الاستعلام

        $stm = self::$pdo->prepare($query);//تجهيز الاستعلام 

        $stm->execute($values);//تشغيل الاستعلام
    }
    // استعلام  اتعديل 
    public static function update($table, $id, $data) {
        $fields= implode("=?, ", array_keys($data)) . "=?" ;
        //  echo $fields;
        //  exit();
        $values =array_values($data);
        
        $query = "UPDATE {$table} SET {$fields} WHERE id= {$id}";

        $stm = self::$pdo->prepare($query);

        $stm->execute($values);
    }
    // استعلام  الحذف
    public static function delete($table, $id, $column = 'id', $operator = '=') {
        
        $query = "DELETE FROM {$table} WHERE {$column} {$operator} {$id}";

        $stm = self::$pdo->prepare($query);

        $stm->execute();
    }

}