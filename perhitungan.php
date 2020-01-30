<?php
include 'vendor/autoload.php';

use Fpdf\Fpdf;

$data = unserialize(base64_decode('YToxMTp7czo4OiJrb21lcnNpbCI7YjowO3M6OToicHBoX3RhcmlmIjtzOjY6IjcuNTAwMCI7czoxMToicHBuYm1fdGFyaWYiO2Q6MDtzOjg6InRvdGFsX2JtIjtkOjY2NzAwMDtzOjExOiJ0b3RhbF9jdWthaSI7aTowO3M6OToidG90YWxfcHBuIjtkOjczNDAwMDtzOjk6InRvdGFsX3BwaCI7ZDo1NTAwMDA7czoxMToidG90YWxfcHBuYm0iO2Q6MDtzOjE0OiJ0b3RhbF9ibV9wYWphayI7ZDoxOTUxMDAwO3M6MTY6ImRhdGFfcGVyaGl0dW5nYW4iO2E6Mjp7aTowO2E6MjI6e3M6ODoiYm1fdGFyaWYiO2Q6MTA7czoxMToiYm1fdGFyaWZfaHMiO2Q6NzkwO3M6MTQ6ImplbmlzX3RhcmlmX2JtIjtzOjg6IlNQRVNJRklLIjtzOjE1OiJzYXR1YW5fc3Blc2lmaWsiO3M6MzoiL2tnIjtzOjEzOiJqdW1sYWhfc2F0dWFuIjtpOjkwO3M6MTI6ImplbmlzX3NhdHVhbiI7czozOiJLR00iO3M6OToicHBuX3RhcmlmIjtkOjEwO3M6OToicHBoX3RhcmlmIjtkOjcuNTtzOjExOiJwcG5ibV90YXJpZiI7ZDowO3M6MTI6Im5pbGFpX3BhYmVhbiI7ZDo3MTA4MDQ4LjY0O3M6MzoiZm9iIjtzOjg6IjcwNC4wMDAwIjtzOjk6Imluc3VyYW5jZSI7czo2OiIwLjAwMDAiO3M6NzoiZnJlaWdodCI7czo2OiIwLjAwMDAiO3M6MzoiY2lmIjtkOjcwNDtzOjI6ImJtIjtkOjcxMTAwMDtzOjU6ImN1a2FpIjtpOjA7czozOiJwcG4iO2Q6NzgyMDAwO3M6MzoicHBoIjtkOjU4NzAwMDtzOjU6InBwbmJtIjtkOjA7czo2OiJ2YWx1dGEiO3M6MzoiU0dEIjtzOjU6Im5kcGJtIjtzOjEwOiIxMDA5Ni42NjAwIjtzOjE2OiJsb25nX2Rlc2NyaXB0aW9uIjtzOjk1OiJRdW9kIGxhdWRhbnRpdW0gaXBzYW0gZXQgbmloaWwgdGVuZXR1ci4gLS0gOTAgUk8sIDkwIEtHTSAtLSBicnV0dG8gOTAuMDAwMCBLRywgbmV0dG8gOTAuMDAwMCBLRyI7fWk6MTthOjIyOntzOjg6ImJtX3RhcmlmIjtkOjEwO3M6MTE6ImJtX3RhcmlmX2hzIjtkOjE1O3M6MTQ6ImplbmlzX3RhcmlmX2JtIjtzOjk6IkFEVkFMT1JVTSI7czoxNToic2F0dWFuX3NwZXNpZmlrIjtOO3M6MTM6Imp1bWxhaF9zYXR1YW4iO2k6MzM7czoxMjoiamVuaXNfc2F0dWFuIjtzOjM6IktHTSI7czo5OiJwcG5fdGFyaWYiO2Q6MTA7czo5OiJwcGhfdGFyaWYiO2Q6Ny41O3M6MTE6InBwbmJtX3RhcmlmIjtkOjA7czoxMjoibmlsYWlfcGFiZWFuIjtkOjYzNzYwNDAuNzk7czozOiJmb2IiO3M6ODoiNjMxLjUwMDAiO3M6OToiaW5zdXJhbmNlIjtzOjY6IjAuMDAwMCI7czo3OiJmcmVpZ2h0IjtzOjY6IjAuMDAwMCI7czozOiJjaWYiO2Q6NjMxLjU7czoyOiJibSI7ZDo2MzgwMDA7czo1OiJjdWthaSI7aTowO3M6MzoicHBuIjtkOjcwMjAwMDtzOjM6InBwaCI7ZDo1MjcwMDA7czo1OiJwcG5ibSI7ZDowO3M6NjoidmFsdXRhIjtzOjM6IlNHRCI7czo1OiJuZHBibSI7czoxMDoiMTAwOTYuNjYwMCI7czoxNjoibG9uZ19kZXNjcmlwdGlvbiI7czoxMDc6Ik5pc2kgcXVhZXJhdC4gLS0gMzMgUk8sIDMzIEtHTSAtLSBicnV0dG8gMzg3ODYuOTk4OCBLRywgbmV0dG8gMjEyOTAuOTUzMSBLRwotIFNFUklBTCBOVU1CRVIgOiBRdW9zIHF1aSBlc3QuIjt9fXM6MTU6ImRhdGFfcGVtYmViYXNhbiI7YTo2OntzOjE2OiJuaWxhaV9wZW1iZWJhc2FuIjtzOjg6IjUwMC4wMDAwIjtzOjY6InZhbHV0YSI7czozOiJVU0QiO3M6NToibmRwYm0iO3M6MTA6IjEzNjQyLjAwMDAiO3M6MTk6Im5pbGFpX3BlbWJlYmFzYW5fcnAiO2Q6NjgyMTAwMDtzOjIzOiJuaWxhaV9kYXNhcl9wZXJoaXR1bmdhbiI7ZDo2NjYzMDg5LjQzO3M6MTg6InRhcmlmX2JtX3VuaXZlcnNhbCI7ZDoxMDt9fQ=='));


