<?php

use Fpdf\Fpdf;

include 'vendor/autoload.php';

// data required
$A_nama   = "Tri Mulyadi Wibowo";
$A_alamat = "Gg. Masjid no 50/a RT 02/02, Cipondoh, Tangerang";
$A_no_paspor = "9239293";

$G_no_dok = '002034/IS/T2F/SH/2020';
$G_tgl_dok = '2020-01-23';

$B_nama = "Asosiasi Pecinta Mobil Klasik Indonesia";
$B_alamat = "JL. Taruna Bakti no. 32, Kel. Pegangsaan Timur, Jakarta Utara";
$B_no_telp = "(021) 5567940";
$B_no_identitas = "367102939912000";

// data invoice bisa timbul beberapa kali
$invoice = [
    /* [
        'no_dok'    => "INV-392131211131312313/SEP/2019",
        'tgl_dok'   => "2019-12-31"
    ], */
    [
        'no_dok'    => "INV-3921312/SEP/2019",
        'tgl_dok'   => "2019-12-31"
    ]
];

$nama_sarana_pengangkut = "SINGAPORE AIRLINES";
$no_flight = "QZ 8971";

$tgl_perkiraan_keluar = '2020-03-21';

$C_lokasi_penggunaan = 'JAKARTA';
$C_tujuan_penggunaan = 'Event olahraga Sea Games 2024';

$pelabuhan_masuk = "Cengkareng / Sukarno Hatta (u) (IDCGK)";
$pelabuhan_keluar = "Denpasar / Ngurah Rai (u) (IDDPS)";

$opsi_pengembalian_jaminan = 1;

$no_rek     = "001678829912330210";
$nama_rek   = "Tri Mulyadi Wibowo";
$bank_rek   = "BANK TABUNGAN NEGARA PERSERO TBK";

//===============================================================================================
// actual pdf gen
//===============================================================================================
$pdf = new Fpdf('P', 'mm', 'A4');
$pdf->SetAutoPageBreak(true);

// 1st Page
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', '8');

// kop
$pdf->Cell(0, 4, "FORMULIR IMPOR SEMENTARA", 0, 1, 'C');
$pdf->Cell(0, 5, "BARANG PRIBADI PENUMPANG DAN BARANG PRIBADI AWAK SARANA PENGANGKUT", 0, 1, 'C');

// halaman x dari y
$pdf->Cell(0, 4, "Halaman 1 dari " . $pdf->PageNo(), 1, 1, 'R');

$row_x = $pdf->GetX();
$row_y = $pdf->GetY();

//=====================================================================================================
// 1st ROW
//=====================================================================================================
// A. Data Pemberitahu
$pdf->SetFont('Arial', 'B', '8');
$pdf->Cell(75, 4, 'A. DATA PEMBERITAHU', 0, 1);

$rowlast_x = $pdf->GetX();
$rowlast_y = $pdf->GetY();

// Now draw it?
$pdf->SetFont('Arial', '', '8');
$pdf->SetX(15);
$pdf->Cell(30, 4, '1. Nama Lengkap       :', 0, 0);
$pdf->SetX(45);
$pdf->MultiCell(55, 4, $A_nama);
// $pdf->Ln();


$pdf->SetX(15);
$pdf->Cell(30, 4, '2. Alamat Lengkap     :', 0, 0);
$pdf->SetX(45);
$pdf->MultiCell(55, 4, $A_alamat);
// $pdf->Ln();

$pdf->SetX(15);
$pdf->Cell(30, 4, '3. Nomor Paspor        :', 0, 0);
$pdf->SetX(45);
$pdf->MultiCell(55, 4, $A_no_paspor);

// record max y, for drawing rectangle later
$max_row_y = $pdf->GetY();

// $pdf->Rect($row_x, $row_y, 95, $max_row_y-$row_y);

// G. Kolom Khusus bea dan cukai
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetXY(105, $row_y);    // ABOUT HALF PAGE WIDTH
$pdf->Cell(75, 4, 'G. KOLOM KHUSUS BEA DAN CUKAI', 0, 2);

// fill data
$rowlast_x = $pdf->GetX();
$rowlast_y = $pdf->GetY();

// Now draw it?
$pdf->SetFont('Arial', '', '8');
$pdf->SetX(5 + $rowlast_x);
$pdf->Cell(15, 4, 'Nomor    :', 0, 0);
$pdf->SetX(20 + $rowlast_x);
$pdf->MultiCell(55, 4, $G_no_dok, 0, 'L');

