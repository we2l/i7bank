<?php

require './vendor/autoload.php';
require_once __DIR__.'/config.php';

$register_array  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);
echo "<pre>";
print_r($register_array);

if($register_array) {
    if(in_array("", $register_array)) {
        echo "Preencha todos os campos";
    }elseif (!filter_var($register_array['cpf'], FILTER_VALIDATE_INT)) {
        echo "CPF invalido";
    } elseif (!filter_var($register_array['email'], FILTER_VALIDATE_EMAIL)) {
        echo "Email inválido";
    } elseif ($register_array['confirmation-email'] != $register_array['email']) {
        echo "Erro na confirmação do email";
    } elseif (!$register_array['checkbox']) {
        echo "É preciso confirmar o checkbox";
    } else {
        $user = new \classes\User(
            $pdo,
            $register_array['name'],
            $register_array['cpf'],
            $register_array['email'],
            $register_array['password']
        );
        header("location: index.php");
    }
}