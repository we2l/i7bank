<?php

session_start();
$cpf = $_SESSION['loginCpf'];
if($cpf) {
    session_destroy();
    header("location:index.php");
} else {
    header("location: index.php");
}