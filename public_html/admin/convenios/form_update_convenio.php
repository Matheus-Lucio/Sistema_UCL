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
   <link rel="stylesheet" href="src/form_update_convenio.css">
   <link rel="stylesheet" href="src/main.css">

   <title>Editar Convênio - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once("$assets/components/header_update.php");
   include_once("$assets/components/sidenav_update.php")
   ?>

   <main>
      <div class="container">
         <div class="card-panel left-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">edit</i>Editar Convênio</h1>
            <label>Editar Convênio selecionado</label>
            <div class="divider"></div>

            <?php
            include_once("$assets/conexao.php");

            $con_id = filter_input(INPUT_GET, 'con_id', FILTER_DEFAULT);
            $sql = $pdo->prepare("SELECT * FROM convenios WHERE con_id=:con_id");

            $sql->bindValue(':con_id', $con_id);
            $sql->execute();
            $data = $sql->fetchAll();

            extract($data[0]);
            ?>

            <form style="margin-top:15px" action="update_convenio.php" method="post">
               <div class="row mb-0">
                  <input value="<?= $con_id ?>" type="hidden" name="con_id">

                  <div class="input-field col s12 m6">
                     <label>Nome</label>
                     <input value="<?= $con_nome ?>" placeholder="Nome do Convênio" type="text" name="con_nome" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com nome do Convênio.')" oninput="setCustomValidity('')" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="con_status" required>
                        <option value="0" <?= $con_status === '0' ? 'selected' : '' ?>>0</option>
                        <option value="1" <?= $con_status === '1' ? 'selected' : '' ?>>1</option>
                     </select>
                     <label>Status</label>
                  </div>
                  <div class="input-field col s6">
                     <label>Registro ANS</label>
                     <input placeholder="Numero do Registro" type="number" name="con_ANS" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o Registro ANS do Convênio.')" oninput="setCustomValidity('')" required>
                  </div>
                  <div class="input-field col s6">
                     <label>Tempo de Faturamento</label>
                     <input placeholder="Tempo de Faturamento (dias)" type="number" name="con_tempo_fatura" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com o tempo de faturamento do Convênio.')" oninput="setCustomValidity('')" required>
                  </div>
                  <div class="input-field col s6">
                     <label>Particular</label>
                     <input placeholder="Sim ou Não" type="text" name="con_particular" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com Sim ou Não.')" oninput="setCustomValidity('')" required>
                  </div>
                  <div class="input-field col s6">
                     <label>Principal</label>
                     <input placeholder="Sim ou Não" type="text" name="con_principal" class="validate" oninvalid="this.setCustomValidity('Preencha esse campo com Sim ou Não.')" oninput="setCustomValidity('')" required>

                  <div class="col s12">
                     <input title="Editar Convênio" class="btn indigo darken-4 right" type="submit" value="Editar">
                     <a title="Cancelar Edição" href="form_convenio.php" class="btn indigo darken-4 right mr-2 waves-effect waves-light">Cancelar</a>
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
