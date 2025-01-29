<?php
class Router
{
    private $routes = [];

    public function get($path, $callback)
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function run()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes[$requestMethod] as $route => $callback) {
            if (preg_match('#^' . $route . '$#', $requestPath, $matches)) {
                array_shift($matches);
                call_user_func_array($callback, array_values($matches));
                return;
            }
        }

        http_response_code(404);
        echo 'Página no encontrada';
    }
}
