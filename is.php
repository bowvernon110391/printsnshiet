<?php

use Fpdf\Fpdf;

include 'vendor/autoload.php';

// subclass
class PDFImporSementara extends Fpdf {
    // member variables, would be changed/replaced on demands
    // here it is in its default values

    // data required
    protected $A_nama   = "Tri Mulyadi Wibowo";
    protected $A_alamat = "Gg. Masjid no 50/a RT 02/02, Cipondoh, Tangerang";
    protected $A_no_paspor = "9239293";

    protected $G_no_dok = '002034/IS/T2F/SH/2020';
    protected $G_tgl_dok = '2020-01-23';

    protected $B_nama = "Asosiasi Pecinta Mobil Klasik Indonesia";
    protected $B_alamat = "JL. Taruna Bakti no. 32, Kel. Pegangsaan Timur, Jakarta Utara";
    protected $B_no_telp = "(021) 5567940";
    protected $B_no_identitas = "367102939912000";

    // data invoice bisa timbul beberapa kali
    protected $invoice = [
        /* [
            'no_dok'    => "INV-392131211131312313/SEP/2019",
            'tgl_dok'   => "2019-12-31"
        ], */
        [
            'no_dok'    => "INV-3921312/SEP/2019",
            'tgl_dok'   => "2019-12-31"
        ]
    ];

    protected $nama_sarana_pengangkut = "SINGAPORE AIRLINES";
    protected $no_flight = "QZ 8971";

    protected $tgl_perkiraan_keluar = '2020-03-21';

    protected $C_lokasi_penggunaan = 'JAKARTA';
    protected $C_tujuan_penggunaan = 'Event olahraga Sea Games 2024';

    protected $pelabuhan_masuk = "Cengkareng / Sukarno Hatta (u) (IDCGK)";
    protected $pelabuhan_keluar = "Denpasar / Ngurah Rai (u) (IDDPS)";

    protected $opsi_pengembalian_jaminan = 1;

    protected $no_rek     = "001678829912330210";
    protected $nama_rek   = "Tri Mulyadi Wibowo";
    protected $bank_rek   = "BANK TABUNGAN NEGARA PERSERO TBK";

    // blank data utk data realisasi ekspor (unpredictable)
    protected $ttd_kota_keluar = '................................';
    protected $ttd_tanggal_keluar = '................................';
    protected $nama_pejabat_keluar = '..............................................................'; 
    protected $nip_pejabat_keluar = '..............................................................';
    // $nip_pejabat_keluar = $ttd_kota_keluar;

    protected $E_data_barang = [
        // 1st item
        [
            'uraian'            => "Sepeda Lipat Brompton",
            'detailSekunder'    => [
                'nama'  => 'S/N',
                'data'  => "231-99293-22123"
            ],
            'jumlah_kemasan'    => 1,
            'jenis_kemasan'     => 'BX',
            'jumlah_satuan'     => 1,
            'jenis_satuan'      => 'PCE',
            'cif'               => 928.00,
            'valuta'            => 'USD',
            'kurs'              => 13789.98
        ],
        /* // 2nd item
        [
            'uraian'            => "Sepeda Lipat Brompton",
            'detailSekunder'    => [
                'nama'  => 'S/N',
                'data'  => "231-99293-22123"
            ],
            'jumlah_kemasan'    => 1,
            'jenis_kemasan'     => 'BX',
            'jumlah_satuan'     => 1,
            'jenis_satuan'      => 'PCE',
            'cif'               => 928.00,
            'valuta'            => 'USD',
            'kurs'              => 13789.98
        ], */
    ];

    protected $ttd_kota       = 'CENGKARENG';
    protected $ttd_tanggal    = '2020-01-23';

    protected $no_bpj         = 'BPJ-000234/IS/T2F/SH/2020';
    protected $tgl_bpj        = '2020-01-23';

    protected $tgl_jatuh_tempo    = '2020-03-01';

