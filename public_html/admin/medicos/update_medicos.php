<?php
try {
   include_once('../../assets/conexao.php');

   $med_id = filter_input(INPUT_POST, 'med_id', FILTER_DEFAULT);
   $med_nome = filter_input(INPUT_POST, 'med_nome', FILTER_DEFAULT);
   $med_CRM = filter_input(INPUT_POST, 'med_CRM', FILTER_DEFAULT);
   $med_especialidade = filter_input(INPUT_POST, 'med_especialidade', FILTER_DEFAULT);
   $med_especialidade2 = filter_input(INPUT_POST, 'med_especialidade2', FILTER_DEFAULT);

   $sql = $pdo->prepare("UPDATE medicos SET med_nome=:med_nome, med_CRM=:med_CRM, med_especialidade=:med_especialidade, med_especialidade2=:med_especialidade2 WHERE med_id=:med_id");

   $sql->bindValue(':med_nome', $med_nome);
   $sql->bindValue(':med_CRM', $med_CRM);
   $sql->bindValue(':med_especialidade', $med_especialidade);
   $sql->bindValue(':med_especialidade2', $med_especialidade2);
   $sql->bindValue(':med_id', $med_id);
   $sql->execute();

   header('Location: form_medicos.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
