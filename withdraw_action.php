<?php
session_start();
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/config.php";
$cpf = $_SESSION['loginCpf'];
$current = new classes\CurrentAccount($pdo, $cpf);

$valueWithdraw = filter_input(INPUT_POST, 'value-withdraw', FILTER_VALIDATE_FLOAT);

$current->withdraw($valueWithdraw, $cpf);
header("location:user-area.php");