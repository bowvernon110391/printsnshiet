<?php
include 'vendor/autoload.php';

use Fpdf\Fpdf;

$data = unserialize(base64_decode('YToxMTp7czo4OiJrb21lcnNpbCI7YjowO3M6OToicHBoX3RhcmlmIjtzOjY6IjcuNTAwMCI7czoxMToicHBuYm1fdGFyaWYiO2Q6MDtzOjg6InRvdGFsX2JtIjtkOjY2NzAwMDtzOjExOiJ0b3RhbF9jdWthaSI7aTowO3M6OToidG90YWxfcHBuIjtkOjczNDAwMDtzOjk6InRvdGFsX3BwaCI7ZDo1NTAwMDA7czoxMToidG90YWxfcHBuYm0iO2Q6MDtzOjE0OiJ0b3RhbF9ibV9wYWphayI7ZDoxOTUxMDAwO3M6MTY6ImRhdGFfcGVyaGl0dW5nYW4iO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoxOntzOjg6IgAqAGl0ZW1zIjthOjI6e2k6MDthOjIyOntzOjg6ImJtX3RhcmlmIjtkOjEwO3M6MTE6ImJtX3RhcmlmX2hzIjtkOjc5MDtzOjE0OiJqZW5pc190YXJpZl9ibSI7czo4OiJTUEVTSUZJSyI7czoxNToic2F0dWFuX3NwZXNpZmlrIjtzOjM6Ii9rZyI7czoxMzoianVtbGFoX3NhdHVhbiI7aTo5MDtzOjEyOiJqZW5pc19zYXR1YW4iO3M6MzoiS0dNIjtzOjk6InBwbl90YXJpZiI7ZDoxMDtzOjk6InBwaF90YXJpZiI7ZDo3LjU7czoxMToicHBuYm1fdGFyaWYiO2Q6MDtzOjEyOiJuaWxhaV9wYWJlYW4iO2Q6NzEwODA0OC42NDtzOjM6ImZvYiI7czo4OiI3MDQuMDAwMCI7czo5OiJpbnN1cmFuY2UiO3M6NjoiMC4wMDAwIjtzOjc6ImZyZWlnaHQiO3M6NjoiMC4wMDAwIjtzOjM6ImNpZiI7ZDo3MDQ7czoyOiJibSI7ZDo3MTEwMDA7czo1OiJjdWthaSI7aTowO3M6MzoicHBuIjtkOjc4MjAwMDtzOjM6InBwaCI7ZDo1ODcwMDA7czo1OiJwcG5ibSI7ZDowO3M6NjoidmFsdXRhIjtzOjM6IlNHRCI7czo1OiJuZHBibSI7czoxMDoiMTAwOTYuNjYwMCI7czoxNjoibG9uZ19kZXNjcmlwdGlvbiI7czo5NToiUXVvZCBsYXVkYW50aXVtIGlwc2FtIGV0IG5paGlsIHRlbmV0dXIuIC0tIDkwIFJPLCA5MCBLR00gLS0gYnJ1dHRvIDkwLjAwMDAgS0csIG5ldHRvIDkwLjAwMDAgS0ciO31pOjE7YToyMjp7czo4OiJibV90YXJpZiI7ZDoxMDtzOjExOiJibV90YXJpZl9ocyI7ZDoxNTtzOjE0OiJqZW5pc190YXJpZl9ibSI7czo5OiJBRFZBTE9SVU0iO3M6MTU6InNhdHVhbl9zcGVzaWZpayI7TjtzOjEzOiJqdW1sYWhfc2F0dWFuIjtpOjMzO3M6MTI6ImplbmlzX3NhdHVhbiI7czozOiJLR00iO3M6OToicHBuX3RhcmlmIjtkOjEwO3M6OToicHBoX3RhcmlmIjtkOjcuNTtzOjExOiJwcG5ibV90YXJpZiI7ZDowO3M6MTI6Im5pbGFpX3BhYmVhbiI7ZDo2Mzc2MDQwLjc5O3M6MzoiZm9iIjtzOjg6IjYzMS41MDAwIjtzOjk6Imluc3VyYW5jZSI7czo2OiIwLjAwMDAiO3M6NzoiZnJlaWdodCI7czo2OiIwLjAwMDAiO3M6MzoiY2lmIjtkOjYzMS41O3M6MjoiYm0iO2Q6NjM4MDAwO3M6NToiY3VrYWkiO2k6MDtzOjM6InBwbiI7ZDo3MDIwMDA7czozOiJwcGgiO2Q6NTI3MDAwO3M6NToicHBuYm0iO2Q6MDtzOjY6InZhbHV0YSI7czozOiJTR0QiO3M6NToibmRwYm0iO3M6MTA6IjEwMDk2LjY2MDAiO3M6MTY6ImxvbmdfZGVzY3JpcHRpb24iO3M6MTA3OiJOaXNpIHF1YWVyYXQuIC0tIDMzIFJPLCAzMyBLR00gLS0gYnJ1dHRvIDM4Nzg2Ljk5ODggS0csIG5ldHRvIDIxMjkwLjk1MzEgS0cKLSBTRVJJQUwgTlVNQkVSIDogUXVvcyBxdWkgZXN0LiI7fX19czoxNToiZGF0YV9wZW1iZWJhc2FuIjthOjY6e3M6MTY6Im5pbGFpX3BlbWJlYmFzYW4iO3M6ODoiNTAwLjAwMDAiO3M6NjoidmFsdXRhIjtzOjM6IlVTRCI7czo1OiJuZHBibSI7czoxMDoiMTM2NDIuMDAwMCI7czoxOToibmlsYWlfcGVtYmViYXNhbl9ycCI7ZDo2ODIxMDAwO3M6MjM6Im5pbGFpX2Rhc2FyX3BlcmhpdHVuZ2FuIjtkOjY2NjMwODkuNDM7czoxODoidGFyaWZfYm1fdW5pdmVyc2FsIjtkOjEwO319'));

$pdf = new Fpdf('L', 'mm', 'A4');

function font($style = '') {
    global $pdf;
    $pdf->SetFont('Arial', $style, 8);
}

// $pdf->AddPage('L', 'A4', 0);
$pdf->AddPage();
$pdf->AliasNbPages();

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

$pdf->Rect($row_x, $row_y, $max_x-$row_x, $pdf->GetY()-$row_y);

// render data barang here
$no = 1;    // number starts from 1

foreach($data['data_perhitungan'] as $d) {
    // record row_x row_y
    $row_x  = $pdf->GetX();
    $row_y  = $pdf->GetY();

    // no
    $pdf->SetXY($row_x, $row_y);
    $pdf->Cell(7, 4, $no, 0, 0);

    // Uraian Barang


    $no++;

    $pdf->Ln();
}

$pdf->Output('I', 'perhitungan.pdf');