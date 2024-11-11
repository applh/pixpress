<?php

class model 
{
    static function read ($table, $column = null, $value = null)
    {
        $db = db_sqlite::get_db();
        $where_filter = "";
        if ($column && $value) {
            $where_filter = "WHERE $column = :value";
        }
        $stmt = $db->prepare("SELECT * FROM $table $where_filter ORDER BY id DESC");
        if ($column && $value) {
            $stmt->bindParam(':value', $value);
        }
        $stmt->execute();
        // fetch mode
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll() ?? [];
    }
}
