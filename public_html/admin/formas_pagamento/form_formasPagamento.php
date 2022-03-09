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

   <title>Formas de Pagamento - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once("$assets/components/header.php");
   include_once("$assets/components/sidenav.php")
   ?>

   <main>
      <div class="container">
         <div class="card-panel bottom-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">payment</i>Inserir Forma de Pagamento</h1>
            <label>Inserir uma nova Forma de Pagamento</label>
            <div class="divider"></div>

            <form style="margin-top:15px" action="insert_formasPagamento.php" method="post">
               <div class="row mb-0">
                  <div class="input-field col s12">
                     <label>Nome</label>
                     <input placeholder="Nome da Forma de Pagamento" type="text" name="for_nome" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o nome do Pagamento.')" oninput="setCustomValidity('')" required>
                  </div>

                  <div class="col s12">
                     <input title="Inserir Forma de Pagamento" class="btn indigo darken-4" type="submit" value="Inserir">
                  </div>
               </div>
            </form>

            <div class="bottom-div indigo darken-4"></div>
         </div>

         <div class="card-panel left-div-margin">
            <h2 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">format_list_bulleted</i>Lista de Formas de Pagamento <a title="Gerar PDF" target="_blank" href="gerarPDF.php"><i class="material-icons blue-text">archive</i></a></h2>
            <label>Lista de Formas de Pagamento Registrados</label>
            <div class="divider"></div>

            <table class="centered highlight responsive-table">
               <thead>
                  <tr>
                     <th>Nome da Forma de Pagamento</th>
                     <th>Status</th>
                     <th>Operações</th>
                  </tr>
               </thead>

               <tbody>
                  <?php include_once('select_formasPagamento.php') ?>
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
