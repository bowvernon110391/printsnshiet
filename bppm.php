<?php

use Fpdf\Fpdf;

include 'vendor/autoload.php';

// ====================================================================================================================
$nama_kantor    = 'KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE C SOEKARNO HATTA';
$kode_kantor    = '050100';

$jenis_penerimaan_negara    = 'IMPOR';

$jenis_identitas    = 'PASPOR';
$no_identitas       = '39823-2131232-XXYA';
$nama_penumpang     = 'Boris Johnson';
$alamat             = 'JL. Jend. Hasanuddin no 53, kav. 36, Jakarta asd asd qwdqwdqw dqw d qwd qwd qw dqw dqw d qw';

$jenis_dokumen_dasar    = 'CUSTOMS DECLARATION (BC 2.2)';
$nomor_dokumen_dasar    = '000003/CD/T2F/SH/2020';
$tgl_dokumen_dasar      = '02-03-2020';

$data_pungutan  = [
    [
        'nama_akun' => 'Bea Masuk',
        'kode_akun' => '412111',
        'jumlah_pungutan'   => 1350000,
        'no_identitas'      => '-',
        'is_pajak'          => false
    ],
    [
        'nama_akun' => 'PPN Impor',
        'kode_akun' => '411212',
        'jumlah_pungutan'   => 2050000,
        'no_identitas'      => '-',
        'is_pajak'          => false
    ],
    [
        'nama_akun' => 'PPh Pasal 22 Impor',
        'kode_akun' => '411123',
        'jumlah_pungutan'   => 4100000,
        'no_identitas'      => '-',
        'is_pajak'          => false
    ]

];
// ====================================================================================================================

$p = new Fpdf('P', 'mm', 'A4');
$p->SetAutoPageBreak(true);

$p->SetMargins(20, 20, 15);

// add new page
$p->AddPage();
$p->SetFont('Arial', '', 8);

// current pos
$currX  = $p->GetX();
$currY  = $p->GetY();

// KOP SURAT
// output image
$p->Image('icon-kemenkeu-grayscale.jpg', null, null, 15, 15);

$p->SetXY($currX + 17.5, $currY);

$p->SetFont('Arial', '', 9);
$p->Cell(0, 5, 'KEMENTERIAN KEUANGAN REPUBLIK INDONESIA', 0, 2);

$p->SetFont('Arial', '', 8);
$p->Cell(0, 5, 'DIREKTORAT JENDERAL BEA DAN CUKAI', 0, 2);

$p->Cell(0, 5, 'Kantor     : ' . $nama_kantor, 0, 1);

$p->Ln(1);
$p->SetLineWidth(0.5);
$p->Line($p->GetX(), $p->GetY(), $p->GetX() + 175, $p->GetY());
// $p->Ln(1);

// Body
$p->SetFont('Arial', '', 8);

// Kode kantor
$p->Cell(0, 6, 'Kode Kantor         : ' . $kode_kantor, 0, 1);

$p->SetLineWidth(0.3);
$p->Line($p->GetX(), $p->GetY(), $p->GetX() + 175, $p->GetY());

// BUKTI PENERIMAAN PEMBAYARAN MANUAL (BPPM)
$p->SetFont('Arial', 'B', 12);
$p->MultiCell(0, 6, "BUKTI PENERIMAAN PEMBAYARAN MANUAL\n(BPPM)", 0, 'C');

$p->Line($p->GetX(), $p->GetY(), $p->GetX() + 175, $p->GetY());

$colon  = " :  ";

$p->SetFont('Arial', '', 8);
// A. JENIS PENERIMAAN NEGARA
$p->Cell(52.5, 6, 'A. JENIS PENERIMAAN NEGARA', 'RB', 0);
$p->Cell(0, 6, $colon . $jenis_penerimaan_negara, 'LB', 1);
// B. JENIS IDENTITAS
$p->Cell(52.5, 6, 'B. JENIS IDENTITAS', 'RB', 0);
$p->Cell(0, 6, $colon . $jenis_identitas, 'LB', 1);

$currX  = $p->GetX();
$currY  = $p->GetY();

// B1. NOMOR
$p->SetX($currX + 5);   $p->Cell(47.5, 6, 'NOMOR', 'LRB', 0);
$p->Cell(0, 6, $colon . $no_identitas, 'LB', 1);
// B2. NAMA
$p->SetX($currX + 5);   $p->Cell(47.5, 6, 'NAMA', 'LRB', 0);
$p->Cell(0, 6, $colon . $nama_penumpang, 'LB', 1);
// B3. ALAMAT (special case)
$currX  = $p->GetX();
$currY  = $p->GetY();

$p->SetX($currX + 5);   $p->Cell(47.5, 6, 'ALAMAT', 0, 0);
$p->Cell(3, 6, $colon, 0, 0);
$p->MultiCell(0, 6, $alamat, 0, 'L');

// grab new y
$rect_h = $p->GetY() - $currY;
// draw rectangle
// $p->Rect(25, $currY, 170, $rect_h);
$p->Line(25, $currY, 25, $currY + $rect_h);
$p->Line(72.5, $currY, 72.5, $currY + $rect_h);

// C. DOKUMEN DASAR PEMBAYARAN
$p->Cell(52.5, 6, 'C. DOKUMEN DASAR PEMBAYARAN', 'TRB', 0);
$p->Cell(0, 6, $colon . $jenis_dokumen_dasar, 'TLB', 1);

// C1. NOMOR
$p->SetX($currX + 5);   $p->Cell(47.5, 6, 'NOMOR', 'LRB', 0);
$p->Cell(72.5, 6, $colon . $nomor_dokumen_dasar, 1, 0);

// C2. Tanggal
$p->SetX($currX + 125); $p->Cell(0, 6, 'Tanggal : ' . $tgl_dokumen_dasar, 'LB', 1);

// D. PEMBAYARAN PENERIMAAN NEGARA
$p->Cell(0, 6, 'D. PEMBAYARAN PENERIMAAN NEGARA', 'TB', 1);

// record currX and y
$currX  = $p->GetX();
$currY  = $p->GetY();

// AKUN, KODE AKUN, JUMLAH PEMBAYARAN
$p->SetX($currX+5); 
$p->Cell(85, 6, 'AKUN', 1, 0, 'C');
$p->Cell(35, 6, 'KODE AKUN', 1, 0, 'C');
$p->Cell(0, 6, 'JUMLAH PEMBAYARAN', 'TBL', 1, 'C');

foreach ($data_pungutan as $d) {
    
}

// output
$p->Output('I', 'doc.pdf');