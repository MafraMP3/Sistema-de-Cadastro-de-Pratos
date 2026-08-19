<?php

include "../infra/db/connect.php";

$id = $_GET["id"];

$sql = "DELETE FROM pratos WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("Location: ../public/home.php");

?>