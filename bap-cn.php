<?php

use Fpdf\Fpdf;

include 'vendor/autoload.php';

$nomor_bap      = 'BAP-000021/KPU.03/BD.0303/2020';
$tanggal_bap    = '26-02-2020';

$gudang         = 'GAJT';

$pjt            = 'PT TIKI JNE INDONESIA';

// functions
// =====================================================================================================================
function tableHeader($p) {
    // $p = new FPDF();

    $p->SetFont('ARIAL', '', 8);

    $p->Cell(10, 4, 'No', 1, 0, 'C');   // No
    $p->Cell(30, 4, 'HAWB', 1, 0, 'C'); // HAWB
    $p->Cell(55, 4, 'PENERIMA', 1, 0, 'C'); // PENERIMA 
    $p->Cell(17.5, 4, 'KOLI', 1, 0, 'C'); // KOLI 
    $p->Cell(17.5, 4, 'KILO (KG)', 1, 0, 'C'); // KILO 
    $p->Cell(40, 4, 'KETERANGAN', 1, 0, 'C'); // KILO 
}

// =====================================================================================================================

$p = new Fpdf('P', 'mm', 'A4');

$p->SetAutoPageBreak(true, 80); // 8 cm bottom margin
$p->SetMargins(20, 20, 20);

// first page
$p->AddPage();

// Set font
$p->SetFont('Arial', '', 10);

$p->Cell(0, 5, 'KEMENTERIAN KEUANGAN REPUBLIK INDONESIA', 0, 1);
$p->Cell(0, 5, 'DIREKTORAT JENDERAL BEA DAN CUKAI', 0, 1);
$p->Cell(0, 5, 'KANTOR PELAYANAN UTAMA TIPE C SOEKARNO HATTA', 0, 1);

// grab x
$currX = $p->GetX();
$currY = $p->GetY();

// draw line
$p->SetLineWidth(0.5);
$p->Line($currX, $currY, 210-20, $currY);

// double space
$p->Ln(8);

// Berita acara pemeriksaan fisik barang impor
$p->SetFont('Arial', 'BU');
$p->Cell(0, 5, 'BERITA ACARA PEMERIKSAAN FISIK BARANG IMPOR', 0, 1, 'C');

$p->SetFont('Arial', '');
$p->Cell(0, 5, "NOMOR: {$nomor_bap} TANGGAL: {$tanggal_bap}", 0, 1, 'C');

// double space
$p->Ln(8);

// kalimat pembuka
$p->MultiCell(0, 5, "TERHADAP IMPOR BARANG CN/PIBK DENGAN DATA SEBAGAI BERIKUT TELAH DILAKUKAN PEMERIKSAAN FISIK BERSAMA PETUGAS PJT:");

$p->SetXY(105, $p->GetY()-5);
$p->SetFont('ARIAL', 'BU');
$p->Cell(0, 5, "({$pjt})");
$p->SetFont('ARIAL', '');

// single line
$p->Ln(10);

// reset line width
$p->SetLineWidth(0);

// table header
tableHeader($p);

$p->Output('I', 'bap.pdf');