<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyewaanModel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'penyewaan';
    protected $primaryKey = 'id_sewa';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['id_sewa','id_pelanggan','id_kategori','kode_buku','tgl_sewa','tgl_pengembalian','posisi','total_bayar','akun'];

    // method untuk mendapatkan seluruh data pada tabel kos
    public function getPenyewaan(){
        return $this->findAll();
    }

    // method untuk menghapus data
    public function deletePenyewaan($id_sewa){
        $db = db_connect();
        $builder = $db->table('penyewaan');
        $builder->delete(['id_sewa' => $id_sewa]);
    }

    // method untuk viewData berdasarkan id
    public function getPenyewaanBasedOnId($id_sewa){
        $db = db_connect();
        $query   = $db->query('SELECT * FROM retur WHERE id_sewa = ? ', array($id_sewa));
        $results = $query->getResult();
        return $results;
    }

    public function getAll() {
      
            $builder = $this->db->table('penyewaan');
            $builder->select('penyewaan.id_sewa,pelanggan.id_pelanggan,pelanggan.nama,kategori_buku.id_kategori,kategori_buku.nama_kategori,buku.kode_buku,buku.judul_buku,penyewaan.tgl_sewa,penyewaan.tgl_pengembalian,penyewaan.total_bayar,penyewaan.posisi');
            $builder->join('pelanggan', 'pelanggan.id_pelanggan=penyewaan.id_pelanggan');
            $builder->join('kategori_buku', 'kategori_buku.id_kategori=penyewaan.id_kategori');
            $builder->join('buku', 'buku.kode_buku=penyewaan.kode_buku');
            $builder->groupBy('penyewaan.id_sewa');
            $query = $builder->get();
            return $query->getResultArray();
       
    }

    public function getAll2($vtanggal) {
        $vbulan = date("m",strtotime($vtanggal));
        $builder = $this->db->table('penyewaan');
        $builder->select('penyewaan.id_sewa,pelanggan.id_pelanggan,pelanggan.nama,kategori_buku.id_kategori,kategori_buku.nama_kategori,buku.kode_buku,buku.judul_buku,penyewaan.tgl_sewa,penyewaan.tgl_pengembalian,penyewaan.total_bayar,penyewaan.posisi');
        $builder->join('pelanggan', 'pelanggan.id_pelanggan=penyewaan.id_pelanggan');
        $builder->join('kategori_buku', 'kategori_buku.id_kategori=penyewaan.id_kategori');
        $builder->join('buku', 'buku.kode_buku=penyewaan.kode_buku');
        $builder->where('MONTH(tgl_sewa)',$vbulan);
        $builder->where('YEAR(tgl_sewa)',$vtanggal);
        $builder->orderBy('tgl_sewa');
        $query = $builder->get();
        return $query->getResultArray();
   
}

public function getAll3($vtanggal,$akun) {
    $vbulan = date("m",strtotime($vtanggal));
    $builder = $this->db->table('penyewaan');
    $builder->select('penyewaan.id_sewa,pelanggan.id_pelanggan,pelanggan.nama,kategori_buku.id_kategori,kategori_buku.nama_kategori,buku.kode_buku,buku.judul_buku,penyewaan.tgl_sewa,penyewaan.tgl_pengembalian,penyewaan.total_bayar,penyewaan.posisi,penyewaan.akun');
    $builder->join('pelanggan', 'pelanggan.id_pelanggan=penyewaan.id_pelanggan');
    $builder->join('kategori_buku', 'kategori_buku.id_kategori=penyewaan.id_kategori');
    $builder->join('buku', 'buku.kode_buku=penyewaan.kode_buku');
    $builder->where('MONTH(tgl_sewa)',$vbulan);
    $builder->where('YEAR(tgl_sewa)',$vtanggal);
    $builder->where('penyewaan.akun',$akun);
    $builder->orderBy('tgl_sewa');
    $query = $builder->get();
    return $query->getResultArray();

}

    public function kode()
    {
         $builder = $this->db->table('penyewaan');
         $builder->select('RIGHT(penyewaan.id_sewa,2) as id_sewa', FALSE);
         $builder->orderBy('id_sewa', 'DESC');
         $builder->limit(1);
         $query = $builder->get();      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->getNumRows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->getRow();
            $kode = intval($data->id_sewa) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }
        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PW" . $kodemax;
        return $kodejadi;  
    }

}