<?php

namespace App\Controllers;

use App\Models\KategoriBukuModel; //include akun model di dalam controller
use App\Models\KategoriBuku; //include akun model di dalam controller

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        // return view('tes');

        $session = session();
        $session->destroy();
        //return redirect()->to('/login');

        return view('login'); // memanggil view di app/views/login.php
    }

    public function ceklogin(){
        // echo $_POST['username']."<br>";
        // echo $_POST['password']."<br>";
        // echo $_GET['username']."-".$_GET['password'];
        
        
        // load model akun model
        $kategoribukumodel = model(KategoriBukuModel::class);
        $hasil = $kategoribukumodel->cekUsernamePassword();
        foreach ($hasil as $row) {
            $jml = $row->jml; //atribut hasil query diberi alias jml
        }
        if($jml==0){
            // artinya tidak ada pasangan username dan password yang cocok, kembalikan ke halaman login
            $data['pesan'] = "Pasangan username dan password tidak tepat";
            echo view('login',$data);
        }else{
            // artinya ada pasangan username dan password yang cocok, teruskan ke halaman welcome_message
            // return view('welcome_message');
            
            /* echo view('Templates1/HeaderBootstrap');
            echo view('Templates1/SidebarBootstrap');
            echo view('Templates1/BodyBootstrap');
            echo view('Templates1/FooterBootstrap'); */

            // aktifkan session dan simpan username ke dalam session serta buat variabel logged_in
            $session = session();
            $ses_data = [
                'user_name'     => $_POST['username'],
                'logged_in'     => TRUE
            ];
            $session->set($ses_data);

            // load data kategori buku dan kirim ke view
            $kategoribukumodel = model(KategoriBukuModel::class);
            $datakategoribuku = $kategoribukumodel->getKategoriBuku();
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
        
    }


}
