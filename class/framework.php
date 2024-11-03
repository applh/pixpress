<?php

class framework
{
    static $root = "";
    static $config = [
        "db_file" => "my-data/db.sqlite",
    ];

    static function get_config($key, $default = "")
    {
        switch ($key) {
            case "db_file":
                $value = framework::$config["db_file"] ?? $default;
                // add root
                $value = framework::$root . "/" . $value;
                break;
            default:
                $value = $default;
                break;
        }
        return $value;
    }

    static function load_config()
    {
        // load my-config.php if exists
        $file = framework::$root . "/my-data/config.php";
        if (is_file($file)) {
            include($file);
        }
    }

    static function router()
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

        // debug
        // header("X-dirname: $dirname");
        $is_404 = true;

        // if file exists
        if ($basename && str_starts_with($dirname, "/assets") && file_exists($file)) {
            $is_404 = false;
            // if extension is php
            if ($ext == "php") {
                // include file
                include $file;
            } else {
                // get assets
                framework::assets($ext, $file);
            }
        }

        if ($is_404 && framework::is_robots($basename)) {
            $is_404 = false;
            // get template
            http_response_code(200);

            require_once framework::$root . "/templates/robots.php";
            // if file does not exist
        }

        if ($is_404 && $basename && str_starts_with($dirname, "/@/api")) {
            $is_404 = false;
            framework::api($basename);
        }

        if ($is_404 && str_starts_with($dirname, "/@") && framework::is_admin($basename)) {
            $is_404 = false;
            // get template
            http_response_code(200);

            require_once framework::$root . "/templates/admin.php";
            // if file does not exist
        }

        if ($is_404 && framework::is_page($basename)) {
            // get template
            $founds = model::read("pages", "uri", "/$basename");
            if (!empty($founds)) {
                $found = $founds[0];
                $template = $found["template"] ?? "template.php";
                http_response_code(200);
                $template_path = framework::$root . "/templates/$template";
                if (is_file($template_path)) {
                    $is_404 = false;
                    require_once $template_path;
                }
            }
        }

        if ($is_404) {
            // get template
            http_response_code(404);

            require_once framework::$root . "/templates/404.php";
            // if file does not exist
        }
    }

    static function is_robots($basename)
    {
        $uri = $_SERVER["REQUEST_URI"];
        return $uri == "/robots.txt";
    }

    static function robots($action)
    {
        $disallow = ["/@/"];
        if (!website::$is_public) {
            $disallow = ["/"];
        }
        if ($action == "disallow") {
            echo implode("\nDisallow: ", $disallow);
        }
    }

    static function is_page($basename)
    {
        $db = db_sqlite::get_db();
        $pages = [
            "",
            "about",
            "contact",
            "home",
        ];
        return in_array($basename, $pages);
    }

    static function is_admin($basename)
    {
        $pages = [
            "admin",
        ];
        return in_array($basename, $pages);
    }

    static function api($basename)
    {
        $timestamp = date("Y-m-d H:i:s");
        $data = [];
        $data["timestamp"] = $timestamp;
        $data["request"] = $_REQUEST;
        // get api
        switch ($basename) {
            case "login":
                $data["feedback"] = "login";
                $data["token"] = "1234567890";
                break;
            default:
                $data["feedback"] = "thanks for using the api ($timestamp)";
                break;
        }
        // set headers
        header("Content-Type: application/json");
        // get json
        $json = json_encode($data);
        echo $json;
    }

    static function assets($ext, $file)
    {
        // get mime type
        switch ($ext) {
            case "css":
                $mime = "text/css";
                break;
            case "js":
                $mime = "text/javascript";
                break;
            case "png":
                $mime = "image/png";
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
}