function font($style = '') {
    global $pdf;
    $pdf->SetFont('Arial', $style, 8);
}

$pdf = new Fpdf('L', 'mm', 'A4');


// $pdf->AddPage('L', 'A4', 0);
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 40);

// Print Title
font('B');
$pdf->Cell(0, 4, 'LEMBAR PERHITUNGAN PUNGUTAN BEA MASUK DAN PAJAK', 0, 1, 'C');

font('BI');
$pdf->Cell(0, 4, 'TAX AND DUTY CALCULATION SHEET', 0, 1, 'C');

font('B');
$pdf->Cell(0, 4, "Halaman (page) {$pdf->PageNo()} / " . '{nb}', 0, 1, 'R');

// draw calculation table
font();

// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

// No.
$pdf->MultiCell(7, 8, 'No.', 0, 'L');

$pdf->Rect($row_x, $row_y, 7, $pdf->GetY()-$row_y);

// Uraian Barang
$pdf->SetXY($row_x + 7, $row_y);
$pdf->Cell(63, 4, 'Uraian Barang', 0, 2);

font('I');
$pdf->Cell(63, 4, 'Goods Description', 0, 2);

$pdf->Rect($row_x + 7, $row_y, 63, $pdf->GetY()-$row_y);

// (1) Cost/FOB
$pdf->SetXY($row_x + 70, $row_y);
font();
$pdf->MultiCell(22.5, 8, '(1) Cost/FOB', 0);

$pdf->Rect($row_x + 70, $row_y, 22.5, $pdf->GetY()-$row_y);

// (2) Insurance
$pdf->SetXY($row_x + 70 + 22.5, $row_y);
font();
$pdf->MultiCell(22.5, 8, '(2) Insurance', 0);

$pdf->Rect($row_x + 70 + 22.5, $row_y, 22.5, $pdf->GetY()-$row_y);

// (3) Freight
$pdf->SetXY($row_x + 70 + 22.5 + 22.5, $row_y);
font();
$pdf->MultiCell(22.5, 8, '(3) Freight', 0);

$pdf->Rect($row_x + 70 + 22.5 + 22.5, $row_y, 22.5, $pdf->GetY()-$row_y);

// (4) CIF: [(1)+(2)+(3)]
$pdf->SetXY($row_x + 70 + 22.5 + 22.5 + 22.5, $row_y);
font();
$pdf->MultiCell(25, 4, '(4) CIF: [(1)+(2)+(3)]', 0, 'L');

$pdf->Rect($row_x + 70 + 22.5 + 22.5 + 22.5, $row_y, 25, $pdf->GetY()-$row_y);

