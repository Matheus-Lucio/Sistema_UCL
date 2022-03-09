<?php
try {
   include_once('conexao.php');

   $usu_senha = filter_input(INPUT_POST, 'usu_senha', FILTER_DEFAULT);
   $usu_senha_nova = filter_input(INPUT_POST, 'usu_senha_nova', FILTER_DEFAULT);

   if ($usu_senha === $usu_senha_nova) {
      $usu_nome = filter_input(INPUT_POST, 'usu_nome', FILTER_DEFAULT);
      $usu_email = filter_input(INPUT_POST, 'usu_email', FILTER_DEFAULT);

      $sql = $pdo->prepare("INSERT INTO usuarios (usu_nome, usu_email, usu_senha) VALUES (:usu_nome, :usu_email, :usu_senha)");

      $sql->bindValue(':usu_nome', $usu_nome);
      $sql->bindValue(':usu_email', $usu_email);
      $sql->bindValue(':usu_senha', MD5($usu_senha));

      $sql->execute();
   }

   header('Location: ../');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