    protected $nama_pejabat   = 'Setiadi';
    protected $nip_pejabat    = '198912302012101001';

    protected $catatan_pejabat    = 'Barang ini sejatinya digunakan untuk keperluan event olahraga se-asia tenggara, ASEAN GAMES 2024. Namun tetap berlaku kewajiban pabean atas barang ini, sehingga apabila hingga waktu jatuh tempo pemilik barang belum melakukan ekspor atas barang ini, maka jaminan yang sudah diterima akan dicairkan.';

    protected $kantor_pengeluaran = 'KPU BC TIPE C SOEKARNO HATTA';
    protected $nomor_bukti_realisasi_ekspor   = 'RE-00021/T3/SH/2020';
    protected $tgl_bukti_realisasi_ekspor     = '2020-02-24';

    // Footer is printed everywhere
    public function Footer()
    {
        $this->SetFont('Arial', 'I', 8);
        $this->SetY(-15);
        $this->Write(4, 'Dokumen ini dicetak secara otomatis menggunakan sistem terkomputerisasi');
    }

    // constructor
    public function __construct()
    {
        parent::__construct('P', 'mm', 'A4');

        $this->initPDF();
    }

    // put initialization specific to PDF here!
    protected function initPDF() {
        $this->SetAutoPageBreak(true);
        $this->AliasNbPages();
    }

