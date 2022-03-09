<?php
try {
   include_once('../../assets/conexao.php');

   $id = filter_input(INPUT_GET, 'usu_id', FILTER_DEFAULT);

   $sql = $pdo->prepare("DELETE FROM usuarios WHERE usu_id=:usu_id");
   $sql->bindValue(':usu_id', $id);
   $sql->execute();

   header('Location: form_usuarios.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
