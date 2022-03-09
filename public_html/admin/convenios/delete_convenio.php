<?php
try {
   include_once('../../assets/conexao.php');

   $con_id = filter_input(INPUT_GET, 'con_id', FILTER_DEFAULT);

   $sql = $pdo->prepare('DELETE FROM convenios WHERE con_id=:con_id');
   $sql->bindValue(':con_id', $con_id);
   $sql->execute();

   header('Location: form_convenio.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