$pdf->SetX(5 + $rowlast_x);
$pdf->Cell(15, 4, 'Tanggal  :', 0, 0);
$pdf->SetX(20 + $rowlast_x);
$pdf->MultiCell(55, 4, $G_tgl_dok, 0, 'L');

$max_row_y = max($max_row_y, $pdf->GetY());

// finally, draw 2 rectangle
$pdf->Rect($row_x, $row_y, 95, $max_row_y-$row_y);
$pdf->Rect($row_x+95, $row_y, 95, $max_row_y-$row_y);

$pdf->SetY($max_row_y);

//=====================================================================================================
// 2nd ROW
//=====================================================================================================
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();

$last_y = $pdf->GetY();
// B. Data Sponsor
$pdf->SetFont('Arial', 'B', '8');
$pdf->Cell(75, 4, 'B. DATA SPONSOR', 0, 1);

$rowlast_x = $pdf->GetX();
$rowlast_y = $pdf->GetY();

// Now draw it?
$pdf->SetFont('Arial', '', '8');
$pdf->SetX(15);
$pdf->Cell(30, 4, '4. Nama Lengkap       :', 0, 0);
$pdf->SetX(45);
$pdf->MultiCell(55, 4, $B_nama);
// $pdf->Ln();


$pdf->SetX(15);
$pdf->Cell(30, 4, '5. Alamat di Indonesia:', 0, 0);
$pdf->SetX(45);
$pdf->MultiCell(55, 4, $B_alamat);
// $pdf->Ln();

$pdf->SetX(15);
$pdf->Cell(30, 4, '6. Nomor Telepon       :', 0, 0);
$pdf->SetX(45);
$pdf->MultiCell(55, 4, $B_no_telp);

$pdf->SetX(15);
$pdf->Cell(30, 4, '7. Nomor Identitas      :', 0, 0);
$pdf->SetX(45);
$pdf->MultiCell(55, 4, $B_no_identitas);

// record max y
$max_row_y = $pdf->GetY();

// draw rectangle for DATA SPONSOR


// RIGHT SIDE
// invoice, dst

// fill data
$rowlast_x = 105;
$rowlast_y = $pdf->GetY();

// Now draw it?
$pdf->SetFont('Arial', '', '8');
// $pdf->SetX(5 + $rowlast_x);
// $pdf->SetY($rowlast_y);
$pdf->SetXY($rowlast_x, $last_y);
$pdf->Cell(15, 4, '10. Invoice no   :', 0, 0);

$pdf->SetXY($rowlast_x + 70, $last_y);
$pdf->Cell(5, 4, "Tgl.", 0, 0);

// multiple multicell, record each cell's height
$start_y = 0;
$max_y = 0;
foreach ($invoice as $inv) {
    $start_y = $start_y ? $start_y : $pdf->GetY();

    $pdf->SetX(25 + $rowlast_x);
    $pdf->MultiCell(35, 4, $inv['no_dok'], 0, 'L');
    
    $max_y = $pdf->GetY();

    // Tanggal
    $pdf->SetXY(77 + $rowlast_x, $last_y);
    $pdf->MultiCell(20, 4, $inv['tgl_dok'], 0, 'L');

    // record max y
    $max_y = max($max_y, $pdf->GetY());

    // set Y
    $pdf->SetY($max_y);
    $last_y = $pdf->GetY();
}

/* $pdf->SetX(5 + $rowlast_x);
$pdf->Cell(15, 4, 'Tanggal  :', 0, 0);
$pdf->SetX(20 + $rowlast_x);
$pdf->MultiCell(55, 4, $G_tgl_dok, 0, 'L'); */

$last_y = $pdf->GetY();

// draw rectangle for invoice data
$pdf->Rect($row_x + 95, $row_y, 70, $last_y-$row_y);
$pdf->Rect($row_x + 95 + 70, $row_y, 25, $last_y-$row_y);

// 11. Nama Sarana Pengangkut & No Voy/Flight
$start_y = $pdf->GetY();

$pdf->SetX($rowlast_x);
$pdf->Cell(0, 4, "11. Nama Sarana Pengangkut & No. Voy/Flight : ", 0, 2);

$pdf->SetX($rowlast_x + 5);
$pdf->Cell(0, 4, "{$nama_sarana_pengangkut} / {$no_flight}", 0, 1);

$last_y = $pdf->GetY();

// draw rectangle for nama srn angkut
$pdf->Rect($row_x + 95, $start_y, 95, $last_y-$start_y);


// 12. Perkiraan Tanggal Keluar
$start_y = $pdf->GetY();

$pdf->SetX($rowlast_x);
$pdf->Cell(0, 4, "12. Perkiraan Tanggal Keluar :", 0, 2);

