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
 <hr class="border border-danger border-2 opacity-50">

 
 <div class="container "> 
 <div class ="card m-4 p-2 shadow-sm p-3 mb-5 bg-body rounded">
  <div>
  <p class="text-center b-3 h2"> Cadastrar Pratos <p>
   </div>
   <div class="d-flex justify-content-around">
    <form method="POST">
      
      <div class="row gx-5">

        <div class="col-md-3">
            <label class="form-label" for="nome">Nome</label>
            <input class="form-control" type="text" name="nome">
        </div>

        <div class="col-md-3">
            <label class="form-label" for="descricao">Descrição</label>
            <input class="form-control" type="text" name="descricao">
        </div>

        <div class="col-md-3">
            <label class="form-label" for="preco">Preço</label>
            <input class="form-control" type="text" name="preco">
        </div>

        <div class="col-md-3">
            <label class="form-label" for="categoria">Categoria</label>
            <select class="form-select" name="categoria">
                <option value="entrada">Entrada</option>
                <option value="prato-principal">Prato Principal</option>
                <option value="sobremesa">Sobremesa</option>
                <option value="bebida">Bebida</option>
            </select>
        </div>

    </div>

    <div class="d-flex justify-content-center mt-4">
        <button class="btn btn-outline-dark" type="submit">
            Enviar
        </button>
    </div>


    </form>
    </div>
</div>
<div class="shadow-sm p-3 mb-5 bg-body card m-4   pb-0 pt-2">
        <?php
    include("../public/components/tableprato.php"); 
    
    ?>
</div>
</div>

<hr class="border border-danger border-2 opacity-50">

  <div class="container ">
    <div class ="card m-4 p-2 shadow-sm p-3 mb-5 bg-body rounded">
      <div>
    <p class="text-center mt-2 h2"> Usuarios Cadastrados <p>
   </div>
   <div class="d-flex justify-content-around">
    <form method="POST">

      <div class="row gx-5">

        <div class="col-md-6">
            <label class="form-label" for="usuario">Usuário</label>
            <input class="form-control" type="text" name="usuario">
        </div>

        <div class="col-md-6">
            <label class="form-label" for="senha">Senha</label>
            <input class="form-control" type="password" name="senha">
        </div>

    </div>

    <div class="d-flex justify-content-center mt-4">
        <button class="btn btn-outline-dark" type="submit">
            Enviar
        </button>
    </div>
    </form>
    </div>
    </div>
    <div class="shadow-sm p-3 mb-5 bg-body card m-4  pb-0 pt-2">
        <?php
    include("../public/components/tableusers.php"); 
    
    ?>
    </div>
    </div>

    
</div>
<hr class="border border-danger border-2 opacity-50">


  <a href="logout.php">Sair</a>
<script src=".../script.js"></script>
</body>
</html>