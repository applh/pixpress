<?php

class server
{
    public function __construct()
    {
    }

    static function start ()
    {
        server::setup_autoloader();
        framework::$root = __DIR__;
        framework::router();
    }


    static function setup_autoloader ()
    {
        // load files from class folder
        spl_autoload_register("server::autoload_class");

    }

    static function autoload_class ($classname)
    {
        $file = __DIR__ . "/class/$classname.php";
        if (is_file($file)) {
            include($file);
        }
    }

}
