
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body class="login-area">

    <section class="login-container">
        <h3>Faça seu Login</h3>
        
            <form action="login_action.php" method="POST">
                <div class="cpf">
                    <label for="">CPF</label><br>
                    <input type="number" name="cpf">
                </div>

                <div class="password">
                    <label for="password">Senha</label><br>
                    <input type="password" name="password">
                </div>
                <input type="submit" value="Login">
            </form>
            <a href="">Esqueci minha senha ></a>
    </section>

</body>
</html>