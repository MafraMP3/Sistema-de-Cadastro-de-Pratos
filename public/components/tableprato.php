

<h4>  Pratos cadastrados  </h4>

<table class="table  table-hover m-0 ">
    
 <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Descrição</th>
    <th>Preço</th>
    <th>Categoria</th>
    <th>ID do usuario</th>
    <th></th>
    <th></th>

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
            <td>" . $linha["usuario_id"] . "</td>
            <td>
                <a href='editar_prato.php?id=" . $linha["id"] . "' 
                   class='btn btn-outline-dark'>
                    Editar
                </a>
            </td>

            <td>
                <a href='excluir_prato.php?id=" . $linha["id"] . "' 
                   class='btn btn-outline-danger'>
                    Excluir
                </a>
            </td>

        </tr>";

    }
?>




</table>