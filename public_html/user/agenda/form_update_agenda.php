<?php
session_start();

if (!isset($_SESSION['Login'])) ("Location: ../..");

include_once('../../assets/assets.php')
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?= $assets ?>/src/css/materialize.min.css">
   <link rel="stylesheet" href="<?= $assets ?>/src/css/main.css">
   <link rel="stylesheet" href="src/main.css">
   <link rel="stylesheet" href="src/form_update_agenda.css">
   <link rel="icon" href="<?= $assets ?>/images/logo.png">

   <title>Editar Consulta - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once("$assets/components/header_update.php");
   include_once("$assets/components/sidenav_update.php")
   ?>

   <main>
      <div class="container">
         <div class="card-panel left-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">edit</i>Editar Consulta</h1>
            <label>Editar Consulta selecionada</label>
            <div class="divider"></div>

            <?php
            include_once("$assets/conexao.php");

            $age_id = filter_input(INPUT_GET, 'age_id', FILTER_DEFAULT);
            $sql = $pdo->prepare(
               "SELECT * FROM agenda a
                  INNER JOIN medicos m on m.med_id = a.med_id
                  INNER JOIN pacientes p on p.pac_id = a.pac_id
                  INNER JOIN convenios c on c.con_id = a.con_id
                  INNER JOIN formas_pagamento f on f.for_id = a.for_id
                  WHERE a.age_id=:age_id"
            );

            $sql->bindValue(":age_id", $age_id);
            $sql->execute();
            $data = $sql->fetchAll();

            extract($data[0]);
            $m_id = $data[0]['med_id'];
            $p_id = $data[0]['pac_id'];
            $c_id = $data[0]['con_id'];
            $f_id = $data[0]['for_id'];
            ?>

            <form action="update_agenda.php" method="post">
               <div class="row mb-0" style="padding-top:5px">
                  <input value="<?= $age_id ?>" name="age_id" type="hidden">

                  <div class="input-field col s12 m6">
                     <label>Data</label>
                     <input value="<?= $age_data ?>" name="age_data" type="text" class="datepicker" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <label>Horário</label>
                     <input value="<?= $age_horario ?>" name="age_horario" type="text" class="timepicker" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="med_id" required>
                        <?php
                        $sql = $pdo->prepare("SELECT med_id, med_nome FROM medicos");
                        $sql->execute();

                        foreach ($sql as $key) : extract($key) ?>
                           <option value="<?= $med_id ?>" <?= $med_id === $m_id ? 'selected' : '' ?>>Dr. <?= $med_nome ?></option>
                        <?php endforeach ?>
                     </select>
                     <label>Médicos</label>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="pac_id" required>
                        <?php
                        $sql = $pdo->prepare("SELECT pac_id, pac_nome FROM pacientes");
                        $sql->execute();

                        foreach ($sql as $key) : extract($key) ?>
                           <option value="<?= $pac_id ?>" <?= $pac_id === $p_id ? 'selected' : '' ?>><?= $pac_nome ?></option>
                        <?php endforeach ?>
                     </select>
                     <label>Pacientes</label>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="con_id" required>
                        <?php
                        $sql = $pdo->prepare("SELECT con_id, con_nome FROM convenios WHERE con_status='1'");
                        $sql->execute();

                        foreach ($sql as $key) : extract($key) ?>
                           <option value="<?= $con_id ?>" <?= $con_id === $c_id ? 'selected' : '' ?>><?= $con_nome ?></option>
                        <?php endforeach ?>
                     </select>
                     <label>Convênios</label>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="for_id" required>
                        <?php
                        $sql = $pdo->prepare("SELECT for_id, for_nome FROM formas_pagamento WHERE for_status='1'");
                        $sql->execute();

                        foreach ($sql as $key) : extract($key) ?>
                           <option value="<?= $for_id ?>" <?= $for_id === $f_id ? 'selected' : '' ?>><?= $for_nome ?></option>
                        <?php endforeach ?>
                     </select>
                     <label>Formas de Pagamento</label>
                  </div>

                  <div class="col s12">
                     <input title="Editar Consulta" class="btn indigo darken-4 right" type="submit" value="Editar">
                     <a title="Cancelar Edição" class="btn indigo darken-4 right mr-2 waves-effect waves-light" href="form_agenda.php">Cancelar</a>
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
      M.Datepicker.init(document.querySelectorAll('.datepicker'), {
         format: 'yyyy-mm-dd'
      })
      M.Timepicker.init(document.querySelectorAll('.timepicker'))
      M.FormSelect.init(document.querySelectorAll('select'))
   </script>
</body>

</html>
