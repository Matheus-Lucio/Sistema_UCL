<?php
try {
   include_once('../../assets/conexao.php');

   $con_id = filter_input(INPUT_POST, 'con_id', FILTER_DEFAULT);
   $con_nome = filter_input(INPUT_POST, 'con_nome', FILTER_DEFAULT);
   $con_status = filter_input(INPUT_POST, 'con_status', FILTER_DEFAULT);
   $con_ANS = filter_input(INPUT_POST, 'con_ANS', FILTER_DEFAULT);
   $con_tempo_fatura = filter_input(INPUT_POST, 'con_tempo_fatura', FILTER_DEFAULT);
   $con_particular = filter_input(INPUT_POST, 'con_particular', FILTER_DEFAULT);
   $con_principal = filter_input(INPUT_POST, 'con_principal', FILTER_DEFAULT);

   $sql = $pdo->prepare("UPDATE convenios SET con_nome=:con_nome, con_status=:con_status, con_ANS=:con_ANS, con_tempo_fatura=:con_tempo_fatura, con_particular=:con_particular, con_principal=:con_principal WHERE con_id=:con_id");

   $sql->bindValue(':con_nome', $con_nome);
   $sql->bindValue(':con_status', $con_status);
   $sql->bindValue(':con_id', $con_id);
   $sql->bindValue(':con_ANS', $con_ANS);
   $sql->bindValue(':con_tempo_fatura', $con_tempo_fatura);
   $sql->bindValue(':con_particular', $con_particular);
   $sql->bindValue(':con_principal', $con_principal);

   $sql->execute();

   header('Location: form_convenio.php');
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
