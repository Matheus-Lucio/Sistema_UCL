<?php
try {
   include_once('../../assets/conexao.php');

   $for_id = filter_input(INPUT_GET, 'for_id', FILTER_DEFAULT);

   $sql = $pdo->prepare('DELETE FROM formas_pagamento WHERE for_id=:for_id');
   $sql->bindValue(':for_id', $for_id);
   $sql->execute();

   header('Location: form_formasPagamento.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
