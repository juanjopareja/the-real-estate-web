<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . 'functions.php');
define('IMAGES_FOLDER', __DIR__ . '/../images/');

function includeTemplate(string $name, bool $start = false) {
    include TEMPLATES_URL . "/$name.php";
}

function isAuthenticated() {
    session_start();

    if(!$_SESSION['login']) {
        header('location: ../index.php');
    }
}

function debug($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}

function sanitizer($html) {
    $s = htmlspecialchars($html);
    return $s;
}

function validateTypeContent($type) {
    $types = ['seller', 'property'];

    return in_array($type, $types);
}

function showMessages($code) {
    $message = '';

    switch($code) {
        case 1:
            $message = 'Creado correctamente';
            break;
        case 2:
            $message = 'Actualizado correctamente';
            break;
        case 3:
            $message = 'Eliminado correctamente';
            break;
        default:
            $message = false;
            break;
    }

    return $message;
}