<?php

use Fpdf\Fpdf;

include 'vendor/autoload.php';

	$kop1 = "Lampiran I";
	$kop2 =	"Peraturan Direktur Jenderal Bea dan Cukai Nomor P-39/BC/2008 Tentang";
	$kop3 =	"Tatalaksana Pembayaran dan Penyetoran Penerimaan Negara Dalam";	 	
	$kop4 = "Rangka Impor, Penerimaan Negara Dalam Rangka Ekspor, Penerimaan ";
	$kop5 =	"Negara Atas Barang Kena Cukai dan Penerimaan Negara yang Berasal Dari"; 	
	$kop6 =	"Pengenaan Denda Administrasi Atas Pengangkutan Barang Tertentu";

	$nmktr1 = "Kantor Pelayanan Utama Bea Cukai Tipe C Soekarno Hatta";
	$nmktr2 = "KPU BC Tipe C Soekarno Hatta";
	// $nmktr2 = $nmktr1;
	$idktr = '050100';

	$jnident = 'PASPOR';
	$noident = '901023012301230';

	$npwp = '-';
	$nama = 'Tri Mulyadi Wibowo';
	$alamat = 'Gg Masjid no 50a rt 02/02, Cipondoh, Tangerang';
	
	$noCD = '000321/CD/T2F/2020';
	$tanggalCD = '24-01-2020';

	$trfbm = '';
	$bmrup = 119000;

	$trfdenda = '';
	$dendarup = 0;

	$trfppn = '';
	$ppnrup = 211000;

	$trfppnbm = '';
	$ppnbmrup = 0;

	$trfpph = '';
	$pphrup = 422000;

	$blnpajak = 'Januari';
	$thnpajak = '2020';

	$tottax = $bmrup + $ppnrup + $pphrup + $ppnbmrup;

	$dgnhuruf = "Sekian Juta Rupiah";

	$nmkasir = "Bendahara Penerimaan KPU BC Tipe C Soekarno Hatta";
	$npwpkasir = "317022183992000";
	$alamatkasir = "Area Kargo Bandara Soekarno Hatta";
	
	$nomorsspcp = '002921/SSPCP/T2F/2020';
	$tanggalsspcp = '25-01-2020';

	$namahgr = "Nama PDTT goes here";
	$niphgr = "19840223200401001";

    #sertakan library FPDF dan bentuk objek   
	// require_once ("src/fpdf17/fpdf.php");    	
    $pdf = new Fpdf('P','mm','A4');
	$pdf -> SetAutoPageBreak(True,0);	
