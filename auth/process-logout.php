<?php
session_start();
session_destroy();

require_once "../classes/Message.php";

session_start();
$message = new Message();
$message->create('success', '¡Has cerrado sesión!');
header("Location: ./../login.php");