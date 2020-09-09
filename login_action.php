<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';

$user = new classes\User($pdo);

$cpf = filter_input(INPUT_POST, 'cpf');
$password = filter_input(INPUT_POST, 'password');

$loginUser = $user->readByCpf($cpf);

if($loginUser) {
    if(password_verify($password, $loginUser['password']) && $loginUser['cpf'] === $cpf) {
        $_SESSION['loginCpf'] = $cpf;
        header("location: user-area.php");
    } else {
        header("location: index.php");
    } 
} else {
    header("location: index.php");
}