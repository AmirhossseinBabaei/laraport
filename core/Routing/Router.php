<?php

declare(strict_types=1);

namespace Core\Routing;

use Exception;

class Router
{
    private array $routes;
    private string $currentRoute;

    public function __construct()
    {
        $this->currentRoute = $_SERVER['REQUEST_URI'] ?? '';
    }

    /**
     * @param string $path
     * @param array $context
     * @param string $method
     * @return mixed
     * @throws Exception
     */

    public function addRoute(string $path, array $context, string $method)
    {
        $allMethodSupported = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE'];

        foreach ($allMethodSupported as $methodSupport) {
            if (!in_array($method, $allMethodSupported, true)) {
                throw new Exception("The route method $method not supported from this framework");
            }
        }

        if (!empty($context[0]) && !empty($context[1])) {
            $this->routes[$method][] = [
                'path' => $path,
                'controller' => $context[0],
                'method' => $context[1]
            ];
        } else {
            throw new Exception("Your controller or method is not defined");
        }
    }

    public function resolveRoute()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$requestMethod] as $route) {
            if ($route['path'] === $this->currentRoute) {
                return $this->callController($route['controller'], $route['method']);
            } else {
                throw new Exception("The route url $this->currentRoute not exists");
            }
        }
    }

    public function callController(string $controller, string $method)
    {
        if (!class_exists($controller)) {
            throw new Exception("The controller $controller is not defined");
        }

        $controller = new $controller();

        if (!method_exists($controller, $method)) {
            throw new \Exception("Method '{$method}' not found in controller '{$controller}'");
        }

        return $controller->$method();
    }

    /**
     * @return mixed|string
     */

    public function getCurrentRoute(): mixed
    {
        return $this->currentRoute;
    }
}