<?php
require_once 'vendor/autoload.php';

use Fpdf\Fpdf;

//DATA
$data = new \stdClass;
$data->kd_kntr_dpt = '050100';
$data->nm_kntr_dpt = 'Kantor Pelayanan Utama Bea dan Cukai Tipe C Soekarno Hatta';
$data->kd_kntr_arv = '050100';
$data->nm_kntr_arv = 'Kantor Pelayanan Utama Bea dan Cukai Tipe C Soekarno Hatta';
$data->no_dok = '9999999';
$data->tgl_dok = '2020-01-01';
$data->no_flight = 'XXXX-X';
$data->tgl_brngk = '2020-01-01';
$data->nama_lengkap = 'Nama Lengkap Penumpang panjang sekali';
$data->tempat_berangkat = 'Tempat Berangkat Penumpang panjang';
$data->nationality = 'Kebangsaaan amat panjang sekali';
$data->no_passport = '123213412412 1212312312';
$data->pekerjaan = 'pekerjaan sanagat panjang';
$data->negara_tujuan = 'tujuan Negara juga panjang';

$data->nama_pejabat = 'Muhammad Rinaldi Ginting';
$data->nip = '198604272007101001';
$data->tgl_tanda_tangan = '2020-01-01';

// var_dump($data);
class PDF extends FPDF
{
    function Footer()
    {
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
        $this->Cell(0,4,'Lembar ke-1 untuk Kantor Pabean keberangkatan',0,2,'R');
        $this->Cell(0,4,'Lembar ke-2 untuk Penumpang / Awak Sarana',0,2,'R');
    }
}

$pdf=new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

//kop
$pdf->SetFont('Arial','B','10');
$pdf->Cell(20,10,'BC 3.4',1,0,'C'); 
$pdf->Cell(0,5,'PEMBERITAHUAN PEMBAWAAN BARANG UNTUK DIBAWA KEMBALI','LTR',2,'C'); 
$pdf->SetFont('Arial','BI','10');
$pdf->Cell(0,5,'DECLARATION OF RETURNABLE GOODS','LRB',1,'C');

