<?php
try {
   include_once('conexao.php');

   $usu_email = filter_input(INPUT_POST, 'usu_email', FILTER_DEFAULT);
   $usu_senha = filter_input(INPUT_POST, 'usu_senha', FILTER_DEFAULT);

   $sql = $pdo->prepare("SELECT * FROM usuarios WHERE usu_email=:usu_email AND usu_senha=:usu_senha");
   
   $sql->bindValue(":usu_email", $usu_email);
   $sql->bindValue(":usu_senha", MD5($usu_senha));
   
   $sql->execute();

   $data = $sql->fetchAll();
   
   if ($sql->rowCount()) {
      session_start();
      $_SESSION["Login"]["email"] = $usu_email;
      $_SESSION["Login"]["tipo"] = $data[0]['usu_tipo'];
      $_SESSION["Login"]["nome"] = $data[0]['usu_nome'];
      if ($_SESSION['Login']['tipo'] == 'Adm') { 
          header('Location: ../admin/home.php');
      } else {
          header('Location: ../admin/home2.php');
      }
   } else {
      header('Location: ../');
      echo 'email ou senha inválido ' . $e->getMessage();
   }
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
