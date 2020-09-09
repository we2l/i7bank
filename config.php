<?php
try {
    $pdo = new PDO("mysql:dbname=i7bank; host=localhost", "root", "");
} catch(PDOException $e) {
    echo "ERROR ".$e->getMessage();
    exit;
}