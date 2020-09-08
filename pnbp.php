<?php

use Fpdf\Fpdf;

include 'vendor/autoload.php';

$nama_importir = 'KANAKA RACING TEAM';
$alamat_importir = 'ID, JL PAHLAWAN SENTUL BABAKAN BOGOR,BARAT,,INDONESIA';

$jenis_dok_pengeluaran = "SPPB PIB";
$no_dok_pengeluaran = '002124/KPU.03/2020';
$tgl_dok_pengeluaran = '31 Agustus 2020';
$mawb = '910-14347093';
$hawb = '';
$koli = 1;
$brutto = 97.0;
$uraian = 'MINI GO-KART';

$tgl_gate_in = '28 Agustus 2020';
$tgl_gate_out = '31 Agustus 2020';
$total_hari = 3;
$tarif_per_kg_per_hari = 1125;
$nilai_sewa_gudang_tpp = $brutto * $total_hari * $tarif_per_kg_per_hari;

$no_pnbp = 'PNBP-0290/KPU.03/BD.0301/TPP/2020';
$tgl_pnbp = '31 Agustus 2020';

$nm_jabatan_big_boss = 'Kepala Bidang PFPC I';
$nm_jabatan = 'Kepala Seksi Pabean dan Cukai I';
$nm_pejabat = 'Arief Andrian';

// make new page
$p = new Fpdf();
$p->SetAutoPageBreak(true, 5);
$p->SetMargins(15, 5, 15);

$p->AddPage();
$p->SetFont('Arial','',8);

// print logo
$p->Image('logo.jpg',null,null,25,25);

// kop surat
$p->SetXY(47.5, 8.5);
$p->SetFont('Arial', 'B', 12);

$p->MultiCell(
    125, 
    5, 
    "KEMENTERIAN KEUANGAN REPUBLIK INDONESIA\nDIREKTORAT JENDERAL BEA DAN CUKAI\nKANTOR PELAYANAN UTAMA BEA DAN CUKAI\nTIPE C SOEKARNO-HATTA",
    0,
    'C'
);

// alamat kop
$p->SetFont('Arial', 'B', 8);
$p->SetX(47.5);
$alamat_kop = "AREA CARGO BANDARA SOEKARNO-HATTAKOTAK POS - 1023, CENGKARENG 19111\nTELEPON: 021-5502072, 5502056, 5507056 FAKSIMILI:5502105";
$p->MultiCell(125, 4, $alamat_kop, 0, 'C');

// double line
$p->SetY($p->GetY()+1);
$p->Line(15, $p->GetY(), $p->GetPageWidth()-15, $p->GetY());
$p->SetY($p->GetY()+0.75);
$p->Line(15, $p->GetY(), $p->GetPageWidth()-15, $p->GetY());

// add some more line
$p->Ln(8);
$p->SetFont('Arial', 'BU', 11);
$p->Cell(0, 5.5, 'SURAT PENAGIHAN BIAYA PENIMBUNAN GUDANG TPP', 0, 1, 'C');

// Nomor + tgl PNBP
$p->SetFont('Arial','',11);

$p->SetX(40+15);
$p->Cell(25, 5.5, "NOMOR", 0, 0);
    $p->Cell(0, 5.5, ": " . $no_pnbp, 0, 1);
$p->SetX(40+15);
$p->Cell(25, 5.5, "TANGGAL", 0, 0);
    $p->Cell(0, 5.5, ": " . $tgl_pnbp, 0, 1);

// Kepada yth,
$p->Cell(0, 6, "Kepada Yth,", 0, 1);

// importir
$p->Cell(25, 5.5, "Nama",0,0);
    $p->Cell(0, 5.5, ": " . $nama_importir, 0, 1);
$p->Cell(25, 5.5, "Alamat",0,0);
    $p->Cell(0, 5.5, ": " . $alamat_importir, 0, 1);

$p->Ln();

// jenis dok pengeluaran
$p->Cell(0, 6, "Dengan ini diberitahukan atas {$jenis_dok_pengeluaran}:", 0, 1);

// nomor
$p->Cell(40, 6, "Nomor", 0, 0);
    $p->Cell(0, 6, ": {$no_dok_pengeluaran} tanggal {$tgl_dok_pengeluaran}", 0, 1);
// mawb/hawb
$p->Cell(40, 6, "MAWB/HAWB", 0, 0);
    $p->Cell(0, 6, ": {$mawb}" . ($hawb ? " / {$hawb}" : ""), 0, 1);
