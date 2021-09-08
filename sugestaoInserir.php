<?php

require_once "connect.php";



if($_GET['nome'] &&  $_GET['email'] && $_GET['sugestao']){

    $data = date('Y-m-d');


    $stmt = $con->prepare("INSERT INTO tb_sugestoes(data, nome, telefone, email, sugestao) VALUES(?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $data);
    $stmt->bindParam(2, $_GET['nome']);
    $stmt->bindParam(3, $_GET['telefone']);
    $stmt->bindParam(4, $_GET['email']);
    $stmt->bindParam(5, $_GET['sugestao']);
    $stmt->execute();
   

}


header('Location: main.php?sres=true');