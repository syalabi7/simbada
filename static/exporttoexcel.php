<?php
  // Load file koneksi.php
  include "koneksi.php";
  // Load plugin PHPExcel nya
  require_once 'PHPExcel/PHPExcel.php';
  // Panggil class PHPExcel nya
  $excel = new PHPExcel();
  // Settingan awal file excel
  $excel->getProperties()->setCreator('SMPN 1 Surabaya')
               ->setLastModifiedBy('SMPN 1 Surabaya')
               ->setTitle("Master Aset")
               ->setSubject("Aset")
               ->setDescription("Data Seluruh Aset Sekolah")
               ->setKeywords("Data Aset");
  // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
  $style_col = array(
    'font' => array('bold' => true), // Set font nya jadi bold
    'alignment' => array(
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
      'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ),
    'borders' => array(
      'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
      'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
      'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
      'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
    )
  );
  // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
  $style_row = array(
    'alignment' => array(
      'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ),
    'borders' => array(
      'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
      'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
      'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
      'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
    )
  );
  // $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SISWA"); // Set kolom A1 dengan tulisan "DATA SISWA"
  // $excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1
  // $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
  // $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
  // $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
  // Buat header tabel nya pada baris ke 3
  $excel->setActiveSheetIndex(0)->setCellValue('A1', "date_time_row"); 
  $excel->setActiveSheetIndex(0)->setCellValue('B1', "id_raw"); 
  $excel->setActiveSheetIndex(0)->setCellValue('C1', "user_id_raw"); 
  $excel->setActiveSheetIndex(0)->setCellValue('D1', "lokasi_ruang_raw"); 
  $excel->setActiveSheetIndex(0)->setCellValue('E1', "kategori_barang_raw"); 
  $excel->setActiveSheetIndex(0)->setCellValue('F1', "nama_barang_raw"); 
  $excel->setActiveSheetIndex(0)->setCellValue('G1', "merk_tipe_raw");
  $excel->setActiveSheetIndex(0)->setCellValue('H1', "tahun_pengadaan_raw");
  $excel->setActiveSheetIndex(0)->setCellValue('I1', "spesifikasi_keterangan_raw");
  $excel->setActiveSheetIndex(0)->setCellValue('J1', "nilai_barang_raw");
  $excel->setActiveSheetIndex(0)->setCellValue('K1', "sumber_barang_raw");
  $excel->setActiveSheetIndex(0)->setCellValue('L1', "konidisi_barang_raw");
  $excel->setActiveSheetIndex(0)->setCellValue('M1', "register_raw");

  // Apply style header yang telah kita buat tadi ke masing-masing kolom header
  // $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
  // $excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
  // Set height baris ke 1, 2 dan 3
  // $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
  // $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
  // $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
  // Buat query untuk menampilkan semua data siswa
  $sql = $pdo->prepare("SELECT * FROM asets a, categories c, kondisi_barangs kb, locations l, sumber_barangs sb WHERE a.id_kategori = c.id AND a.id_kondisi = kb.id AND a.id_lokasi = l.id AND a.id_sumber = sb.id");
  $sql->execute(); // Eksekusi querynya
  $no = 1; // Untuk penomoran tabel, di awal set dengan 1
  $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 4
  while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
    $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, '');
    $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, '');
    $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, '');
    $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['id_lokasi']);
    $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['id_kategori']);
    $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['nama_aset']);
    $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['merk']);
    $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['tahun']);
    $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['keterangan']);
    $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['nilai_barang']);
    $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['id_sumber']);
    $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['id_kondisi']);
    $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, '');
    
    // Khusus untuk no telepon. kita set type kolom nya jadi STRING
    // $excel->setActiveSheetIndex(0)->setCellValueExplicit('E'.$numrow, $data['telp'], PHPExcel_Cell_DataType::TYPE_STRING);
    
    // $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['alamat']);
    
    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    // $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
    // $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
    // $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
    // $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
    // $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
    // $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
    
    $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
    
    $no++; // Tambah 1 setiap kali looping
    $numrow++; // Tambah 1 setiap kali looping
  }
  // Set width kolom
  // $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
  // $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
  // $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
  // $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
  // $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
  // $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom F
  // Set orientasi kertas jadi LANDSCAPE
  $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
  // Set judul file excel nya
  $excel->getActiveSheet(0)->setTitle("Master Aset");
  $excel->setActiveSheetIndex(0);
  // Proses file excel
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment; filename="Master Aset.csv"'); // Set nama file excel nya
  header('Cache-Control: max-age=0');
  $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
  $write->save('php://output');
?>