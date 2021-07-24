<?php

class Router
{
    private $routes;


    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }


    // Return type

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    public function run()
    {
        // get URI
        $uri = $this->getURI();
        // Check URI in  routes.php
        $result = false;
        foreach ($this->routes as $uriPattern => $path) {
            // Compare $uriPattern and $uri
            if (preg_match("~^$uriPattern$~", $uri)) {

                // Get internal Route from external Route according to the rule

                $internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);

                // Define Controller and Action
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);


                $actionName = 'action' . ucfirst((array_shift($segments)));

                $parameters = $segments;

                // add File from Controller Class
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);

                }

                // Create an Object. Call a Method (action)
                $controllerObject = new $controllerName;

                // OLD $result           = $controllerObject->$actionName();
                $result = call_user_func_array([$controllerObject, $actionName], $parameters);

                if ($result != null) {
                    break;
                }
            }
        }
        if ($result === false) {
            http_response_code(404);
            echo 'Fehler 404. Page/Contoller wurde nich gefunden';
        }
    }
}