<?php
    session_start();
    require_once __DIR__."/vendor/autoload.php";
    require_once __DIR__."/config.php";
    $cpf = $_SESSION['loginCpf'];
    if(!$cpf) {
        header("location: index.php");
    }
    $current = new classes\CurrentAccount($pdo, $cpf);
    $current->readUser($cpf);
    $name = explode(' ', $current->getUser()['name']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Área do Usuário</title>
</head>
<body>
    
    <header class="header-user">
        <div class="container-flex container-header">
            
            <div class="logo">
                <a class="logo" href=""><strong>I7</strong>Bank</a>
            </div>

            <a href="exit.php">Sair</a>

        </div>
    </header>

    <section class="intro-user">
        
        <div class="box1">
            <div class="content">
                <div> Olá, <?= $name['0']; ?></div>
                <div class="account">
                    <span><?= 'Ag: '.$current->getAgency(); ?></span>
                    <span><?= 'Cc: '.$current->getAccount(); ?></span>
                </div>
            </div>

            <div class="saldo">
                <h2>Saldo disponível:</h2>
                <div class="content-saldo">
                    <span><?= $current->getBalance($cpf); ?></span>
                    <span></span>
                </div>
            </div>

        </div>

        <div class="line"></div>

        <div class="box2">

            <div class="options">
                <a href="" class="withdraw-menu">Sacar</a>
                <a href="" class="deposit-menu" >Depositar</a>
            </div>

            <div class="options-action">
                <div class="withdraw">
                    <form action="withdraw_action.php" method="POST">
                        <label for="">Valor a ser sacado:</label>
                        <input type="number" name= 'value-withdraw'><br>
                        <input type="submit" value="Sacar">
                    </form>
                </div>

                <div class="deposit">
                    <form action="deposit_action.php" method="POST">
                        <label for="">  Valor a ser depositado:</label>
                        <input type="number" name="value-deposit"><br>
                        <input type="submit" value="Depositar">
                    </form>
                </div>

                <div class="statement">
                    
                </div>
            </div>

        </div>

    </section>
<script src="assets/js/script.js"></script>
</body>
</html>