<?php	
 
 include("../infra/db/connect.php");
 session_start();



 
 if(!isset($_SESSION["usuario"])){
    header("Location: ../index.php");
    exit();
 }

 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usuario = $_POST["usuario"] ?? "";
        $senha = $_POST["senha"] ?? "";


    if(!empty($usuario) && !empty($senha)){
  
      $sql = "INSERT INTO usuario (usuario, senha) VALUES (?, ?) ";

      $stmt = mysqli_prepare($conn, $sql);

      mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Usuário cadastrado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: Usuário não cadastrado!')</script>";
        }

        mysqli_stmt_close($stmt);
      
      }

    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"] ?? "";
        $descricao = $_POST["descricao"] ?? "";
        $preco = $_POST["preco"] ?? "";
        $categoria = $_POST["categoria"] ?? "";
        $id = $_SESSION["usuario_id"];




        if(!empty($nome) && !empty($descricao) && !empty($preco) && !empty($categoria)){
  
      $sql = "INSERT INTO pratos (nome, descricao, preco, categoria, usuario_id) VALUES (?, ?, ?, ?, ?)";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "ssssi", $nome, $descricao, $preco, $categoria, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Prato cadastrado com sucesso!')</script>";
        } else {
            echo "<script>alert('Erro: prato não cadastrado!')</script>";
        }

        mysqli_stmt_close($stmt);
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
<div class ="container">
 <H2> Bem vindo, <?php echo $_SESSION["usuario"];?>.</H2>

 <hr>

  <h2>Cadastrar Pratos</h2>
   
    <form method="POST">
      
      <label for="nome">Nome</label>
      <br>
      <input type="text" name="nome">
      <br>
      <br>
      <label for="descricao">Descrição</label>
      <br>
      <input type="text" name="descricao">
      <br>
      <br>
      <label for="preco">Preço</label>
      <br>
      <input type="text" name="preco">
      <br>
      <br>
      <label for="categoria">Categoria</label>
      <br>
      <input type="text" name="categoria">
      <button type="submit">Enviar</button> 
      <br>

    </form>

        <?php
    include("../public/components/tableprato.php"); 
    
    ?>

    <hr>

    <h2>Cadastrar usuario</h2>
   
    <form method="POST">

      <label for="usuario">Usuario</label>
      <br>
      <input type="text" name="usuario">
      <br>
      <br>
      <label for="senha">Senha</label>
      <br>
      <input type="password" name="senha">
      <br>
      <br>
      <button type="submit">Enviar</button> 
      <br>

    </form>
        <?php
    include("../public/components/tableusers.php"); 
    
    ?>

    
</div>



  <a href="logout.php">Sair</a>
<script src=".../script.js"></script>
</body>
</html>