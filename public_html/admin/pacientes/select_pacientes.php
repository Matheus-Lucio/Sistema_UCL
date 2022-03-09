<?php
try {
   include_once('../../assets/conexao.php');

   $sql = $pdo->prepare("SELECT * FROM pacientes");
   $sql->execute();

   foreach ($sql as $key) : extract($key) ?>
      <tr>
         <td><?= $pac_nome ?></td>
         <td><?= $pac_telefone ?></td>
         <td><?= $pac_CPF ?></td>
         <td><a title="Editar Paciente" href="form_update_pacientes.php?pac_id=<?= $pac_id ?>"><i class="material-icons green-text">edit</i></a> <a title="Remover Paciente" href="delete_pacientes.php?pac_id=<?= $pac_id ?>"><i class="material-icons red-text">clear</i></a></td>
      </tr>
       
   <?php endforeach ?>
<?php
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
