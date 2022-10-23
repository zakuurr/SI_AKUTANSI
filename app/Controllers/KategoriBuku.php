<?php

namespace App\Controllers;

use App\Models\KategoriBukuModel; //include akun model di dalam controller

class KategoriBuku extends BaseController
{
    protected $KategoriBukuModel;
    public function __construct()
    {
        $this->KategoriBukuModel=new KategoriBukuModel();
    }
    // method tambah data
    public function add()
    {
        $kategoribuku_model = model(KategoriBukuModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            
        $this->validate([
                'id_kategori' => 'required',
                'nama_kategori'  => 'required|min_length[3]|max_length[500]',
                // 'foto'=>'is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
            ],
                [   //List Custom Pesan Error
                    'id_kategori' => [
                        'required' => 'ID Kategori tidak boleh kosong',
                    ],
                    'nama_kategori' => [
                        'required' => 'Nama Kategori tidak boleh kosong',
                        'min_length' => 'Panjang Nama Kategori tidak boleh kurang dari 3',
                        'max_length' => 'Panjang Nama Kategori tidak boleh lebih dari 500',
                    ],
                    // 'foto' => [
                    //     'is_image' => 'Yang Anda pilih bukan gambar',
                    //     'mime_in' => 'foto harus berupa file jpg, png, atau jpeg',
                    // ],
                ]
            )
            ) 
        {
            $filefoto=$this->request->getFile('foto');
            if($filefoto->getError()==4){
                $namafoto='default.jpg';
            }else{

                $namafoto=$filefoto->getName();
                $filefoto->move('img', $namafoto);
            }
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung masukkan ke database
            $kategoribuku_model->save([
                'id_kategori' => $this->request->getPost('id_kategori'),
                'nama_kategori'  => $this->request->getPost('nama_kategori'),
                'foto'  => $namafoto,
                'nomor_rak' => $this->requst->getPost('nomor_rak')
            ]);

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Input");

            // redirect ke daftar kosan
            return redirect()->to('KategoriBuku/view');

        } else {
            echo view('Templates1/HeaderBootstrap');
            echo view('Templates1/SidebarBootstrap');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view('KategoriBuku/Add', [
                                    'title' => 'Input Kategori Buku',
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('Templates1/FooterBootstrap');        
        }
    }

    // method view daftar
    public function view(){

        $kategoribuku_model = model(KategoriBukuModel::class);
        $datakategoribuku = $kategoribuku_model->getKategoriBuku();
        echo view('Templates1/HeaderBootstrap');
        echo view('Templates1/SidebarBootstrap');
        echo view('KategoriBuku/View',
                    [
                        'title' => 'View Kategori Buku',
                        'datakategoribuku' => $datakategoribuku,
                    ]
                 );
        echo view('Templates1/FooterBootstrap');            
    }
    
    // method untuk menghapus
    public function delete($id_kategori){

        $kategoribuku_model = model(KategoriBukuModel::class);
        $kategoribuku_model->deleteKategoriBuku($id_kategori);

        $session = session();
        $session->setFlashdata("status_dml", "Sukses Delete");

        return redirect()->to('KategoriBuku/view');
    }

    // method untuk melihat data kategori buku berdasarkan id kategori
    public function viewData($id_kategori){
        $kategoribuku_model = model(KategoriBukuModel::class);
        $datakategoribuku = $kategoribuku_model->getKategoriBukuBasedOnId($id_kategori);

        echo view('Templates1/HeaderBootstrap');
        echo view('Templates1/SidebarBootstrap');
        echo view('KategoriBuku/Edit',
                    [
                        'title' => 'Ubah Kategori Buku',
                        'datakategoribuku' => $datakategoribuku,
                    ]
                 );
        echo view('Templates1/FooterBootstrap');                
    }

    // method untuk mengupdate data kategori buku 
    public function update(){
        $kategoribuku_model = model(KategoriBukuModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
                'id_kategori' => 'required',
                'nama_kategori'  => 'required|min_length[3]|max_length[500]',
                // 'foto'=>'is_image[foto]|mime_in[foto,image/jpg,image/png,image/jpeg]',
                ],
                [   //List Custom Pesan Error
                    'id_kategori' => [
                        'required' => 'ID Kategori tidak boleh kosong',
                    ],
                    'nama_kategori' => [
                        'required' => 'Nama Kategori tidak boleh kosong',
                        'min_length' => 'Panjang Nama Kategori tidak boleh kurang dari 3',
                        'max_length' => 'Panjang Nama Kategori tidak boleh lebih dari 500',
                    ],
                    // 'foto' => [
                    //     'is_image' => 'Yang Anda pilih bukan gambar',
                    //     'mime_in' => 'foto harus berupa file jpg, png, jpeg',
                    // ],
                ]
            )
            ) 
        {
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung update ke database
            $kategoribuku_model->updateKategoriBuku();

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Update");
            // redirect ke daftar kategori
            return redirect()->to('KategoriBuku/view');

        } else {
            echo view('Templates1/HeaderBootstrap');
            echo view('Templates1/SidebarBootstrap');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            $datakategoribuku = $kategoribuku_model->getKategoriBukuBasedOnId($_POST['id_kategori']);
            echo view('KategoriBuku/Edit', [
                                    'title' => 'Ubah Kategori Buku',
                                    'datakategoribuku' => $datakategoribuku,
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('Templates1/FooterBootstrap');               
        }
    }

}
