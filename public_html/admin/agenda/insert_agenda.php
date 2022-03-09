<?php
try {
   include_once('../../assets/conexao.php');

   $age_data = filter_input(INPUT_POST, 'age_data', FILTER_DEFAULT);
   $age_horario = filter_input(INPUT_POST, 'age_horario', FILTER_DEFAULT);
   $med_id = filter_input(INPUT_POST, 'med_id', FILTER_DEFAULT);
   $pac_id = filter_input(INPUT_POST, 'pac_id', FILTER_DEFAULT);
   $con_id = filter_input(INPUT_POST, 'con_id', FILTER_DEFAULT);
   $for_id = filter_input(INPUT_POST, 'for_id', FILTER_DEFAULT);

   $sql = $pdo->prepare("INSERT INTO agenda (age_data, age_horario, med_id, pac_id, con_id, for_id) VALUES (:age_data, :age_horario, :med_id, :pac_id, :con_id, :for_id)");

   $sql->bindValue(':age_data', $age_data);
   $sql->bindValue(':age_horario', $age_horario);
   $sql->bindValue(':med_id', $med_id);
   $sql->bindValue(':pac_id', $pac_id);
   $sql->bindValue(':con_id', $con_id);
   $sql->bindValue(':for_id', $for_id);

   $sql->execute();

   header('Location: form_agenda.php');
   
   echo "Executado com Sucesso!";
   
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}