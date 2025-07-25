<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php include ('navbar.php'); ?>
    <div class="container mt-4">
      <?php include('mensagem.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Lista de Usuários
                <a href="usuario-create.php" class="btn btn-primary float-end">Adicionar Usuários</a></h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data Nascimento</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = 'SELECT * FROM USUARIOS';
                  $usuarios = mysqli_query($conexao,$sql);
                  if (mysqli_num_rows($usuarios)>0) {
                    foreach($usuarios as $usuario) {
                  ?>
                  <tr>
                    <td><?=$usuario['id']?></td>
                    <td><?=$usuario['nome']?></td>
                    <td><?=$usuario['email']?></td>
                    <td><?=date('d/m/Y', strtotime ($usuario['data_nascimento']))?></td>
                    <td>
                      <a href="usuario-view.php?id=<=?$usuario['id']?>" class="btn btn-secondary btn-sn">Visualizar</a>
                      <a href="" class="btn btn-success btn-sn">Editar</a>
                      <form action="" method="post" class="d-inline">
                        <button type="submit" name="delete_usuario" value="1" class="btn btn-danger btn-sn"> Excluir </button>
                      </form>
                    </td>
                  </tr>
                  <?php
                  }
                } else {
                   echo '<h5>Nenhum usuário encontrado</h5>';

                }
                ?>  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    
  </body>
</html>