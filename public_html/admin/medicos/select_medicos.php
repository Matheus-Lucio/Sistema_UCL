<?php
try {
   include_once('../../assets/conexao.php');

   $sql = $pdo->prepare("SELECT * FROM medicos");
   $sql->execute();

   foreach ($sql as $key) : extract($key) ?>
      <tr>
         <td>Dr. <?= $med_nome ?></td>
         <td> <?= $med_CRM ?></td>
         <td> <?= $med_especialidade ?></td>
         <td> <?= $med_especialidade2 ?></td>
         <td><a title="Editar Médico" href="form_update_medicos.php?med_id=<?= $med_id ?>"><i class="material-icons green-text">edit</i></a> 
         <a title="Remover Médico" href="delete_medicos.php?med_id=<?= $med_id ?>"><i class="material-icons red-text">clear</i></a></td>
      </tr>
   <?php endforeach ?>
<?php
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