//	$pdf->SetTopMargin(5);
    $pdf->AddPage();

    #kop sppb
    $pdf->SetFont('Arial','B','6');
	$pdf->SetX(120);
    $pdf->Cell(20,3, $kop1, '0', 1, 'L');
	$pdf->SetX(120);
	$pdf->Cell(20,3, $kop2, '0', 1, 'L');
	$pdf->SetX(120);
	$pdf->Cell(10,3, $kop3, '0', 1, 'L');
	$pdf->SetX(120);
	$pdf->Cell(10,3, $kop4, '0', 1, 'L');
	$pdf->SetX(120);
	$pdf->Cell(10,3, $kop5, '0', 1, 'L');
	$pdf->SetX(120);
	$pdf->Cell(10,3, $kop6, '0', 1, 'L');

    #menggambar form tabel sspcp  
	$pdf->Rect(7, 29, 65, 20);
		$pdf->Rect(20, 45, 39, 4);
	$pdf->Rect(72, 29, 65, 20);
	$pdf->Rect(137, 29, 65, 20);

	$pdf->Rect(7, 49, 195, 8);
	
	$pdf->Rect(7, 57, 195, 8);
	
	$pdf->Rect(7, 65, 195, 19);
	
	$pdf->Rect(7, 84, 195, 14);
	
	$pdf->Rect(7, 98, 195, 8);
	
	$pdf->Rect(7, 106, 118, 8);
	$pdf->Rect(125, 106, 30, 8);
	$pdf->Rect(155, 106, 47, 8);
	
	$pdf->Rect(7, 114, 118, 97);
	$pdf->Rect(125, 114, 30, 97);
	$pdf->Rect(155, 114, 47, 97);	
	
	$pdf->Rect(7, 211, 148, 8);
	$pdf->Rect(155, 211, 47, 8);

	$pdf->Rect(7, 219, 195, 15);
	
	$pdf->Rect(7, 234, 85, 43);
	$pdf->Rect(92, 234, 110, 43);
		$pdf->Rect(96, 235, 4, 4);
		$pdf->Rect(137, 235, 4, 4);
		$pdf->Rect(168, 235, 4, 4);
		
	$pdf->Rect(7, 277, 195, 8);

    #tampilkan fixed text form sspcp
    $pdf->SetFont('Arial','','10');
	$pdf->SetY(31);
	$pdf->Cell(0,3.5, 'KEMENTERIAN KEUANGAN RI', '0', 1, 'L');
	$pdf->SetFont('Arial','','8');
	$pdf->Cell(0,3.5, 'DIREKTORAT JENDERAL BEA DAN CUKAI', '0', 1, 'L');
	$pdf->Cell(0,3.5, 'KANTOR', '0', 0, 'L');
	$pdf->SetX(23); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	// $pdf->SetX(25); $pdf->Cell(1,3.5, $nmktr1, '0', 1, 'L');	
	$pdf->SetX(25); $pdf->MultiCell(50,3.5, $nmktr1, '0', 'L');	
	$pdf->SetXY(24, 45.5);
	$pdf->SetFont('Arial','','6');
	$pdf->Cell(0,3.5, 'KODE KANTOR  : ', '0', 0, 'L');
	$pdf->SetX(45);
	$pdf->Cell(0,3.5, $idktr, '0', 1, 'L');
		$pdf->SetY(32);
		$pdf->SetFont('Arial','B','12');
		$pdf->Cell(0,5, 'SURAT SETORAN', '0', 1, 'C');
		$pdf->Cell(0,5, 'PABEAN, CUKAI, DAN', '0', 1, 'C');
		$pdf->Cell(0,5, 'PAJAK (SSPCP)', '0', 1, 'C');
			$pdf->SetXY(140,30);
			$pdf->SetFont('Arial','','6');
			$pdf->Cell(0,3, 'LEMBAR KE :', '0', 1, 'L');
			$pdf->SetX(140); $pdf->Cell(0,3, '1.  WAJIB BAYAR', '0', 1, 'L');
			$pdf->SetX(140); $pdf->Cell(0,3, '2.  KPPN', '0', 1, 'L');
			$pdf->SetX(140); $pdf->Cell(0,3, '3.  KANTOR BEA DAN CUKAI', '0', 1, 'L');
			$pdf->SetX(140); $pdf->Cell(0,3, '4.  BANK DEVISA PERSEPSI/ BANK', '0', 1, 'L');
			$pdf->SetX(143); $pdf->Cell(0,3, 'PERSEPSI/ POS PERSEPSI', '0', 1, 'L');
			
	$pdf->SetFont('Arial','','8');
	$pdf->SetY(51);
	$pdf->Cell(0,3.5, 'A.  JENIS PENERIMAAN NEGARA', '0', 0, 'L');
	$pdf->SetX(82); $pdf->Cell(0,3.5, ':  ', '0', 0, 'L');
	$pdf->SetX(87); $pdf->Cell(0,3.5, 'IMPOR', '0', 1, 'L');

	$pdf->SetY(59);
	$pdf->Cell(0,3.5, 'B.  JENIS IDENTITAS / NOMOR', '0', 0, 'L');
	$pdf->SetX(82); $pdf->Cell(0,3.5, ':  ', '0', 0, 'L');
	$pdf->SetX(87); $pdf->Cell(0,3.5, $jnident, '0', 0, 'L');
	$pdf->SetX(105); $pdf->Cell(0,3.5, '/', '0', 0, 'L');
	$pdf->SetX(107); $pdf->Cell(0,3.5, $noident, '0', 1, 'L');
	$pdf->SetY(67);
	$pdf->SetX(15); $pdf->Cell(0,5, 'NPWP', '0', 0, 'L');
	$pdf->SetX(82); $pdf->Cell(0,5, ':  ', '0', 0, 'L');
	$pdf->SetX(87); $pdf->Cell(0,5, $npwp, '0', 1, 'L');
	$pdf->SetX(15); $pdf->Cell(0,5, 'NAMA', '0', 0, 'L');
	$pdf->SetX(82); $pdf->Cell(0,5, ':  ', '0', 0, 'L');
	$pdf->SetX(87); $pdf->Cell(0,5, $nama, '0', 1, 'L');	
	$pdf->SetX(15); $pdf->Cell(0,5, 'ALAMAT', '0', 0, 'L');
	$pdf->SetX(82); $pdf->Cell(0,5, ':  ', '0', 0, 'L');
	$pdf->SetX(87); $pdf->Cell(0,5, $alamat, '0', 1, 'L');
	
	
	$pdf->SetY(86);
	$pdf->Cell(0,3.5, 'C.  DOKUMEN DASAR PEMBAYARAN', '0', 0, 'L');
	$pdf->SetX(82); $pdf->Cell(0,3.5, ':  ', '0', 0, 'L');
	$pdf->SetX(87); $pdf->Cell(0,3.5, 'CUSTOMS DECLARATION', '0', 1, 'L');	
	$pdf->SetY(91);
	$pdf->SetX(14.5); $pdf->Cell(0,4, 'NOMOR', '0', 0, 'L');
	$pdf->SetX(82); $pdf->Cell(0,4, ':  ', '0', 0, 'L');
	$pdf->SetX(87); $pdf->Cell(0,4, $noCD, '0', 0, 'L');	
	$pdf->SetX(137); $pdf->Cell(0,4, 'TANGGAL', '0', 0, 'L');
	$pdf->SetX(158); $pdf->Cell(0,4, ':  ', '0', 0, 'L');
	$pdf->SetX(163); $pdf->Cell(0,4, $tanggalCD, '0', 1, 'L');	
	

	
	$pdf->SetY(100.5);
	$pdf->Cell(0,3.5, 'D.  PEMBAYARAN PENERIMAAN NEGARA', '0', 1, 'L');	
	$pdf->SetY(108);
	$pdf->Cell(105,4, 'AKUN', '0', 0, 'C');
	$pdf->SetX(130); $pdf->Cell(0,4, 'KODE AKUN', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4, 'JUMLAH PEMBAYARAN', '0', 1, 'L');

	$pdf->SetY(117.5);
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'Bea Masuk', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, $trfbm, '0', 0, 'R');
	$pdf->SetX(130); $pdf->Cell(20,4.5, '412111', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, number_format($bmrup, 2), '0', 1, 'R');
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'Bea Masuk Ditanggung Pemerintah atau Hibah (SPM) Nilai', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
		$pdf->SetX(130); $pdf->Cell(20,4.5, '412112', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'Bea Masuk Dalam Rangka Kemudahan Impor Tujuan Ekspor (KITE)', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
	$pdf->SetX(130); $pdf->Cell(20,4.5, '412114', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'Denda Administrasi Pabean', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, $trfdenda, '0', 0, 'R');
		$pdf->SetX(130); $pdf->Cell(20,4.5, '412113', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, number_format($dendarup, 2), '0', 1, 'R');	
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'Denda Administrasi Atas Pengangkutan Barang Tertentu', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
	$pdf->SetX(130); $pdf->Cell(20,4.5, '412115', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'Penerimaan Pabean Lainnya', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
		$pdf->SetX(130); $pdf->Cell(20,4.5, '412119', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');			
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'Bea Keluar', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
	$pdf->SetX(130); $pdf->Cell(20,4.5, '412211', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'Denda Administrasi Bea Keluar', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
		$pdf->SetX(130); $pdf->Cell(20,4.5, '412212', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'Bunga Bea Keluar', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
	$pdf->SetX(130); $pdf->Cell(20,4.5, '412213', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'Cukai Hasil Tembakau', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
		$pdf->SetX(130); $pdf->Cell(20,4.5, '411511', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'Cukai Etil Alkohol', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
	$pdf->SetX(130); $pdf->Cell(20,4.5, '411512', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'Cukai Minuman Mengandung Etil Alkohol', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
		$pdf->SetX(130); $pdf->Cell(20,4.5, '411513', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'Pendapatan Cukai Lainnya', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
	$pdf->SetX(130); $pdf->Cell(20,4.5, '411519', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'Denda Administrasi Cukai', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
		$pdf->SetX(130); $pdf->Cell(20,4.5, '411514', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'PNBP/ Pendapatan DJBC', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
	$pdf->SetX(130); $pdf->Cell(20,4.5, '423216', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');	
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'PPN Impor', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, $trfppn, '0', 0, 'R');
		$pdf->SetX(130); $pdf->Cell(20,4.5, '411212', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, number_format($ppnrup, 2), '0', 1, 'R');	
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'PPN Hasil Tembakau/ PPN Dalam Negeri', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
	$pdf->SetX(130); $pdf->Cell(20,4.5, '411211', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'PPnBM Impor', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, $trfppnbm, '0', 0, 'R'); 
		$pdf->SetX(130); $pdf->Cell(20,4.5, '411222', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, number_format($ppnbmrup, 2), '0', 1, 'R');
	$pdf->SetX(15); $pdf->Cell(0,4.5, 'PPh Pasal 22 Impor', '0', 0, 'L');
	$pdf->SetX(120); $pdf->Cell(1,4.5, $trfpph, '0', 0, 'R'); 
	$pdf->SetX(130); $pdf->Cell(20,4.5, '411123', '0', 0, 'C');
	$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
	$pdf->SetX(161); $pdf->Cell(0,4.5, number_format($pphrup, 2), '0', 1, 'R');
		$pdf->SetX(15); $pdf->Cell(0,4.5, 'Bunga Penagihan PPN', '0', 0, 'L');
		$pdf->SetX(120); $pdf->Cell(1,4.5, '', '0', 0, 'R');
		$pdf->SetX(130); $pdf->Cell(20,4.5, '411622', '0', 0, 'C');
		$pdf->SetX(159); $pdf->Cell(1,4.5, 'Rp.', '0', 0, 'L');
		$pdf->SetX(161); $pdf->Cell(0,4.5, '0,00', '0', 1, 'R');

	$pdf->SetY(213);
	$pdf->SetX(15); $pdf->Cell(1,4, 'Masa Pajak           :    ', '0', 0, 'L');
	$pdf->SetX(50); $pdf->Cell(1,4, $blnpajak, '0', 0, 'L');
	$pdf->SetX(159); $pdf->Cell(0,4, 'Tahun         :   ', '0', 0, 'L');
	$pdf->SetX(180); $pdf->Cell(0,4, $thnpajak, '0', 1, 'L');

	$pdf->SetY(221);
	$pdf->Cell(0,3.5, 'E.  JUMLAH PEMBAYARAN PENERIMAAN NEGARA', '0', 0, 'L');	
	$pdf->SetX(82); $pdf->Cell(0,3.5, ':  ', '0', 0, 'L');
	$pdf->SetX(87); $pdf->Cell(0,3.5, 'Rp.  ', '0', 0, 'L');	
	$pdf->SetX(120); $pdf->Cell(1,3.5, number_format($tottax, 2), '0', 1, 'R');
	$pdf->SetX(15); $pdf->Cell(1,8, 'Dengan Huruf       :', '0', 0, 'L');
	$pdf->SetXY(43, 226.5); $pdf->MultiCell(155,3.5, $dgnhuruf, '0', 'L');

	$pdf->SetY(237);
	$pdf->SetX(8); $pdf->Cell(1,3.5, 'Diterima Oleh', '0', 0, 'L');
	$pdf->SetX(29); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(32); $pdf->MultiCell(60,3.5, $nmkasir, '0', 'L');
		$pdf->SetX(8); $pdf->Cell(1,3.5, 'NPWP', '0', 0, 'L');
		$pdf->SetX(29); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
		$pdf->SetX(32); $pdf->Cell(1,3.5, $npwpkasir, '0', 1, 'L');
	$pdf->SetX(8); $pdf->Cell(1,3.5, 'Kantor', '0', 0, 'L');
	$pdf->SetX(29); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(32); $pdf->MultiCell(60,3.5, $nmktr2, '0', 'L');
		$pdf->SetX(8); $pdf->Cell(1,3.5, 'Alamat', '0', 0, 'L');
		$pdf->SetX(29); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
		$pdf->SetX(32); $pdf->Cell(1,3.5, $alamatkasir, '0', 1, 'L');
	$pdf->SetX(8); $pdf->Cell(1,3.5, 'Nomor SSPCP', '0', 0, 'L');
	$pdf->SetX(29); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(32); $pdf->Cell(1,3.5, $nomorsspcp, '0', 1, 'L');
		$pdf->SetX(8); $pdf->Cell(1,3.5, 'Tanggal', '0', 0, 'L');
		$pdf->SetX(29); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
		$pdf->SetX(32); $pdf->Cell(1,3.5, $tanggalsspcp, '0', 1, 'L');

	$pdf->SetY(269);	
	$pdf->SetX(32); $pdf->Cell(1,3.5, 'Nama', '0', 0, 'L');
	$pdf->SetX(42); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(44); $pdf->Cell(1,3.5, $namahgr, '0', 1, 'L');
		$pdf->SetX(32); $pdf->Cell(1,3.5, 'NIP', '0', 0, 'L');
		$pdf->SetX(42); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
		$pdf->SetX(44); $pdf->Cell(1,3.5, $niphgr, '0', 1, 'L');

	$pdf->SetY(235);
	$pdf->SetX(101); $pdf->Cell(1,3.5, 'Bank Devisa Persepsi', '0', 0, 'L');
	$pdf->SetX(142); $pdf->Cell(1,3.5, 'Bank Persepsi', '0', 0, 'L');
	$pdf->SetX(173); $pdf->Cell(1,3.5, 'Pos Persepsi', '0', 1, 'L');
	
	$pdf->SetY(241);
	$pdf->SetX(94); $pdf->Cell(1,3.5, 'Nama Bank/ POS', '0', 0, 'L');
	$pdf->SetX(124); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(126); $pdf->Cell(1,3.5, '...........................................................................................', '0', 1, 'L');
	$pdf->SetX(94); $pdf->Cell(1,3.5, 'Kode Bank/ POS', '0', 0, 'L');
	$pdf->SetX(124); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(126); $pdf->Cell(1,3.5, '...........................................................................................', '0', 1, 'L');
	$pdf->SetX(94); $pdf->Cell(1,3.5, 'Nomor SSPCP', '0', 0, 'L');
	$pdf->SetX(124); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(126); $pdf->Cell(1,3.5, '...........................................................................................', '0', 1, 'L');
	$pdf->SetX(94); $pdf->Cell(1,3.5, 'Unit KPPN', '0', 0, 'L');
	$pdf->SetX(124); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(126); $pdf->Cell(1,3.5, '............................................................ Kode ....................', '0', 1, 'L');
	$pdf->SetX(94); $pdf->Cell(1,3.5, 'Tanggal', '0', 0, 'L');
	$pdf->SetX(124); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(126); $pdf->Cell(1,3.5, '...........................................................................................', '0', 1, 'L');

	$pdf->SetY(269);	
	$pdf->SetX(126); $pdf->Cell(1,3.5, 'Nama', '0', 0, 'L');
	$pdf->SetX(140); $pdf->Cell(1,3.5, ':', '0', 0, 'L');
	$pdf->SetX(142); $pdf->Cell(1,3.5, '.....................................................', '0', 1, 'L');
		$pdf->SetX(126); $pdf->Cell(1,3.5, '', '0', 0, 'L');
		$pdf->SetX(140); $pdf->Cell(1,3.5, '', '0', 0, 'L');
		$pdf->SetX(142); $pdf->Cell(1,3.5, '.....................................................', '0', 1, 'L');
		
	$pdf->SetY(279);	
	$pdf->SetX(9); $pdf->Cell(1,3.5, 'NTB/ NTP  :  ', '0', 0, 'L');
	$pdf->SetX(25); $pdf->Cell(1,3.5, '.......................................................................................', '0', 0, 'L');
	$pdf->SetX(94); $pdf->Cell(1,3.5, 'NTPN  :  ', '0', 0, 'L');
	$pdf->SetX(105); $pdf->Cell(1,3.5, '..............................................................................................................', '0', 1, 'L');
	
	// CORS HEADER
	header('Access-Control-Allow-Origin: *');
    #output file PDF
    $pdf->Output("I", "sspcp.pdf");
?>	