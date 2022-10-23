<?php

namespace App\Controllers;

use App\Models\PembayaranModel;
use App\Models\CoaModel;
use App\Models\KosanModel;
use App\Models\PenyewaanModel;

class Laporan extends BaseController
{
    // method tambah data
    public function viewKuitansi()
    {
        $pembayaran_model = new PembayaranModel();
        $data['pembayaran'] = $pembayaran_model->getInfoPembayaran();
        echo view('Laporan/Kuitansi', $data);
    }

    // cetak ke pdf
    public function cetakKuitansi($id_pembayaran){
        
        $pembayaran_model = new PembayaranModel();
        $data['kuitansi'] = $pembayaran_model->getInfoPembayaranById($id_pembayaran);
        $data['sisa_bayar'] = $pembayaran_model->getSisaBayar($id_pembayaran);
        
        $dompdf = new \Dompdf\Dompdf(); 
        $html = view('Laporan/Cetakkuitansidompdf', $data);
        // echo view('Laporan/Cetakkuitansidompdf', $data);
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A6', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

        
    }

    // view jurnal umum
    public function jurnalumum(){
        echo view('laporan/JurnalUmum');
    }

    // view jurnal umum
    public function ambildatajurnalumum(){
            $vtanggal=$this->request->getPost('vtanggal');
            $penyewaan = new PenyewaanModel();
            $data['penyewaan'] = $penyewaan->getAll2($vtanggal);
            echo view('laporan/index', $data);

             
       
    }

    // view bukubesar
    public function bukubesar(){
        echo view('laporan/bukubesar');
    }

    // view buku besar
    public function ambildatabukubesar(){
        $vtanggal=$this->request->getPost('vtanggal');
        $akun=$this->request->getPost('akun');
        $penyewaan = new PenyewaanModel();
        $data['penyewaan'] = $penyewaan->getAll3($vtanggal,$akun);
        echo view('laporan/ViewBukuBesar', $data);
    }

    public function tes(){
       
    }
}