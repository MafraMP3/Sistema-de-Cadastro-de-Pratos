

<h4>  Usuarios cadastrados  </h4>

<table  class="table table-striped table-hover m-0">
    
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


        </tr>";

    }
?>




</table>