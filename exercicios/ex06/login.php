<?php 
require('connection.php');

if(count($_POST) > 0) {
    $email = $_POST['email'] ?? null;
    $senha = $_POST['senha'] ?? null;

    $sql_code = "SELECT * FROM senhas WHERE email = '$email'";
    $query_exec = $con_sqli->query($sql_code) or die($con_sqli->error);
    
    $usuario = $query_exec->fetch_assoc();
    if(password_verify($senha, $usuario['senha'])) {
        echo 'Login realizado com sucesso!';
    }
    else {
        echo 'Falha ao logar!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="" method="post">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="senha" placeholder="Senha">

        <button>Entrar</button>
    </form>
</body>
</html>