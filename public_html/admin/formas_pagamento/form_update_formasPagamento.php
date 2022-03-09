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
   <link rel="stylesheet" href="src/form_update_formasPagamento.css">
   <link rel="stylesheet" href="src/main.css">

   <title>Editar Forma de Pagamento - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once("$assets/components/header_update.php");
   include_once("$assets/components/sidenav_update.php")
   ?>

   <main>
      <div class="container">
         <div class="card-panel left-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">edit</i>Editar Forma de Pagamento</h1>
            <label>Editar Forma de Pagamento selecionada</label>
            <div class="divider"></div>

            <?php
            include_once("$assets/conexao.php");

            $for_id = filter_input(INPUT_GET, 'for_id', FILTER_DEFAULT);
            $sql = $pdo->prepare("SELECT * FROM formas_pagamento WHERE for_id=:for_id");

            $sql->bindValue(':for_id', $for_id);
            $sql->execute();
            $data = $sql->fetchAll();

            extract($data[0]);
            ?>

            <form style="margin-top:15px" action="update_formasPagamento.php" method="post">
               <div class="row mb-0">
                  <input value="<?= $for_id ?>" type="hidden" name="for_id">

                  <div class="input-field col s12 m6">
                     <label>Nome</label>
                     <input value="<?= $for_nome ?>" placeholder="Nome da Forma de Pagamento" type="text" name="for_nome" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o nome do Pagamento.')" oninput="setCustomValidity('')" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="for_status" required>
                        <option value="0" <?= $for_status === '0' ? 'selected' : '' ?>>0</option>
                        <option value="1" <?= $for_status === '1' ? 'selected' : '' ?>>1</option>
                     </select>
                     <label>Status</label>
                  </div>

                  <div class="col s12">
                     <input title="Editar Forma de Pagamento" class="btn indigo darken-4 right" type="submit" value="Editar">
                     <a title="Cancelar Edição" href="form_formasPagamento.php" class="btn indigo darken-4 right mr-2 waves-effect waves-light">Cancelar</a>
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
      M.FormSelect.init(document.querySelectorAll('select'))
   </script>
</body>

</html>
