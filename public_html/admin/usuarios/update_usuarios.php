<?php
try {
   include_once('../../assets/conexao.php');

   $usu_id = filter_input(INPUT_POST, 'usu_id', FILTER_DEFAULT);
   $usu_nome = filter_input(INPUT_POST, 'usu_nome', FILTER_DEFAULT);
   $usu_email = filter_input(INPUT_POST, 'usu_email', FILTER_DEFAULT);
   $usu_tipo = filter_input(INPUT_POST, 'usu_tipo', FILTER_DEFAULT);
   $usu_senha = filter_input(INPUT_POST, 'usu_senha', FILTER_DEFAULT);

   // $pdo->prepare("SELECT * FROM usuarios");
   $oldData = $pdo->prepare("SELECT usu_senha FROM usuarios");
   $oldData->execute();

   $data = $oldData->fetchAll();

   $sql = $pdo->prepare("UPDATE usuarios SET usu_nome=:usu_nome, usu_email=:usu_email, usu_tipo=:usu_tipo, usu_senha=:usu_senha WHERE usu_id=:usu_id");

   $sql->bindValue(':usu_nome', $usu_nome);
   $sql->bindValue(':usu_email', $usu_email);
   $sql->bindValue(':usu_tipo', $usu_tipo);
   $sql->bindValue(':usu_senha', $usu_senha === '' ? $data[0]['usu_senha'] : MD5($usu_senha));
   $sql->bindValue(':usu_id', $usu_id);

   $sql->execute();

   header('Location: form_usuarios.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