    // Generate first page!
    public function generateFirstPage() {
        $pdf = $this;
        // 1st Page
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', '8');

        // kop
        $pdf->Cell(0, 4, "FORMULIR IMPOR SEMENTARA", 0, 1, 'C');
        $pdf->Cell(0, 5, "BARANG PRIBADI PENUMPANG DAN BARANG PRIBADI AWAK SARANA PENGANGKUT", 0, 1, 'C');

        // halaman x dari y
        $pdf->Cell(0, 4, "Halaman {$pdf->PageNo()} dari {nb}" , 1, 1, 'R');

        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();

        //=====================================================================================================
        // 1st ROW
        //=====================================================================================================
        // A. Data Pemberitahu
        $pdf->SetFont('Arial', 'B', '8');
        $pdf->Cell(75, 4, 'A. DATA PEMBERITAHU', 0, 1);

        $rowlast_x = $pdf->GetX();
        $rowlast_y = $pdf->GetY();

        // Now draw it?
        $pdf->SetFont('Arial', '', '8');
        $pdf->SetX(15);
        $pdf->Cell(30, 4, '1. Nama Lengkap       :', 0, 0);
        $pdf->SetX(45);
        $pdf->MultiCell(55, 4, $this->A_nama);
        // $pdf->Ln();


        $pdf->SetX(15);
        $pdf->Cell(30, 4, '2. Alamat Lengkap     :', 0, 0);
        $pdf->SetX(45);
        $pdf->MultiCell(55, 4, $this->A_alamat);
        // $pdf->Ln();

        $pdf->SetX(15);
        $pdf->Cell(30, 4, '3. Nomor Paspor        :', 0, 0);
        $pdf->SetX(45);
        $pdf->MultiCell(55, 4, $this->A_no_paspor);

        // record max y, for drawing rectangle later
        $max_row_y = $pdf->GetY();

        // $pdf->Rect($row_x, $row_y, 95, $max_row_y-$row_y);

        // G. Kolom Khusus bea dan cukai
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY(105, $row_y);    // ABOUT HALF PAGE WIDTH
        $pdf->Cell(75, 4, 'G. KOLOM KHUSUS BEA DAN CUKAI', 0, 2);

        // fill data
        $rowlast_x = $pdf->GetX();
        $rowlast_y = $pdf->GetY();

        // Now draw it?
        $pdf->SetFont('Arial', '', '8');
        $pdf->SetX(5 + $rowlast_x);
        $pdf->Cell(15, 4, 'Nomor    :', 0, 0);
        $pdf->SetX(20 + $rowlast_x);
        $pdf->MultiCell(55, 4, $this->G_no_dok, 0, 'L');

        $pdf->SetX(5 + $rowlast_x);
        $pdf->Cell(15, 4, 'Tanggal  :', 0, 0);
        $pdf->SetX(20 + $rowlast_x);
        $pdf->MultiCell(55, 4, $this->G_tgl_dok, 0, 'L');

        $max_row_y = max($max_row_y, $pdf->GetY());

        // finally, draw 2 rectangle
        $pdf->Rect($row_x, $row_y, 95, $max_row_y-$row_y);
        $pdf->Rect($row_x+95, $row_y, 95, $max_row_y-$row_y);

        $pdf->SetY($max_row_y);

        //=====================================================================================================
        // 2nd ROW
        //=====================================================================================================
        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();

        $last_y = $pdf->GetY();
        // B. Data Sponsor
        $pdf->SetFont('Arial', 'B', '8');
        $pdf->Cell(75, 4, 'B. DATA SPONSOR', 0, 1);

        $rowlast_x = $pdf->GetX();
        $rowlast_y = $pdf->GetY();

        // Now draw it?
        $pdf->SetFont('Arial', '', '8');
        $pdf->SetX(15);
        $pdf->Cell(30, 4, '4. Nama Lengkap       :', 0, 0);
        $pdf->SetX(45);
        $pdf->MultiCell(55, 4, $this->B_nama);
        // $pdf->Ln();


        $pdf->SetX(15);
        $pdf->Cell(30, 4, '5. Alamat di Indonesia:', 0, 0);
        $pdf->SetX(45);
        $pdf->MultiCell(55, 4, $this->B_alamat);
        // $pdf->Ln();

        $pdf->SetX(15);
        $pdf->Cell(30, 4, '6. Nomor Telepon       :', 0, 0);
        $pdf->SetX(45);
        $pdf->MultiCell(55, 4, $this->B_no_telp);

        $pdf->SetX(15);
        $pdf->Cell(30, 4, '7. Nomor Identitas      :', 0, 0);
        $pdf->SetX(45);
        $pdf->MultiCell(55, 4, $this->B_no_identitas);

        // record max y
        $max_row_y = $pdf->GetY();

        // draw rectangle for DATA SPONSOR


        // RIGHT SIDE
        // invoice, dst

        // fill data
        $rowlast_x = 105;
        $rowlast_y = $pdf->GetY();

        // Now draw it?
        $pdf->SetFont('Arial', '', '8');
        // $pdf->SetX(5 + $rowlast_x);
        // $pdf->SetY($rowlast_y);
        $pdf->SetXY($rowlast_x, $last_y);
        $pdf->Cell(15, 4, '10. Invoice no   :', 0, 0);

        $pdf->SetXY($rowlast_x + 70, $last_y);
        $pdf->Cell(5, 4, "Tgl.", 0, 0);

        // multiple multicell, record each cell's height
        $start_y = 0;
        $max_y = 0;
        foreach ($this->invoice as $inv) {
            $start_y = $start_y ? $start_y : $pdf->GetY();

            $pdf->SetX(25 + $rowlast_x);
            $pdf->MultiCell(35, 4, $inv['no_dok'], 0, 'L');
            
            $max_y = $pdf->GetY();

            // Tanggal
            $pdf->SetXY(77 + $rowlast_x, $last_y);
            $pdf->MultiCell(20, 4, $inv['tgl_dok'], 0, 'L');

            // record max y
            $max_y = max($max_y, $pdf->GetY());

            // set Y
            $pdf->SetY($max_y);
            $last_y = $pdf->GetY();
        }

        /* $pdf->SetX(5 + $rowlast_x);
        $pdf->Cell(15, 4, 'Tanggal  :', 0, 0);
        $pdf->SetX(20 + $rowlast_x);
        $pdf->MultiCell(55, 4, $G_tgl_dok, 0, 'L'); */

        $last_y = $pdf->GetY();

        // draw rectangle for invoice data
        $pdf->Rect($row_x + 95, $row_y, 70, $last_y-$row_y);
        $pdf->Rect($row_x + 95 + 70, $row_y, 25, $last_y-$row_y);

        // 11. Nama Sarana Pengangkut & No Voy/Flight
        $start_y = $pdf->GetY();

        $pdf->SetX($rowlast_x);
        $pdf->Cell(0, 4, "11. Nama Sarana Pengangkut & No. Voy/Flight : ", 0, 2);

        $pdf->SetX($rowlast_x + 5);
        $pdf->Cell(0, 4, "{$this->nama_sarana_pengangkut} / {$this->no_flight}", 0, 1);

        $last_y = $pdf->GetY();

        // draw rectangle for nama srn angkut
        $pdf->Rect($row_x + 95, $start_y, 95, $last_y-$start_y);


        // 12. Perkiraan Tanggal Keluar
        $start_y = $pdf->GetY();

        $pdf->SetX($rowlast_x);
        $pdf->Cell(0, 4, "12. Perkiraan Tanggal Keluar :", 0, 2);

        $pdf->SetX($rowlast_x + 5);
        $pdf->Cell(0, 4, $this->tgl_perkiraan_keluar, 0, 1);

        $max_row_y = max($max_row_y, $pdf->GetY());

        // DRAW RECTANGLE FOR SPONSOR AND PERKIRAAN TANGGAL KELUAR (USE MAX HEIGHT)
        $pdf->Rect($row_x, $row_y, 95, $max_row_y-$row_y);
        $pdf->Rect($row_x+95, $row_y, 95, $max_row_y-$row_y);

        // $pdf->Ln();
        $pdf->SetY($max_row_y);

        //=====================================================================================================
        // 3rd ROW
        //=====================================================================================================
        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();

        $last_y = $pdf->GetY();
        // C. Data Penggunaan Barang
        $pdf->SetFont('Arial', 'B', '8');
        $pdf->Cell(75, 4, 'C. DATA PENGGUNAAN BARANG', 0, 1);

        $pdf->SetFont('Arial', '', '8');
        $pdf->SetX(15);
        $pdf->Cell(30, 4, '8. Lokasi Penggunaan :', 0, 0);
        $pdf->SetX(47);
        $pdf->MultiCell(55, 4, $this->C_lokasi_penggunaan);

        $pdf->SetX(15);
        $pdf->Cell(30, 4, '9. Tujuan Penggunaan :', 0, 0);
        $pdf->SetX(47);
        $pdf->MultiCell(55, 4, $this->C_tujuan_penggunaan);

        $max_row_y = $pdf->GetY();

        // RIGHT SIDE
        // 13. Pelabuhan Masuk
        $start_y = $row_y;

        $pdf->SetXY($row_x + 95, $row_y);
        $pdf->Cell(30, 4, "13. Pelabuhan Masuk :", 0, 2);
        $pdf->SetX($pdf->GetX() + 5);
        $pdf->Cell(0, 4, $this->pelabuhan_masuk, 0, 1);

        $last_y = $pdf->GetY();
        // draw rectangle for pelabuhan masuk
        $pdf->Rect($row_x + 95, $row_y, 95, $last_y - $start_y);

        // 14. Pelabuhan Keluar
        $start_y = $pdf->GetY();

        $pdf->SetX($row_x + 95);
        $pdf->Cell(30, 4, "14. Pelabuhan Keluar :", 0, 2);
        $pdf->SetX($pdf->GetX() + 5);
        $pdf->Cell(0, 4, $this->pelabuhan_keluar, 0, 1);

        $max_row_y = max($max_row_y, $pdf->GetY());

        // draw rect for DATA PENGGUNAAN BARANG AND Pelabuhan Keluar
        $pdf->Rect($row_x, $row_y, 95, $max_row_y-$row_y);
        $pdf->Rect($row_x + 95, $row_y, 95, $max_row_y-$row_y);

        // $pdf->Ln();

        //=====================================================================================================
        // 4th ROW
        //=====================================================================================================
        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();

        $last_y = $pdf->GetY();
        // D. Pengembalian Jaminan
        $pdf->SetFont('Arial', 'B', '8');
        $pdf->Cell(75, 4, 'D. PENGEMBALIAN JAMINAN', 0, 1);

        $pdf->SetFont('Arial', '', '8');
        $pdf->SetX($row_x + 5);
        $pdf->Cell(18, 4, "15. Melalui :");

        // draw small rect
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 5, 4);
        $pdf->Cell(5, 4, $this->opsi_pengembalian_jaminan);

