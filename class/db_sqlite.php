<?php

class db_sqlite 
{
    static $pdo = null;

    static function get_db()
    {
        $file = framework::get_config('db_file');
        error_log("db_sqlite::get_db: $file");
        db_sqlite::$pdo = new PDO("sqlite:$file");
        return db_sqlite::$pdo;
    }
}
