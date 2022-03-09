<?php
$link = $_SERVER['PHP_SELF'];
$home = '/admin/home2.php';
$agenda = '/admin/agenda/form_agenda2.php';
?>

<nav class="indigo darken-4">
   <div class="nav-wrapper">
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
         <li class="<?= strpos($link, $home) !== false ? 'active' : '' ?> waves-effect" title="Home"><a href="<?= $root ?><?= $home ?>"><i class="material-icons left">home</i>Home</a></li>
         <li class="<?= strpos($link, $agenda) !== false ? 'active' : '' ?> waves-effect" title="Agenda"><a href="<?= $root ?><?= $agenda ?>"><i class="material-icons left">schedule</i>Agenda</a></li>
         <li class="waves-effect" title="Sair"><a href="<?= $assets ?>/sair.php"><i class="material-icons left">close</i>Sair</a></li>
      </ul>
   </div>
</nav>
