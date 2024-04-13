<?php
// Obtiene la URL actual
$filePath = $_SERVER['REQUEST_URI'];

// Encuentra la posición del primer '?' que indica el inicio de los parámetros de la consulta
$queryStringPos = strpos($filePath, '?');

// Si hay una cadena de consulta, separa la ruta del archivo de los parámetros de la consulta
if ($queryStringPos !== false) {
    $filePath = substr($filePath, 0, $queryStringPos);
}

// Elimina los subdirectorios de la ruta del archivo
$filePathParts = explode('/', $filePath);
$fileName = end($filePathParts);

switch ($fileName) {
    case 'login.php':
    case 'register.php':
    case 'password.php':
        if (isset($_SESSION["id"])) {
            header("Location: index.php");
        }
        break;
    default:
        if (!isset($_SESSION["id"])) {
            header("Location: login.php");
        }
        break;
}