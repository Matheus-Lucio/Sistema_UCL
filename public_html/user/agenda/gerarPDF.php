<?php

include_once('../../fpdf/fpdf.php');
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

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Courier','I',30);
$pdf->Cell(190,55,utf8_decode('Relatório de Agendamento'),0,0,"C");
$pdf->Image('Sem_Título-1.png' , 80 ,0, 50 , 44,'PNG');
$pdf->SetFont("Arial","B",10);
$pdf ->SetY(5);
$pdf ->SetX(3);
setlocale(LC_ALL,"pt_BR", "pt_BR.iso-8959-1","pt_BR.utf-8","portuguese");
date_default_timezone_set('America/sao_paulo');
$pdf -> cell(0,0,strftime("%d de %B de %Y"));
$pdf->SetDrawColor(188,188,188);
$pdf->Line(20, 45, 210-20, 45);
$pdf->Line(20, 45, 210-20, 45);
$pdf->Ln(15);
$pdf -> SetXY(6,50);
$pdf->SetFont("Arial","I",10);
$pdf->SetFillColor(188,188,188);
$pdf->Cell(33,7,"Data",1,0,"C",1);
$pdf->Cell(33,7,"horario",1,0,"C",1);
$pdf->Cell(33,7,"Doutor",1,0,"C",1);
$pdf->Cell(33,7,"Paciente",1,0,"C",1);
$pdf->Cell(33,7,"Convenio",1,0,"C",1);
$pdf->Cell(33,7,"Pagamento",1,0,"C",1);

$pdf->Ln();

foreach ($sql as $agenda){
    $pdf->Cell(70);
    $pdf -> SetX(6);
    $pdf->SetFillColor(158,236,255);
    $pdf->Cell(33,7,$agenda["age_data"],1,0,"C");
    $pdf->Cell(33,7,$agenda["age_horario"],1,0,"C");
    $pdf->Cell(33,7,utf8_decode($agenda["med_nome"]),1,0,"C");
    $pdf->Cell(33,7,utf8_decode($agenda["pac_nome"]),1,0,"C");
    $pdf->Cell(33,7,utf8_decode($agenda["con_nome"]),1,0,"C");
    $pdf->Cell(33,7,utf8_decode($agenda["for_nome"]),1,0,"C");
    $pdf->ln();

}


    


$pdf->Output();