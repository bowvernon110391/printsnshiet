<?php
include 'vendor/autoload.php';

use Fpdf\Fpdf;

$json = '{"komersil":false,"pph_tarif":"7.5000","ppnbm_tarif":0,"total_bm":1787000,"total_cukai":0,"total_ppn":1966000,"total_pph":1474000,"total_ppnbm":0,"total_bm_pajak":5227000,"data_perhitungan":[{"hs_code":"04021041","bm_tarif":10,"bm_tarif_hs":5,"jenis_tarif_bm":"ADVALORUM","satuan_spesifik":null,"jumlah_satuan":97,"jenis_satuan":"PCE","jumlah_kemasan":12,"jenis_kemasan":"PK","ppn_tarif":10,"pph_tarif":7.5,"ppnbm_tarif":0,"nilai_pabean":8584477.437601177,"fob":805.435,"insurance":42.5346,"freight":168.5881,"cif":1016.5576999999998,"bm":859000,"cukai":0,"ppn":945000,"pph":709000,"ppnbm":0,"valuta":"USD","ndpbm":8444.6534,"long_description":"Ab possimus sit sapiente eveniet non minus.\n-- brutto 21.5540 KG\n\n--> IMEI : Minus aut nostrum qui nulla.; \n--> IMSI : Culpa doloribus ut architecto.","short_description":"Ab possimus sit sapiente eveniet non minus.","brutto":21.554},{"hs_code":"94015300","bm_tarif":10,"bm_tarif_hs":20,"jenis_tarif_bm":"ADVALORUM","satuan_spesifik":null,"jumlah_satuan":65,"jenis_satuan":"PCE","jumlah_kemasan":8,"jenis_kemasan":"PK","ppn_tarif":10,"pph_tarif":7.5,"ppnbm_tarif":0,"nilai_pabean":8674746.56012048,"fob":895.8074,"insurance":22.4141,"freight":109.0257,"cif":1027.2472,"bm":868000,"cukai":0,"ppn":955000,"pph":716000,"ppnbm":0,"valuta":"USD","ndpbm":8444.6534,"long_description":"Cupiditate enim.\n-- brutto 18.7551 KG\n\n--> IMEI : Voluptas natus necessitatibus molestiae laudantium molestiae sit ad.","short_description":"Cupiditate enim.","brutto":18.7551},{"hs_code":"84518000","bm_tarif":10,"bm_tarif_hs":0,"jenis_tarif_bm":"ADVALORUM","satuan_spesifik":null,"jumlah_satuan":56,"jenis_satuan":"PCE","jumlah_kemasan":4,"jenis_kemasan":"PX","ppn_tarif":10,"pph_tarif":7.5,"ppnbm_tarif":0,"nilai_pabean":5481706.57336356,"fob":539.767,"insurance":58.803,"freight":50.5634,"cif":649.1334,"bm":549000,"cukai":0,"ppn":604000,"pph":453000,"ppnbm":0,"valuta":"USD","ndpbm":8444.6534,"long_description":"Sunt labore.\n-- brutto 15.8748 KG\n\n--> MAC ADDRESS : Eveniet odio voluptatum qui nostrum earum recusandae doloribus quidem rem praesentium dicta.","short_description":"Sunt labore.","brutto":15.8748},{"hs_code":"85013222","bm_tarif":10,"bm_tarif_hs":10,"jenis_tarif_bm":"ADVALORUM","satuan_spesifik":null,"jumlah_satuan":16,"jenis_satuan":"PCE","jumlah_kemasan":20,"jenis_kemasan":"RO","ppn_tarif":10,"pph_tarif":7.5,"ppnbm_tarif":0,"nilai_pabean":9885138.154645298,"fob":968.4549,"insurance":98.2946,"freight":103.83,"cif":1170.5794999999998,"bm":989000,"cukai":0,"ppn":1088000,"pph":816000,"ppnbm":0,"valuta":"USD","ndpbm":8444.6534,"long_description":"Rerum aut minima ipsa natus eaque.\n-- brutto 2.6696 KG","short_description":"Rerum aut minima ipsa natus eaque.","brutto":2.6696}],"data_pembebasan":{"nilai_pembebasan":"1000.0000","valuta":"USD","ndpbm":"14760.0000","nilai_pembebasan_rp":14760000,"nilai_dasar_perhitungan":17866068.725730516,"tarif_bm_universal":10},"catatan":null,"jenis_pembayaran":"TUNAI"}';
$b64 = "YToxMTp7czo4OiJrb21lcnNpbCI7YjowO3M6OToicHBoX3RhcmlmIjtzOjY6IjcuNTAwMCI7czoxMToicHBuYm1fdGFyaWYiO2Q6MDtzOjg6InRvdGFsX2JtIjtkOjI0OTAwMDtzOjExOiJ0b3RhbF9jdWthaSI7aTowO3M6OToidG90YWxfcHBuIjtkOjI3NDAwMDtzOjk6InRvdGFsX3BwaCI7ZDoyMDUwMDA7czoxMToidG90YWxfcHBuYm0iO2Q6MDtzOjE0OiJ0b3RhbF9ibV9wYWphayI7ZDo3MjgwMDA7czoxNjoiZGF0YV9wZXJoaXR1bmdhbiI7YToyOntpOjA7YToyNzp7czo3OiJoc19jb2RlIjtzOjg6Ijg0MTM1MDMyIjtzOjg6ImJtX3RhcmlmIjtkOjEwO3M6MTE6ImJtX3RhcmlmX2hzIjtkOjU7czoxNDoiamVuaXNfdGFyaWZfYm0iO3M6OToiQURWQUxPUlVNIjtzOjE1OiJzYXR1YW5fc3Blc2lmaWsiO047czoxMzoianVtbGFoX3NhdHVhbiI7aTo1ODtzOjEyOiJqZW5pc19zYXR1YW4iO3M6MjoiRUEiO3M6MTQ6Imp1bWxhaF9rZW1hc2FuIjtpOjc7czoxMzoiamVuaXNfa2VtYXNhbiI7czoyOiJSTyI7czo5OiJwcG5fdGFyaWYiO2Q6MTA7czo5OiJwcGhfdGFyaWYiO2Q6Ny41O3M6MTE6InBwbmJtX3RhcmlmIjtkOjA7czoxMjoibmlsYWlfcGFiZWFuIjtkOjUxNjkwNzIuMTYwNTA1NTI7czozOiJmb2IiO2Q6ODQzLjMzNTE7czo5OiJpbnN1cmFuY2UiO2Q6MTEuOTk3MjtzOjc6ImZyZWlnaHQiO2Q6NDAuOTkyMTtzOjM6ImNpZiI7ZDo4OTYuMzI0NDAwMDAwMDAwMTtzOjI6ImJtIjtkOjUxNzAwMDtzOjU6ImN1a2FpIjtpOjA7czozOiJwcG4iO2Q6NTY5MDAwO3M6MzoicHBoIjtkOjQyNzAwMDtzOjU6InBwbmJtIjtkOjA7czo2OiJ2YWx1dGEiO3M6MzoiSU5SIjtzOjU6Im5kcGJtIjtkOjU3NjYuOTY1ODtzOjE2OiJsb25nX2Rlc2NyaXB0aW9uIjtzOjIwODoiRG9sb3JpYnVzIG5paGlsIG1vbGVzdGlhZSBxdWlhIHZvbHVwdGFzIGF1dCBtaW5pbWEuCi0tIGJydXR0byAyNC44MDQ3IEtHCgotLT4gU0VSSUFMIE5VTUJFUiA6IFBlcmZlcmVuZGlzIGl0YXF1ZSBwZXJzcGljaWF0aXMgZXQgbmF0dXMgYXNwZXJuYXR1ciBjb21tb2RpLjsgCi0tPiBJTVNJIDogQ29ycG9yaXMgbWFpb3JlcyBpc3RlIGV0IG5lY2Vzc2l0YXRpYnVzLiI7czoxNzoic2hvcnRfZGVzY3JpcHRpb24iO3M6NTE6IkRvbG9yaWJ1cyBuaWhpbCBtb2xlc3RpYWUgcXVpYSB2b2x1cHRhcyBhdXQgbWluaW1hLiI7czo2OiJicnV0dG8iO2Q6MjQuODA0Nzt9aToxO2E6Mjc6e3M6NzoiaHNfY29kZSI7czo4OiI4NDgzMTAzOSI7czo4OiJibV90YXJpZiI7ZDoxMDtzOjExOiJibV90YXJpZl9ocyI7ZDo1O3M6MTQ6ImplbmlzX3RhcmlmX2JtIjtzOjk6IkFEVkFMT1JVTSI7czoxNToic2F0dWFuX3NwZXNpZmlrIjtOO3M6MTM6Imp1bWxhaF9zYXR1YW4iO2k6OTA7czoxMjoiamVuaXNfc2F0dWFuIjtzOjI6IkVBIjtzOjE0OiJqdW1sYWhfa2VtYXNhbiI7aToyMDtzOjEzOiJqZW5pc19rZW1hc2FuIjtzOjI6IlBYIjtzOjk6InBwbl90YXJpZiI7ZDoxMDtzOjk6InBwaF90YXJpZiI7ZDo3LjU7czoxMToicHBuYm1fdGFyaWYiO2Q6MDtzOjEyOiJuaWxhaV9wYWJlYW4iO2Q6NDY5NDU5Mi4xNjU4Mjc2MjtzOjM6ImZvYiI7ZDo2MTMuNTI3NztzOjk6Imluc3VyYW5jZSI7ZDo1Ny43Njk5O3M6NzoiZnJlaWdodCI7ZDoxNDIuNzUxMztzOjM6ImNpZiI7ZDo4MTQuMDQ4OTtzOjI6ImJtIjtkOjQ3MDAwMDtzOjU6ImN1a2FpIjtpOjA7czozOiJwcG4iO2Q6NTE3MDAwO3M6MzoicHBoIjtkOjM4ODAwMDtzOjU6InBwbmJtIjtkOjA7czo2OiJ2YWx1dGEiO3M6MzoiSU5SIjtzOjU6Im5kcGJtIjtkOjU3NjYuOTY1ODtzOjE2OiJsb25nX2Rlc2NyaXB0aW9uIjtzOjE0MToiQWxpYXMgaGFydW0uCi0tIGJydXR0byAxOC40OTk4IEtHCgotLT4gSU1TSSA6IE5lbW8gaGFydW0gZXQgcXVpIGRvbG9yZW0gZGlzdGluY3RpbyBkZWxlY3R1cyBpcHN1bSBhdXQgZXN0IHBlcmZlcmVuZGlzIHZvbHVwdGF0ZSBzaXQgaW5jaWR1bnQuIjtzOjE3OiJzaG9ydF9kZXNjcmlwdGlvbiI7czoxMjoiQWxpYXMgaGFydW0uIjtzOjY6ImJydXR0byI7ZDoxOC40OTk4O319czoxNToiZGF0YV9wZW1iZWJhc2FuIjthOjY6e3M6MTY6Im5pbGFpX3BlbWJlYmFzYW4iO3M6ODoiNTAwLjAwMDAiO3M6NjoidmFsdXRhIjtzOjM6IlVTRCI7czo1OiJuZHBibSI7czoxMDoiMTQ3NjAuMDAwMCI7czoxOToibmlsYWlfcGVtYmViYXNhbl9ycCI7ZDo3MzgwMDAwO3M6MjM6Im5pbGFpX2Rhc2FyX3BlcmhpdHVuZ2FuIjtkOjI0ODM2NjQuMzI2MzMzMTM5O3M6MTg6InRhcmlmX2JtX3VuaXZlcnNhbCI7ZDoxMDt9fQ==";

