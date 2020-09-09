<?php
session_start();
require_once __DIR__."/vendor/autoload.php";
require_once __DIR__."/config.php";
$cpf = $_SESSION['loginCpf'];
$current = new classes\CurrentAccount($pdo, $cpf);

$valueDeposit = filter_input(INPUT_POST, 'value-deposit', FILTER_VALIDATE_FLOAT);

$current->deposit($valueDeposit, $cpf);
header("location: user-area.php");