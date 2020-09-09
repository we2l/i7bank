<?php

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>I7Bank</title>
</head>
<body>
    <header class="header-index">
        <div class="open-menu-mobile">
            <img class="img-menu-mobile" src="./assets/img/open-menu.svg" width="40px">
        </div>
        <div class="container-flex container-header">
            <a class="logo" href=""><strong>I7</strong>Bank</a>
            <nav class="menu">
                <ul>
                    <li><a href="#current" >Conta Corrente</a></li>
                    <li><a href="#savings">Conta Poupança</a></li>
                    <li><a href="#about">Sobre Nós</a></li>
                </ul>
            </nav>
            <div class="buttons-header">
                <div class="login">
                    <a href="login.php">Login</a>
                    <img src="assets/img/vector-login.svg" alt="Login">
                </div>
                <a class="open-account" href="#">Abra sua Conta</a>
            
            </div>
        </div>
    </header>

    <div class="open-menu">
        <h3>Complete o formulário abaixo para criar sua conta I7Bank</h3>
        <form action="register_action.php" method="POST">
            <input type="text" name="name" placeholder="Nome Completo">
            <input type="text" name = "password" placeholder="Senha">
            <input type="number" name='cpf' placeholder="CPF" >
            <input type="email" name="email" placeholder="E-mail">
            <input type="email" name="confirmation-email" placeholder="Confirmação de E-mail">
            <div class="check">
                <input type="checkbox" name="checkbox" value="true">
                <label for="checkbox"> 
                    Eu li, estou ciente das condições de tratamento dos meus dados pessoais e dou meu consentimento,
                    quando aplicável, conforme descritos nesta <a href="">Política de privacidade</a>
                </label>
            </div>
            <input type="submit" value="Criar Conta">
        </form>
    </div>

    <main >
        <div class="container-flex .container-between">
            <div class="text">
                 Um banco cuja simplicidade e praticidade são nossos maiores valores.
            </div>

            <div class="img">
                <img src="./assets/img/card-intro.png">
            </div>
        </div>
    </main>

    <section id="current" class="current-account">

        <div class="container-flex .container-between">

           <div class="text">
               <h3>Conta Corrente I7</h3>
                Movimente seu dinheiro de forma rápida, prática e segura.
           </div>

           <div class="img">
               <img src="./assets/img/card-current.png">
           </div>

        </div>

    </section>

    <section id="savings" class="savings-account">

        <div class="container-flex .container-between">
        
        <div class="text">
               <h3>Conta Poupança I7</h3>
               Economize e invista seu dinheiro com segurança.
           </div>

           <div class="img">
               <img src="./assets/img/current-savings.png">
           </div>

        </div>

    </section>

    <section id="about" class="about-us">

        <div class="container-flex .container-between">

            <div class="text">
                <h3>Sobre Nós</h3>
                Somos um banco digital que visa facilitar os entes burocráticos do cotidiano de nossos clientes.
            </div>

            <div class="img">
                <img src="./assets/img/about-us.png" >
            </div>

        </div>

    </section>

    <footer>
        <div class="container-flex .container-between">
            
            <div class="logo">
                <a class="logo" href=""><strong>I7</strong>Bank</a>
            </div>

            <div class="text-footer">
                ©  - 2020 Banco I7Bank
            </div>

        </div>
    </footer>

    <div class="menu-mobile">
        <img class="close-menu-mobile" src="./assets/img/close.svg" width="30px">
        <div class="container-mobile">
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="#open">Abra sua Conta</a></li>
                <li><a href="#current">Conta Corrente</a></li>
                <li><a href="#savings">Conta Poupança</a></li>
                <li><a href="#about">Sobre Nós</a></li>
            </ul>
        </div>
    </div>

    <div class="modal-container"></div>
<script src="assets/js/script.js"></script>
</body>
</html>