$data = unserialize(base64_decode($b64));

// var_dump($data);
// print_r($data);
$nilai_impor = $data['total_bm'] + $data['data_pembebasan']['nilai_dasar_perhitungan'];


function font($style = '', $color=[0,0,0]) {
    global $pdf;
    $pdf->SetFont('Arial', $style, 8);
    $pdf->SetTextColor($color[0], $color[1], $color[2]);
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

// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

// Title
$pdf->Ln();
$pdf->SetX($row_x + 7);
$pdf->Cell(63, 4, 'BEA MASUK DAN PAJAK', 0, 2);
font('BI');
$pdf->Cell(63, 4, 'TAX AND DUTY', 0, 1);

// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

// 10. Bea Masuk
font();
$pdf->SetX($row_x + 7);
$pdf->Cell(63, 4, "(10) Bea Masuk: [(9) x 10%]", 0, 2);
font('I');
$pdf->Cell(63, 4, 'Customs Duty', 0, 0);

font('B');
$pdf->Cell(0, 4, number_format($data['total_bm'], 2), 0, 1, 'R');

$pdf->Line($row_x, $pdf->GetY(), 287, $pdf->GetY());

// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

// 11. Nilai Impor
font('',[255, 0, 0]);
$pdf->SetX($row_x + 7);
$pdf->Cell(63, 4, "(11) Nilai Impor: [(9)+(10)]", 0, 2);
font('I',[255, 0, 0]);
$pdf->Cell(63, 4, 'Import Value', 0, 0);

font('B',[255, 0, 0]);

$pdf->SetX($row_x + 7 + 63 + 22.5 + 22.5 + 22.5 + 25 + 14.5 );
$pdf->Cell(30, 4, number_format($nilai_impor, 2), 0, 1, 'R');

$pdf->Line($row_x, $pdf->GetY(), 287, $pdf->GetY());

// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

// 12. PPN
font();
$pdf->SetX($row_x + 7);
$pdf->Cell(63, 4, "(12) PPN: [(11) x 10%]", 0, 2);
font('I');
$pdf->Cell(63, 4, 'Value Added Tax', 0, 0);

font('B');
$pdf->Cell(0, 4, number_format($data['total_ppn'], 2), 0, 1, 'R');

$pdf->Line($row_x, $pdf->GetY(), 287, $pdf->GetY());

// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

// 13. PPh
font();
$pdf->SetX($row_x + 7);
$pdf->Cell(63, 4, "(13) PPh: [(11) x ". number_format($data['pph_tarif'], 2) ."%]", 0, 2);
font('I');
$pdf->Cell(63, 4, 'Value Added Tax', 0, 0);

font('B');
$pdf->Cell(0, 4, number_format($data['total_pph'], 2), 0, 1, 'R');

$pdf->Line($row_x, $pdf->GetY(), 287, $pdf->GetY());

// record row_x row_y
$row_x  = $pdf->GetX();
$row_y  = $pdf->GetY();

// 14. Total
font('B');
$pdf->SetX($row_x + 7);
$pdf->Cell(63, 4, "Total Bea Masuk dan Pajak", 0, 2);
font('BI');
$pdf->Cell(63, 4, 'Total Duty and Tax', 0, 0);

font('B');
$pdf->Cell(0, 4, number_format($data['total_bm_pajak'], 2), 0, 1, 'R');
$pdf->Line($row_x, $pdf->GetY(), 287, $pdf->GetY());
$pdf->Line($row_x, $pdf->GetY() + 1, 287, $pdf->GetY() + 1);


$pdf->Output('I', 'perhitungan.pdf');