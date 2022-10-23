<?php

namespace App\Controllers;

use App\Models\PenyewaanModel;
use App\Models\PelangganModel;
use App\Models\KategoriBukuModel;
use App\Models\BukuModel;

class Penyewaan extends BaseController
{
    public function __construct()
    {
        $this->penyewaanModel = new PenyewaanModel();

    }
	
    public function view(){
        $pelanggan_model = model(PelangganModel::class);
        $kategoribuku_model = model(KategoriBukuModel::class);
        $buku_model = model(BukuModel::class);
        $penyewaan_model = model(PenyewaanModel::class);
        $datapenyewaan = $penyewaan_model->getAll();
        $kode = $penyewaan_model->kode();
        $datakategoribuku = $kategoribuku_model->getKategoriBuku();
        $datapelanggan = $pelanggan_model->getPelanggan();
        $databuku = $buku_model->getBuku();
        // $datatransaksi = $transaksi_model->gettransaksi();

        echo view('Penyewaan/ViewData',[
                'title' => 'View Penyewaan',
                'datapenyewaan' => $datapenyewaan,
                'datakategoribuku' => $datakategoribuku,
                'datapelanggan' => $datapelanggan,
                'databuku' => $databuku,
                'kode' => $kode,
            ]
        );   
    }
     // method tambah data
     public function add()
     {
        $db      = \Config\Database::connect();
        $builder = $db->table('penyewaan');

        $tglsewa = $this->request->getVar('tgl_sewa');
                $tglpengembalian = $this->request->getVar('tgl_pengembalian');
                $awal  = date_create($tglsewa);
                $akhir = date_create($tglpengembalian); 
                $diff  = date_diff( $awal, $akhir );

                $hari = $diff->days;

                $total = $hari * 7000;
        $data1 = [
            'id_sewa' => $this->request->getVar('id_sewa'),
            'id_pelanggan' => $this->request->getVar('id_pelanggan'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'kode_buku'=>$this->request->getVar('kode_buku'),
            'tgl_sewa' => $this->request->getVar('tgl_sewa'),
            'tgl_pengembalian' => $this->request->getVar('tgl_pengembalian'),
            'total_bayar' => $total,
            'posisi' => 'debet',
            'akun' => 'Kas'
        ];
        $data = [
            'id_sewa' => $this->request->getVar('id_sewa'),
            'id_pelanggan' => $this->request->getVar('id_pelanggan'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'kode_buku'=>$this->request->getVar('kode_buku'),
            'tgl_sewa' => $this->request->getVar('tgl_sewa'),
            'tgl_pengembalian' => $this->request->getVar('tgl_pengembalian'),
            'total_bayar' => $total,
            'posisi' => 'kredit',
            'akun' => 'Penyewaan'

        ];
        $builder->insert($data1);
        $builder->insert($data);
                return redirect()->back()->withInput();

             
     }
    //method ambil data
    public function viewdata(){
        if($this->request->getMethod()){
            $penyewaan_model = model(PenyewaanModel::class);
            $datapenyewaan = $penyewaan_model->getPenyewaan();

            echo view('Templates/HeaderBootstrap');
            echo view('Templates/SidebarBootstrap');
            echo view('Penyewaan/View',[
                'title' => 'View Penyewaan',
        
            ]);
            echo view('Templates/FooterBootstrap');

            // $data = [
            //     'datapenyewaan' => $datapenyewaan,
            //     'data' => view('Penyewaan/View', $data)

            //  ];  

            //  $msg = [
            //     'data' => view('Penyewaan/View', $data)
            //  ]; 


        }else{
            exit('Maaf tidak dapat diproses');
        }
    } 
}
?>