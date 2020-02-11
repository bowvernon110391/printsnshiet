<?php
require_once 'vendor/autoload.php';
include('data-pibk.php');
use Fpdf\Fpdf;
   	
    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();

    #kop pibk
    $pdf->SetFont('Arial','B','12');
	$pdf->SetX(55);
    $pdf->Cell(10,2, $kop1, 0, 3, 'L');
	
	#menggambar form tabel pib
	$pdf->Rect(7, 15, 195, 10);    // ini satu kolom ditambah 1 sub
		$pdf->Rect(23, 16, 10, 4);  
	
	$pdf->Rect(7, 25, 95, 18); //baris ke 2
		$pdf->Rect(90,25,12,4);
	$pdf->Rect(102, 25, 100, 18);
		$pdf->Rect(103,28,43,0.2);
		$pdf->Rect(155,29.5,20,4);
		$pdf->Rect(180,29.5,20,4);
		$pdf->Rect(180,34,20,4);
	
	$pdf->Rect(7, 43, 95, 23);  //baris ke 3
	$pdf->Rect(102, 43, 100, 18);
		$pdf->Rect(102,47,100,19);
		$pdf->Rect(102,56,100,0.05);
			
	$pdf->Rect(7, 66, 95, 21); //baris ke 4
		$pdf->Rect(70, 83, 12,4);
		$pdf->Rect(84, 83, 18,4);
	$pdf->Rect(102, 66, 100, 21);
		$pdf->Rect(102,72,100,11);
		$pdf->Rect(102,76.4,100,0.05);
		
	$pdf->Rect(7, 87, 95, 8);
		$pdf->Rect(94,87,8,4);
	$pdf->Rect(102, 87, 100, 8);	
	
	$pdf->Rect(7, 95, 95, 16);
		$pdf->Rect(7,103,47,8);
		$pdf->Rect(54,103,48,8);
	$pdf->Rect(102, 95, 100, 16);
		
	$pdf->Rect(7, 111, 195, 4);
		$pdf->Rect(16,111,99,4);
		$pdf->Rect(115,111,50,4);
	
	$pdf->Rect(7, 115, 195, 12);
		$pdf->Rect(16,115,99,12);
		$pdf->Rect(115,115,50,12);
		
	$pdf->Rect(7, 127, 195, 28);
	
	$pdf->Rect(7, 155, 195, 4);
	
	$pdf->Rect(7, 159, 195, 7);
		$pdf->Rect(16,159,86,7);
		$pdf->Rect(127,159,25,7);
		
	$pdf->Rect(7, 166, 195, 15);
		$pdf->Rect(16,166,86,15);
		$pdf->Rect(127,166,25,15);	
	
	$pdf->Rect(7, 181, 195, 5);
		$pdf->Rect(102,181,25,5);
		
 	$pdf->Rect(7, 186, 95, 36);	
	$pdf->Rect(102, 186, 100, 36);
		$pdf->Rect(102, 186, 25, 6);
		$pdf->Rect(102, 192, 25, 6);
		$pdf->Rect(102, 198, 25, 6);
		$pdf->Rect(102, 204, 25, 6);		
		$pdf->Rect(102, 210, 25, 6);
		$pdf->Rect(102, 216, 25, 6);
		
        $pdf->Rect(127, 186, 75, 6);
		$pdf->Rect(127, 192, 75, 6);
		$pdf->Rect(127, 198, 75, 6);
		$pdf->Rect(127, 204, 75, 6);
		$pdf->Rect(127, 210, 75, 6);
		$pdf->Rect(127, 216, 75, 6);
		
	$pdf->Rect(7, 222, 95, 50);	
	$pdf->Rect(102, 222, 100, 50);	
		$pdf->Rect(102, 222, 100, 18);
		$pdf->Rect(103,226,50,0.1);
			$pdf->Rect(124, 227, 6, 4);//
			$pdf->Rect(124, 231, 6, 4);
			
		$pdf->Rect(102, 240, 30, 4);
		$pdf->Rect(102, 244, 30, 4);
		$pdf->Rect(102, 248, 30, 4);
		
		$pdf->Rect(132, 240, 50, 4);
		$pdf->Rect(132, 244, 50, 4);
		$pdf->Rect(132, 248, 50, 4);
		
		$pdf->Rect(182, 240, 20, 4);
		$pdf->Rect(182, 244, 20, 4);
		$pdf->Rect(182, 248, 20, 4);
		
		$pdf->Rect(102, 252, 100, 20);
		
		
    #tampilkan fixed text form sspcp	
    $pdf->SetFont('Arial','','10');
	$pdf->SetY(16.5);	$pdf->Cell(0,3.5, 'Untuk', 0, 0, 'L');
	$pdf->SetFont('Arial','','8');
	$pdf->SetXY(26,16.5); $pdf->Cell(0,3.5, $noutk, 0, 1, 'L');
	
	$pdf->SetFont('Arial','','8');
	$pdf->SetXY(38, 16); $pdf->Cell(0,3.5, '1.Barang Pindahan          2.Barang Kiriman Melalui PJT    3.Barang Impor Sementara Dibawa Penumpang  ', 0, 0, 'L');
	$pdf->SetXY(38, 20); $pdf->Cell(0,3.5, '4.Barang Impor Tertentu  5.Barang Pribadi Penumpang    6.Lainnya  ', 0, 0, 'L');	
	
	$pdf->SetY(25);	$pdf->Cell(0,3.5, '1. Nama, Alamat Pengirim Barang :', 0, 0, 'L');
	$pdf->SetXY(92,25); $pdf->Cell(0,3.5, $kdkirim, 0, 1, 'L');
	$pdf->SetXY(13,28); $pdf->Cell(0,3.5, $nmkirim, 0, 1, 'L');
	$pdf->SetXY(13,31.5); $pdf->MultiCell(80,3, $almkirim, 0, 'L');
		$pdf->SetXY(102, 25); $pdf->Cell(0,3.5, 'D. DIISI OLEH BEA DAN CUKAI', 0, 0, 'L');
		$pdf->SetXY(102, 29); $pdf->Cell(0,3.5, 'No. &	Tgl.Pendaftaran :', 0, 0, 'L');
		$pdf->SetXY(158,30); $pdf->Cell(0,3.5, $nopibk2, 0, 1, 'L');
		$pdf->SetXY(182,30); $pdf->Cell(0,3.5, $tglpibk, 0, 1, 'L');
		$pdf->SetXY(102, 34); $pdf->MultiCell(78,3, "Kantor Pabean : $nmKantor", 0, 'L');
		$pdf->SetXY(182,34.5); $pdf->Cell(0,3.5, $kdkantor, 0, 1, 'C');		
		$pdf->SetXY(102, 39); $pdf->Cell(0,3.5, 'No. BC.1.1 :', 0, 0, 'L');
		$pdf->SetXY(119,39); $pdf->Cell(0,3.5, $bc11, 0, 1, 'L');
			$pdf->SetXY(130,39); $pdf->Cell(0,3.5, 'Tgl:', 0, 0, 'L');
			$pdf->SetXY(136,39); $pdf->Cell(0,3.5, $tglbc, 0, 1, 'L');
			$pdf->SetXY(153,39); $pdf->Cell(0,3.5, 'Pos:', 0, 0, 'L');
			$pdf->SetXY(160,39); $pdf->Cell(0,3.5, $pos, 0, 1, 'L');
			$pdf->SetXY(170,39); $pdf->Cell(0,3.5, 'Subpos:', 0, 0, 'L');
			$pdf->SetXY(185,39); $pdf->Cell(0,3.5, $subpos, 0, 1, 'L');
		
	$pdf->SetY(43);	$pdf->Cell(0,3.5, "2. Identitas Penerima Barang : $jnsIdentitas", 0, 0, 'L');
	$pdf->SetXY(13,46.5); $pdf->Cell(80,3.5, $idterima, 0, 1, 'L');
	$pdf->SetY(50);	$pdf->Cell(0,3.5, '3. Nama, Alamat Penerima Barang', 0, 0, 'L');
	$pdf->SetXY(13,53.3); $pdf->Cell(0,3.5, $nmterima, 0, 1, 'L');
	$pdf->SetXY(13,57); $pdf->MultiCell(80,3.5, $almterima, 0, 'L');
		$pdf->SetXY(102, 43); $pdf->Cell(0,3.5, '11. Invoice', 0, 0, 'L');		
		$pdf->SetXY(120, 43); $pdf->Cell(0,3.5, ':', 0, 0, 'L');		
		$pdf->SetXY(122,43); $pdf->Cell(0,3.5, $invoice, 0, 1, 'L');
			$pdf->SetXY(170,43); $pdf->Cell(0,3.5, 'Tgl :', 0, 0, 'L');
			$pdf->SetXY(177,43); $pdf->Cell(0,3.5, $tglinvo, 0, 1, 'L');
		$pdf->SetXY(102, 47.3); $pdf->Cell(0,3.5, '12. BL/AWB', 0, 0, 'L');
		$pdf->SetXY(120, 47.3); $pdf->Cell(0,3.5, ':', 0, 0, 'L');
		$pdf->SetXY(122,47.3); $pdf->Cell(0,3.5, $mawb, 0, 1, 'L');
			$pdf->SetXY(170,47.3); $pdf->Cell(0,3.5, 'Tgl :', 0, 0, 'L');
			$pdf->SetXY(177,47.3); $pdf->Cell(0,3.5, $tglawb, 0, 1, 'L');
		$pdf->SetXY(120, 51); $pdf->Cell(0,3.5, ':', 0, 0, 'L');
		$pdf->SetXY(122,51); $pdf->Cell(0,3.5, $hawb, 0, 1, 'L');
			$pdf->SetXY(170,51.3); $pdf->Cell(0,3.5, 'Tgl :', 0, 0, 'L');
			$pdf->SetXY(177,51.3); $pdf->Cell(0,3.5, $tglhawb, 0, 1, 'L');
		$pdf->SetXY(102,56.5); $pdf->Cell(0,3.5, '13. Negara Asal Barang :', 0, 0, 'L');
		$pdf->SetXY(135,56.5); $pdf->Cell(0,3.5, $negaraasal, 0, 1, 'L');
		
	$pdf->SetY(66);	$pdf->Cell(0,3.5, "4. Identitas Pemberitahu : $jnsIdentitasPembt", 0, 0, 'L');
	$pdf->SetXY(13,69); $pdf->Cell(0,3.5, $idtahu, 0, 1, 'L');
	$pdf->SetY(73);	$pdf->Cell(0,3.5, '5. Nama, Alamat Pemberitahu', 0, 0, 'L');
	$pdf->SetXY(13,76.3); $pdf->Cell(0,3.5, $nmtahu, 0, 1, 'L');
	$pdf->SetXY(13,79.5); $pdf->MultiCell(80,3.5, $almtahu, 0, 'L');
	$pdf->SetY(83);	$pdf->Cell(0,3.5, '6. No &	Tgl. Surat Izin PJT/NP-PPJK', 0, 0, 'L');	
	$pdf->SetXY(70,83.2); $pdf->Cell(0,3.5, $noizin, 0, 1, 'L');
	$pdf->SetXY(84,83.2); $pdf->Cell(0,3.5, $tglizin, 0, 1, 'L');
		$pdf->SetXY(102, 67); $pdf->Cell(0,3.5, '14. Valuta', 0, 0, 'L');		
		$pdf->SetXY(120, 67); $pdf->Cell(0,3.5, ':', 0, 0, 'L');
		$pdf->SetXY(122,67); $pdf->Cell(0,3.5, $valuta, 0, 1, 'L');
		$pdf->SetXY(102, 73); $pdf->Cell(0,3.5, '15. FOB', 0, 0, 'L');		
		$pdf->SetXY(120, 73); $pdf->Cell(0,3.5, ':', 0, 0, 'L');
		$pdf->SetXY(122,73); $pdf->Cell(0,3.5, $fob, 0, 1, 'L');
		$pdf->SetXY(102, 83.2); $pdf->Cell(0,3.5, '16. Freight', 0, 0, 'L');
		$pdf->SetXY(120, 83.2); $pdf->Cell(0,3.5, ':', 0, 0, 'L');
		$pdf->SetXY(122, 83.2); $pdf->Cell(0,3.5, $freight, 0, 1, 'L');
	
	$pdf->SetY(87.5);	$pdf->Cell(0,3.5, '7. Cara Pengangkutan: 1.Laut  2.Kereta  3.Jalan Raya', 0, 0, 'L');	
	$pdf->SetXY(13,91);	$pdf->Cell(0,3.5, '4.Udara  5.Pos  6.Multimoda Trans 7.Instalasi  8.ASPD  9.Lainnya', 0, 0, 'L');	
	$pdf->SetXY(95,87.5); $pdf->Cell(0,3.5, $kdAngkut, 0, 1, 'L');
		$pdf->SetXY(102, 89); $pdf->Cell(0,3.5, '17. Asuransi', 0, 0, 'L');
		$pdf->SetXY(120, 89); $pdf->Cell(0,3.5, ':', 0, 0, 'L');
		$pdf->SetXY(122, 89); $pdf->Cell(0,3.5, $asuransi, 0, 1, 'L');
		
	$pdf->SetY(95);	$pdf->Cell(0,3.5, '8. Nama Sarana Pengangkut &	No.Voy/Flight udara', 0, 0, 'L');	
	$pdf->SetXY(13,99); $pdf->Cell(0,3.5, $nmsarana, 0, 1, 'L');
	$pdf->SetXY(65,99); $pdf->Cell(0,3.5, $voy, 0, 1, 'L');
		$pdf->SetXY(102, 99);	$pdf->Cell(0,3.5, '18. Nilai CIF', 0, 0, 'L');
		$pdf->SetXY(120, 99); $pdf->Cell(0,3.5, ':', 0, 0, 'L');
		$pdf->SetXY(122,99); $pdf->Cell(0,3.5, $cif, 0, 1, 'L');
	$pdf->SetY(103); $pdf->Cell(0,3.5, '9. Pelabuhan Muat :', 0, 0, 'L');	
	$pdf->SetXY(13,106.5); $pdf->Cell(0,3.5, $muat, 0, 1, 'L');
	$pdf->SetXY(55,103); $pdf->Cell(0,3.5, '10. Pelabuhan Bongkar :', 0, 0, 'L');
	$pdf->SetXY(60,106.5); $pdf->Cell(0,3.5, 'Soetta : '.$bongkar, 0, 1, 'L');
		
	$pdf->SetXY(7,111); $pdf->Cell(0,3.5, '19.No', 0, 0, 'L'); 
	$pdf->SetXY(7,115.5); $pdf->Cell(9,3.5, '01.', 0, 1, 'C');	
	$pdf->SetXY(18,111); $pdf->Cell(0,3.5, '20. Uraian Barang', 0, 0, 'L'); 
	$pdf->SetXY(23,115.5); $pdf->MultiCell(90,3.5, $urbar, 0, 'L');
	$pdf->SetXY(122,111); $pdf->Cell(0,3.5, '21. Jumlah & Jenis Barang', 0, 0, 'L');
	$pdf->SetXY(127,115.5); $pdf->MultiCell(30,3.5, $jumlahJenisBarang, 0, 'L');
	$pdf->SetXY(168,111); $pdf->Cell(0,3.5, '22. Nilai CIF', 0, 0, 'L');
	$pdf->SetXY(173,115.5); $pdf->MultiCell(23,3.5, $nilaiCIF, 0, 'L');
	
	$pdf->SetFont('Arial','','7');
	$pdf->SetXY(110,127); $pdf->Cell(0,3.5, 'C. Dengan ini saya menyatakan bertanggung jawab atas kebenaran', 0, 0, 'L');
	$pdf->SetXY(122,130); $pdf->Cell(0,3.5, 'hal - hal yang diberitahukan dalam dokumen ini', 0, 0, 'L');
	$pdf->SetXY(130,133); $pdf->Cell(0,3.5, '.........................., Tgl...................', 0, 0, 'L');
	$pdf->SetXY(132,132.5); $pdf->Cell(0,3.5, $Kota, 0, 1, 'L');
	$pdf->SetXY(156,132.5); $pdf->Cell(0,3.5, $tglpibk, 0, 1, 'L');

	$pdf->SetXY(105,136); $pdf->Cell(0,3.5, '(PEMBERITAHU)', 0, 0, 'C');
	$pdf->SetXY(105,150); $pdf->Cell(0,3.5, "($nmPemberitahu)", 0, 0, 'C');
	
	$pdf->SetFont('Arial','','10');
	$pdf->SetXY(7,155.5); $pdf->Cell(0,3.5, 'E. HASIL PEMERIKSAAN / PENETAPAN PEJABAT BEA DAN CUKAI', 0, 0, 'L');
	
	$pdf->SetFont('Arial','','8');
	$pdf->SetXY(7,159); $pdf->Cell(0,3.5, '23.No', 0, 0, 'L');		
	$pdf->SetXY(7,166.5); $pdf->MultiCell(9,3.5, '01.', 0, 'C');
	$pdf->SetXY(18,159); $pdf->Cell(0,3.5, '24. Uraian Barang secara lengkap meliputi jenis,', 0, 0, 'L');
	$pdf->SetXY(23,162); $pdf->Cell(0,3.5, 'jumlah, merek, tipe, ukuran dan spesifikasi lainnya,', 0, 0, 'L');
	$pdf->SetXY(22,166.5); $pdf->MultiCell(80,3.5, $urbar, 0, 'L');
	$pdf->SetXY(104,159); $pdf->Cell(0,3.5, '25. Jumlah &', 0, 0, 'L');
		$pdf->SetXY(103,166.5); $pdf->Cell(0,3.5, $kemas, 0, 1, 'L');
		$pdf->SetXY(107,166.5); $pdf->Cell(0,3.5, 'Koli', 0, 1, 'L');
	$pdf->SetXY(108,162); $pdf->Cell(0,3.5, 'Jenis Satuan', 0, 0, 'L');
		$pdf->SetXY(114,166.5); $pdf->Cell(0,3.5, $berat, 0, 1, 'L');
		$pdf->SetXY(122,166.5); $pdf->Cell(0,3.5, 'Kg', 0, 1, 'L');
	$pdf->SetXY(128,159); $pdf->Cell(0,3.5, '26. Nilai Pabean', 0, 0, 'L');
		$pdf->SetXY(128,166.5); $pdf->Cell(24,3.5, $nilaipabeanUsd, 0, 1, 'L');
	$pdf->SetXY(152,159); $pdf->Cell(0,3.5, '27. -Pos Tarif/HS', 0, 0, 'L');
	$pdf->SetXY(157,162); $pdf->Cell(0,3.5, '-Tarif BM,Cukai,PPN,PPnBM,PPh', 0, 0, 'L');
	$pdf->SetXY(158,166.5); $pdf->Cell(0,3.5, $hs, 0, 1, 'L');
	
	$pdf->SetFont('Arial','','10');
	$pdf->SetXY(7,182.5); $pdf->Cell(0,3.5, '28. NDPBM :', 0, 0, 'L');
	$pdf->SetXY(30,182.5); $pdf->Cell(0,3.5, $ndpbm, 0, 1, 'L');
	$pdf->SetFont('Arial','','8');
	$pdf->SetXY(128,182.5); 
	$pdf->Cell(31,3.5, '29. Dalam Rupiah (Rp.)', 0, 0, 'L');
	$pdf->Cell(40,3.5, $nilaipabean, 0, 0, 'L');
	
	
	$pdf->SetXY(8,187.5); $pdf->Cell(93,3.5, '............................., Tanggal...................', 0, 0, 'C');
	$pdf->SetXY(34,186.6); $pdf->Cell(0,3.5, $Kota, 0, 1, 'L');
	$pdf->SetXY(65,186.7); $pdf->Cell(0,3.5, $tglpibk, 0, 1, 'L');
	$pdf->SetXY(8,191); $pdf->Cell(93,3.5, 'Pejabat Bea dan Cukai', 0, 0, 'C');
			$pdf->SetXY(8,212); $pdf->Cell(93,3.5, $namahgr, 0, 1, 'C');
			$pdf->SetXY(8,215); $pdf->Cell(93,3.5, $niphgr, 0, 1, 'C');

		$pdf->SetXY(102,187.5); $pdf->Cell(0,3.5, '30. BM', 0, 0, 'L');
			$pdf->SetXY(130,187.5); $pdf->Cell(0,3.5, $bmper, 0, 1, 'L');
			$pdf->SetXY(137,187.5); $pdf->Cell(0,3.5, '%', 0, 1, 'L');
			$pdf->SetXY(145,187.5); $pdf->Cell(0,3.5, $bm, 0, 1, 'R');
		$pdf->SetXY(102,193.5); $pdf->Cell(0,3.5, '31. Cukai', 0, 0, 'L');
			$pdf->SetXY(130,193.5); $pdf->Cell(0,3.5, $cukaiper, 0, 1, 'L');
			$pdf->SetXY(137,193.5); $pdf->Cell(0,3.5, '%', 0, 1, 'L');
			$pdf->SetXY(145,193.5); $pdf->Cell(0,3.5, $cukai, 0, 1, 'R');
		$pdf->SetXY(102,199.5); $pdf->Cell(0,3.5, '32. PPN', 0, 0, 'L');
			$pdf->SetXY(130,199.5); $pdf->Cell(0,3.5, $ppnper, 0, 1, 'L');
			$pdf->SetXY(137,199.5); $pdf->Cell(0,3.5, '%', 0, 1, 'L');
			$pdf->SetXY(145,199.5); $pdf->Cell(0,3.5, $ppn, 0, 1, 'R');
		$pdf->SetXY(102,205.5); $pdf->Cell(0,3.5, '33. PPnBM', 0, 0, 'L');
			$pdf->SetXY(130,205.5); $pdf->Cell(0,3.5, $ppnbmper, 0, 1, 'L');
			$pdf->SetXY(137,205.5); $pdf->Cell(0,3.5, '%', 0, 1, 'L');
			$pdf->SetXY(145,205.5); $pdf->Cell(0,3.5, $ppnbm, 0, 1, 'R');
		$pdf->SetXY(102,211.5); $pdf->Cell(0,3.5, '34. PPh', 0, 0, 'L');
			$pdf->SetXY(130,211.5); $pdf->Cell(0,3.5, $pphper, 0, 1, 'L');
			$pdf->SetXY(137,211.5); $pdf->Cell(0,3.5, '%', 0, 1, 'L');
			$pdf->SetXY(145,211.5); $pdf->Cell(0,3.5, $pph, 0, 1, 'R');
		$pdf->SetXY(102,217.5); $pdf->Cell(0,3.5, '35. Total', 0, 0, 'L');
			$pdf->SetXY(145,217.5); $pdf->Cell(0,3.5, $total, 0, 1, 'R');
	
	$pdf->SetXY(102, 222.5); $pdf->Cell(0,3.5, 'G. UNTUK PEMBAYARAN / JAMINAN', 0, 0, 'L');
		$pdf->SetXY(102,227); $pdf->Cell(0,3.5, 'a. Pembayaran', 0, 0, 'L');
		$pdf->SetXY(125,227); $pdf->Cell(0,3.5, $bayar, 0, 1, 'L');
		$pdf->SetXY(102,231); $pdf->Cell(0,3.5, 'b. Jaminan', 0, 0, 'L');
		$pdf->SetXY(125,231); $pdf->Cell(0,3.5, $jaminan, 0, 1, 'L');
			$pdf->SetXY(130,227); $pdf->Cell(0,3.5, '1.Bank;   2.Pos;                 3.Kantor Pabean', 0, 0, 'L');
			$pdf->SetXY(130,231); $pdf->Cell(0,3.5, '1.Tunai;  2.Bank Garansi;  3.Customs Bond;  4.Lainnya', 0, 0, 'L');
		$pdf->SetXY(153,240.5); $pdf->Cell(0,3.5, 'Nomor', 0, 0, 'L');
		$pdf->SetXY(188,240.5); $pdf->Cell(0,3.5, 'Tgl.', 0, 0, 'L');
		$pdf->SetXY(102,244); $pdf->Cell(0,3.5, 'Pembayaran', 0, 0, 'L');		
		$pdf->SetXY(102,248); $pdf->Cell(0,3.5, 'Jaminan', 0, 0, 'L');		
	
	$pdf->SetXY(114,252); $pdf->Cell(0,3.5, 'Pejabat Penerima', 0, 0, 'L');
	$pdf->SetXY(165,252); $pdf->Cell(0,3.5, 'Nama / Stempel Instansi', 0, 0, 'L');
	$pdf->SetXY(108,268); $pdf->Cell(0,3.5, '(.........................................)', 0, 0, 'L');
	$pdf->SetXY(163,268); $pdf->Cell(0,3.5, '(.........................................)', 0, 0, 'L');


	// ADD LEMBAR LANJUTAN
	$pdf->AddPage();
	$pdf->SetFont('Arial','B','12');
	$pdf->Cell(0,6, $kopLanjutan, 0, 1, 'C');
	$pdf->SetX(55);
	$pdf->Cell(0,6, $kop1, 0, 0, 'L');
	
	$pdf->Rect(7, 23, 195, 6);
		$pdf->Rect(16,23,99,6);
		$pdf->Rect(115,23,50,6);
	
	$pdf->Rect(7, 29, 195, 210);
		$pdf->Rect(16,29,99,210);
		$pdf->Rect(115,29,50,210);
	
	//header lembar lanjutan
	$pdf->SetFont('Arial','','8');
	$pdf->SetXY(7,24.5); $pdf->Cell(0,3.5, '19.No', 0, 0, 'L'); 
	$pdf->SetXY(18,24.5); $pdf->Cell(0,3.5, '20. Uraian Barang', 0, 0, 'L'); 
	$pdf->SetXY(122,24.5); $pdf->Cell(0,3.5, '21. Jumlah & Jenis Barang', 0, 0, 'L');
	$pdf->SetXY(168,24.5); $pdf->Cell(0,3.5, '22. Nilai CIF', 0, 0, 'L');
	
	//detail barang lembar lanjutan
	$pdf->SetXY(7,33); $pdf->Cell(9,3.5, '02.', 0, 1, 'C');	
	$pdf->SetXY(23,33); $pdf->MultiCell(90,3.5, $urbar, 0, 'L');
	$pdf->SetXY(127,33); $pdf->MultiCell(30,3.5, $jumlahJenisBarang, 0, 'L');
	$pdf->SetXY(173,33); $pdf->MultiCell(23,3.5, $nilaiCIF, 0, 'L');

	//tanda tangan lem lanjutan
	$pdf->SetFont('Arial','','8');
	$pdf->SetXY(110,246-5); $pdf->Cell(0,3.5, 'C. Dengan ini saya menyatakan bertanggung jawab atas kebenaran', 0, 0, 'L');
	$pdf->SetXY(122,250-5); $pdf->Cell(0,3.5, 'hal - hal yang diberitahukan dalam dokumen ini', 0, 0, 'L');
	$pdf->SetXY(130,255-5); $pdf->Cell(0,3.5, '.........................., Tgl...................', 0, 0, 'L');
	$pdf->SetXY(132,254.5-5); $pdf->Cell(0,3.5, $Kota, 0, 1, 'L');
	$pdf->SetXY(158,254.5-5); $pdf->Cell(0,3.5, $tglpibk, 0, 1, 'L');

	$pdf->SetXY(105,260-5); $pdf->Cell(0,3.5, '(PEMBERITAHU)', 0, 0, 'C');
	$pdf->SetXY(105,272); $pdf->Cell(0,3.5, "($nmPemberitahu)", 0, 0, 'C');
	
    $pdf->Output();