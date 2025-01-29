<?php
$authController = new AuthController();

// Ruta de registro
$router->get('/register', [$authController, 'register']);
$router->post('/register', [$authController, 'register']);

// Ruta de inicio de sesión
$router->get('/login', [$authController, 'login']);
$router->post('/login', [$authController, 'login']);
