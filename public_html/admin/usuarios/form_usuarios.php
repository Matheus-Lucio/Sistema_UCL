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
   <link rel="stylesheet" href="src/main.css">

   <title>Usuários - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once("$assets/components/header.php");
   include_once("$assets/components/sidenav.php")
   ?>

   <main>
      <div class="container">
         <div class="card-panel bottom-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">person</i>Inserir Usuário</h1>
            <label>Inserir um novo Usuário</label>
            <div class="divider"></div>

            <form style="margin-top:15px" action="insert_usuarios.php" method="post">
               <div class="row mb-0">
                  <div class="input-field col s12 m6">
                     <label>Nome do Usuário</label>
                     <input placeholder="Nome Completo do Usuário" type="text" name="usu_nome" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com nome do Usuário.')" oninput="setCustomValidity('')" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <label>E-mail</label>
                     <input placeholder="E-mail do Usuário" type="email" name="usu_email" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com e-mail do Usuário.')" oninput="setCustomValidity('')" required>
                  </div>
                  
                  <div class="input-field col s12 m6">
                     <label>Nível de acesso</label>
                     <input placeholder="Nível de acesso" type="text" name="usu_tipo" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o Nível de acesso do Usuário.')" oninput="setCustomValidity('')" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <label>Senha</label>
                     <input placeholder="Senha do Usuário" type="password" name="usu_senha" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com a senha do Usuário.')" oninput="setCustomValidity('')" required>
                  </div>

                  <div class="col s12">
                     <input title="Inserir Usuário" class="btn indigo darken-4" type="submit" value="Inserir">
                  </div>
               </div>
            </form>

            <div class="bottom-div indigo darken-4"></div>
         </div>

         <div class="card-panel left-div-margin">
            <h2 class="flow-text" style="margin: 0 0 5px"><i class="material-icons left">format_list_bulleted</i>Lista de Usuários <a title="Gerar PDF" target="_blank" href="gerarPDF.php"><i class="material-icons blue-text">archive</i></a></h2>
            <label>Lista de Usuários registrados</label>
            <div class="divider"></div>

            <table class="centered highlight responsive-table">
               <thead>
                  <tr>
                     <th>Nome do Usuário</th>
                     <th>E-mail do Usuário</th>
                     <th>Nível de acesso do Usuário</th>
                     <th>Operações</th>
                  </tr>
               </thead>

               <tbody>
                  <?php include_once('select_usuarios.php') ?>
               </tbody>
            </table>

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
