<?php
try {
   include_once('../../assets/conexao.php');

   $pac_id = filter_input(INPUT_GET, 'pac_id', FILTER_DEFAULT);

   $sql = $pdo->prepare("DELETE FROM pacientes WHERE pac_id=:pac_id");
   $sql->bindValue(':pac_id', $pac_id);
   $sql->execute();

   header('Location: form_pacientes.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
