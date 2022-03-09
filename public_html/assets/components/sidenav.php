<ul class="sidenav" id="mobile-demo">
   <li class="<?= strpos($link, $home) !== false ? 'active' : '' ?>"><a class="waves-effect" href="<?= $root ?><?= $home ?>"><i class="material-icons left">home</i>Home</a></li>
   <li class="<?= strpos($link, $agenda) !== false ? 'active' : '' ?>"><a class="waves-effect" href="<?= $root ?>/admin/agenda/form_agenda.php"><i class="material-icons left">schedule</i>Agenda</a></li>
   <li class="<?= strpos($link, $convenios) !== false ? 'active' : '' ?>"><a class="waves-effect" href="<?= $root ?>/admin/convenios/form_convenio.php"><i class="material-icons left">domain</i>Convênio</a></li>
   <li class="<?= strpos($link, $formas_de_pagamento) !== false ? 'active' : '' ?>"><a class="waves-effect" href="<?= $root ?>/admin/formas_pagamento/form_formasPagamento.php"><i class="material-icons left">payment</i>Formas de Pagamento</a></li>
   <li class="<?= strpos($link, $medicos) !== false ? 'active' : '' ?>"><a class="waves-effect" href="<?= $root ?>/admin/medicos/form_medicos.php"><i class="material-icons left">local_hospital</i>Médicos</a></li>
   <li class="<?= strpos($link, $pacientes) !== false ? 'active' : '' ?>"><a class="waves-effect" href="<?= $root ?>/admin/pacientes/form_pacientes.php"><i class="material-icons left">local_hotel</i>Pacientes</a></li>
   <li class="<?= strpos($link, $usuarios) !== false ? 'active' : '' ?>"><a class="waves-effect" href="<?= $root ?>/admin/usuarios/form_usuarios.php"><i class="material-icons left">person</i>Usuários</a></li>
   <li><a class="waves-effect" href="<?= $root ?>/admin/sair.php"><i class="material-icons left">close</i>Sair</a></li>
</ul>
