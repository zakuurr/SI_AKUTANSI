<?php

namespace App\Controllers;

use App\Models\BukuModel; //include akun model di dalam controller

class Buku extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel=new BukuModel();
    }
    // method tambah data
    public function add()
    {
        $buku_model = model(BukuModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([
                'foto_buku'=>'is_image[foto_buku]|mime_in[foto_buku,image/jpg,image/png,image/jpeg]',
                'judul_buku'  => 'required|min_length[3]|max_length[500]',
                'kategori'  => 'required|min_length[3]|max_length[500]',
                'penerbit'  => 'required|min_length[3]|max_length[500]',
                'pengarang'  => 'required|min_length[3]|max_length[500]',
                'harga'  => 'required',
                ],
                [   //List Custom Pesan Error
                    'foto_buku' => [
                        'is_image' => 'Yang Anda pilih bukan gambar',
                        'mime_in' => 'Foto harus berupa file jpg, png, jpeg',
                    ],
                    'judul_buku' => [
                        'required' => 'Judul buku tidak boleh kosong',
                        'min_length' => 'Judul buku tidak boleh kurang dari 3',
                        'max_length' => 'judul buku tidak boleh lebih dari 500',
                    ],
                    'kategori' => [
                        'required' => 'Kategori tidak boleh kosong',
                    ],
                    'penerbit' => [
                        'required' => 'Penerbit tidak boleh kosong',
                        'min_length' => 'Penerbit tidak boleh kurang dari 3',
                        'max_length' => 'Penerbit nama tidak boleh lebih dari 500',
                    ],
                    'pengarang' => [
                        'required' => 'Pengarang tidak boleh kosong',
                        'min_length' => 'Pengarang nama tidak boleh kurang dari 3',
                        'max_length' => 'Pengarang nama tidak boleh lebih dari 500',
                    ],
                    'harga' => [
                        'required' => 'Harga tidak boleh kosong',
                    ],
                ]
            )
            ) 
        {
            $filefoto=$this->request->getFile('foto_buku');
            if($filefoto->getError()==4){
                $namafoto='default.jpeg';
            }else{

                $namafoto=$filefoto->getName();
                $filefoto->move('img', $namafoto);
            }
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung masukkan ke database
           
            $buku_model->save([
                'foto_buku' => $namafoto,
                'judul_buku' => $this->request->getPost('judul_buku'),
                'kategori'  => $this->request->getPost('kategori'),
                'penerbit'  => $this->request->getPost('penerbit'),
                'pengarang' => $this->request->getPost('pengarang'),
                'harga'  => $this->request->getPost('harga'),
            ]);

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Input");

            // redirect ke daftar buku
            return redirect()->to('buku/view');

        } else {
            echo view('Templates/HeaderBootstrap');
            echo view('Templates/SidebarBootstrap');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            echo view('Buku/Add', [
                                    'title' => 'Input Buku',
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('Templates/FooterBootstrap');           
        }
    }

    // method view daftar buku
    public function view(){

        $buku_model = model(BukuModel::class);
        $databuku = $buku_model->getBuku();
        echo view('Templates/HeaderBootstrap');
        echo view('Templates/SidebarBootstrap');
        echo view('Buku/View',
                    [
                        'title' => 'View Buku',
                        'databuku' => $databuku,
                    ]
                 );
        echo view('Templates/FooterBootstrap');            
    }
    
    // method untuk menghapus buku
    public function delete($kode_buku){
        $buku= $this->bukuModel->find($kode_buku);
        if($buku['foto_buku']!='default.jpeg'){
            unlink('img/'.$buku['foto_buku']);
        }
        $buku_model = model(BukuModel::class);
        $buku_model->deleteBuku($kode_buku);

        $session = session();
        $session->setFlashdata("status_dml", "Sukses Delete");

        return redirect()->to('buku/view');
    }

    // method untuk melihat data buku berdasarkan kode buku
    public function viewData($kode_buku){
        $buku_model = model(BukuModel::class);
        $databuku = $buku_model->getBukuBasedOnId($kode_buku);

        echo view('Templates/HeaderBootstrap');
        echo view('Templates/SidebarBootstrap');
        echo view('Buku/Edit',
                    [
                        'title' => 'Ubah Buku',
                        'databuku' => $databuku,
                    ]
                 );
        echo view('Templates/FooterBootstrap');         
    }

    // method untuk mengupdate data buku 
    public function update(){
        
        $buku_model = model(BukuModel::class);
        $validation =  \Config\Services::validation();
        if ($this->request->getMethod() === 'post' && 
            $this->validate([

                'foto_buku'=>'is_image[foto_buku]|mime_in[foto_buku,image/jpg,image/png,image/jpeg]',
                'judul_buku'  => 'required|min_length[3]|max_length[500]',
                'kategori'  => 'required|min_length[3]|max_length[500]',
                'penerbit'  => 'required|min_length[3]|max_length[500]',
                'pengarang'  => 'required|min_length[3]|max_length[500]',
                'harga'  => 'required',
                ],
                [   //List Custom Pesan Error
                    'foto_buku' => [
                        'is_image' => 'Yang Anda pilih bukan gambar',
                        'mime_in' => 'Foto harus berupa file jpg, png, jpeg',
                    ],
                    'judul_buku' => [
                        'required' => 'Judul buku tidak boleh kosong',
                        'min_length' => 'Judul buku tidak boleh kurang dari 3',
                        'max_length' => 'judul buku tidak boleh lebih dari 500',
                    ],
                    'kategori' => [
                        'required' => 'Kategori tidak boleh kosong',
                    ],
                    'penerbit' => [
                        'required' => 'Penerbit tidak boleh kosong',
                        'min_length' => 'Penerbit tidak boleh kurang dari 3',
                        'max_length' => 'Penerbit nama tidak boleh lebih dari 500',
                    ],
                    'pengarang' => [
                        'required' => 'Pengarang tidak boleh kosong',
                        'min_length' => 'Pengarang nama tidak boleh kurang dari 3',
                        'max_length' => 'Pengarang nama tidak boleh lebih dari 500',
                    ],
                    'harga' => [
                        'required' => 'Harga tidak boleh kosong',
                    ],
                ]
            )
            ) 
        {
            $filefoto=$this->request->getFile('foto_buku');
            if($filefoto->getError()==4){
                $namafoto=$this->request->getVar('foto_buku');

            }else{
                $namafoto=$filefoto->getName();
                $filefoto->move('img', $namafoto);
                unlink('img/' .$this->request->getVar('foto_buku'));
            }
            // kalau masuk ke sini berarti sudah sesuai dengan rule yang dikehendaki
            // maka langsung update ke database
            $buku_model->updateBuku();

            $session = session();
            $session->setFlashdata("status_dml", "Sukses Update");
            // redirect ke daftar buku
            return redirect()->to('buku/view');

        } else {
            echo view('Templates/HeaderBootstrap');
            echo view('Templates/SidebarBootstrap');
            // pada view Add , jangan lupa kirimkan data title dan hasil pesan validasi
            $databuku = $buku_model->getBukuBasedOnId($_POST['kode_buku']);
            echo view('Buku/Edit', [
                                    'title' => 'Ubah Buku',
                                    'databuku' => $databuku,
                                    'validation' => $this->validator,
                                ]
                    );
            echo view('Templates/FooterBootstrap');           
        }
    }

}