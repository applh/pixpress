<?php

class html 
{
    static function lorem ($length=256, $show=true)
    {
        $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit";
        $lorem .= "sed do eiusmod tempor incididunt ut labore et dolore magna aliqua";
        $lorem .= "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat";
        $lorem .= "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur";
        $lorem .= "Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum";
        $lorem .= "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium";
        $lorem .= "totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo";
        $lorem .= "Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt";
        $lorem .= "Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem";

        $text = substr($lorem, 0, $length);
        if ($show) {
            echo $text;
        }
        return $text;
    }
}
