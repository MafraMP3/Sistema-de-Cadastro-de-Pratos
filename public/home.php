<?php	
 
 include("../infra/db/connect.php");


 
 if(!isset($_SESSION["usuario"])){
    header("Location: ../index.php");
    exit();
 }

 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario = $_POST["usuario"] ?? "";
        $senha = $_POST["senha"] ?? "";


        if(!empty($usuario) && !empty($senha)){
  
      $sql = "INSERT INTO usuario (usuario, senha) VALUES ('$usuario', '$senha') ";
  
  
      if($conn -> query($sql) === TRUE){
            echo "<script>alert('Usuário Cadastrado com sucesso!')</script>";
      }else{
            echo "<script>alert('Erro Usuário Não Cadastrado!')</script>";
      }
      }

    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
   
 <H2> Bem vindo, <?php echo $_SESSION["usuario"];?>.</H2>

    <h2>Cadastrar usuario</h2>
   
    <form method="POST">

      <label for="usuario">Usuario</label>
      <input type="text" name="usuario">
      <br>
      <br>
      <label for="senha">Senha</label>
      <input type="password" name="senha">
      <br>
      <br>
      <button type="submit">Enviar</button> 
      <br>

    </form>



    <?php
    include("../public/component/table.php"); 
    ?>

  <a href="logout.php">Sair</a>
<script src=".../script.js"></script>
</body>
</html>