//bawah_kop
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();
$pdf->ln(1);
$pdf->SetFont('Arial','','8');
$pdf->Cell(45,3,'Kolom Khusus Bea dan Cukai',0,2,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(45,3,'Customs Official Column',0,2,'L');
$pdf->ln(1);

$pdf->SetFont('Arial','','8');
$pdf->Cell(45,3,'Kantor Pabean keberangkatan',0,0,'L'); 
$pdf->Cell(45,3,$data->kd_kntr_dpt,0,0,'C');
$pdf->Cell(90,3,$data->nm_kntr_dpt,0,1,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(45,3,'Customs Office of Departure',0,1,'L');
$pdf->ln(1);

$pdf->SetFont('Arial','','8');
$pdf->Cell(45,3,'Kantor Pabean Kedatangan',0,0,'L'); 
$pdf->Cell(45,3,$data->kd_kntr_arv,0,0,'C');
$pdf->Cell(90,3,$data->nm_kntr_arv,0,1,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(45,3,'Customs Office of Arrival',0,2,'L');
$pdf->ln(1);

$pdf->SetFont('Arial','','8');
$pdf->Cell(45,3,'Nomor dan Tanggal Pendaftaran',0,0,'L');
$pdf->Cell(45,3,$data->no_dok,0,0,'C');
$pdf->Cell(90,3,$data->tgl_dok,0,1,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(45,3,'Number and Date of Registration',0,2,'L');

$pdf->Rect($row_x, $row_y, 190, 29);

//kolom kosong
$pdf->setY($pdf->getY()+1);
$pdf->cell(0,3,'',1,1);

//title pengangkut
$pdf->setY($pdf->getY());
$pdf->SetFont('Arial','','10');
$pdf->Cell(0,5,'DATA PENGANGKUT','LR',2,'L');
$pdf->SetFont('Arial','I','10');
$pdf->Cell(0,5,'INFORMATION OF CARRIER','LRB',2,'L');
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();

//data pengangkut
$pdf->SetFont('Arial','','8');
$pdf->Cell(10,4,'1.',0,0,'C');
$get_x = $pdf->GetX();
$get_y = $pdf->GetY();
$pdf->Cell(53,4,'No. Penerbangan/Pelayanan/Kendaraan',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(0,4,'Flight/Voyage/Vehicle Number',0,2,'L');
$max_y = $pdf->GetY();

$pdf->SetXY($get_x+53, $get_y);
$pdf->SetFont('Arial','','8');
$pdf->MultiCell(95-$pdf->GetX(),4,$data->no_flight,0,'L');
$max_y = max($pdf->GetY(),$max_y);

$pdf->SetXY($row_x+95, $get_y);
$pdf->Cell(10,4,'2.',0,0,'C');
$pdf->Cell(0,4,'Tanggal Keberangkatan',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(0,4,'Date of Departure',0,2,'L');
$pdf->SetFont('Arial','','8');
$pdf->SetXY(95+53, $get_y);
$pdf->MultiCell(0,4,$data->tgl_brngk,0,'L');
$max_y = max($pdf->GetY(),$max_y);
// //gmbar rect
$pdf->Rect($row_x, $row_y,95,$max_y-$row_y);
$pdf->Rect($row_x+95, $row_y,95,$max_y-$row_y);


//DATA PENUMPANG
$pdf->SetY($max_y);
$pdf->SetFont('Arial','','10');
$pdf->Cell(0,5,'DATA PENUMPANG','LR',2,'L');
$pdf->SetFont('Arial','I','10');
$pdf->Cell(0,5,'INFORMATION OF PASSENGER','LRB',2,'L');

//data penumpang
//nama lengkap
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();

$pdf->SetFont('Arial','','8');
$pdf->Cell(10,4,'3.',0,0,'C');
$get_x = $pdf->GetX();
$get_y = $pdf->GetY();
$pdf->Cell(30,4,'Nama Lengkap',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(0,4,'Full Name',0,2,'L');
$max_y = $pdf->GetY();

$pdf->SetXY($get_x+30, $get_y);
$pdf->SetFont('Arial','','8');
$pdf->MultiCell(95-$pdf->GetX(),4,$data->nama_lengkap,0,'L');

$max_y = max($pdf->GetY(),$max_y);

//tempat berangkat
$pdf->SetXY($row_x+95, $get_y);
$pdf->Cell(10,4,'4.',0,0,'C');
$pdf->Cell(0,4,'Tempat Keberangkatan',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(0,4,'Place of Depature',0,2,'L');
$pdf->SetFont('Arial','','8');
$pdf->SetXY(95+53, $get_y);
$pdf->MultiCell(0,4,$data->tempat_berangkat,0,'L');

$max_y = max($pdf->GetY(),$max_y);

//gambar rect
$pdf->Rect($row_x, $row_y,95,$max_y-$row_y);
$pdf->Rect($row_x+95, $row_y,95,$max_y-$row_y);

//nationality
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();

$pdf->SetFont('Arial','','8');
$pdf->Cell(10,4,'5.',0,0,'C');
$get_x = $pdf->GetX();
$get_y = $pdf->GetY();
$pdf->Cell(30,4,'Kebangsaan',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(0,4,'Nationality',0,2,'L');
$max_y = $pdf->GetY();

$pdf->SetXY($get_x+30, $get_y);
$pdf->SetFont('Arial','','8');
$pdf->MultiCell(95-$pdf->GetX(),4,$data->nationality,0,'L');

$max_y = max($pdf->GetY(),$max_y);

//Nomor Passpor
$pdf->SetXY($row_x+95, $get_y);
$pdf->Cell(10,4,'6.',0,0,'C');
$pdf->Cell(0,4,'Nomor Paspor',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(0,4,'Passport Number',0,2,'L');
$pdf->SetFont('Arial','','8');
$pdf->SetXY(95+53, $get_y);
$pdf->MultiCell(0,4,$data->no_passport,0,'L');

$max_y = max($pdf->GetY(),$max_y);
//gambar rect
$pdf->Rect($row_x, $row_y,95,$max_y-$row_y);
$pdf->Rect($row_x+95, $row_y,95,$max_y-$row_y);

//pekerjaan
$pdf->SetY($max_y);
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();
$pdf->SetFont('Arial','','8');
$pdf->Cell(10,4,'7.',0,0,'C');
$get_x = $pdf->GetX();
$get_y = $pdf->GetY();
$pdf->Cell(30,4,'Pekerjaan',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(0,4,'Occupation',0,2,'L');
$max_y = $pdf->GetY();

$pdf->SetXY($get_x+30, $get_y);
$pdf->SetFont('Arial','','8');
$pdf->MultiCell(95-$pdf->GetX(),4,$data->pekerjaan,0,'L');

$max_y = max($pdf->GetY(),$max_y);

//negara tujuan
$pdf->SetXY($row_x+95, $get_y);
$pdf->Cell(10,4,'8.',0,0,'C');
$pdf->Cell(0,4,'Negara tujuan',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(0,4,'Country of Destination',0,2,'L');
$pdf->SetFont('Arial','','8');
$pdf->SetXY(95+53, $get_y);
$pdf->MultiCell(0,4,$data->negara_tujuan,0,'L');

$max_y = max($pdf->GetY(),$max_y);
//gambar rect
$pdf->Rect($row_x, $row_y,95,$max_y-$row_y);
$pdf->Rect($row_x+95, $row_y,95,$max_y-$row_y);

//DATA BARANG
$pdf->SetY($max_y);
$pdf->SetFont('Arial','','10');
$pdf->Cell(0,5,'DATA BARANG','LR',2,'L');
$pdf->SetFont('Arial','I','10');
$pdf->Cell(0,5,'INFORMATION OF GOODS','LRB',2,'L');

//tabel detail barang
$pdf->SetFont('Arial', '', 7);
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();
$pdf->Cell(10, 3, "9. No", 0,0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(5, 3, "10.", 0,0,'L');
$pdf->multiCell(25, 3, "Uraian Jenis, Barang, Merek, Tipe, ukuran, Spesifikasi lain, Kode Barang", 0,'L');
$pdf->SetFont('Arial', 'I', 7);
$pdf->SetX($row_x+15);
$pdf->multiCell(25, 3, "Description of Goods, Marks, Type, Size, Other Specification, Item Code", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+35+5,$row_y);
$pdf->Cell(5, 3, "10.", 0,0,'L');
$pdf->multiCell(20, 3, "Jumlah dan Jenis Kemasan", 0,'L');
$pdf->SetX($row_x+40+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Number and Type of Packages", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+5,$row_y);
$pdf->Cell(5, 3, "12.", 0,0,'L');
$pdf->multiCell(20, 3, "Banyak Barang", 0,'L');
$pdf->SetX($row_x+65+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Amount of Goods", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+25+5,$row_y);
$pdf->Cell(5, 3, "13.", 0,0,'L');
$pdf->multiCell(20, 3, "Berat Bruto", 0,'L');
$pdf->SetX($row_x+65+25+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Gross Weight", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+25+25+5,$row_y);
$pdf->Cell(5, 3, "14.", 0,0,'L');
$pdf->multiCell(20, 3, "Harga Satuan", 0,'L');
$pdf->SetX($row_x+65+25+25+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Unit Price", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+50+25+5,$row_y);
$pdf->Cell(5, 3, "15.", 0,0,'L');
$pdf->multiCell(20, 3, "Jumlah Harga", 0,'L');
$pdf->SetX($row_x+65+50+25+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Total Price", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+75+25+5,$row_y);
$pdf->Cell(5, 3, "16.", 0,0,'L');
$pdf->multiCell(20, 3, "Keterangan", 0,'L');
$pdf->SetX($row_x+65+75+25+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Explanation", 0,'L');

//header table Rectangle data barang
$h_tabel = 31;
$pdf->Rect($row_x, $row_y, 10, $h_tabel);
$pdf->Rect($row_x+10, $row_y, 30, $h_tabel);
$pdf->Rect($row_x+35+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+25+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+25+25+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+50+25+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+75+25+5, $row_y, 25, $h_tabel);

//isi table Rectangle data barang
$h_btable = 20;
$row_y1 = $row_y+ $h_tabel;
$pdf->Rect($row_x, $row_y1, 10, $h_btable);
$pdf->Rect($row_x+10, $row_y1, 30, $h_btable);
$pdf->Rect($row_x+35+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+25+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+25+25+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+50+25+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+75+25+5, $row_y1, 25, $h_btable);


//Dokumen Pelengkap pabean
$pdf->SetY($row_y+$h_tabel+$h_btable);
$pdf->SetFont('Arial','','10');
$pdf->Cell(0,5,'DOKUMEN PELENGKAP PABEAN','LR',2,'L');
$pdf->SetFont('Arial','I','10');
$pdf->Cell(0,5,'COMPLEMENTARY CUSTOMS DOCUMENTS','LRB',2,'L');

//table dokumen pelengkap pabean
$pdf->SetFont('Arial', '', 7);
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();

$pdf->Cell(10, 3, "17. No", 0,0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(5, 3, "18.", 0,0,'L');
$pdf->multiCell(80, 3, "Jenis Dokumen:", 0,'L');
$pdf->SetFont('Arial', 'I', 7);
$pdf->SetX($row_x+15);
$pdf->multiCell(80, 3, "Dokumen type", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+90+5,$row_y);
$pdf->Cell(5, 3, "19.", 0,0,'L');
$pdf->multiCell(50, 3, "Nomor:", 0,'L');
$pdf->SetX($row_x+95+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(50, 3, "Number", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+90+5+55,$row_y);
$pdf->Cell(5, 3, "20.", 0,0,'L');
$pdf->multiCell(35, 3, "Tanggal:", 0,'L');
$pdf->SetX($row_x+95+5+50+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(35, 3, "Date", 0,'L');

//header table dokumen pelengkap
$h_dokpel = 7;
$pdf->Rect($row_x, $row_y, 10, $h_dokpel);
$pdf->Rect($row_x+10, $row_y, 85, $h_dokpel);
$pdf->Rect($row_x+10+85, $row_y, 55, $h_dokpel);
$pdf->Rect($row_x+10+85+55, $row_y, 40, $h_dokpel);

//isi table Rectangle data barang
$h_isidokpel = 20;
$pdf->Rect($row_x, $row_y+$h_dokpel, 10, $h_isidokpel);
$pdf->Rect($row_x+10, $row_y+$h_dokpel, 85, $h_isidokpel);
$pdf->Rect($row_x+35+60, $row_y+$h_dokpel, 55, $h_isidokpel);
$pdf->Rect($row_x+35+60+55, $row_y+$h_dokpel, 40, $h_isidokpel);

//Maksud Pembawaan
$pdf->SetY($row_y+$h_dokpel+$h_isidokpel);
$pdf->SetFont('Arial','','10');
$pdf->Cell(0,5,'MAKSUD PEMBAWAAN','LR',2,'L');
$pdf->SetFont('Arial','I','10');
$pdf->Cell(0,5,'PURPOSE OF CARRYING GOODS','LRB',2,'L');

$pdf->SetY($pdf->GetY());
$pdf->SetFont('Arial','','10');
$pdf->Cell(0,5,'','LR',2,'L');
$pdf->SetFont('Arial','I','10');
$pdf->Cell(0,5,'','LRB',2,'L');

$pdf->SetY($pdf->GetY());
$pdf->SetFont('Arial','','8');
$pdf->Cell(0,5,'Dengan ini saya menyatakan bertanggung jawab atas kebenaran hal-hal yang diberitahukan dalam pemberitahuan ini.','LTR',2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(0,5,'I hereby declare that the information given is true and correct','LRB',2,'L');

//Tanda tangan
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();

$pdf->SetFont('Arial','','8');
$pdf->Cell(45,4,'Untuk Pejabat Bea dan Cukai',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(45,4,'For Customs Officer',0,2,'L');
$pdf->SetFont('Arial','','8');
$get_x = $pdf->GetX();
$get_y = $pdf->GetY();
$pdf->Cell(25,4,'Nama',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(25,4,'Name',0,2,'L');
$pdf->SetFont('Arial','','8');
$pdf->Cell(25,4,'NIP',0,2,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(25,4,'NIP',0,2,'L');
$pdf->SetFont('Arial','','8');
$pdf->Cell(25,4,'Tanda Tangan :',0,2,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(25,4,'Signature',0,2,'L');

$pdf->SetXY($get_x+25, $get_y);
$pdf->SetFont('Arial','','8');
$pdf->Cell(45,4,$data->nama_pejabat,0,2,'L');

$pdf->SetXY($get_x+25, $get_y+4+4);
$pdf->SetFont('Arial','','8');
$pdf->Cell(45,4,$data->nip,0,2,'L');

$pdf->SetXY($row_x+95, $row_y+4);
$pdf->Cell(25,4, 'Tanggal',0,2,'L');
$pdf->SetFont('Arial','I','8');
$pdf->Cell(25,4, 'Date',0,2,'L');



$pdf->SetXY($row_x+95, $row_y+4+20);
$pdf->SetFont('Arial','','8');
$pdf->Cell(25,4,'Tanda Tangan :',0,2,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(25,4,'Signature',0,2,'L');

$pdf->SetFont('Arial','','8');
$pdf->SetXY($row_x+95+25, $row_y+4);
$pdf->Cell(25,4, $data->tgl_tanda_tangan,0,2,'L');
//gmbar rect
$pdf->Rect($row_x, $row_y,95,35);
$pdf->Rect($row_x+95, $row_y,95,35);
// $pdf->Footer();



//LEMBAR LANJUTAN
$pdf->AddPage();
//kop
$pdf->SetFont('Arial','B','10');
$pdf->Cell(0,5,'LEMBAR LANJUTAN DATA BARANG / CONTINUED SHEET FOR INFORMATION OF GOODS','LTR',2,'C'); 
$pdf->Cell(0,5,'PEMBERITAHUAN PEMBAWAAN BARANG YANG AKAN DIBAWA KEMBALI','LR',2,'C'); 
$pdf->SetFont('Arial','BI','10');
$pdf->Cell(0,5,'DECLARATION OF RETURNABLE GOODS','LR',2,'C');
$pdf->SetFont('Arial','','8');
$pdf->Cell(0, 4, "Halaman {$pdf->PageNo()} dari {nb}" , 'LRB', 1, 'R');

//bawah_kop
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();
$pdf->ln(1);
$pdf->SetFont('Arial','','8');
$pdf->Cell(45,3,'Kolom Khusus Bea dan Cukai',0,2,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(45,3,'Customs Official Column',0,2,'L');
$pdf->ln(1);

$pdf->SetFont('Arial','','8');
$pdf->Cell(45,3,'Kantor Pabean keberangkatan',0,0,'L'); 
$pdf->Cell(45,3,$data->kd_kntr_dpt,0,0,'C');
$pdf->Cell(90,3,$data->nm_kntr_dpt,0,1,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(45,3,'Customs Office of Departure',0,1,'L');
$pdf->ln(1);

$pdf->SetFont('Arial','','8');
$pdf->Cell(45,3,'Kantor Pabean Kedatangan',0,0,'L'); 
$pdf->Cell(45,3,$data->kd_kntr_arv,0,0,'C');
$pdf->Cell(90,3,$data->nm_kntr_arv,0,1,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(45,3,'Customs Office of Arrival',0,2,'L');
$pdf->ln(1);

$pdf->SetFont('Arial','','8');
$pdf->Cell(45,3,'Nomor dan Tanggal Pendaftaran',0,0,'L');
$pdf->Cell(45,3,$data->no_dok,0,0,'C');
$pdf->Cell(90,3,$data->tgl_dok,0,1,'L'); 
$pdf->SetFont('Arial','I','8');
$pdf->Cell(45,3,'Number and Date of Registration',0,2,'L');
$pdf->ln(1);

$pdf->Rect($row_x, $row_y, 190, 29);

//tabel detail barang
$pdf->SetFont('Arial', '', 7);
$row_x = $pdf->GetX();
$row_y = $pdf->GetY();
$pdf->Cell(10, 3, "9. No", 0,0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(5, 3, "10.", 0,0,'L');
$pdf->multiCell(25, 3, "Uraian Jenis, Barang, Merek, Tipe, ukuran, Spesifikasi lain, Kode Barang", 0,'L');
$pdf->SetFont('Arial', 'I', 7);
$pdf->SetX($row_x+15);
$pdf->multiCell(25, 3, "Description of Goods, Marks, Type, Size, Other Specification, Item Code", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+35+5,$row_y);
$pdf->Cell(5, 3, "10.", 0,0,'L');
$pdf->multiCell(20, 3, "Jumlah dan Jenis Kemasan", 0,'L');
$pdf->SetX($row_x+40+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Number and Type of Packages", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+5,$row_y);
$pdf->Cell(5, 3, "12.", 0,0,'L');
$pdf->multiCell(20, 3, "Banyak Barang", 0,'L');
$pdf->SetX($row_x+65+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Amount of Goods", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+25+5,$row_y);
$pdf->Cell(5, 3, "13.", 0,0,'L');
$pdf->multiCell(20, 3, "Berat Bruto", 0,'L');
$pdf->SetX($row_x+65+25+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Gross Weight", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+25+25+5,$row_y);
$pdf->Cell(5, 3, "14.", 0,0,'L');
$pdf->multiCell(20, 3, "Harga Satuan", 0,'L');
$pdf->SetX($row_x+65+25+25+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Unit Price", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+50+25+5,$row_y);
$pdf->Cell(5, 3, "15.", 0,0,'L');
$pdf->multiCell(20, 3, "Jumlah Harga", 0,'L');
$pdf->SetX($row_x+65+50+25+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Total Price", 0,'L');

$pdf->SetFont('Arial', '', 7);
$pdf->SetXY($row_x+60+75+25+5,$row_y);
$pdf->Cell(5, 3, "16.", 0,0,'L');
$pdf->multiCell(20, 3, "Keterangan", 0,'L');
$pdf->SetX($row_x+65+75+25+5);
$pdf->SetFont('Arial', 'I', 7);
$pdf->multiCell(20, 3, "Explanation", 0,'L');

//header table Rectangle data barang
$h_tabel = 31;
$pdf->Rect($row_x, $row_y, 10, $h_tabel);
$pdf->Rect($row_x+10, $row_y, 30, $h_tabel);
$pdf->Rect($row_x+35+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+25+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+25+25+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+50+25+5, $row_y, 25, $h_tabel);
$pdf->Rect($row_x+60+75+25+5, $row_y, 25, $h_tabel);

//isi table Rectangle data barang
$h_btable = 150;
$row_y1 = $row_y+ $h_tabel;
$pdf->Rect($row_x, $row_y1, 10, $h_btable);
$pdf->Rect($row_x+10, $row_y1, 30, $h_btable);
$pdf->Rect($row_x+35+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+25+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+25+25+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+50+25+5, $row_y1, 25, $h_btable);
$pdf->Rect($row_x+60+75+25+5, $row_y1, 25, $h_btable);

//tanggal dan tanda tangan

$pdf->SetXY($row_x,245);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(25, 4, "Tanggal", 0,2,'L');
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(25, 4, "Date", 0,2,'L');

$pdf->SetXY($row_x,265);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(25, 4, "Tanda Tangan", 0,2,'L');
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(25, 4, "Signature", 0,2,'L');

$pdf->SetXY($row_x+25,245);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(25, 4, $data->tgl_tanda_tangan, 0,0,'L');

$pdf->Rect($row_x, 239, 190, 40);

$pdf->Output();