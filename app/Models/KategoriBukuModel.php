<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriBukuModel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'kategori_buku';
    protected $primaryKey = 'id_kategori_buku';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['id_kategori', 'nama_kategori','foto','nomor_rak'];

    // method untuk mendapatkan seluruh data pada tabel kategori buku
    public function getKategoriBuku(){
        return $this->findAll();
    }

    // method untuk menghapus data
    public function deleteKategoriBuku($id_kategori){
        $db = db_connect();
        $builder = $db->table('kategori_buku');
        $builder->delete(['id_kategori' => $id_kategori]);
    }

    // method untuk viewData berdasarkan id kategori
    public function getKategoriBukuBasedOnId($id_kategori){
        $db = db_connect();
        $query   = $db->query('SELECT * FROM kategori_buku WHERE id_kategori = ? ', array($id_kategori));
        $results = $query->getResult();
        return $results;
    }

    // method untuk updateData kategoti
    public function updateKategoriBuku(){
        $db = db_connect();

        $data = [
            'id_kategori' => $_POST['id_kategori'], //nama adalah atribut database, sedangkan nama_kos adalah nama input formnya
            'nama_kategori'  => $_POST['nama_kategori'],
            // 'foto'  => $_POST['foto'],
            'nomor_rak'  => $_POST['nomor_rak'],

        ];
        $builder = $db->table('kategori_buku');
        $builder->where('id_kategori', $_POST['id_kategori']);
        $builder->update($data);
    }
    public function cekUsernamePassword(){
        $nama = $_POST['username'];
        $pwd = $_POST['password'];
        // query dengan bind parameter username dan pwd untuk mencegah sql injection
        $db = db_connect();
        $query   = $db->query('SELECT COUNT(*) as jml FROM akun WHERE username = ? AND pwd = ?', array($nama,md5($pwd)));
        $results = $query->getResult();
        return $results;
    }
    
}