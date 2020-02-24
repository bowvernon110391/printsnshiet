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
$summary_jumlah = "2PK, 3BX / 21 Kg";
$uraian_summary = [
    "1. Sepeda Brompton",
    "2. Tas Louis Vutton BR323CI Gold Series"
];

$keterangan = "DITUNDA PENGELUARANNYA DIKARENAKAN YBS TIDAK DAPAT MEMENUHI KEWAJIBAN PABEAN ATAS BARANG BAWAANNYA";

$kota_ttd   = "CENGKARENG";
$tgl_ttd    = "01 MARET 2020";

$nama_pejabat   = "SOPHIE TURNER";
$nip_pejabat    = "19900228201101001";
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
    $p->Cell(0, 4, strtoupper($uraian), 0, 2);
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
$p->SetFont('Arial', 'U', 8);
$p->Cell(0, 4, 'PENGHITUNGAN BEA MASUK DAN PAJAK IMPOR (JIKA DIPERLUKAN)', 0, 1);
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'IMPORT DUTY AND TAX CALCULATION (IF NECESSARY)');

$p->Ln(8);
// $p->Ln();

// update tabpos
$tabPos = $currX + 32.5;

$startX = $p->GetX();
$startY = $p->GetY();

// Nilai pabean
$p->Cell($p->GetStringWidth("NILAI PABEAN/"), 4, "NILAI PABEAN/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'CUSTOMS VALUE:', 0, 1);
$p->SetFont('Arial');

// Nilai Kurs/Curr.
$p->Cell($p->GetStringWidth("NILAI KURS/"), 4, "NILAI KURS/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'CURR.');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ":");
$p->Cell(30, 4, "-", 0, 1, 'C');

// FOB
// $p->Cell($p->GetStringWidth("NILAI KURS/"), 4, "NILAI KURS/");
// $p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'FOB');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ":");
$p->Cell(30, 4, "-", 0, 1, 'C');

// INSURANCE
// $p->Cell($p->GetStringWidth("NILAI KURS/"), 4, "NILAI KURS/");
// $p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'INSURANCE');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ":");
$p->Cell(30, 4, "-", 0, 1, 'C');

// FREIGHT
// $p->Cell($p->GetStringWidth("NILAI KURS/"), 4, "NILAI KURS/");
// $p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'FREIGHT');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ":");
$p->Cell(30, 4, "-", 0, 1, 'C');

// CIF
// $p->Cell($p->GetStringWidth("NILAI KURS/"), 4, "NILAI KURS/");
// $p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'CIF');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ":");
$p->Cell(30, 4, "-", 0, 1, 'C');

// draw some line
$currY  = $p->GetY();
$p->Line($tabPos, $currY, $tabPos + 50, $currY);
$p->Ln(1);

// NILAI PABEAN
// CIF
// $p->Cell($p->GetStringWidth("NILAI KURS/"), 4, "NILAI KURS/");
// $p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'NILAI PABEAN');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ": Rp.");
// $p->Cell(2.5, 4, "Rp. ");
$p->Cell(30, 4, "-", 0, 1, 'C');

// another column
$p->SetXY(108, $startY);
$tabPos = 108 + 39;

// PUNGUTAN NEGARA
$p->Cell($p->GetStringWidth("PUNGUTAN NEGARA/"), 4, "PUNGUTAN NEGARA/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'DUTY AND TAX:', 0, 1);
$p->SetFont('Arial');

// BEA MASUK
$p->SetX(108);
$p->Cell($p->GetStringWidth("BM/"), 4, "BM/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'IMPORT DUTY');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ": Rp.");
$p->Cell(30, 4, "-", 0, 1, 'C');

// DENDA
$p->SetX(108);
$p->Cell($p->GetStringWidth("DENDA ADM/"), 4, "DENDA ADM/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'PENALTY');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ": Rp.");
$p->Cell(30, 4, "-", 0, 1, 'C');

// PPN
$p->SetX(108);
$p->Cell($p->GetStringWidth("PPN/"), 4, "PPN/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'VAT');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ": Rp.");
$p->Cell(30, 4, "-", 0, 1, 'C');

// PPnBM
$p->SetX(108);
$p->Cell($p->GetStringWidth("PPnBM/"), 4, "PPnBM/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'LUXURY TAX');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ": Rp.");
$p->Cell(30, 4, "-", 0, 1, 'C');

// PPh
$p->SetX(108);
$p->Cell($p->GetStringWidth("PPh Ps. 21/"), 4, "PPh Ps. 21/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'INCOME TAX');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ": Rp.");
$p->Cell(30, 4, "-", 0, 1, 'C');

// draw line
$currY  = $p->GetY();
$p->Line($tabPos, $currY, $tabPos+50, $currY);
$p->Ln(1);

// TOTAL
// PPh
$p->SetX(108);
$p->Cell($p->GetStringWidth("TOTAL BM PDRI/"), 4, "TOTAL BM PDRI/");
$p->SetFont('Arial', 'I');
$p->Cell(0, 4, 'TAX');
$p->SetFont('Arial');

$p->SetX($tabPos);
$p->Cell(10, 4, ": Rp.");
$p->Cell(30, 4, "-", 0, 1, 'C');


// Kota TTD
$p->Ln(8);

$currX  = 110;
$currY  = $p->GetY();

$p->SetXY($currX, $currY);
$p->Cell(0, 4, "{$kota_ttd} , {$tgl_ttd}", 0, 1);
$p->Ln();


$currX  = 35;
$currY  = $p->GetY();

// Pemilik Barang
$p->SetXY($currX, $currY);
$p->SetFont('Arial', '');
$p->Cell(36, 4, "Pemilik Barang/Kuasa      ", 0, 2);

$p->Line($currX + 1, $p->GetY(), $currX + 35, $p->GetY());

$p->SetFont('Arial', 'I');
$p->Cell(36, 4, "Goods Owner /On Behalf", 0, 2);
$p->Ln(20);

$p->SetXY($currX, $p->GetY());
$p->SetFont('Arial', '');
$p->Cell(36, 4, "( {$nama} )", 0, 1, 'C');

// Pejabat bea dan cukai
$currX  = 110;
$p->SetXY($currX, $currY);
$p->SetFont('Arial', '');
$p->Cell(36, 4, "Pejabat Bea dan Cukai      ", 0, 2);

$p->Line($currX + 1, $p->GetY(), $currX + 35, $p->GetY());

$p->SetFont('Arial', 'I');
$p->Cell(36, 4, "Customs Officer", 0, 2);
$p->Ln(20);

$p->SetXY($currX, $p->GetY());
$p->SetFont('Arial', '');
$p->Cell(36, 4, "( {$nama_pejabat} )", 0, 2, 'C');
$p->Cell(36, 4, "NIP {$nip_pejabat}", 0, 1, 'C');

$p->Ln(8);

// Perhatian
$p->Cell(15, 4, "Perhatian");
$p->Cell(2.5, 4, ":");
$p->Cell(4, 4, "a.");
$p->MultiCell(0, 4, "Barang ditimbun di Tempat Penimbunan Sementara atau tempat lain yang diperlakukan sama dengan Tempat Penimbunan Sementara.");

$p->SetX($p->GetX() + 17.5);
$p->Cell(4, 4, "b.");
$p->MultiCell(0, 4, "Apabila dalam 30 (tiga puluh) hari sejak barang ditimbun di Tempat Penimbunan Sementara barang tidak diselesaikan kewajiban pabeannya, barang akan dinyatakan sebagai Barang Tidak Dikuasai.");

// garis
$p->Ln(1);
$p->Line(12, $p->GetY(), 210-12, $p->GetY());
$p->Ln(1);

// Perhatian (inggris)
$p->SetFont('Arial', 'I');
$p->Cell(15, 4, "Notice");
$p->SetFont('Arial');
$p->Cell(2.5, 4, ":");
$p->SetFont('Arial', 'I');
$p->Cell(4, 4, "a.");
$p->MultiCell(0, 4, "Goods will be stored in Temporary Storage Facility or in other place or storage considered as Temporary Storage Facility.");

$p->SetX($p->GetX() + 17.5);
$p->Cell(4, 4, "b.");
$p->MultiCell(0, 4, "Should you not claim the goods within 30 (thirty) days since storage, they will be stated as Unclaimed Goods by default afterwards.");

// Peruntukan lembar
$p->Ln(20);
$p->SetFont('Arial');

$p->Cell(0, 4, "Peruntukkan lembar:", 0, 1);
$p->Cell(0, 4, "1. Penumpang/Awak Sarana Pengangkut;", 0, 1);
$p->Cell(0, 4, "2. Ditempel pada barang;", 0, 1);
$p->Cell(0, 4, "3. Pejabat Bea Cukai/Arsip.");


$p->Output('I','spp.pdf');