// Valuta
$pdf->SetXY($row_x + 70 + 22.5 + 22.5 + 22.5 + 25, $row_y);
font();
$pdf->Cell(14.5, 4, 'Valuta', 0, 2);
font('I');
$pdf->Cell(14.5, 4, 'Currency', 0, 2);

$pdf->Rect($row_x + 70 + 22.5 + 22.5 + 22.5 + 25, $row_y, 14.5, $pdf->GetY()-$row_y);

// (5) NDPBM
$pdf->SetXY($row_x + 70 + 22.5 + 22.5 + 22.5 + 25 + 14.5, $row_y);
font();
$pdf->Cell(4, 4, '(5)');
$pdf->Cell(25, 4, 'NDPBM', 0, 2);
font('I');
$pdf->Cell(25, 4, 'Tax Currency Rate', 0, 2);

$pdf->Rect($row_x + 70 + 22.5 + 22.5 + 22.5 + 25 + 14.5, $row_y, 30, $pdf->GetY()-$row_y);

// (6) Nilai Pabean
$pdf->SetXY($row_x + 70 + 22.5 + 22.5 + 22.5 + 25 + 14.5 + 30, $row_y);

$row_x  = $pdf->GetX();
font();
$pdf->Cell(4, 4, '(6)');
$pdf->Cell(0, 4, 'Nilai Pabean (Rp): [(4)x(5)]', 0, 2);
font('I');
$pdf->Cell(0, 4, 'Customs Value', 0, 0);

$max_x = $pdf->GetX();
$pdf->Ln();

$last_col_width = $max_x-$row_x;

$pdf->Rect($row_x, $row_y, $max_x-$row_x, $pdf->GetY()-$row_y);

// render data barang here
$no = 1;    // number starts from 1

foreach($data['data_perhitungan'] as $d) {
    font();

    // print_r($d[0]);
    // record row_x row_y
    $row_x  = $pdf->GetX();
    $row_y  = $pdf->GetY();

    // no
    $pdf->SetXY($row_x, $row_y);
    $pdf->Cell(7, 4, $no, 0, 0);

    // Uraian Barang
    $pdf->SetXY($row_x + 7, $row_y);
    $pdf->MultiCell(63, 4, $d['long_description'], 0, 'L');

    // record y every time we write data
    $max_y = $pdf->GetY();

    // FOB
    $pdf->SetXY($row_x + 70, $row_y);
    $pdf->Cell(22.5, 4, number_format($d['fob'], 2), 0, 0, 'R');

    // record y every time we write data
    $max_y = max($max_y, $pdf->GetY());

    // Insurance
    // $pdf->SetXY($row_x + 92.5, $row_y);
    $pdf->Cell(22.5, 4, number_format($d['insurance'], 2), 0, 0, 'R');

    // record y every time we write data
    $max_y = max($max_y, $pdf->GetY());
    
    // Freight
    // $pdf->SetXY($row_x + 92.5 + 22.5, $row_y);
    $pdf->Cell(22.5, 4, number_format($d['freight'], 2), 0, 0, 'R');

    // record y every time we write data
    $max_y = max($max_y, $pdf->GetY());
    
    // CIF
    // $pdf->SetXY($row_x + 92.5 + 22.5 + 22.5, $row_y);
    $pdf->Cell(25, 4, number_format($d['cif'], 2), 0, 0, 'R');

    // record y every time we write data
    $max_y = max($max_y, $pdf->GetY());
    
    // Valuta
    // $pdf->SetXY($row_x + 92.5 + 22.5 + 22.5 + 25, $row_y);
    $pdf->Cell(14.5, 4, $d['valuta'], 0, 0, 'R');

    // record y every time we write data
    $max_y = max($max_y, $pdf->GetY());

    // NDPBM
    // $pdf->SetXY($row_x + 92.5 + 22.5 + 22.5 + 25 + 14.5)
    $pdf->Cell(30, 4, number_format($d['ndpbm'], 2), 0, 0, 'R');
    
    // record y every time we write data
    $max_y = max($max_y, $pdf->GetY());
    
    // Nilai Pabean
    // $pdf->SetXY($row_x + 92.5 + 22.5 + 22.5 + 25 + 14.5)
    $pdf->Cell($last_col_width, 4, number_format($d['nilai_pabean'], 2), 0, 1, 'R');
    
    // record y every time we write data
    $max_y = max($max_y, $pdf->GetY());

    // Draw Rectangle nao
    $pdf->Rect($row_x, $row_y, 7, $max_y-$row_y);   // no
    $pdf->Rect($row_x + 7, $row_y, 63, $max_y-$row_y);   // uraian barang
    $pdf->Rect($row_x + 70, $row_y, 22.5, $max_y-$row_y);   // Cost
    $pdf->Rect($row_x + 92.5, $row_y, 22.5, $max_y-$row_y);   // Insurance
    $pdf->Rect($row_x + 115, $row_y, 22.5, $max_y-$row_y);   // Freight
    $pdf->Rect($row_x + 137.5, $row_y, 25, $max_y-$row_y);   // CIF
    $pdf->Rect($row_x + 162.5, $row_y, 14.5, $max_y-$row_y);   // Valuta
    $pdf->Rect($row_x + 177, $row_y, 30, $max_y-$row_y);   // Valuta
    $pdf->Rect($row_x + 207, $row_y, $last_col_width, $max_y-$row_y);   // Nilai Pabean

    
    // for next line, set cursor
    $pdf->SetY($max_y);

    $no++;

    // $pdf->Ln();
}

