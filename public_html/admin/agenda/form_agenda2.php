<?php
session_start();

if (!$_SESSION['Login']) exit();

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
   <link rel="icon" href="<?= $assets ?>/images/logo.png">

   <title>Agenda - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once("$assets/components/header2.php");
   include_once("$assets/components/sidenav2.php")
   ?>

   <main>
      <div class="container">
         <div class="card-panel left-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">schedule</i>Inserir uma Consulta</h1>
            <label>Inserir uma nova Consulta na Agenda</label>
            <div class="divider"></div>

            <form action="insert_agenda.php" method="post">
               <div style="margin-top:15px" class="row mb-0">
                  <div class="input-field col s12 m6">
                     <label>Data</label>
                     <input placeholder="Data da Consulta" name="age_data" type="date" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <label>Horário</label>
                     <input placeholder="Horário da Consulta" name="age_horario" type="time" required>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="med_id" required>
                        <?php
                        include_once("$assets/conexao.php");
                        $sql = $pdo->prepare("SELECT med_id, med_nome FROM medicos");
                        $sql->execute();

                        foreach ($sql as $key) : extract($key) ?>
                           <option value="<?= $med_id ?>">Dr. <?= $med_nome ?></option>
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
                           <option value="<?= $pac_id ?>"><?= $pac_nome ?></option>
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
                           <option value="<?= $con_id ?>"><?= $con_nome ?></option>
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
                           <option value="<?= $for_id ?>"><?= $for_nome ?></option>
                        <?php endforeach ?>
                     </select>
                     <label>Formas de Pagamento</label>
                  </div>

                  <div class="col s12">
                     <input title="Inserir Consulta" class="btn indigo darken-4" type="submit" value="Inserir">
                  </div>
               </div>
            </form>

            <div class="divider" style="margin:25px 0 0"></div>

            <h2 class="flow-text" style="margin:25px 0 5px 0"><i class="material-icons left">filter_list</i>Filtrar Consulta</h2>
            <label>Filtrar Consultas cadastradas na Agenda</label>
            <div class="divider"></div>

            <form action="form_agenda.php" method="get">
               <div style="margin-top:15px" class="row mb-0">
                  <div class="input-field col s12 m6">
                     <select name="med_id">
                        <option value="-1">Selecione um Médico</option>
                        <?php
                        $sql = $pdo->prepare("SELECT med_id, med_nome FROM medicos");
                        $sql->execute();

                        $med_id_get = filter_input(INPUT_GET, 'med_id', FILTER_DEFAULT);

                        foreach ($sql as $key) : extract($key) ?>
                           <option value="<?= $med_id ?>" <?= $med_id_get === $med_id ? 'selected' : '' ?>>Dr. <?= $med_nome ?></option>
                        <?php endforeach ?>
                     </select>
                     <label>Médicos</label>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="pac_id">
                        <option value="-1">Selecione um Paciente</option>
                        <?php
                        $sql = $pdo->prepare("SELECT pac_id, pac_nome FROM pacientes");
                        $sql->execute();

                        $pac_id_get = filter_input(INPUT_GET, 'pac_id', FILTER_DEFAULT);

                        foreach ($sql as $key) : extract($key) ?>
                           <option value="<?= $pac_id ?>" <?= $pac_id_get === $pac_id ? 'selected' : '' ?>><?= $pac_nome ?></option>
                        <?php endforeach ?>
                     </select>
                     <label>Pacientes</label>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="con_id">
                        <option value="-1">Selecione um Convênio</option>
                        <?php
                        $sql = $pdo->prepare("SELECT con_id, con_nome FROM convenios WHERE con_status='1'");
                        $sql->execute();

                        $con_id_get = filter_input(INPUT_GET, 'con_id', FILTER_DEFAULT);

                        foreach ($sql as $key) : extract($key) ?>
                           <option value="<?= $con_id ?>" <?= $con_id_get === $con_id ? 'selected' : '' ?>><?= $con_nome ?></option>
                        <?php endforeach ?>
                     </select>
                     <label>Convênios</label>
                  </div>

                  <div class="input-field col s12 m6">
                     <select name="for_id">
                        <option value="-1">Selecione uma Forma de Pagamento</option>
                        <?php
                        $sql = $pdo->prepare("SELECT for_id, for_nome FROM formas_pagamento WHERE for_status='1'");
                        $sql->execute();

                        $for_id_get = filter_input(INPUT_GET, 'for_id', FILTER_DEFAULT);

                        foreach ($sql as $key) : extract($key) ?>
                           <option value="<?= $for_id ?>" <?= $for_id_get === $for_id ? 'selected' : '' ?>><?= $for_nome ?></option>
                        <?php endforeach ?>
                     </select>
                     <label>Formas de Pagamento</label>
                  </div>

                  <div class="input-field col s12 m6">
                     <label>Data início ou Data única</label>
                     <?php
                     $sch_dateI_get = filter_input(INPUT_GET, 'iData', FILTER_DEFAULT);

                     $dateI = !isset($sch_dateI_get) || $sch_dateI_get === '' ? '' : $sch_dateI_get;
                     $today = date('Y-m-d')
                     ?>

                     <input value="<?= $dateI ?>" placeholder="Ex: <?= $today ?>" name="iData" type="text" class="datepicker">
                  </div>

                  <div class="input-field col s12 m6">
                     <label>Data fim</label>
                     <?php
                     $sch_dateF_get = filter_input(INPUT_GET, 'fData', FILTER_DEFAULT);

                     $dateF = !isset($sch_dateF_get) || $sch_dateF_get === '' ? '' : $sch_dateF_get;
                     $tomorrow = date('Y-m-d', strtotime("+7 day", strtotime(date('Y-m-d'))))
                     ?>

                     <input value="<?= $dateF ?>" placeholder="Ex: <?= $tomorrow ?>" name="fData" type="text" class="datepicker">
                  </div>

                  <div class="col s12">
                     <input title="Filtrar Consultas" class="btn indigo darken-4" type="submit" value="Filtrar">
                     <a title="Limpar Filtro" href="form_agenda.php" class="btn indigo darken-4 waves-effect waves-light">Limpar</a>
                  </div>
               </div>
            </form>

            <div class="left-div indigo darken-4"></div>
         </div>

         <div class="card-panel left-div-margin">
            <h2 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">format_list_bulleted</i>Lista de Consultas <a title="Gerar PDF" target="_blank" href="gerarPDF.php"><i class="material-icons blue-text">archive</i></a></h2>
            <label>Lista de Consultas registradas na Agenda</label>
            <div class="divider"></div>

            <table class="centered highlight responsive-table">
               <thead>
                  <tr>
                     <th>Data</th>
                     <th>Horário</th>
                     <th>Médico</th>
                     <th>Paciente</th>
                     <th>Convênio</th>
                     <th>Forma Pagamento</th>
                     <th>Operações</th>
                  </tr>
               </thead>

               <tbody>
                  <?php include_once('select_agenda.php') ?>
               </tbody>
            </table>

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
