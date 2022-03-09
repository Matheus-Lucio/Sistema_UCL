<?php
try {
   include_once('../../assets/conexao.php');

   $for_nome = filter_input(INPUT_POST, 'for_nome', FILTER_DEFAULT);

   $sql = $pdo->prepare("INSERT INTO formas_pagamento (for_nome) VALUES (:for_nome)");
   $sql->bindValue(':for_nome', $for_nome);
   $sql->execute();

   header('Location: form_formasPagamento.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
