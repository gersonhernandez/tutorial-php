<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/Message.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $message = new Message();

    if ($user->login($email, $password)) {
        $message->create('success', '¡Has iniciado sesión exitosamente!');
        header("Location: ./../index.php");
    }else{
        $message->create('error', 'Credenciales incorrectas');
        header("Location: ./../login.php");
    }
}