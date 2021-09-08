<?php

require_once "connect.php";

$user = $_POST['user'];
$password = $_POST['password'];

$consulta = $con->query("SELECT id, name FROM tb_professor WHERE user = '$user' and password = '$password'");

$login = $consulta->fetch(PDO::FETCH_OBJ);


if ($login->id){
    session_start();
    $_SESSION["name"]=$login->name;
    header('Location: professor.php');
}else{
    header('Location: index.php');
}