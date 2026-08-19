<?php
 session_start();
    include("../infra/db/connect.php");
    if (!isset($_SESSION["usuario"])) {
        header("Location: ../index.php");
        exit();
    }

    $id = isset($_GET["id"]) ? (int)$_GET["id"] : 0; 

    $sql = "SELECT * FROM pratos WHERE id = $id";
    $resultado = $conn -> query($sql);

    $prato = $resultado -> fetch_assoc();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $novoNome = $_POST["nome"] ?? "";
        $novaDescricao = $_POST["descricao"] ?? "";
        $novoPreco = $_POST["preco"] ?? "";
        $novaCategoria = $_POST["categoria"] ?? "";

        if(!empty($novoNome) && !empty($novaDescricao) && !empty($novoPreco) && !empty($novaCategoria)){
  
      $sql = "UPDATE pratos SET nome = ?, descricao = ?, preco = ?, categoria = ? WHERE id = ?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "ssssi", $novoNome, $novaDescricao, $novoPreco, $novaCategoria, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Erro: prato não cadastrado!')</script>";
        }

        mysqli_stmt_close($stmt);
      } 
       $prato['nome'] = $novoNome;
        $prato['descricao'] = $novaDescricao;
        $prato['preco'] = $novoPreco;
        $prato['categoria'] = $novaCategoria;
        

    }


?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>

    <h2> Editar Prato </h2>

    <form action="editar_prato.php?id=<?php echo $id; ?>" method="POST">
        <label for="nome">Nome</label>
      <input type="text" name="nome" value="<?php echo $prato['nome']; ?>">
      <br>
      <br>
      <label for="descricao">Descrição</label>
      <input type="text" name="descricao" value="<?php echo $prato['descricao']; ?>">
      <br>
      <br>
      <label for="preco">Preço</label>
      <input type="text" name="preco" value="<?php echo $prato['preco']; ?>">
      <br>
      <br>
      <label for="categoria">Categoria</label>
      <input type="text" name="categoria" value="<?php echo $prato['categoria']; ?>">
      <button  type="submit">Enviar </button> 
      <br>
    </form>

</body>

</html>