<?php
session_start();

if (!$_SESSION['Login']) exit();
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../assets/src/css/materialize.min.css">
   <link rel="stylesheet" href="../assets/src/css/main.css">
   <link rel="icon" href="../assets/images/logo.png">

   <title>Página Inicial - Sistema de Clínica</title>
</head>

<body class="grey lighten-3">
   <?php
   include_once('../assets/assets.php');
   include_once('../assets/components/header2.php');
   include_once('../assets/components/sidenav2.php')
   ?>

   <main>
      <div class="container">
         <div class="card-panel left-div-margin" style="margin-top:14px">
            <h1 class="flow-text" style="margin:0 0 5px"><i class="material-icons left">home</i>Usuário</h1>
            <label>Clínica UCL</label>
            <div class="divider"></div>

            <p style="margin-bottom:0"><a href="#"></a></p>
            <div class="left-div indigo darken-4"></div>
         </div>
      </div>
   </main>

   <script src="../assets/src/js/materialize.min.js"></script>
   <script>
      M.Sidenav.init(document.querySelectorAll('.sidenav'))
      M.Collapsible.init(document.querySelectorAll('.collapsible'))
   </script>
</body>

</html>
