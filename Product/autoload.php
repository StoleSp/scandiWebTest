<?php

class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($className) {
            $classFile = dirname(__DIR__) . '/' . str_replace('\\', '/', $className) . '.php';
            require_once $classFile;
        });
    }
}

