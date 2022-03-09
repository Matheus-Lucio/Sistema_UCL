<?php
try {
   include_once('../../assets/conexao.php');

   $sql = $pdo->prepare("SELECT * FROM formas_pagamento");
   $sql->execute();

   foreach ($sql as $key) : extract($key) ?>
      <tr>
         <td><?= $for_nome ?></td>
         <td><?= $for_status ?></td>
         <td></a><a title="Editar Forma de Pagamento" href="form_update_formasPagamento.php?for_id=<?= $for_id ?>"><i class="material-icons green-text">edit</i></a> <a title="Remover Forma de Pagamento" href="delete_formasPagamento.php?for_id=<?= $for_id ?>"><i class="material-icons red-text">clear</i></td>
      </tr>
   <?php endforeach ?>
<?php
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
