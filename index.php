
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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
  <div class=" position-absolute top-50 start-50 translate-middle b-0 " style="width: 18rem;">
  <img src="images\Papa_Louie_Pals.webp" class="card-img-top b-0" alt="...">
  <div class="card-body b-0">
    <h5 class="card-title b-0">Login</h5>
    <p class="card-text b-0">

    <form method="POST">

    <label class="form-label" for="usuario">Usuario</label>
    <input class="form-control" type="text" name="usuario">
   
    <label class="form-label" for="senha">Senha</label>
    <input class="form-control" type="password" name="senha">
   
       <div class="d-grid gap-2 mt-4">
        <button class="btn btn-outline-danger" type="submit">
            Enviar
        </button>
    </div>
    </form>

    </p>
  </div>
</div>

    


    <?php

    if(isset($erro)){
        echo $erro;
    }
    ?>
</body>
</html>