<?php

include_once('../../fpdf/fpdf.php');
include_once('../../assets/conexao.php');

$sql = $pdo->prepare("SELECT * FROM convenios ORDER BY con_nome");
$sql->execute();

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Courier','B',30);
$pdf->Cell(190,55,utf8_decode('Relatório de Convenios'),0,0,"C");
$pdf->Image('Sem_Título-1.png' , 80 ,0, 50 , 44,'PNG');
$pdf->SetDrawColor(188,188,188);
$pdf->Line(20, 45, 210-20, 45);
$pdf->Line(20, 45, 210-20, 45);
$pdf->Ln(15);
$pdf -> SetXY(6,50);
$pdf->SetFont("Arial","I",10);
$pdf->SetFillColor(188,188,188);
$pdf->Cell(33,7,"Nome",1,0,"C",1);
$pdf->Cell(33,7,"Registro ANS",1,0,"C",1);
$pdf->Cell(33,7,"Tempo Faturamento",1,0,"C",1);
$pdf->Cell(33,7,"Particular",1,0,"C",1);
$pdf->Cell(33,7,"Principal",1,0,"C",1);
$pdf->Cell(33,7,"Status",1,0,"C",1);

$pdf->Ln();

foreach ($sql as $convenios){
    $pdf->Cell(70);
    $pdf -> SetX(6);
    $pdf->Cell(33,7,utf8_decode($convenios["con_nome"]),1,0,"C");
    $pdf->Cell(33,7,$convenios["con_ANS"],1,0,"C");
    $pdf->Cell(33,7,$convenios["con_tempo_fatura"],1,0,"C");
    $pdf->Cell(33,7,utf8_decode($convenios["con_particular"]),1,0,"C");
    $pdf->Cell(33,7,utf8_decode($convenios["con_principal"]),1,0,"C");
    $pdf->Cell(33,7,$convenios["con_status"],1,0,"C");
    $pdf->Ln();
}


$pdf->SetFont("Arial","I",10);
$pdf ->SetY(5);
$pdf ->SetX(3);
setlocale(LC_ALL,"pt_BR", "pt_BR.iso-8959-1","pt_BR.utf-8","portuguese");
date_default_timezone_set('America/sao_paulo');
$pdf -> cell(0,0,strftime("%d de %B de %Y"));

$pdf->Output();