$pdf->SetX($rowlast_x + 5);
$pdf->Cell(0, 4, $tgl_perkiraan_keluar, 0, 1);

$max_row_y = max($max_row_y, $pdf->GetY());

// DRAW RECTANGLE FOR SPONSOR AND PERKIRAAN TANGGAL KELUAR (USE MAX HEIGHT)
$pdf->Rect($row_x, $row_y, 95, $max_row_y-$row_y);
$pdf->Rect($row_x+95, $row_y, 95, $max_row_y-$row_y);

$pdf->Ln();

//=====================================================================================================
// 3rd ROW
//=====================================================================================================
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();

$last_y = $pdf->GetY();
// C. Data Penggunaan Barang
$pdf->SetFont('Arial', 'B', '8');
$pdf->Cell(75, 4, 'C. DATA PENGGUNAAN BARANG', 0, 1);

$pdf->SetFont('Arial', '', '8');
$pdf->SetX(15);
$pdf->Cell(30, 4, '8. Lokasi Penggunaan :', 0, 0);
$pdf->SetX(45);
$pdf->MultiCell(55, 4, $C_lokasi_penggunaan);

$pdf->SetX(15);
$pdf->Cell(30, 4, '9. Tujuan Penggunaan :', 0, 0);
$pdf->SetX(45);
$pdf->MultiCell(55, 4, $C_tujuan_penggunaan);

$max_row_y = $pdf->GetY();

// RIGHT SIDE
// 13. Pelabuhan Masuk
$start_y = $row_y;

$pdf->SetXY($row_x + 95, $row_y);
$pdf->Cell(30, 4, "13. Pelabuhan Masuk :", 0, 2);
$pdf->SetX($pdf->GetX() + 5);
$pdf->Cell(0, 4, $pelabuhan_masuk, 0, 1);

$last_y = $pdf->GetY();
// draw rectangle for pelabuhan masuk
$pdf->Rect($row_x + 95, $row_y, 95, $last_y - $start_y);

// 14. Pelabuhan Keluar
$start_y = $pdf->GetY();

$pdf->SetX($row_x + 95);
$pdf->Cell(30, 4, "14. Pelabuhan Keluar :", 0, 2);
$pdf->SetX($pdf->GetX() + 5);
$pdf->Cell(0, 4, $pelabuhan_keluar, 0, 1);

$max_row_y = max($max_row_y, $pdf->GetY());

// draw rect for DATA PENGGUNAAN BARANG AND Pelabuhan Keluar
$pdf->Rect($row_x, $row_y, 95, $max_row_y-$row_y);
$pdf->Rect($row_x + 95, $row_y, 95, $max_row_y-$row_y);

// $pdf->Ln();

//=====================================================================================================
// 4th ROW
//=====================================================================================================
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();

$last_y = $pdf->GetY();
// D. Pengembalian Jaminan
$pdf->SetFont('Arial', 'B', '8');
$pdf->Cell(75, 4, 'D. PENGEMBALIAN JAMINAN', 0, 1);

$pdf->SetFont('Arial', '', '8');
$pdf->SetX($row_x + 5);
$pdf->Cell(18, 4, "15. Melalui :");

// draw small rect
$pdf->Rect($pdf->GetX(), $pdf->GetY(), 5, 4);
$pdf->Cell(5, 4, $opsi_pengembalian_jaminan);

// draw dummy options
$pdf->SetX($row_x + 45);
$pdf->MultiCell(45, 4, "1. Diambil sendiri\n2. Sponsor\n3. Transfer Rekening");

$max_row_y = $pdf->GetY();

// RIGHT SIDE!!!
$pdf->SetXY($row_x + 95, $row_y);
$pdf->Cell(30, 4, "16. Rekening", 0, 2);

$pdf->SetX($pdf->GetX() + 5);
$pdf->Cell(0, 4, "Nomor       : " . $no_rek, 0, 2);

$pdf->SetX($pdf->GetX());
$pdf->Cell(0, 4, "Atas nama : " . $nama_rek, 0, 2);

$pdf->SetX($pdf->GetX());
$pdf->Cell(0, 4, "Bank          : " . $bank_rek, 0, 1);

$max_row_y = max($max_row_y, $pdf->GetY());

// draw rectangle for PENGEMBALIAN JAMINAN AND REKENING
$pdf->Rect($row_x, $row_y, 95, $max_row_y - $row_y);
$pdf->Rect($row_x + 95, $row_y, 95, $max_row_y - $row_y);

// E. DATA BARANG
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(0, 4, "E. DATA BARANG", 1, 1);

// PRINT!!
$pdf->Output('I', 'is.pdf');