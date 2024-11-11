<?php

class api_admin
{
    static function list ()
    {
        $items = model::read("pages");
        return $items;
    }
}
