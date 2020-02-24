<?php

use Fpdf\Fpdf;

include './vendor/autoload.php';

// ========================================================================
// data surat
$no_lengkap     = '200312/SPP/2F/SH/2020';
$tgl_surat      = '01-03-2020';

$nama   = "TRI MULYADI WIBOWO";
$alamat = "GG. MASJID NO 50 A, RT 02/RW 02, KEL. KENANGA, KEC. CIPONDOH, KOTA TANGERANG, BANTEN";
$no_paspor  = "290103-2323-22132";
$kebangsaan = "INDONESIA";
$no_flight  = "GA 871";
$negara_asal    = "JAPAN";
$summary_jumlah = "2PK, 3BX; 21 Kg";
$uraian_summary = [
    "1. Sepeda Brompton",
    "2. Tas Louis Vutton BR323CI Gold Series"
];

$keterangan = "DITUNDA PENGELUARANNYA DIKARENAKAN YBS TIDAK DAPAT MEMENUHI KEWAJIBAN PABEAN ATAS BARANG BAWAANNYA";
// ========================================================================


$p = new Fpdf('P', 'mm', 'A4');
$p->SetAutoPageBreak(true);

$p->SetMargins(12, 12);
$p->AddPage();
$p->Rect(10, 10, 210-20, 297-20);

// set font
$p->SetFont('Arial', '', 8);

$currX  = $p->GetX();
$currY  = $p->GetY();

// $p->SetXY($currX + 2, $currY + 2);
$p->Cell(0, 4, "KEMENTERIAN KEUANGAN REPUBLIK INDONESIA", 0, 2);
$p->Cell(0, 4, "DIREKTORAT JENDERAL BEA DAN CUKAI", 0, 2);
$p->Cell(0, 4, "KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE C SOEKARNO HATTA", 0, 2);
$p->Ln(8);

// Kop surat
$p->SetFont('Arial', 'BU', 8);
$p->Cell(0, 4, 'PERSETUJUAN PENANGGUHAN PENGELUARAN', 0, 1, 'C');
$p->SetFont('Arial', 'BI', 8);
$p->Cell(0, 4, 'RELEASE POSTPONEMENT APPROVAL', 0, 1, 'C');

// no + tgl surat
$p->SetFont('Arial', '', 8);
$p->Cell(0, 4, "No. : {$no_lengkap}  Tanggal : {$tgl_surat}", 0, 1, 'C');

$p->Ln();

$tabPos = $currX + 42.5;

// Nama
$p->Cell($p->GetStringWidth("Nama/"), 4, "Nama/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'Name');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(5, 4, ":");
$p->Cell(0, 4, $nama, 0, 1);

$p->Ln(1);

// Alamat
$p->Cell($p->GetStringWidth("Alamat/"), 4, "Alamat/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'Address');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(5, 4, ":");
// $p->Cell(0, 4, $alamat, 0, 1);
$p->MultiCell(0, 4, $alamat, 0, 'J');

$p->Ln(1);

// Nama
$p->Cell($p->GetStringWidth("Paspor/"), 4, "Paspor/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'Passport No.');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(5, 4, ":");
$p->Cell(0, 4, $no_paspor, 0, 1);

$p->Ln(1);

// Kebangsaan
$p->Cell($p->GetStringWidth("Kebangsaan/"), 4, "Kebangsaan/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'Nationality');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(5, 4, ":");
$p->Cell(0, 4, $kebangsaan, 0, 1);

$p->Ln(1);

// No flight
$p->SetFont('Arial', 'I');
$p->Cell($p->GetStringWidth("Flight / "), 4, "Flight / ");
$p->Cell(0, 4, 'Voyage No.');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(5, 4, ":");
$p->Cell(0, 4, $no_flight, 0, 1);
$p->Ln(1);

// Asal
$p->Cell($p->GetStringWidth("Asal/"), 4, "Asal/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'Country of Origin');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(5, 4, ":");
$p->Cell(0, 4, $negara_asal, 0, 1);

$p->Ln(1);

// Jumlah
$p->Cell($p->GetStringWidth("Jumlah/"), 4, "Jumlah/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'Quantity');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(5, 4, ":");
$p->Cell(0, 4, $summary_jumlah, 0, 1);

$p->Ln(1);

// Uraian Barang
$p->Cell($p->GetStringWidth("Uraian Barang/"), 4, "Uraian Barang/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'Description');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(5, 4, ":");
// $p->Cell(0, 4, $summary_jumlah, 0, 1);
foreach ($uraian_summary as $uraian) {
    $p->Cell(0, 4, $uraian, 0, 2);
}

$p->Ln(1);

// Keterangan
$p->Cell($p->GetStringWidth("Keterangan/"), 4, "Keterangan/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'Other Detail');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(5, 4, ":");
// $p->Cell(0, 4, $keterangan, 0, 1);
$p->MultiCell(0, 4, $keterangan);

$p->Ln();

// PENGHITUNGAN BEA MASUK DAN PAJAK IMPUR (JIKA DIPERLUKAN)

$p->SetFont('Arial', 'bU', 8);
$p->Cell(0, 4, 'PENGHITUNGAN BEA MASUK DAN PAJAK IMPOR (JIKA DIPERLUKAN)', 0, 1);
$p->SetFont('Arial', 'bI');
$p->Cell(0, 4, 'IMPORT DUTY AND TAX CALCULATION (IF NECESSARY)');

$p->Output('I','spp.pdf');