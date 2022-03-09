<?php
session_start();

if ($_SESSION['Login']['tipo'] != 'Adm') exit();

include_once('../../assets/assets.php')
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="<?= $assets ?>/images/logo.png">
   <link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
   <link rel="stylesheet" href="<?= $assets ?>/src/css/main.css">
   <link rel="stylesheet" href="src/form_update_usuarios.css">
   <link rel="stylesheet" href="src/main.css">

   <title>Editar Usuário - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once("$assets/components/header_update.php");
   include_once("$assets/components/sidenav_update.php")
   ?>

   <main>
      <div class="container">
         <div class="card-panel left-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">edit</i>Editar Usuário</h1>
            <label>Editar Usuário selecionado</label>
            <div class="divider"></div>

            <?php
            include_once("$assets/conexao.php");

            $usu_id = filter_input(INPUT_GET, 'usu_id', FILTER_DEFAULT);
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE usu_id=:usu_id");

            $sql->bindValue(':usu_id', $usu_id);
            $sql->execute();
            $data = $sql->fetchAll();

            extract($data[0]);
            ?>

            <form style="margin-top:15px" action="update_usuarios.php" method="post">
               <div class="row mb-0">
                  <input value="<?= $usu_id ?>" type="hidden" name="usu_id">

                  <div class="input-field col s12 m6">
                     <label>Nome do Usuário</label>
                     <input value="<?= $usu_nome ?>" placeholder="Nome Completo do Usuário" type="text" name="usu_nome" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o nome do Usuário.')" oninput="setCustomValidity('')" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <label>E-mail</label>
                     <input value="<?= $usu_email ?>" placeholder="E-mail do Usuário" type="email" name="usu_email" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o e-mail do Usuário.')" oninput="setCustomValidity('')" required>
                  </div>
                  
                  <div class="input-field col s12 m6">
                     <label>Nível de acesso</label>
                     <input placeholder="Nível de acesso do Usuário" type="text" name="usu_tipo" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o Nível de acesso do Usuário.')" oninput="setCustomValidity('')" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <label>Senha</label>
                     <input placeholder="Senha do Usuário" type="password" name="usu_senha" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com a senha do Usuário.')" oninput="setCustomValidity('')">
                  </div>

                  <div class="col s12">
                     <input title="Editar Usuário" class="btn indigo darken-4 right" type="submit" value="Editar">
                     <a title="Cancelar Edição" href="form_usuarios.php" class="btn indigo darken-4 right mr-2 waves-effect waves-light">Cancelar</a>
                  </div>
               </div>
            </form>

            <div class="left-div indigo darken-4"></div>
         </div>
      </div>
   </main>


   <script src="<?= $assets ?>/src/js/materialize.min.js"></script>
   <script>
      M.Sidenav.init(document.querySelectorAll('.sidenav'))
   </script>
</body>

</html>
