<?php

$user = 'root';
$password = '';

try {
    $db = new PDO ('mysql:host=localhost;dbname=distributeur_nws', $user,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeption $exc) {
    echo 'Error: ' . $exc->getMessage();
    exit();
}?>
