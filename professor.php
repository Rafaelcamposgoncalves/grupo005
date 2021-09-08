<?php

session_start();

if($_SESSION["name"]){

require_once "connect.php";

$rs = $con->query("select * from tb_sugestoes");

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="style.css">

    <title>Área do professor</title>
  </head>
  <body>
    <div class="container-fluid main pb-5">
        <nav class="navbar navbar-expand-lg navbar-light">

            <div class="container-fluid">
            <a class="navbar-brand text-warning" href="#"><i class="fas fa-lightbulb"></i> Sugestões</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                </ul>
                  <small class="text-warning"><i class="fas fa-user"></i> <?=$_SESSION["name"]?></small>&nbsp;&nbsp;
                  <a href="logout.php" class="btn btn-outline-warning" type="button"><i class="fas fa-sign-out-alt"></i> Sair </a>

                </div>
            </div>
        </nav>

        <div class="container text-center">
            <div class="apresentacao">
                <h1 class="py-5"></h1>
            </div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Sugestão</th>
                  <th scope="col" colspan="2"></th>
                  
                </tr>
              </thead>
              <tbody>

				
			 	<?php 
					while($row = $rs->fetch(PDO::FETCH_OBJ)){ 
					$data = implode("/",array_reverse(explode("-",$row->data)));
				?>
					<tr>
					<td id="data<?=$row->id?>"><?=$data?></td>
					<td id="nome<?=$row->id?>"><?=$row->nome?></td>
					<td><?=$row->telefone?></td>
					<td><?=$row->email?></td>
					<td class="sugestao" id="sugestao<?=$row->id?>"><?=$row->sugestao?></td>
					<td><button type="button" class="btn btn-dark btn-sm btnaction" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" data-id="<?=$row->id?>" data-function="analisar"><?= $row->analise == 0 ? '<i class="fas fa-search"></i> Analisar' : '<i class="fas fa-clipboard-check"></i> Em analise' ;?></button></td>
					<td><button type="button" class="btn btn-outline-danger btn-sm btnexcluir" data-bs-toggle="modal" data-bs-target="#modalExcluir" data-id="<?=$row->id?>" data-function="excluir"><i class="fas fa-trash"></i></button></td>
					</tr>
				<?php }?>
              </tbody>
            </table>
        </div>
    </div>
 
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-warning border-0">
            <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-lightbulb"></i> Sugestao</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5 pt-5" id="analise-body">
            Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            
          </div>
          <div class="modal-footer border-0 px-5 pb-5">
		  	<form action="sugestaoAnalise.php" method="POST">
            	<button type="submit" class="btn btn-dark" id="btn-analise" name="analise" value="">Analisar</button>
			</form>
          </div>
      
        </div>
      </div>
    </div>
 
    
    <div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger text-light border-0">
            <h5 class="modal-title" id="modalExcluirLabel"><i class="far fa-trash"></i> Excluir</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5 pt-5" id="excluir-body">         
          </div>
          <div class="modal-footer border-0 px-5 pb-5">
				<form action="sugestaoExcluir.php" method="POST">
        			<button type="submit" class="btn btn-dark" id="btn-excluir" name="analise" value=""><i class="fas fa-trash"></i> Excluir</button>
				</form>
          </div>
      
        </div>
      </div>
    </div>
    

    
    <div class='bg-dark py-3'>
        <div class="container text-center">
            <small class="text-secondary" id="sugestao">Desenvolvido por: Grupo005 - Univesp</small>
            
        </div>
    </div>



    <script src="bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/app.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php
}else{
  header('Location: index.php');
}
?>