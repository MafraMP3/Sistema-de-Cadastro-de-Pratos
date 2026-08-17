<hr>

<h4>  Usuarios cadastrados  </h4>

<table border="1" cellpadding="10">
    
 <tr>
    <th>ID</th>
    <th> Usuario</th>
    <th>Senha</th>

 </tr>

 <?php
    
    $sqlUsuarios = "SELECT * FROM usuario";

    
    $resultadoUsuarios = $conn -> query($sqlUsuarios);


    while ($linha = $resultadoUsuarios->fetch_assoc()){
        echo"<tr>

            <td>" . $linha["id"] . "</td>
            <td>" . $linha["usuario"] . "</td>
            <td>" . $linha["senha"] . "</td>
            <td> <a href='editar.php?id=". $linha["id"] ."'>Editar</td>
            <td> <a href='excluir.php?id=". $linha["id"] ."'>Excluir</td>            


        </tr>";

    }
?>


</table>