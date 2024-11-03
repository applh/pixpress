<?php

class website
{
    static $is_public = true;
    static $keys = [
        "lang" => "en",
        "charset" => "UTF-8",
        "viewport" => "width=device-width, initial-scale=1.0",
        "title" => "PixPress",
        "favicon" => "/assets/media/logo-pixpress.png",
        "css" => "/assets/site.css",
        "css_admin" => "/assets/admin.css",
        "description" => "PixPress is a simple CMS",
        "keywords" => "cms, php, javascript",
    ]; 

    static function e($key, $default = '')
    {
        echo website::$keys[$key] ?? $default;
    }
}
