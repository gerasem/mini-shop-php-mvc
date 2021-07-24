<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = include(ROOT . '/config/routes.php');
    }

    /**
     * Return request string
     */
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

                $pluginName = ucfirst(array_shift($segments));

                $controllerName = ucfirst(array_shift($segments));
                $controllerName = $controllerName . 'Controller';

                $actionName = array_shift($segments);

                $parameters = $segments;

                // add File from Controller Class
                if (empty($pluginName)) {
                    $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                } else {
                    $controllerFile = ROOT . '/Plugins/' . $pluginName . '/controller/' . $controllerName . '.php';
                }

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);

                }

                // Create an Object. Call a Method (action)
                $controllerObject = new $controllerName;

                $result = call_user_func_array([$controllerObject, $actionName], $parameters);

                if ($result != null) {
                    break;
                }
            }
        }
        if ($result === false) {
            http_response_code(404);
            // ToDo redirect to 404.php
            echo 'Error 404: Controller not found';
        }
    }
}