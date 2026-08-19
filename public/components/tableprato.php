<hr>

<h4>  Pratos cadastrados  </h4>

<table class="table table-striped table-hover">
    
 <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Preço</th>
    <th>Categoria</th>

 </tr>

 <?php
    
    $sqlPratos = "SELECT * FROM pratos";

    
    $resultadoPratos = $conn -> query($sqlPratos);


    while ($linha = $resultadoPratos->fetch_assoc()){
        echo"<tr>

            <td>" . $linha["id"] . "</td>
            <td>" . $linha["nome"] . "</td>
            <td>" . $linha["descricao"] . "</td>
            <td>" . $linha["preco"] . "</td>
            <td>" . $linha["categoria"] . "</td>
            <td> <a href='editar_prato.php?id=". $linha["id"] ."'>Editar</td>
            <td> <a href='excluir.php?id=". $linha["id"] ."'>Excluir</td>            


        </tr>";

    }
?>


</table>