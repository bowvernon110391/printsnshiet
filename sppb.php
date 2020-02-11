<?php
require_once 'vendor/autoload.php';
use Fpdf\Fpdf;
	//data variabel
	$kop_a = "KEMENTERIAN KEUANGAN REPUBLIK INDONESIA ";
	$kop_b = "DIREKTORAT JENDERAL BEA DAN CUKAI ";
	$kop_c = "KANTOR PELAYANAN UTAMA BEA DAN CUKAI TIPE C SOEKARNO-HATTA";
	$kop_d = "";
	$kop1  = " SURAT PERSETUJUAN PENGELUARAN BARANG";

	$nosppb = '999999';
	$year = '2020';
	$date = '2020-01-01';
	$nopibk = '999999';
	$tglpibk = '2020-01-01';
	$noidtahu = '21.057.733.7-402.000';
	$nmTahu = strtoupper('PT. Perigi Raja Terpadu');
	$idterima = '04.589.204.5-038.000';
	$nmterima = strtoupper('pt multi fortuna sinar delta');
	$lokasi = 'TPP';
	$hawb = '166-33563333';
	$tglawb = '2020-01-01';
	$nmsarana = strtoupper('madrid bridgge');
	$voy = 'MB0007';
	$mawb = '166-33563333';
	$bc11 = '555555';
	$tglbc = '2020-01-01';
	$kemas = '12 px';
	$pos = '01';
	$subpos = '1234.1239';
	$berat = '1,000';
	
	
    #sertakan library FPDF dan bentuk objek   
    $pdf = new FPDF('P','mm','A4');
