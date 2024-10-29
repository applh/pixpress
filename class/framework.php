<?php

class framework
{
    static $root = "";

    static function router ()
    {
        // basic router
        $uri = $_SERVER["REQUEST_URI"];
        // get path
        $path = parse_url($uri, PHP_URL_PATH);
        // get extension
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        // get dirname and basename
        $dirname = pathinfo($path, PATHINFO_DIRNAME);
        $basename = pathinfo($path, PATHINFO_BASENAME);
        // get file
        $file = framework::$root . $path;
        // if file exists
        if ($basename && file_exists($file)) {
            // if extension is php
            if ($ext == "php") {
                // include file
                include $file;
            } else {
                // get mime type
                switch ($ext) {
                    case "css":
                        $mime = "text/css";
                        break;
                    case "js":
                        $mime = "text/javascript";
                        break;
                    default:
                        $mime = mime_content_type($file);
                        break;
                }
                // echo "($uri)($basename)($file)";
                // set headers
                header("Content-Type: $mime");
                // get content
                $content = file_get_contents($file);
                echo $content;
            }
        } else {
            // get template
            http_response_code(200);

            require_once framework::$root . "/templates/template.php";
            // if file does not exist
        }

    }

}
