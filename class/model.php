<?php

class model 
{
    static function read ($table, $column, $value)
    {
        $db = db_sqlite::get_db();
        $stmt = $db->prepare("SELECT * FROM $table WHERE $column = :value");
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        return $stmt->fetchAll() ?? [];
    }
}