//	$pdf->SetTopMargin(5);
    $pdf->AddPage();
	
	#judul
    $pdf->SetFont('Arial','B','12');
	$pdf->SetXY(50, 33);
    $pdf->Cell(20,5, $kop1, '0', 3, 'L');
	
	$pdf->SetFont('Arial','','10');
	$pdf->SetXY(15,16); $pdf->Cell(0,3.5, $kop_a, 0, 1, 'L');
	$pdf->SetXY(15,20); $pdf->Cell(0,3.5, $kop_b, 0, 1, 'L');
	$pdf->SetXY(15,24); $pdf->Cell(0,3.5, $kop_c, 0, 1, 'L');
	$pdf->SetXY(15,28); $pdf->Cell(0,3.5, $kop_d, 0, 1, 'L');
	
	#menggambar form tabel pib
	// $pdf->Rect(15,15,180,0.1);
	// $pdf->Rect(15,32,180,0.1);
	
	
	$pdf->Rect(15, 135, 85, 4);    
		$pdf->Rect(21, 135, 20, 4);  
		$pdf->Rect(54, 135, 20, 4);
	$pdf->Rect(15, 139, 85, 4);    
		$pdf->Rect(21, 139, 20, 4);  
		$pdf->Rect(54, 139, 20, 4);
	// $pdf->Rect(15, 143, 85, 20);    
	// 	$pdf->Rect(21, 143, 20, 20);  
	// 	$pdf->Rect(54, 143, 20, 20);	
	
	$pdf->Rect(100, 135, 95, 4);    
		$pdf->Rect(106, 135, 22, 4);  
		$pdf->Rect(143, 135, 25, 4);
	$pdf->Rect(100, 139, 95, 4);    
		$pdf->Rect(106, 139, 22, 4);  
		$pdf->Rect(143, 139, 25, 4);
	// $pdf->Rect(100, 143, 95, 20);    
	// 	$pdf->Rect(106, 143, 22, 20);  
	// 	$pdf->Rect(143, 143, 25, 20);

	$pdf->SetFont('Arial','','9');
	$pdf->SetXY(15,135.5);	$pdf->Cell(0,3.5, 'No. ', '0', 0, 'L');
	$pdf->SetXY(23,135.5);	$pdf->Cell(0,3.5, 'No. Peti ', '0', 0, 'L');
	$pdf->SetXY(42,135.5);	$pdf->Cell(0,3.5, 'Ukuran ', '0', 0, 'L');
	$pdf->SetXY(54.3,135.5);	$pdf->Cell(0,3.5, 'Penegahan ', '0', 0, 'L');
	$pdf->SetXY(75,135.5);	$pdf->Cell(0,3.5, 'Keterangan ', '0', 0, 'L');
	
	$pdf->SetFont('Arial','','9');
	$pdf->SetXY(100,135.5);	$pdf->Cell(0,3.5, 'No. ', '0', 0, 'L');
	$pdf->SetXY(110,135.5);	$pdf->Cell(0,3.5, 'No. Peti', '0', 0, 'L');
	$pdf->SetXY(130,135.5);	$pdf->Cell(0,3.5, 'Ukuran ', '0', 0, 'L');
	$pdf->SetXY(147,135.5);	$pdf->Cell(0,3.5, 'Penegahan ', '0', 0, 'L');
	$pdf->SetXY(173,135.5);	$pdf->Cell(0,3.5, 'Keterangan ', '0', 0, 'L');
		
	$pdf->SetXY(15.5,139.3);	$pdf->Cell(0,3.5, '(1) ', '0', 0, 'L');
	$pdf->SetXY(27,139.3);	$pdf->Cell(0,3.5, '(2) ', '0', 0, 'L');
	$pdf->SetXY(43,139.3);	$pdf->Cell(0,3.5, '(3) ', '0', 0, 'L');
	$pdf->SetXY(60,139.3);	$pdf->Cell(0,3.5, '(4) ', '0', 0, 'L');
	$pdf->SetXY(85,139.3);	$pdf->Cell(0,3.5, '(5) ', '0', 0, 'L');
	
	$pdf->SetXY(100.5,139.3);	$pdf->Cell(0,3.5, '(1) ', '0', 0, 'L');
	$pdf->SetXY(114,139.3);	$pdf->Cell(0,3.5, '(2) ', '0', 0, 'L');
	$pdf->SetXY(133,139.3);	$pdf->Cell(0,3.5, '(3) ', '0', 0, 'L');
	$pdf->SetXY(153,139.3);	$pdf->Cell(0,3.5, '(4) ', '0', 0, 'L');
	$pdf->SetXY(178,139.3);	$pdf->Cell(0,3.5, '(5) ', '0', 0, 'L');
	
	
    #tampilkan fixed text form sspcp	
    $pdf->SetFont('Arial','','10');
	$pdf->SetXY(65, 38);	$pdf->Cell(0,3.6, 'No.', '0', 0, 'L');
	$pdf->SetFont('Arial','','10');
	$pdf->SetXY(75,38); $pdf->Cell(0,3.6, $nosppb, '0', 1, 'L');
	$pdf->SetXY(90, 38);	$pdf->Cell(0,3.6, '/KPU.03/', '0', 0, 'L');
	$pdf->SetXY(115,38); $pdf->Cell(0,3.6, $year, '0', 1, 'L');
	$pdf->SetXY(130, 38);	$pdf->Cell(0,3.6, 'Tanggal : ', '0', 0, 'L');
	$pdf->SetXY(147,38); $pdf->Cell(0,3.6, $date, '0', 1, 'L');
	
	
	$pdf->SetFont('Arial','','10');
	$pdf->SetXY(15,50);	$pdf->Cell(0,3.5, 'Nomor Penerimaan ', '0', 0, 'L');
	$pdf->SetXY(65,50); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(100,50); $pdf->Cell(0,3.5, 'Tgl ', '0', 0, 'L');
	$pdf->SetXY(105,50); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
	
	$pdf->SetXY(15,54);	$pdf->Cell(0,3.5, 'Nomor PIBK ', '0', 0, 'L');
	$pdf->SetXY(65,54); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(84,54); $pdf->Cell(0,3.5, $nopibk, '0', 1, 'L');
	$pdf->SetXY(100,54); $pdf->Cell(0,3.5, 'Tgl ', '0', 0, 'L');
	$pdf->SetXY(105,54); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(108,54); $pdf->Cell(0,3.5, $tglpibk, '0', 1, 'L');
		
	$pdf->SetFont('Arial','','10');
	$pdf->SetXY(15,70);	$pdf->Cell(0,3.5, 'PEMBERITAHU ', '0', 0, 'L');
	$pdf->SetXY(65,70); $pdf->Cell(0,3.5, '', '0', 0, 'L');
	$pdf->SetXY(20,74);	$pdf->Cell(0,3.5, 'NPWP ', '0', 0, 'L');
	$pdf->SetXY(65,74); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(68,74); $pdf->Cell(0,3.5, $noidtahu, '0', 1, 'L');
	$pdf->SetXY(20,78);	$pdf->Cell(0,3.5, 'Nama ', '0', 0, 'L');
	$pdf->SetXY(65,78); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(68,78); $pdf->Cell(0,3.5, $nmTahu, '0', 1, 'L');
	
	$pdf->SetXY(15,86);	$pdf->Cell(0,3.5, 'IMPORTIR ', '0', 0, 'L');
	$pdf->SetXY(65,86); $pdf->Cell(0,3.5, '', '0', 0, 'L');
	$pdf->SetXY(20,90);	$pdf->Cell(0,3.5, 'NPWP ', '0', 0, 'L');
	$pdf->SetXY(65,90); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(68,90); $pdf->Cell(0,3.5, $idterima, '0', 1, 'L');
	$pdf->SetXY(20,94);	$pdf->Cell(0,3.5, 'Nama ', '0', 0, 'L');
	$pdf->SetXY(65,94); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(68,94); $pdf->Cell(0,3.5, $nmterima, '0', 1, 'L');
		
	$pdf->SetXY(15,102);	$pdf->Cell(0,3.5, 'Lokasi Barang ', '0', 0, 'L');
	$pdf->SetXY(65,102); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(68,102); $pdf->Cell(0,3.5, $lokasi, '0', 1, 'L');
		//$pdf->SetXY(68,102); $pdf->Cell(0,3.5, $idtahu, '0', 1, 'L');
	$pdf->SetXY(15,106);	$pdf->Cell(0,3.5, 'No. Tgl. B/L/AWB ', '0', 0, 'L');
	$pdf->SetXY(65,106); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(68,106); $pdf->Cell(0,3.5, $hawb, '0', 1, 'L');
		$pdf->SetXY(95,106); $pdf->Cell(0,3.5, $tglawb, '0', 1, 'L');
	$pdf->SetXY(15,110);	$pdf->Cell(0,3.5, 'Sarana Pengangkut ', '0', 0, 'L');
	$pdf->SetXY(65,110); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(68,110); $pdf->Cell(0,3.5, $nmsarana, '0', 1, 'L');
	$pdf->SetXY(15,114); $pdf->Cell(0,3.5, 'No. Voy/Flight ', '0', 0, 'L');
	$pdf->SetXY(65,114); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(68,114); $pdf->Cell(0,3.5, $voy, '0', 1, 'L');
		$pdf->SetXY(95,114); $pdf->Cell(0,3.5, $mawb, '0', 1, 'L');
	$pdf->SetXY(15,118); $pdf->Cell(0,3.5, 'No. Tgl BC.1.1/BC ', '0', 0, 'L');
	$pdf->SetXY(65,118); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(68,118); $pdf->Cell(0,3.5, $bc11, '0', 1, 'L');
		$pdf->SetXY(95,118); $pdf->Cell(0,3.5, $tglbc, '0', 1, 'L');
	$pdf->SetXY(15,122); $pdf->Cell(0,3.5, 'Jumlah/Jenis Kemasan ', '0', 0, 'L');
	$pdf->SetXY(65,122); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(68,122); $pdf->Cell(0,3.5, $kemas, '0', 1, 'L');
	$pdf->SetXY(15,126); $pdf->Cell(0,3.5, 'Merek Kemasan ', '0', 0, 'L');
	$pdf->SetXY(65,126); $pdf->Cell(0,3.5, ':', '0', 0, 'L');

	
	$pdf->SetXY(135,118); $pdf->Cell(0,3.5, 'Pos', '0', 0, 'L');
	$pdf->SetXY(145,118); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(148,118); $pdf->Cell(0,3.5, $pos, '0', 1, 'L');
	$pdf->SetXY(158,118); $pdf->Cell(0,3.5, 'Sub.Pos ', '0', 0, 'L');
		$pdf->SetXY(175,118); $pdf->Cell(0,3.5, $subpos, '0', 1, 'L');
	$pdf->SetXY(135,122); $pdf->Cell(0,3.5, 'Koli ', '0', 0, 'L');
	$pdf->SetXY(145,122); $pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(148,122); $pdf->Cell(0,3.5, $berat, '0', 1, 'L');
		$pdf->SetXY(160,122); $pdf->Cell(0,3.5, 'Kgs ', '0', 0, 'L');
	
	$pdf->SetXY(17,200);	$pdf->Cell(0,3.5, 'Pejabat yang memeriksa dokumen', '0', 0, 'L');
	$pdf->SetXY(17,208);	$pdf->Cell(0,3.5, 'Tanda tangan ', '0', 0, 'L');
	$pdf->SetXY(35,208);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(17,212);	$pdf->Cell(0,3.5, 'Nama ', '0', 0, 'L');
	$pdf->SetXY(35,212);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(17,216);	$pdf->Cell(0,3.5, 'NIP ', '0', 0, 'L');
	$pdf->SetXY(35,216);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');

	$pdf->SetXY(98,200);	$pdf->Cell(0,3.5, 'Pejabat yang melaksanakan pengeluaran barang', '0', 0, 'L');
	$pdf->SetXY(98,208);	$pdf->Cell(0,3.5, 'Tanda tangan ', '0', 0, 'L');
	$pdf->SetXY(116,208);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(98,212);	$pdf->Cell(0,3.5, 'Nama ', '0', 0, 'L');
	$pdf->SetXY(116,212);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(98,216);	$pdf->Cell(0,3.5, 'NIP ', '0', 0, 'L');
	$pdf->SetXY(116,216);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
	
	// $pdf->Rect(15,233,180,0.1);
		$pdf->SetXY(17,236);	$pdf->Cell(0,3.5, 'Lembar 1 untuk Importir / Pemberitahu ', '0', 0, 'L');
		$pdf->SetXY(17,240);	$pdf->Cell(0,3.5, 'Lembar 2 untuk DJBC ', '0', 0, 'L');
	// $pdf->Rect(15,242,180,0.1);
