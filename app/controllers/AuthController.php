<?php
class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->userModel->register($name, $email, $password);
            // Redirigir al usuario a la página de inicio de sesión
            header('Location: /login');
            exit;
        }
        require 'views/auth/register.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->login($email, $password);
            if ($user) {
                // Iniciar sesión del usuario
                session_start();
                $_SESSION['user_id'] = (string) $user['_id'];
                $_SESSION['name'] = $user['name'];
                header('Location: /insulin/list');
                exit;
            } else {
                $error = 'Credenciales inválidas';
            }
        }
        require 'views/auth/login.php';
    }
}
