<?php
try {
   include_once('../../assets/conexao.php');

   $pac_nome = filter_input(INPUT_POST, 'pac_nome', FILTER_DEFAULT);
   $pac_telefone = filter_input(INPUT_POST, 'pac_telefone', FILTER_DEFAULT);
   $pac_CPF = filter_input(INPUT_POST, 'pac_CPF', FILTER_DEFAULT);

   $sql = $pdo->prepare("INSERT INTO pacientes (pac_nome, pac_telefone, pac_CPF) VALUE (:pac_nome, :pac_telefone, :pac_CPF)");

   $sql->bindValue(':pac_nome', $pac_nome);
   $sql->bindValue(':pac_telefone', $pac_telefone);
   $sql->bindValue(':pac_CPF', $pac_CPF);
   $sql->execute();
   
   header('Location: form_pacientes.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
