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
   <link rel="stylesheet" href="src/form_update_medicos.css">
   <link rel="stylesheet" href="src/main.css">

   <title>Editar Médico - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once("$assets/components/header_update.php");
   include_once("$assets/components/sidenav_update.php")
   ?>

   <main>
      <div class="container">
         <div class="card-panel left-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">edit</i>Editar Médico</h1>
            <label>Editar Médico selecionado</label>
            <div class="divider"></div>

            <?php
            include_once("$assets/conexao.php");

            $med_id = filter_input(INPUT_GET, 'med_id', FILTER_DEFAULT);
            $sql = $pdo->prepare("SELECT * FROM medicos WHERE med_id=:med_id");

            $sql->bindValue(':med_id', $med_id);
            $sql->execute();
            $data = $sql->fetchAll();

            extract($data[0]);
            ?>

            <form style="margin-top:15px" action="update_medicos.php" method="post">
               <div class="row mb-0">
                  <input value="<?= $med_id ?>" type="hidden" name="med_id">

                  <div class="input-field col s6">
                     <label>Nome do Médico</label>
                     <input value="<?= $med_nome ?>" placeholder="Nome Completo do Médico" type="text" name="med_nome" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o nome do Médico.')" oninput="setCustomValidity('')" required>
                  </div>
                  <div class="input-field col s6">
                     <label>CRM do Médico</label>
                     <input value="<?= $med_CRM ?>" placeholder="CRM do Médico" type="text" name="med_CRM" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o CRM do Médico.')" oninput="setCustomValidity('')" required>
                  </div>
                  <div class="input-field col s6">
                     <label>Especialidade do Médico</label>
                     <input value="<?= $med_especialidade ?>" placeholder="Especialidade do Médico" type="text" name="med_especialidade" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com a Especialidade do Médico.')" oninput="setCustomValidity('')" required>
                  </div>
                  <div class="input-field col s6">
                     <label>Especialidade do Médico</label>
                     <input value="<?= $med_especialidade2 ?>" placeholder="Especialidade do Médico" type="text" name="med_especialidade2" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com outra Especialidade do Médico.')" oninput="setCustomValidity('')"
                  </div>

                  <div class="col s12">
                     <input title="Editar Médico" class="btn indigo darken-4 right" type="submit" value="Editar">
                     <a title="Cancelar Edição" href="form_medicos.php" class="btn indigo darken-4 right mr-2 waves-effect waves-light">Cancelar</a>
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
