<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model
{
    // atribut tabel diisi dengan nama tabel
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';

    // atribut yang diijinkan untuk diinput menggunakan query builder
    protected $allowedFields = ['nama', 'nomor_telepon', 'jenis_kelamin', 'alamat', 'foto'];

    // method untuk mendapatkan seluruh data pada tabel kos
    public function getPelanggan()
    {
        return $this->findAll();
    }

    // method untuk menghapus data
    public function deletePelanggan($id_pelanggan)
    {
        $db = db_connect();
        $builder = $db->table('pelanggan');
        $builder->delete(['id_pelanggan' => $id_pelanggan]);
    }

    // method untuk viewData berdasarkan id
    public function getPelangganBasedOnId($id_pelanggan)
    {
        $db = db_connect();
        $query   = $db->query('SELECT * FROM pelanggan WHERE id_pelanggan = ? ', array($id_pelanggan));
        $results = $query->getResult();
        return $results;
    }

    // method untuk updateData kosan
    public function updatePelanggan()
    {
        $db = db_connect();

        $datapelanggan = [
            'nama' => $_POST['nama'],
            'nomor_telepon'  => $_POST['nomor_telepon'],
            'jenis_kelamin'  => $_POST['jenis_kelamin'],
            'alamat'  => $_POST['alamat'],
            'foto'  => $_POST['foto'],
        ];
        $builder = $db->table('pelanggan');
        $builder->where('id_pelanggan', $_POST['id_pelanggan']);
        $builder->update($datapelanggan);
    }
}