// jumlah/berat
$berat = (float) $brutto;
$p->Cell(40, 6, "Jumlah/Berat", 0, 0);
    $p->Cell(0, 6, ": {$koli} koli / {$berat} Kg", 0, 1);
// uraian
$p->Cell(40, 6, "Uraian Barang", 0, 0);
    $p->Cell(2, 6, ": ");
    $p->MultiCell(0, 6, $uraian);

// ditetapkan blabla
$p->Cell(0, 6, "Ditetapkan biaya penimbunan Gudang TPP dengan rincian sebagai berikut:", 0, 1);

$bullet = chr(149);
$bullet_width = 10;

// tgl gate in
$p->Cell(10, 6, $bullet, 0, 0, 'C');
$p->Cell(105, 6, "Tanggal barang masuk Gudang TPP", 0, 0);
$p->Cell(0, 6, ": {$tgl_gate_in}", 0, 1);
// tgl gate out
$p->Cell(10, 6, $bullet, 0, 0, 'C');
$p->Cell(105, 6, "Tanggal barang dikeluarkan dari Gudang TPP", 0, 0);
$p->Cell(0, 6, ": {$tgl_gate_out}", 0, 1);
// total hari
$p->Cell(10, 6, $bullet, 0, 0, 'C');
$p->Cell(105, 6, "Total hari barang disimpan di Gudang TPP", 0, 0);
$p->Cell(0, 6, ": {$total_hari} hari", 0, 1);
// berat barang
$p->Cell(10, 6, $bullet, 0, 0, 'C');
$p->Cell(105, 6, "Berat barang", 0, 0);
$p->Cell(0, 6, ": {$brutto} Kg", 0, 1);
// biaya sewa
$tarif_sewa = number_format($tarif_per_kg_per_hari, 2);
$p->Cell(10, 6, $bullet, 0, 0, 'C');
$p->Cell(105, 6, "Biaya sewa penumpukan barang di Gudang TPP", 0, 0);
$p->Cell(0, 6, ": Rp {$tarif_sewa}/kg/hari", 0, 1);
// biaya sewa
$nilai_sewa = number_format($nilai_sewa_gudang_tpp, 2);
$p->Cell(10, 6, $bullet, 0, 0, 'C');
$p->Cell(105, 6, "Nilai sewa Gudang di TPP: {$total_hari} hari x {$brutto} kgs x Rp {$tarif_sewa} = ", 0, 0);

$p->SetFont('Arial', 'B', 18);
$p->Cell(0, 9, "Rp {$nilai_sewa}", 1, 1, 'C');

// add another line
$p->Ln(3);
$p->SetFont('Arial', '', 11);
$text = "Pembayaran Biaya Penimbunan Gudang TPP harus dibayarkan pada tanggal dikeluarkan surat ini, jika pembayaran dilakukan di kemudian hari mohon konfirmasi terlebih dahulu pada Seksi Pabean dan Cukai (TPP).";
$p->MultiCell(0, 5.5, $text);

$p->SetX(25);
$p->Cell(0, 6, "Atas perhatian dan kerjasamanya kami ucapkan terima kasih.", 0, 1);

// 3 linespaces
$p->Ln(18);

$cur_x = $p->GetX();
$cur_y = $p->GetY();

// nomor rekening
$nomor_rekening = "Nomor Rekening Bank Mandiri Cab. Terminal Cargo Bandara Soekarno-Hatta\n116-00-8900352-0\nAtas nama RPL 127 KPUBC Tipe C Soekarno-Hatta";
$p->MultiCell(80, 5.5, $nomor_rekening, 1, 'L');

// a.n.
$p->SetXY(102.5+15, $cur_y-2.5);
$p->Cell(7.5, 5.5, 'a.n.', 0, 0);

$p->MultiCell(0, 5.5, "{$nm_jabatan_big_boss}\n{$nm_jabatan}\n\n\n\n{$nm_pejabat}", 0, 'L');

// rangkap 2
$p->Ln();
$p->Cell(0, 6, "Surat ini dibuat rangkap 2 (dua):", 0, 1);
$p->Cell(0, 6, "Rangkap ke-1 untuk importir;", 0, 1);
$p->Cell(0, 6, "Rangkap ke-2 untuk KPUBC Tipe C Soekarno-Hatta", 0);

// output
$p->Output('I', 'doc.pdf');

