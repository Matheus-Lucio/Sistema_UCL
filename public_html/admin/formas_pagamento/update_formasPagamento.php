<?php
try {
   include_once('../../assets/conexao.php');

   $for_id = filter_input(INPUT_POST, 'for_id', FILTER_DEFAULT);
   $for_nome = filter_input(INPUT_POST, 'for_nome', FILTER_DEFAULT);
   $for_status = filter_input(INPUT_POST, 'for_status', FILTER_DEFAULT);

   $sql = $pdo->prepare("UPDATE formas_pagamento SET for_nome=:for_nome, for_status=:for_status WHERE for_id=:for_id");

   $sql->bindValue(':for_nome', $for_nome);
   $sql->bindValue(':for_status', $for_status);
   $sql->bindValue(':for_id', $for_id);

   $sql->execute();

   header('Location: form_formasPagamento.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
