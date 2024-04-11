<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/Message.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $user = new User();
    $message = new Message();

    if (!$user->found($email)) {
        if ($user->register($firstname, $lastname, $email, $password)) {
            $message->create('success', '¡Usuario registrado exitosamente!');
        } else {
            $message->create('error', 'Hubo un error al registrar el usuario');
        }
    } else {
        $message->create('error', '¡Usuario ya existe!');
    }

    header("Location: ./../login.php");
}
