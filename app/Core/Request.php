<?php

class Request {

    /**
     * This PHP function extracts the URI from the current request URL and removes the "php-basic"
     * portion of the path.
     *
     * @return The function `uri()` is returning a string that represents the URI (Uniform Resource
     * Identifier) of the current request, with the "php-basic" part removed and any leading or trailing
     * slashes removed.
     */
    public static function uri ()
    {
        $uri = parse_url ($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = str_replace ('php-basic', '', $uri);
        return trim ($uri, '/');
    }


    /**
     * This function retrieves a value from either the  or  superglobal arrays, or returns a
     * default value if the key is not found.
     *
     * @param key The key is a string that represents the name of the parameter that we want to
     * retrieve from the GET or POST request.
     * @param default The default value to return if the requested key is not found in either the
     * or  arrays.
     *
     * @return the value of the specified key from either the  or  superglobal arrays, or
     * the default value if the key is not found in either array.
     */
    public static function get ($key, $default = null)
    {
        return $_GET[$key] ?? $_POST[$key] ?? $default;
    }

    public static function method ()
    {
        return strtolower ($_SERVER['REQUEST_METHOD']);
    }
}