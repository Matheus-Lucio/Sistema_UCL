<?php
try {
   include_once('../../assets/conexao.php');

   $med_id = filter_input(INPUT_GET, 'med_id', FILTER_DEFAULT);

   $sql = $pdo->prepare('DELETE FROM medicos WHERE med_id=:med_id');
   $sql->bindValue(':med_id', $med_id);
   $sql->execute();

   header('Location: form_medicos.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