// total
font('B');
$pdf->Cell(207, 4, '(7) Total', 1, 0, 'C');

// Total Nilai Pabean
$total_nilai_pabean = array_reduce($data['data_perhitungan'], function ($acc, $e) { return $acc + $e['nilai_pabean']; }, 0);

$pdf->Cell(0, 4, number_format($total_nilai_pabean, 2), 1, 1, 'R');

// add line for beautiful output
$pdf->Ln(2);

// Pembebasan
font();

// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

// (8) Pembebasan
$pdf->SetX($row_x + 7);
$pdf->Cell(63, 4, '(8) Pembebasan', 0, 2);
font('I');
$pdf->Cell(63, 4, 'De minimis value', 0, 0);

// value of Pembebasan
font();
$pdf->Cell(22.5, 4, number_format($data['data_pembebasan']['nilai_pembebasan'], 2), 0, 0, 'R');

// valuta of pembebasan
$pdf->Cell(22.5, 4, $data['data_pembebasan']['valuta'], 0, 0, 'C');

// x
$pdf->Cell(47.5, 4, 'x', 0, 0, 'C');

// kurs ndpbm
$pdf->SetX($row_x + 7 + 63 + 22.5 + 22.5 + 22.5 + 25 + 14.5 );
$pdf->Cell(30, 4, number_format($data['data_pembebasan']['ndpbm'], 2), 0, 0, 'R');

// Nilai Pembebasan Rp
// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

font('B');
$pdf->Cell(0, 4, number_format($data['data_pembebasan']['nilai_pembebasan_rp'], 2), 0, 1, 'R');

$pdf->Text(297-8.5, $pdf->GetY() - 1.5, '-');
// $pdf->Write(4, '-');


// Draw the underline + minus sign
// $pdf->Text(297-10, $row_y, '(-)');

// $pdf->Ln();
// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

$pdf->Line($row_x, $row_y, 287, $row_y);


// Nilai Dasar Perhitungan
// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

$pdf->SetX($row_x + 7);
font();
$pdf->Cell(63, 4, '(9) Nilai dasar perhitungan BM + Pajak: [(7)-(8)]', 0, 2);
font('I');
$pdf->Cell(63, 4, 'Base Value for Tax and Duty calculation', 0, 0);

// Bold
font('B');
$pdf->Cell(0, 4, number_format($data['data_pembebasan']['nilai_dasar_perhitungan'], 2), 0, 1, 'R');

$pdf->Line($pdf->GetX(), $pdf->GetY(), 287, $pdf->GetY());

// Title
$pdf->Ln();
$pdf->SetX($row_x + 7);
$pdf->Cell(63, 4, 'BEA MASUK DAN PAJAK', 0, 2);
font('BI');
$pdf->Cell(63, 4, 'TAX AND DUTY', 0, 1);

// 10. Bea Masuk
font();
$pdf->SetX($row_x + 7);
$pdf->Cell(63, 4, "(10) Bea Masuk: [(9) x 10%]", 0, 2);
font('I');
$pdf->Cell(63, 4, 'Customs Duty', 0, 2);

$pdf->Line($row_x, $pdf->GetY(), 287, $pdf->GetY());



$pdf->Output('I', 'perhitungan.pdf');