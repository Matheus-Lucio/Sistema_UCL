<ul class="sidenav" id="mobile-demo">
   <li class="<?= strpos($link, $home) !== false ? 'active' : '' ?>"><a class="waves-effect" href="<?= $root ?><?= $home ?>"><i class="material-icons left">home</i>Home</a></li>
   <li class="<?= strpos($link, $agenda) !== false ? 'active' : '' ?>"><a class="waves-effect" href="<?= $root ?>/admin/agenda/form_agenda2.php"><i class="material-icons left">schedule</i>Agenda</a></li>
   <li><a class="waves-effect" href="<?= $root ?>/admin/sair.php"><i class="material-icons left">close</i>Sair</a></li>
</ul>
