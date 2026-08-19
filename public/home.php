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
    header("Location: home.php");
    exit();
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
    header("Location: home.php");
    exit();
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
<div class ="container ">
 <H2> Bem vindo, <?php echo $_SESSION["usuario"];?>.</H2>

 
 <div class="container "> 
 <div class =" p-2">
  <div>
  <p class="text-center h2"> Cadastro de Pratos <p>
   </div>
   <div >
    <form method="POST">
      
      <label for="nome">Nome</label>
     
      <input type="text" name="nome">
      
      <label for="descricao">Descrição</label>
      
      <input type="text" name="descricao">
      
      
      <label for="preco">Preço</label>
      
      <input type="text" name="preco">
      
      <label for="categoria">Categoria</label>
   
      <select name="categoria" id="categoria">
        <option value="entrada">Entrada</option>
        <option value="prato-principal">Prato Principal</option>
        <option value="sobremesa">Sobremesa</option>
        <option value="bebida">Bebida</option>
    </select>
   
      <button  type="submit">Enviar</button> 
  

    </form>
    </div>
</div>
<div class="card p-3 pb-0 pt-2">
        <?php
    include("../public/components/tableprato.php"); 
    
    ?>
</div>
</div>
    <br>

  <div class="container">
    <div>
    <p class="text-center h2"> Usuarios Cadastrados <p>
   </div>
   <div>
    <form method="POST">

      <label for="usuario">Usuario</label>
      
      <input type="text" name="usuario">
    
      <label for="senha">Senha</label>
     
      <input type="password" name="senha">
     
      <button type="submit">Enviar</button> 

    </form>
    </div>
    <div class="card">
        <?php
    include("../public/components/tableusers.php"); 
    
    ?>
    </div>
    </div>

    
</div>



  <a href="logout.php">Sair</a>
<script src=".../script.js"></script>
</body>
</html>