        // draw dummy options
        $pdf->SetX($row_x + 45);
        $pdf->MultiCell(45, 4, "1. Diambil sendiri\n2. Sponsor\n3. Transfer Rekening");

        $max_row_y = $pdf->GetY();

        // RIGHT SIDE!!!
        $pdf->SetXY($row_x + 95, $row_y);
        $pdf->Cell(30, 4, "16. Rekening", 0, 2);

        $pdf->SetX($pdf->GetX() + 5);
        $pdf->Cell(0, 4, "Nomor       : " . $this->no_rek, 0, 2);

        $pdf->SetX($pdf->GetX());
        $pdf->Cell(0, 4, "Atas nama : " . $this->nama_rek, 0, 2);

        $pdf->SetX($pdf->GetX());
        $pdf->Cell(0, 4, "Bank          : " . $this->bank_rek, 0, 1);

        $max_row_y = max($max_row_y, $pdf->GetY());

        // draw rectangle for PENGEMBALIAN JAMINAN AND REKENING
        $pdf->Rect($row_x, $row_y, 95, $max_row_y - $row_y);
        $pdf->Rect($row_x + 95, $row_y, 95, $max_row_y - $row_y);

        //=====================================================================================================
        // 5th ROW
        //=====================================================================================================
        // E. DATA BARANG
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(0, 4, "E. DATA BARANG", 1, 1);

