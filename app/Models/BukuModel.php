<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'buku';
    protected $primaryKey = 'kode_buku';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['kode_buku', 'foto_buku', 'judul_buku', 'kategori', 'penerbit', 'pengarang', 'harga'];

    // method untuk mendapatkan seluruh data pada tabel kos
    public function getBuku(){
        return $this->findAll();
    }

    // method untuk menghapus data
    public function deleteBuku($kode_buku){
        $db = db_connect();
        $builder = $db->table('buku');
        $builder->delete(['kode_buku' => $kode_buku]);
    }

    // method untuk viewData berdasarkan kode buku
    public function getBukuBasedOnId($kode_buku){
        $db = db_connect();
        $query   = $db->query('SELECT * FROM buku WHERE kode_buku = ? ', array($kode_buku));
        $results = $query->getResult();
        return $results;
    }

    // method untuk updateData buku
    public function updateBuku(){
        $db = db_connect();

        $data = [
            'foto_buku' => $_POST['foto_buku'],
            'judul_buku'  => $_POST['judul_buku'],
            'kategori'  => $_POST['kategori'], 
            'penerbit'  => $_POST['penerbit'],
            'pengarang'  => $_POST['pengarang'],
            'harga'  => $_POST['harga'],
        ];
        $builder = $db->table('buku');
        // $builder->where('kode_buku', $_POST['kode_buku']);
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