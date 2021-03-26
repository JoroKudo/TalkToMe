<?php

namespace App\Dispatcher;

class Dispatcher
{
    public static function dispatch()
    {
        $controllerName = UriParser::getControllerName().'Controller';
        $className = 'App\\Controller\\'.$controllerName;
        $methodName = UriParser::getMethodName();
        $controller = new $className();
        $controller->$methodName();
    }
}
