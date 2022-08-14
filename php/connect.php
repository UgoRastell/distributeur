<?php

$user='root';
$password='';

try {
    $db = new PDO ('mysql:host=localhost;dbname=distributeur_nws',$user,$password);
} catch (PDOExeption $e) {
    print 'Error: ' . $e->getMessage();
    die;
}
