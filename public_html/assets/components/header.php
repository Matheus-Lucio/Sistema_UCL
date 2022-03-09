<?php
$link = $_SERVER['PHP_SELF'];
$home = '/admin/home.php';
$agenda = '/admin/agenda/form_agenda.php';
$convenios = '/admin/convenios/form_convenio.php';
$formas_de_pagamento = '/admin/formas_pagamento/form_formasPagamento.php';
$medicos = '/admin/medicos/form_medicos.php';
$pacientes = '/admin/pacientes/form_pacientes.php';
$usuarios = '/admin/usuarios/form_usuarios.php'
?>

<nav class="indigo darken-4">
   <div class="nav-wrapper">
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
         <li class="<?= strpos($link, $home) !== false ? 'active' : '' ?> waves-effect" title="Home"><a href="<?= $root ?><?= $home ?>"><i class="material-icons left">home</i>Home</a></li>
         <li class="<?= strpos($link, $agenda) !== false ? 'active' : '' ?> waves-effect" title="Agenda"><a href="<?= $root ?><?= $agenda ?>"><i class="material-icons left">schedule</i>Agenda</a></li>
         <li class="<?= strpos($link, $convenios) !== false ? 'active' : '' ?> waves-effect" title="Convênios"><a href="<?= $root ?><?= $convenios ?>"><i class="material-icons left">domain</i>Convênios</a></li>
         <li class="<?= strpos($link, $formas_de_pagamento) !== false ? 'active' : '' ?> waves-effect" title="Formas de Pagamento"><a href="<?= $root ?><?= $formas_de_pagamento ?>"><i class="material-icons left">payment</i>Formas de Pagamento</a></li>
         <li class="<?= strpos($link, $medicos) !== false ? 'active' : '' ?> waves-effect" title="Médicos"><a href="<?= $root ?><?= $medicos ?>"><i class="material-icons left">local_hospital</i>Médicos</a></li>
         <li class="<?= strpos($link, $pacientes) !== false ? 'active' : '' ?> waves-effect" title="Pacientes"><a href="<?= $root ?><?= $pacientes ?>"><i class="material-icons left">person_outline</i>Pacientes</a></li>
         <li class="<?= strpos($link, $usuarios) !== false ? 'active' : '' ?> waves-effect" title="Usuários"><a href="<?= $root ?><?= $usuarios ?>"><i class="material-icons left">person</i>Usuários</a></li>
         <li class="waves-effect" title="Sair"><a href="<?= $assets ?>/sair.php"><i class="material-icons left">close</i>Sair</a></li>
      </ul>
   </div>
</nav>
