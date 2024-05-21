<?php

function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}
function pagina_actual($path) {
    $currentPath = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    return rtrim($currentPath, '/') === rtrim($path, '/');
}

function is_auth()
{
    if (!$_SESSION) {
        session_start();
    }
    return isset($_SESSION["nombre"]) && !empty($_SESSION);
}

function is_admin()
{
    if (!$_SESSION) {
        session_start();
    }

    return isset($_SESSION["admin"]) && !empty($_SESSION["admin"]);
}
function aos_animacion(){
    $efectos =["fade-up", "fade-down", "fade-right", "fade-left", "flip-left", "flip-right", "flip-up", "flip-down", "zoom-in", "zoom-in-up", "zoom-in-down", "zoom-out-down"];
    $efecto = array_rand($efectos, 1);
    echo ' data-aos="'. $efectos[$efecto]. '" ';
}