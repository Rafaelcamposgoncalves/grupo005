<?php

require_once "connect.php";

$stmt = $con->prepare("DELETE FROM tb_sugestoes WHERE id = ?");
$stmt->bindParam(1, $_POST['analise']);
$stmt->execute();


header('Location: professor.php');