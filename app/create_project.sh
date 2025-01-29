#!/bin/bash

# Crear la estructura de carpetas
mkdir -p app/config app/controllers app/models app/routes app/utils app/views/auth app/views/insulin app/views/stats

# Crear los archivos
cat > app/config/database.php <<EOF
<?php
return [
    'host' => 'mongodb://localhost:27017',
    'database' => 'insulin_control',
];
EOF

cat > app/utils/Router.php <<EOF
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
EOF

cat > app/index.php <<EOF
<?php
require 'vendor/autoload.php';
require 'routes/auth.php';
require 'routes/insulin.php';
require 'routes/stats.php';

$router = new Router();
$router->run();
EOF

# Crear los archivos vacíos restantes
touch app/controllers/AuthController.php
touch app/controllers/InsulinController.php
touch app/controllers/StatsController.php
touch app/models/User.php
touch app/models/Insulin.php
touch app/routes/auth.php
touch app/routes/insulin.php
touch app/routes/stats.php
touch app/views/auth/login.php
touch app/views/auth/register.php
touch app/views/insulin/create.php
touch app/views/insulin/edit.php
touch app/views/insulin/list.php
touch app/views/stats/glucose-chart.php
touch app/views/stats/insulin-distribution.php
