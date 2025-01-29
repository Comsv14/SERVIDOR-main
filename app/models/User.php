<?php
class User
{
    private $collection;

    public function __construct()
    {
        $config = require 'config/database.php';
        $client = new MongoDB\Client($config['host']);
        $this->collection = $client->selectCollection($config['database'], 'users');
    }

    public function register($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $user = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
        ];
        $this->collection->insertOne($user);
    }

    public function login($email, $password)
    {
        $user = $this->collection->findOne(['email' => $email]);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return null;
    }
}
