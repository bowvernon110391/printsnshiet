<?php

use Fpdf\Fpdf;

include 'vendor/autoload.php';

$nomor_bap      = 'BAP-000021/KPU.03/BD.0303/2020';
$tanggal_bap    = '26-02-2020';

$gudang         = 'GAJT';

$pjt            = 'PT TIKI JNE INDONESIA';

$nama_pemeriksa = "Tri Mulyadi Wibowo";
$nip_pemeriksa  = "199103112012101001";

$data   = array(
	0 => array('No' => '1', 'hawb' => 'ID1401655766', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Lusi Anggraini', 'koli' => '1', 'kilo' => '0.58', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	1 => array('No' => '2', 'hawb' => 'ID1401657904', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Githa Viani', 'koli' => '1', 'kilo' => '0.776', 'status' => 'Sesuai LHP'),
	2 => array('No' => '3', 'hawb' => 'ID1405720455', 'tgl_hawb' => '25/02/2020', 'consignee' => 'putri kencana', 'koli' => '1', 'kilo' => '0.584', 'status' => 'Negara asal tidak sesuai'),
	3 => array('No' => '4', 'hawb' => 'ID1405720775', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Naudi Bataha', 'koli' => '1', 'kilo' => '1.392', 'status' => 'Sesuai LHP'),
	4 => array('No' => '5', 'hawb' => 'ID1405722473', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Atik Reniasih', 'koli' => '1', 'kilo' => '0.58', 'status' => 'Negara asal tidak sesuai'),
	5 => array('No' => '6', 'hawb' => 'ID1405724667', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Zems Sihite', 'koli' => '1', 'kilo' => '1.812', 'status' => 'Sesuai LHP'),
	6 => array('No' => '7', 'hawb' => 'ID1405733061', 'tgl_hawb' => '25/02/2020', 'consignee' => 'ardiah ibu aas', 'koli' => '1', 'kilo' => '0.96', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	7 => array('No' => '8', 'hawb' => 'ID1405736126', 'tgl_hawb' => '25/02/2020', 'consignee' => 'hanny', 'koli' => '1', 'kilo' => '1.284', 'status' => 'Sesuai LHP'),
	8 => array('No' => '9', 'hawb' => 'ID1405736288', 'tgl_hawb' => '25/02/2020', 'consignee' => 'mega firman', 'koli' => '1', 'kilo' => '1.59', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	9 => array('No' => '10', 'hawb' => 'ID1405736400', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Mohammad Rheza Yassin', 'koli' => '1', 'kilo' => '0.638', 'status' => 'Negara asal tidak sesuai'),
	10 => array('No' => '11', 'hawb' => 'ID1915414859', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Dikson pasaribu', 'koli' => '1', 'kilo' => '0.708', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	11 => array('No' => '12', 'hawb' => 'ID1915415411', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Noni Noviana', 'koli' => '1', 'kilo' => '0.52', 'status' => 'Sesuai LHP'),
	12 => array('No' => '13', 'hawb' => 'ID1915416003', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Serlon', 'koli' => '1', 'kilo' => '0.532', 'status' => 'Sesuai LHP'),
	13 => array('No' => '14', 'hawb' => 'ID1915422248', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Irfan Maulana', 'koli' => '1', 'kilo' => '0.066', 'status' => 'Negara asal tidak sesuai'),
	14 => array('No' => '15', 'hawb' => 'ID1915422457', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Dewi fransisca', 'koli' => '1', 'kilo' => '0.9', 'status' => 'Sesuai LHP'),
	15 => array('No' => '16', 'hawb' => 'ID1915422624', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Siti Nuryani', 'koli' => '1', 'kilo' => '0.9', 'status' => 'Sesuai LHP'),
	16 => array('No' => '17', 'hawb' => 'ID1915423227', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Saskia indu bhanuwati', 'koli' => '1', 'kilo' => '0.9', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	17 => array('No' => '18', 'hawb' => 'ID1915423664', 'tgl_hawb' => '25/02/2020', 'consignee' => 'neneng yuningsih', 'koli' => '1', 'kilo' => '0.779', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	18 => array('No' => '19', 'hawb' => 'ID1915426426', 'tgl_hawb' => '25/02/2020', 'consignee' => 'mbay', 'koli' => '1', 'kilo' => '1.003', 'status' => 'Negara asal tidak sesuai'),
	19 => array('No' => '20', 'hawb' => 'ID1915438931', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Iwan', 'koli' => '1', 'kilo' => '1.238', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	20 => array('No' => '21', 'hawb' => 'ID1915615034', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Ayu wahdania', 'koli' => '1', 'kilo' => '0.512', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	21 => array('No' => '22', 'hawb' => 'ID1915615122', 'tgl_hawb' => '25/02/2020', 'consignee' => 'rinny catala', 'koli' => '1', 'kilo' => '0.066', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	22 => array('No' => '23', 'hawb' => 'ID1915615142', 'tgl_hawb' => '25/02/2020', 'consignee' => 'ida rukhaida', 'koli' => '1', 'kilo' => '0.228', 'status' => 'Negara asal tidak sesuai'),
	23 => array('No' => '24', 'hawb' => 'ID1915615203', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Santi Oktavia Hutagaol', 'koli' => '1', 'kilo' => '0.136', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	24 => array('No' => '25', 'hawb' => 'ID1915615370', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Junitamz', 'koli' => '1', 'kilo' => '0.59', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	25 => array('No' => '26', 'hawb' => 'ID1915615516', 'tgl_hawb' => '25/02/2020', 'consignee' => 'jannah', 'koli' => '1', 'kilo' => '0.632', 'status' => 'Sesuai LHP'),
	26 => array('No' => '27', 'hawb' => 'ID1915615702', 'tgl_hawb' => '25/02/2020', 'consignee' => 'VIRA VALERIA', 'koli' => '1', 'kilo' => '0.066', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	27 => array('No' => '28', 'hawb' => 'ID1915615724', 'tgl_hawb' => '25/02/2020', 'consignee' => 'son haji', 'koli' => '1', 'kilo' => '0.066', 'status' => 'Sesuai LHP'),
	28 => array('No' => '29', 'hawb' => 'ID1915615768', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Bebek olive', 'koli' => '1', 'kilo' => '0.566', 'status' => 'Sesuai LHP'),
	29 => array('No' => '30', 'hawb' => 'ID1915616250', 'tgl_hawb' => '25/02/2020', 'consignee' => 'maryanih mamah aska', 'koli' => '1', 'kilo' => '0.64', 'status' => 'Negara asal tidak sesuai'),
	30 => array('No' => '31', 'hawb' => 'ID1915440458', 'tgl_hawb' => '25/02/2020', 'consignee' => 'KOBAYASHI CHIHARU', 'koli' => '1', 'kilo' => '0.864', 'status' => 'Sesuai LHP'),
	31 => array('No' => '32', 'hawb' => 'ID1915614588', 'tgl_hawb' => '25/02/2020', 'consignee' => 'atri', 'koli' => '1', 'kilo' => '0.636', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	32 => array('No' => '33', 'hawb' => 'ID1915615494', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Annela Noviyanti', 'koli' => '1', 'kilo' => '0.512', 'status' => 'Negara asal tidak sesuai'),
	33 => array('No' => '34', 'hawb' => 'ID1915615627', 'tgl_hawb' => '25/02/2020', 'consignee' => 'rezka', 'koli' => '1', 'kilo' => '0.506', 'status' => 'Sesuai LHP'),
	34 => array('No' => '35', 'hawb' => 'ID1915422690', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Tasya Andhita', 'koli' => '1', 'kilo' => '0.506', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	35 => array('No' => '22', 'hawb' => 'ID1915615122', 'tgl_hawb' => '25/02/2020', 'consignee' => 'rinny catala', 'koli' => '1', 'kilo' => '0.066', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	36 => array('No' => '23', 'hawb' => 'ID1915615142', 'tgl_hawb' => '25/02/2020', 'consignee' => 'ida rukhaida', 'koli' => '1', 'kilo' => '0.228', 'status' => 'Negara asal tidak sesuai'),
	37 => array('No' => '24', 'hawb' => 'ID1915615203', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Santi Oktavia Hutagaol', 'koli' => '1', 'kilo' => '0.136', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	38 => array('No' => '25', 'hawb' => 'ID1915615370', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Junitamz', 'koli' => '1', 'kilo' => '0.59', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	39 => array('No' => '26', 'hawb' => 'ID1915615516', 'tgl_hawb' => '25/02/2020', 'consignee' => 'jannah', 'koli' => '1', 'kilo' => '0.632', 'status' => 'Sesuai LHP'),
	40 => array('No' => '27', 'hawb' => 'ID1915615702', 'tgl_hawb' => '25/02/2020', 'consignee' => 'VIRA VALERIA', 'koli' => '1', 'kilo' => '0.066', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	41 => array('No' => '28', 'hawb' => 'ID1915615724', 'tgl_hawb' => '25/02/2020', 'consignee' => 'son haji', 'koli' => '1', 'kilo' => '0.066', 'status' => 'Sesuai LHP'),
	42 => array('No' => '29', 'hawb' => 'ID1915615768', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Bebek olive', 'koli' => '1', 'kilo' => '0.566', 'status' => 'Sesuai LHP'),
	43 => array('No' => '30', 'hawb' => 'ID1915616250', 'tgl_hawb' => '25/02/2020', 'consignee' => 'maryanih mamah aska', 'koli' => '1', 'kilo' => '0.64', 'status' => 'Negara asal tidak sesuai'),
	44 => array('No' => '31', 'hawb' => 'ID1915440458', 'tgl_hawb' => '25/02/2020', 'consignee' => 'KOBAYASHI CHIHARU', 'koli' => '1', 'kilo' => '0.864', 'status' => 'Sesuai LHP'),
	45 => array('No' => '32', 'hawb' => 'ID1915614588', 'tgl_hawb' => '25/02/2020', 'consignee' => 'atri', 'koli' => '1', 'kilo' => '0.636', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
	46 => array('No' => '33', 'hawb' => 'ID1915615494', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Annela Noviyanti', 'koli' => '1', 'kilo' => '0.512', 'status' => 'Negara asal tidak sesuai'),
	47 => array('No' => '34', 'hawb' => 'ID1915615627', 'tgl_hawb' => '25/02/2020', 'consignee' => 'rezka', 'koli' => '1', 'kilo' => '0.506', 'status' => 'Sesuai LHP'),
	48 => array('No' => '35', 'hawb' => 'ID1915422690', 'tgl_hawb' => '25/02/2020', 'consignee' => 'Tasya Andhita', 'koli' => '1', 'kilo' => '0.506', 'status' => 'Jumlah koli salah, jenis barang berbeda dari CN'),
);

// functions
// =====================================================================================================================
function tableHeader($p) {
    // $p = new FPDF();

    $p->SetFont('ARIAL', 'B', 8);

    // marker
    $p->Cell(0, 4, "Halaman {$p->PageNo()} dari {nb}", 0, 1, 'R');

    $p->Cell(10, 4, 'No', 1, 0, 'C');   // No
    $p->Cell(30, 4, 'HAWB', 1, 0, 'C'); // HAWB
    $p->Cell(55, 4, 'PENERIMA', 1, 0, 'C'); // PENERIMA 
    $p->Cell(17.5, 4, 'KOLI', 1, 0, 'C'); // KOLI 
    $p->Cell(17.5, 4, 'KILO (KG)', 1, 0, 'C'); // KILO 
    $p->Cell(40, 4, 'KETERANGAN', 1, 0, 'C'); // KILO 

    $p->SetFont('ARIAL', '', 8);
    $p->Ln();
}

// =====================================================================================================================

$p = new Fpdf('P', 'mm', 'A4');

$p->SetAutoPageBreak(true, 20); // 8 cm bottom margin
$p->SetMargins(20, 20, 20);
$p->AliasNbPages();

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

$p->SetXY(102.5, $p->GetY()-5);
$p->SetFont('ARIAL', 'BU');

$tw = $p->GetStringWidth("({$pjt}) ");

$p->Cell($tw, 5, "({$pjt})");
$p->SetFont('ARIAL', '');

$tw = $p->GetStringWidth('DI GUDANG: ');
$p->Cell($tw, 5, 'DI GUDANG: ');

$p->SetFont('ARIAL', 'BU');
$p->Cell(0, 5, "({$gudang})");
$p->SetFont('ARIAL', '');

// single line
$p->Ln(10);

// reset line width
$p->SetLineWidth(0);

// table header
tableHeader($p);
// $p->Ln();
// repeat for all data, up to
foreach($data as $k => $v) {
    // fill with multicell first,
    // then draw rect around it
    // record y
    $currY  = $p->GetY();
    $currX  = $p->GetX();
    $endY   = $currY;

    /* $p->Cell(10, 4, 'No', 1, 0, 'C');   // No
    $p->Cell(30, 4, 'HAWB', 1, 0, 'C'); // HAWB
    $p->Cell(55, 4, 'PENERIMA', 1, 0, 'C'); // PENERIMA 
    $p->Cell(17.5, 4, 'KOLI', 1, 0, 'C'); // KOLI 
    $p->Cell(17.5, 4, 'KILO (KG)', 1, 0, 'C'); // KILO 
    $p->Cell(40, 4, 'KETERANGAN', 1, 0, 'C'); // KILO  */

    // no
    $p->MultiCell(10, 4, $k + 1);
    
    // hawb
    $p->SetXY($currX + 10, $currY);
    $p->MultiCell(30, 4, $v['hawb'], 0, 'C');

    $endY   = max($endY, $p->GetY());

    // penerima
    $p->SetXY($currX + 40, $currY);
    $p->MultiCell(55, 4, $v['consignee'], 0, 'C');

    $endY   = max($endY, $p->GetY());

    // koli
    $p->SetXY($currX + 95, $currY);
    $p->MultiCell(17.5, 4, $v['koli'], 0, 'C');

    $endY   = max($endY, $p->GetY());

    // kilo
    $p->SetXY($currX + 112.5, $currY);
    $p->MultiCell(17.5, 4, $v['kilo'], 0, 'C');

    $endY   = max($endY, $p->GetY());

    // keterangan
    $p->SetXY($currX + 130, $currY);
    $p->MultiCell(40, 4, $v['status'], 0, 'L');

    $endY   = max($endY, $p->GetY());

    // Draw rectangle
    $h = $endY - $currY;

    $p->Rect($currX, $currY, 10, $h);   // no
    $p->Rect($currX + 10, $currY, 30, $h);   // hawb
    $p->Rect($currX + 40, $currY, 55, $h);   // consignee
    $p->Rect($currX + 95, $currY, 17.5, $h);    // koli
    $p->Rect($currX + 112.5, $currY, 17.5, $h);   // kilo
    $p->Rect($currX + 130, $currY, 40, $h); // keterangan

    // if we reach end of page, start anew with header
    if ($endY >= 270) {
        $p->AddPage();
        tableHeader($p);
        // $p->Ln();   

        $currY  = $p->GetY();
        $currX  = $p->GetX();
        $endY   = $currY;
    }
}

// Tanda tangan
$p->Ln(5);
$p->SetFont('Arial', '', 10);

$p->Cell(0, 5, 'Mengetahui,', 0, 1);

$currX  = $p->GetX();
$currY  = $p->GetY();

$p->Cell(0, 5, 'Petugas PJT ' . $pjt);

$p->SetXY(130, $currY);
$p->Cell(0, 5, 'PEJABAT PEMERIKSA FISIK', 0, 1);

// spaces for signature
$p->Ln(15);

// Name and sheiit
$currX  = $p->GetX();
$currY  = $p->GetY();

// petugas PJT
$p->Cell(60, 5, "(........................................................)", 0, 1);

// pemeriksa
$p->SetXY(130, $currY);
$p->Cell(0, 5, $nama_pemeriksa, 0, 2);
$p->Cell(0, 5, "NIP {$nip_pemeriksa}", 0, 0);

$p->Output('I', 'bap.pdf');