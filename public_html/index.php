<?php
try {
   session_start();

   if (isset($_SESSION['Login'])) header('Location: admin/home.php');

   include_once('assets/conexao.php');
   $sql = $pdo->prepare('SELECT * FROM usuarios');
   $sql->execute();

   $count = $sql->rowCount();
} catch (Exception $ex) {
   $error = $ex->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="assets/src/css/materialize.min.css">
   <link rel="stylesheet" href="assets/src/css/main.css">
   <link rel="stylesheet" href="assets/src/css/index.css">
   <link rel="icon" href="assets/images/logo.png">

   <title><?= isset($count) && $count > 0 ? 'Login' : 'Registro' ?> - UCL</title>
</head>

<body class="grey lighten-3">
   <nav class="indigo darken-4">
      <div class="nav-wrapper">
         <ul class="hide-on-med-and-down">
            <li class="active" title="Sair"><a href="/"><i class="material-icons left">home</i>Início</a></li>
         </ul>
         <a href="./" class="brand-logo center">UCL</a>
      </div>
   </nav>

   <main>
      <div class="container">
         <div class="card-panel left-div-margin" style="margin-top:14px">
            <?php if (isset($count) && $count) : ?>
               <h1 class="flow-text" style="margin:0 0 5px">Página de Login</h1>
               <label>Logar no Sistema de Clínica</label>
               <div class="divider"></div>

               <form style="margin-top:15px" action="assets/entrar.php" method="post">
                  <div class="row mb-0">
                     <div class="input-field col s12">
                        <label>E-mail</label>
                        <input placeholder="E-mail do Usuário" class="validate" type="email" name="usu_email" oninvalid="this.setCustomValidity('Preencha esse campo com seu e-mail.')" oninput="setCustomValidity('')" required>
                     </div>

                     <div class="input-field col s12">
                        <label>Senha</label>
                        <input placeholder="Senha do Usuário" class="validate" type="password" name="usu_senha" oninvalid="this.setCustomValidity('Preencha esse campo com sua senha.')" oninput="setCustomValidity('')" required>
                     </div>

                     <div class="col s12">
                        <input class="btn indigo darken-4" title="Logar" type="submit" value="Logar">
                     </div>
                  </div>
               </form>
            <?php endif ?>

            <div class="left-div indigo darken-4"></div>
         </div>
      </div>
   </main>

   <script src="assets/src/js/materialize.min.js"></script>

   <?php if (isset($error)) : ?>
      <script>
         M.toast({
            html: 'Um erro ocorreu! <?= $error ?>',
            classes: 'red accent-4'
         })
      </script>
   <?php endif ?>
</body>

</html>
