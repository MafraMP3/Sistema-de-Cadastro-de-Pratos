
<?php
include("infra/db/connect.php");
session_start();



if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

  

    $sql = "SELECT * FROM usuario 
    WHERE usuario = '$usuario' 
    AND senha = '$senha'";

    $resultado = $conn -> query($sql);


    if($resultado -> num_rows > 0){
        $dadosUsuario = $resultado->fetch_assoc();
        $_SESSION["usuario"] = $usuario;
        $_SESSION["usuario_id"] = $dadosUsuario["id"];
        header("Location: public/home.php");
        exit();
    }else{
        $erro = "Usuário ou senha inválidos.";
    }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com PHP</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">

    <label for="usuario">Usuario</label>
    <input type="text" name="usuario">
    <br>
    <br>
    <label for="senha">Senha</label>
    <input type="password" name="senha">
    <br>
    <br>
    <button type="submit">Entrar</button>

    </form>

    <?php

    if(isset($erro)){
        echo $erro;
    }
    ?>
</body>
</html>