        // build header row
        $pdf->SetFont('Arial', '', 8);
        // $pdf->SetTextColor(255, 255, 255);
        // $pdf->SetFillColor(100, 100, 100);
        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();

        // spawn warning if barang > 1
        $jml_barang = count($this->E_data_barang);
        $warning = "=={$jml_barang} Jenis Barang. Lihat Lembar Lanjutan.==";

        if ($jml_barang > 1) {
            $this->Text($row_x + 15, $row_y + 18, $warning);
            $this->Text($row_x + 15, $row_y + 82, $warning);
        }

        $pdf->MultiCell(7, 4, "17. No", 1);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 7, 20);      // test-rect

        $pdf->SetXY($row_x + 7, $row_y);
        $pdf->MultiCell(88, 8, "18. Uraian Barang", 1);
        $pdf->Rect($pdf->GetX() + 7, $pdf->GetY(), 88, 20); // test-rect

        $pdf->SetXY($row_x + 95, $row_y);
        $pdf->MultiCell(30, 4, "19. Spesifikasi / Identitas Barang", 1, 'L');
        $pdf->Rect($pdf->GetX() + 95, $pdf->GetY(), 30, 20); // test-rect

        $pdf->SetXY($row_x + 125, $row_y);
        $pdf->MultiCell(35, 4, "20. Jumlah dan Jenis Satuan", 1, 'L');
        $pdf->Rect($pdf->GetX() + 125, $pdf->GetY(), 35, 20); // test-rect

        $pdf->SetXY($row_x + 160, $row_y);
        $pdf->MultiCell(30, 4, "21. Perkiraan Nilai Barang (CIF)", 1, 'L');
        $pdf->Rect($pdf->GetX() + 160, $pdf->GetY(), 30, 20); // test-rect
        // $pdf->Ln();

        //=====================================================================================================
        // 6th ROW
        //=====================================================================================================
        // F. Tanda Tangan
        $pdf->SetXY($row_x, $pdf->GetY() + 20);
        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();

        $pdf->Cell(7, 4, "F.");
        $pdf->MultiCell(88, 4, "Dengan ini saya menyatakan bertanggung jawab atas kebenaran hal-hal yang diberitahukan dalam dokumen ini", 0, 'C');

        $pdf->MultiCell(88, 4, "{$this->ttd_kota} , Tgl {$this->ttd_tanggal}\nPemohon\n\n\n{$this->A_nama}", 0, 'C');

        $max_row_y = $pdf->GetY();

        // draw rectangle for kolom TTD?
        $pdf->Rect($row_x, $row_y, 95, $max_row_y-$row_y);

        // RIGHT SIDE (22. Valuta - 28. Rp)
        $pdf->SetXY($row_x + 95, $row_y);

        // 22. valuta + 23. NDPBM
        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();

        $pdf->Cell(20, 7, "22. Valuta     :");
        $pdf->Cell(27.5, 7, "KRW", 0, 0, 'R');

        $pdf->Cell(20, 7, '23. NDPBM       :');
        $pdf->Cell(27.5, 7, "13787.00", 0, 0, 'R');

            // add rects
            $pdf->Rect($row_x, $row_y, 47.5, 7);
            $pdf->Rect($row_x + 47.5, $row_y, 47.5, 7);
        $pdf->Ln();

        // 24. FOB + 25. Freight
        $pdf->SetX($pdf->GetX() + 95);

        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();



        $pdf->Cell(20, 7, "24. FOB      :");
        $pdf->Cell(27.5, 7, "928.00", 0, 0, 'R');

        $pdf->Cell(20, 7, '25. Freight       :');
        $pdf->Cell(27.5, 7, "0.00", 0, 0, 'R');

            // add rects
            $pdf->Rect($row_x, $row_y, 47.5, 7);
            $pdf->Rect($row_x + 47.5, $row_y, 47.5, 7);
        $pdf->Ln();

        // 26. FOB + 27. Freight
        $pdf->SetX($pdf->GetX() + 95);

        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();



        $pdf->Cell(20, 7, "24. Asuransi     :");
        $pdf->Cell(27.5, 7, "0.00", 0, 0, 'R');

        $pdf->Cell(20, 7, '25. CIF          :');
        $pdf->Cell(27.5, 7, "928.00", 0, 0, 'R');

            // add rects
            $pdf->Rect($row_x, $row_y, 47.5, 7);
            $pdf->Rect($row_x + 47.5, $row_y, 47.5, 7);
        $pdf->Ln();

        // 28. Rp
        $pdf->SetX($pdf->GetX() + 95);

        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();



        $pdf->Cell(20, 7, "28. Rp          :");
        $pdf->Cell(0, 7, "12453859.23", 0, 0, 'R');

            // add rects
            $pdf->Rect($row_x, $row_y, 95, 7);
            // $pdf->Rect($row_x + 47.5, $row_y, 47.5, 7);
        $pdf->Ln();

        //=====================================================================================================
        // 7th ROW
        //=====================================================================================================
        // H. HASIL PEMERIKSAAN/PENETAPAN PEJABAT BEA DAN CUKAI PELABUHAN PEMASUKAN
        $pdf->SetFont('Arial', 'B', 8);

        $pdf->Cell(0, 4, 'H. HASIL PEMERIKSAAN/PENETAPAN PEJABAT BEA DAN CUKAI PELABUHAN PEMASUKAN', 1, 1);

        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();

        $pdf->SetFont('Arial', '', 8);

        $pdf->MultiCell(7, 4, "29. No\n ", 1);
        $pdf->Rect($pdf->GetX(), $pdf->GetY(), 7, 20);      // test-rect

        $pdf->SetXY($row_x + 7, $row_y);
        $pdf->MultiCell(85, 4, "30. Uraian barang secara lengkap meliputi jenis, jumlah, merek, tipe, ukuran, dan spesifikasi lainnya\n ", 1);
        $pdf->Rect($pdf->GetX() + 7, $pdf->GetY(), 85, 20); // test-rect

        $pdf->SetXY($row_x + 92, $row_y);
        $pdf->MultiCell(30, 4, "31. Nilai Pabean\n\n ", 1, 'L');
        $pdf->Rect($pdf->GetX() + 92, $pdf->GetY(), 30, 20); // test-rect

        $pdf->SetXY($row_x + 122, $row_y);
        $pdf->MultiCell(35, 4, "32. - Pos Tarif / HS\n      - Tarif BM, Cukai, PPN, PPh, PPnBM", 1, 'L');
        $pdf->Rect($pdf->GetX() + 122, $pdf->GetY(), 35, 20); // test-rect

        $pdf->SetXY($row_x + 157, $row_y);
        $pdf->MultiCell(33, 4, "Dalam Rupiah (Rp)\n\n ", 1, 'L');
        $pdf->Rect($pdf->GetX() + 157, $pdf->GetY(), 33, 20); // test-rect


        // DATA PENETAPAN
            
            //-----------------------------------------------------------
            // DATA TOTAL PUNGUTAN DI SINI
            // test the details?
            $pdf->SetX($row_x + 157);
            $pdf->Cell(10, 4, "33.BM :", 0);
            $pdf->Cell(0, 4, "239,000.00", 0, 1, 'R');

            $pdf->SetX($row_x + 157);
            $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 33, $pdf->GetY());
            $pdf->Cell(10, 4, "34.PPN :", 0);
            $pdf->Cell(0, 4, "1,320,000.00", 0, 1, 'R');

            $pdf->SetX($row_x + 157);
            $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 33, $pdf->GetY());
            $pdf->Cell(10, 4, "35.PPnBM :", 0);
            $pdf->Cell(0, 4, "0.00", 0, 1, 'R');

            $pdf->SetX($row_x + 157);
            $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 33, $pdf->GetY());
            $pdf->Cell(10, 4, "36.PPh :", 0);
            $pdf->Cell(0, 4, "2,640,000.00", 0, 1, 'R');

            $pdf->SetX($row_x + 157);
            $pdf->Line($pdf->GetX(), $pdf->GetY(), $pdf->GetX() + 33, $pdf->GetY());
            $pdf->Cell(10, 4, "37.Total :", 0);
            $pdf->Cell(0, 4, "17,650,000.00", 0, 1, 'R');

        //-------------------------------------------------------------------------------------
        // 8th row, BPJ + Jangka Waktu Impor Sementara
        //-------------------------------------------------------------------------------------
        $row_x = $pdf->GetX();
        $row_y = $pdf->GetY();

        // 38. Bukti penerimaan jaminan
        $pdf->Cell(70, 4, '38. Bukti Penerimaan Jaminan (BPJ) No. :', 0, 1);
        $pdf->SetX($pdf->GetX() + 5);
        $pdf->Cell(65, 4, $this->no_bpj);

        // tanggal bpj
        $pdf->SetXY($row_x + 70, $row_y);
        $pdf->Cell(25, 4, 'Tanggal:', 0, 2);
        $pdf->SetX($pdf->GetX() + 5);
        $pdf->Cell(20, 4, $this->tgl_bpj);

        // 39. Jangka Waktu Izin Impor Sementara
        $pdf->SetXY($row_x + 95, $row_y);
        $pdf->Cell(0, 4, '39. Jangka Waktu Izin Impor Sementara', 0, 2);
        $pdf->SetX($pdf->GetX() + 5);
        $pdf->Cell(0, 4, $this->tgl_jatuh_tempo, 0, 1);

        // draw rectangles for three of them?
        $pdf->Rect($row_x, $row_y, 70, 8);
        $pdf->Rect($row_x + 70, $row_y, 25, 8);
        $pdf->Rect($row_x + 95, $row_y, 95, 8);


        //-------------------------------------------------------------------------------------
        // 9th row, TTD PDTT + CATATAN PEJABAT BEA DAN CUKAI
        //-------------------------------------------------------------------------------------
        $row_x  = $pdf->GetX();
        $row_y  = $pdf->GetY();

        // TTD PDTT
        $pdf->MultiCell(95, 4, "{$this->ttd_kota} , Tgl {$this->ttd_tanggal}\nPejabat Bea dan Cukai\n\n\nNama : {$this->nama_pejabat}\nNIP     : {$this->nip_pejabat}", 1, 'L');

        // I. CATATAN PEJABAT BEA DAN CUKAI
        $pdf->SetXY($row_x + 95, $row_y);
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->MultiCell(0, 4, 'I. CATATAN PEJABAT BEA DAN CUKAI', 0, 'L');

        // Catatan Pejabat
        // use multicell, separate rectangle
        $pdf->SetX($pdf->GetX() + 95);
        $pdf->SetFont('Arial', '', 8);
        $pdf->MultiCell(0, 4, $this->catatan_pejabat, 0);
        // draw the rectangle surrounding it
        $pdf->Rect($row_x + 95, $row_y, 95, 24);

        // force offset ke baris 4
        $pdf->SetY($row_y + 24);
        //-------------------------------------------------------------------------------------
        // 10th row, UNTUK PEJABAT BEA DAN CUKAI PELABUHAN PENGELUARAN
        //-------------------------------------------------------------------------------------
        // J. UNTUK PEJABAT BEA DAN CUKAI PELABUHAN PENGELUARAN
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(0, 4, 'J. UNTUK PEJABAT BEA DAN CUKAI PELABUHAN PENGELUARAN', 1, 1);

        // set font back
        $pdf->SetFont('Arial', '', 8);

        // record xy
        $row_x  = $pdf->GetX();
        $row_y  = $pdf->GetY();

        // 40. Kantor
        $pdf->Cell(25, 4, '40. Kantor       :');
        $pdf->MultiCell(70, 4, $this->kantor_pengeluaran, 0, 'L');

        // 41. Nomor
        $pdf->Cell(25, 4, '41. Nomor       :');
        $pdf->MultiCell(70, 4, $this->nomor_bukti_realisasi_ekspor, 0, 'L');

        // 42. Tanggal
        $pdf->Cell(25, 4, '42. Tanggal     :');
        $pdf->MultiCell(70, 4, $this->tgl_bukti_realisasi_ekspor, 0, 'L');

        // record last y
        $last_y = $pdf->GetY();

        // draw rectangle surrounding 40-42
        $pdf->Rect($row_x, $row_y, 95, $last_y-$row_y);

        // record lasty
        $last_y = $pdf->GetY();

        // Ttd pengeluaran (blank by default)
        $pdf->MultiCell(95, 4, "{$this->ttd_kota_keluar} , Tgl {$this->ttd_tanggal_keluar}\nPejabat Bea dan Cukai\n\n\nNama : {$this->nama_pejabat_keluar}\nNIP    : {$this->nip_pejabat_keluar}", 0, 'L');

        // record maximum Y
        $max_row_y = $pdf->GetY();


        // RIGHT SIDE!!
        // K. CATATAN PEJABAT BEA DAN CUKAI
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetXY($row_x + 95, $row_y);
        $pdf->Cell(0, 4, 'K. CATATAN PEJABAT BEA DAN CUKAI', 0, 1);

        $max_row_y = max($max_row_y, $pdf->GetY());

        // draw the rectangle for ttd & K.CATATAN PEJABAT
        $pdf->Rect($row_x, $last_y, 95, $max_row_y-$last_y);
        $pdf->Rect($row_x + 95, $row_y, 95, $max_row_y-$row_y);
    }

    // handle generation, spawn various data, etc
    public function generatePDF() {
        $this->generateFirstPage();
        // check data barang, if there's more than 1, spawn additional page
    }
}



//===============================================================================================
// actual pdf gen
//===============================================================================================
$pdf = new PDFImporSementara('P', 'mm', 'A4');

$pdf->generatePDF();
// PRINT!!
$pdf->Output('I', 'is.pdf');