<?php
try {
   include_once("$assets/conexao.php");
   
   $sql = $pdo->prepare("SELECT * FROM usuarios");
   $sql->execute();

   foreach ($sql as $key) : extract($key) ?>
      <tr>
         <td><?= $usu_nome ?></td>
         <td><?= $usu_email ?></td>
         <td><?= $usu_tipo ?></td>
         <td><a title="Editar Usuário" href="form_update_usuarios.php?usu_id=<?= $usu_id ?>"><i class="material-icons green-text">edit</i></a> <a title="Remover Usuário" href="delete_usuarios.php?usu_id=<?= $usu_id ?>"><i class="material-icons red-text">clear</i></a></td>
      </tr>
   <?php endforeach ?>
<?php
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