/*	
		
	
	$pdf->SetXY(17,200);	$pdf->Cell(0,3.5, 'Pejabat yang memeriksa dokumen I/II ', '0', 0, 'L');
	$pdf->SetXY(17,208);	$pdf->Cell(0,3.5, 'Tanda tangan ', '0', 0, 'L');
	$pdf->SetXY(35,208);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(17,212);	$pdf->Cell(0,3.5, 'Nama ', '0', 0, 'L');
	$pdf->SetXY(35,212);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(37,212); $pdf->Cell(0,3.5, $namahgr, '0', 1, 'L');		
	$pdf->SetXY(17,216);	$pdf->Cell(0,3.5, 'NIP ', '0', 0, 'L');
	$pdf->SetXY(35,216);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
		$pdf->SetXY(37,216); $pdf->Cell(0,3.5, $niphgr, '0', 1, 'L');
	$pdf->SetXY(98,200);	$pdf->Cell(0,3.5, 'Pejabat yang melaksanakan pengeluaran barang', '0', 0, 'L');
	$pdf->SetXY(98,208);	$pdf->Cell(0,3.5, 'Tanda tangan ', '0', 0, 'L');
	$pdf->SetXY(116,208);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(98,212);	$pdf->Cell(0,3.5, 'Nama ', '0', 0, 'L');
	$pdf->SetXY(116,212);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
	$pdf->SetXY(98,216);	$pdf->Cell(0,3.5, 'NIP ', '0', 0, 'L');
	$pdf->SetXY(116,216);	$pdf->Cell(0,3.5, ':', '0', 0, 'L');
	
	
	
	$pdf->SetXY(102, 222.5); $pdf->Cell(0,3.5, 'G. UNTUK PEMBAYARAN / JAMINAN', '0', 0, 'L');
		$pdf->SetXY(102,227); $pdf->Cell(0,3.5, 'a. Pembayaran', '0', 0, 'L');
		$pdf->SetXY(102,231); $pdf->Cell(0,3.5, 'b. Jaminan', '0', 0, 'L');
			$pdf->SetXY(130,227); $pdf->Cell(0,3.5, '1.Bank;   2.Pos;                 3.Kantor Pabean', '0', 0, 'L');
			$pdf->SetXY(130,231); $pdf->Cell(0,3.5, '1.Tunai;  2.Bank Garansi;  3.Customs Bond;  4.Lainnya', '0', 0, 'L');
		$pdf->SetXY(153,240.5); $pdf->Cell(0,3.5, 'Nomor', '0', 0, 'L');
		$pdf->SetXY(188,240.5); $pdf->Cell(0,3.5, 'Tgl.', '0', 0, 'L');
		$pdf->SetXY(102,244); $pdf->Cell(0,3.5, 'Pembayaran', '0', 0, 'L');
		$pdf->SetXY(102,248); $pdf->Cell(0,3.5, 'Jaminan', '0', 0, 'L');
	
	$pdf->SetXY(114,252); $pdf->Cell(0,3.5, 'Pejabat Penerima', '0', 0, 'L');
	$pdf->SetXY(165,252); $pdf->Cell(0,3.5, 'Nama / Stempel Instansi', '0', 0, 'L');
	$pdf->SetXY(108,268); $pdf->Cell(0,3.5, '(.........................................)', '0', 0, 'L');
	$pdf->SetXY(163,268); $pdf->Cell(0,3.5, '(.........................................)', '0', 0, 'L');
*/	
	//contoh multicell
	//$pdf->SetXY(43, 226.5); $pdf->MultiCell(155,3.5, $dgnhuruf, '0', 'L');

	
    #output file PDF
    $pdf->Output();
?>	