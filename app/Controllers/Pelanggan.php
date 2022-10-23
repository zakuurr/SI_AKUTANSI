<?php

namespace App\Controllers;

use App\Models\PelangganModel; //include akun model di dalam controller

class Pelanggan extends BaseController
{
    // method tambah data
    public function add()
    {
        $pelanggan_model = model(PelangganModel::class);
        $validation =  \Config\Services::validation();
        if (
            $this->request->getMethod() === 'post' &&
            $this->validate(
                [
                    'nama' => 'required|min_length[3]|max_length[50]',
                    'nomor_telepon'  => 'required',
                    'jenis_kelamin'  => 'required',
                    'alamat'  => 'required|min_length[3]',
                    'foto' => 'is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                ],
                [
                    'nama' => [
                        'required' => 'Nama tidak boleh kosong',
                        'min_length' => 'Panjang nama tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama tidak boleh lebih dari 50',
                    ],
                    'nomor_telepon' => [
                        'required' => 'Nomor telepon tidak boleh kosong',
                    ],
                    'jenis_kelamin' => [
                        'required' => 'Jenis kelamin tidak boleh kosong',
                    ],
                    'alamat' => [
                        'required' => 'Alamat tidak boleh kosong',
                        'min_length' => 'Panjang alamat tidak boleh kurang dari 3',
                    ],
                    'foto' => [
                        'is_image' => 'Bukan gambar',
                        'mime_in' => 'Foto harus berupa file jpg, png, jpeg',
                    ],
                ]
            )
        ) {
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung masukkan ke database

            $filefoto = $this->request->getFile('foto');
            if ($filefoto->getError() == 4) {
                $namafoto = 'default.jpg';
            } else {

                $namafoto = $filefoto->getName();
                $filefoto->move('images', $namafoto);
                // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
                // maka langsung masukkan ke database
            }

            $pelanggan_model->save([
                'nama' => $this->request->getPost('nama'),
                'nomor_telepon'  => $this->request->getPost('nomor_telepon'),
                'jenis_kelamin'  => $this->request->getPost('jenis_kelamin'),
                'alamat'  => $this->request->getPost('alamat'),
                'foto'  => $namafoto,
            ]);

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Input");

            // redirect ke daftar kosan
            return redirect()->to('pelanggan/view');
        } else {
            echo view('Templates/HeaderBootstrap');
            echo view('Templates/SidebarBootstrap');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view(
                'Pelanggan/Add',
                [
                    'title' => 'Input Pelanggan',
                    'validation' => $this->validator,
                ]
            );
            echo view('Templates/FooterBootstrap');
        }
    }

    // method view daftar kosan
    public function view()
    {

        $pelanggan_model = model(PelangganModel::class);
        $datapelanggan = $pelanggan_model->getPelanggan();
        echo view('Templates/HeaderBootstrap');
        echo view('Templates/SidebarBootstrap');
        echo view(
            'Pelanggan/View',
            [
                'title' => 'View Pelanggan',
                'datapelanggan' => $datapelanggan,
            ]
        );
        echo view('Templates/FooterBootstrap');
    }

    public function delete($id_pelanggan)
    {
        $pelanggan_model = model(PelangganModel::class);
        $pelanggan_model->deletePelanggan($id_pelanggan);

        $session = session();
        $session->setFlashdata("status_dml", "Sukses Delete");

        return redirect()->to('pelanggan/view');
    }

    public function viewData($id_pelanggan)
    {
        $pelanggan_model = model(PelangganModel::class);
        $datapelanggan = $pelanggan_model->getPelangganBasedOnId($id_pelanggan);

        echo view('Templates/HeaderBootstrap');
        echo view('Templates/SidebarBootstrap');
        echo view(
            'Pelanggan/Edit',
            [
                'title' => 'Ubah Pelanggan',
                'datapelanggan' => $datapelanggan,
            ]
        );
        echo view('Templates/FooterBootstrap');
    }

    // method untuk mengupdate data kos 
    public function update()
    {
        $pelanggan_model = model(PelangganModel::class);
        $validation =  \Config\Services::validation();
        if (
            $this->request->getMethod() === 'post' &&
            $this->validate(
                [
                    'nama' => 'required|min_length[3]|max_length[50]',
                    'nomor_telepon'  => 'required',
                    'jenis_kelamin'  => 'required',
                    'alamat'  => 'required|min_length[3]',
                    'foto' => 'is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                ],
                [   //List Custom Pesan Error
                    'nama' => [
                        'required' => 'Nama tidak boleh kosong',
                        'min_length' => 'Panjang nama tidak boleh kurang dari 3',
                        'max_length' => 'Panjang nama tidak boleh lebih dari 50',
                    ],
                    'nomor_telepon' => [
                        'required' => 'Nomor telepon tidak boleh kosong',
                    ],
                    'jenis_kelamin' => [
                        'required' => 'Jenis kelamin tidak boleh kosong',
                    ],
                    'alamat' => [
                        'required' => 'alamat tidak boleh kosong',
                        'min_length' => 'Panjang alamat tidak boleh kurang dari 3',
                    ],
                    'foto' => [
                        'is_image' => 'Bukan gambar',
                        'mime_in' => 'Foto harus berupa file jpg, png, jpeg',
                    ],
                ]
            )
        ) {


            $pelanggan_model->updatePelanggan();

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Update");
            return redirect()->to('pelanggan/view');
        } else {
            echo view('Templates/HeaderBootstrap');
            echo view('Templates/SidebarBootstrap');
            $datapelanggan = $pelanggan_model->getPelangganBasedOnId($_POST['id_pelanggan']);
            echo view(
                'Pelanggan/Edit',
                [
                    'title' => 'Ubah Pelanggan',
                    'datapelanggan' => $datapelanggan,
                    'validation' => $this->validator,
                ]
            );
            echo view('Templates/FooterBootstrap');
        }
    }
}