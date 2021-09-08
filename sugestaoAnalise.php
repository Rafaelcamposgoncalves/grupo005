<?php

require_once "connect.php";

$id = $_POST['analise'];

$consulta = $con->query("SELECT analise FROM tb_sugestoes WHERE id = $id");

$row = $consulta->fetch(PDO::FETCH_OBJ);



$stmt = $con->prepare("UPDATE tb_sugestoes SET analise = ? WHERE id = $id");

$row->analise == 0 ? $a = 1 : $a = 0;

$stmt->bindParam(1,$a);


$stmt->execute();


header('Location: professor.php');