<?php
try {
   include_once('../../assets/conexao.php');

   $sql = $pdo->prepare("SELECT * FROM convenios");
   $sql->execute();

   foreach ($sql as $key) : extract($key) ?>
      <tr>
         <td><?= $con_nome ?></td>
         <td><?= $con_ANS ?></td>
         <td><?= $con_tempo_fatura ?></td>
         <td><?= $con_particular ?></td>
         <td><?= $con_principal ?></td>
         <td><a title="Editar Convênio" href="form_update_convenio.php?con_id=<?= $con_id ?>"><i class="material-icons green-text">edit</i></a> <a title="Remover Convênio" href="delete_convenio.php?con_id=<?= $con_id ?>"><i class="material-icons red-text">clear</i></a></td>
      </tr>
   <?php endforeach ?>
<?php
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
