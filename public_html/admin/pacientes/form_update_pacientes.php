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
   <link rel="stylesheet" href="src/form_update_pacientes.css">
   <link rel="stylesheet" href="src/main.css">

   <title>Editar Paciente - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once("$assets/components/header_update.php");
   include_once("$assets/components/sidenav_update.php")
   ?>

   <main>
      <div class="container">
         <div class="card-panel left-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">edit</i>Editar Paciente</h1>
            <label>Editar Paciente selecionado</label>
            <div class="divider"></div>

            <?php
            include_once("$assets/conexao.php");

            $pac_id = filter_input(INPUT_GET, 'pac_id', FILTER_DEFAULT);
            $sql = $pdo->prepare("SELECT * FROM pacientes WHERE pac_id=:pac_id");

            $sql->bindValue(':pac_id', $pac_id);
            $sql->execute();
            $data = $sql->fetchAll();

            extract($data[0]);
            ?>

            <form style="margin-top:15px" action="update_pacientes.php" method="post">
               <div class="row mb-0">
                  <input value="<?= $pac_id ?>" type="hidden" name="pac_id">

                  <div class="input-field col s12">
                     <label>Nome do Paciente</label>
                     <input value="<?= $pac_nome ?>" placeholder="Nome Completo do Paciente" type="text" name="pac_nome" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com nome do Paciente.')" oninput="setCustomValidity('')" required>
                  </div>
                  <div class="input-field col s6">
                     <label>Telefone do Paciente</label>
                     <input value="<?= $pac_telefone ?>" placeholder="Telefone do Paciente" type="text" name="pac_telefone" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o Telefone do Paciente.')" oninput="setCustomValidity('')" required>
                  </div><div class="input-field col s6">
                     <label>CPF do Paciente</label>
                     <input value="<?= $pac_CPF ?>" placeholder="CPF do Paciente" type="text" name="pac_CPF" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o CPF do Paciente.')" oninput="setCustomValidity('')" required>
                  </div>

                  <div class="col s12">
                     <input title="Editar Paciente" class="btn indigo darken-4 right" type="submit" value="Editar">
                     <a title="Cancelar Edição" href="form_pacientes.php" class="btn indigo darken-4 right mr-2 waves-effect waves-light">Cancelar</a>
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
