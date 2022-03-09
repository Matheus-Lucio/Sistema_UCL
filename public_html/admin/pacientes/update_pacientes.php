<?php
try {
   include_once('../../assets/conexao.php');

   $pac_id = filter_input(INPUT_POST, 'pac_id', FILTER_DEFAULT);
   $pac_nome = filter_input(INPUT_POST, 'pac_nome', FILTER_DEFAULT);
   $pac_telefone = filter_input(INPUT_POST, 'pac_telefone', FILTER_DEFAULT);
   $pac_CPF = filter_input(INPUT_POST, 'pac_CPF', FILTER_DEFAULT);

   $sql = $pdo->prepare("UPDATE pacientes SET pac_nome=:pac_nome, pac_telefone=:pac_telefone, pac_CPF=:pac_CPF WHERE pac_id=:pac_id");

   $sql->bindValue(':pac_nome', $pac_nome);
   $sql->bindValue(':pac_telefone', $pac_telefone);
   $sql->bindValue(':pac_CPF', $pac_CPF);
   $sql->bindValue(':pac_id', $pac_id);
   $sql->execute();

   header('Location: form_pacientes.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
