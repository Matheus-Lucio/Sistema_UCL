<?php
try {
   include_once('../../assets/conexao.php');

   $age_id = filter_input(INPUT_GET, 'age_id', FILTER_DEFAULT);

   $sql = $pdo->prepare("DELETE FROM agenda WHERE age_id=:age_id");
   $sql->bindValue(':age_id', $age_id);
   $sql->execute();

   header('Location: form_agenda.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
