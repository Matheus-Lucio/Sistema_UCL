<?php
try {
   include_once('../../assets/conexao.php');

   $condition = '';

   if (isset($med_id_get) && $med_id_get !== '-1') $condition = "WHERE m.med_id = '$med_id_get'";

   if (isset($pac_id_get) && $pac_id_get !== '-1') {
      $condition .= $condition === '' ? 'WHERE ' : ' AND ';
      $condition .= "p.pac_id = '$pac_id_get'";
   }

   if (isset($con_id_get) && $con_id_get !== '-1') {
      $condition .= $condition === '' ? 'WHERE ' : ' AND ';
      $condition .= "c.con_id = '$con_id_get'";
   }

   if (isset($for_id_get) && $for_id_get !== '-1') {
      $condition .= $condition === '' ? 'WHERE ' : ' AND ';
      $condition .= "f.for_id = '$for_id_get'";
   }

   if (isset($sch_dateI_get) && isset($sch_dateF_get) && $sch_dateI_get !== '') {
      if ($sch_dateF_get === '') $sch_dateF_get = $sch_dateI_get; // Se Data final não receber nada, Data inicial recebe data final
      else if (date($sch_dateI_get) > $sch_dateF_get) { // Se data inicial for maior que data final, eles invertem
         $backup = $sch_dateI_get;
         $sch_dateI_get = $sch_dateF_get;
         $sch_dateF_get = $backup;
      }

      $condition .= $condition === '' ? 'WHERE ' : ' AND ';
      $condition .= "a.age_data >= '$sch_dateI_get' AND a.age_data <= '$sch_dateF_get'";
   }

   $sql = $pdo->prepare(
      "SELECT * FROM agenda a
         INNER JOIN medicos m on m.med_id = a.med_id
         INNER JOIN pacientes p on p.pac_id = a.pac_id
         INNER JOIN convenios c on c.con_id = a.con_id
         INNER JOIN formas_pagamento f on f.for_id = a.for_id
         $condition
         ORDER BY a.age_data, a.age_horario"
   );

   $sql->execute();

   foreach ($sql as $key) : extract($key) ?>
      <tr>
         <td><?= $age_data ?></td>
         <td><?= $age_horario ?></td>
         <td><?= $med_nome ?></td>
         <td><?= $pac_nome ?></td>
         <td><?= $con_nome ?></td>
         <td><?= $for_nome ?></td>
         <td><a title="Editar Consulta" href="form_update_agenda.php?age_id=<?= $age_id ?>"><i class="material-icons green-text">edit</i></a> <a title="Remover Consulta" href="delete_agenda.php?age_id=<?= $age_id ?>"><i class="material-icons red-text">clear</i></a></td>
      </tr>
   <?php endforeach ?>
<?php
} catch (PDOException $e) {
   echo 'Um erro ocorreu! Erro: ' . $e->getMessage();
}
