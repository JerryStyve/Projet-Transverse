<?php

function e404 () {
    require '../public/404.php';
    exit();
}

function dd(...$vars) {
    foreach ($vars as $var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

}
function get_pdo (): PDO {
    return  new PDO('mysql:host=localhost;dbname=agenda', 'root', '', [
        \PDO::ATTR_ERRMODE  => PDO::ERRMODE_EXCEPTION, // Le mode d'erreur sera les exceptions (requête sql mal faite ou autre)
        \PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC //mode de récupération des données par défaut qui sera un tableau associatif
    ]);

}

function h (?string $value): string {
    if ($value === null) {
        return '';
    }
    return htmlentities($value);
}