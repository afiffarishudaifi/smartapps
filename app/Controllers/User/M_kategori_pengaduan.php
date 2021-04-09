<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Model_kategori_pengaduan_user;
use App\Models\Model_dashboard_user;

class M_kategori_pengaduan extends BaseController
{

    protected $Model_kategori_pengaduan_user;
    public function __construct()
    {
        $this->Model_kategori_pengaduan_user = new Model_kategori_pengaduan_user();
        helper('form');
    }

    public function index()
    {
        $session = session();
        $id = $session->get('id_login');
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $model = new Model_dashboard_user();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model->jumlah_penanganan($id);

        $model = new Model_kategori_pengaduan_user();
        $Kategori = $model->view_data($id);
        $data = [
            'judul' => 'Manajemen Kategori Pengaduan',
            'page_header' => 'Manajemen Kategori Pengaduan',
            'panel_title' => 'Tabel Kategori Pengaduan',
            'kategori' => $Kategori,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
            'jml_penanganan' => $jumlah_penanganan
        ];
        return view('user/vKategoriPengaduan', $data);
    }

    public function add_kategori_pengaduan()
    {
        $session = session();
        $id = $session->get('id_login');
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $model = new Model_dashboard_user();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id);
        $jumlah_penanganan = $model->jumlah_penanganan($id);

        if (isset($_POST['tambah'])) {
            helper(['form', 'url']);
            $session = session();
            $data = array(
                'nama_kategori_pengaduan'    => $this->request->getVar('nama_kategori_pengaduan'),
                'id_web'    => $this->request->getVar('id_web')
            );
            $model = new Model_kategori_pengaduan_user();
            $model->add_data($data);
            $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
            return redirect()->to(base_url('public/User/M_kategori_pengaduan'));
        } else {
            $data =
                [
                    'judul' => 'Form Tambah Kategori Pengaduan',
                    'page_header' => 'Form Tambah Kategori Pengaduan',
                    'panel_title' => 'Form Kategori Pengaduan',
                    'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
                    'jml_penanganan' => $jumlah_penanganan
                ];
            return view('user/vAddKategoriPengaduan', $data);
        }
    }

    public function detail_kategori_pengaduan($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }

        $id_login = $session->get('id_login');
        $model = new Model_dashboard_user();
        $jumlah_pengajuan_pengaduan = $model->jumlah_pengajuan_pengaduan($id_login);
        $jumlah_penanganan = $model->jumlah_penanganan($id_login);

        $model = new Model_kategori_pengaduan_user();
        $kategori = $model->detail_data($id);
        $data =
            [
                'judul' => 'Form Ubah Kategori Pengaduan',
                'page_header' => 'Form Ubah Kategori Pengaduan',
                'panel_title' => 'Form Kategori Pengaduan',
                'kategori' => $kategori,
                'jml_pengaduan' => $jumlah_pengajuan_pengaduan,
                'jml_penanganan' => $jumlah_penanganan
            ];
        return view('user/vUpdateKategoriPengaduan', $data);
    }

    public function update_kategori_pengaduan()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') != 'User') {
            return redirect()->to('/smartapps/public/Dashboard/Login');
        }
        if (isset($_POST['edit'])) {
            helper(['form', 'url']);
            $session = session();

            $id = $this->request->getVar('id_kategori_pengaduan');
            $data = array(
                'nama_kategori_pengaduan'    => $this->request->getVar('nama_kategori_pengaduan')
            );
            $model = new Model_kategori_pengaduan_user();
            $model->update_data($data, $id);
            $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');
            return redirect()->to(base_url('public/User/M_kategori_pengaduan'));
        } else {
            return redirect()->to('public/User/M_kategori_pengaduan');
        }
    }

    public function delete_kategori_pengaduan()
    {
        $model = new Model_kategori_pengaduan_user();
        $id = $this->request->getVar('id_kategori');
        $session = session();
        $foreign = $model->cek_foreign($id);
        // dd($foreign);
        if ($foreign == 0) {
            $model->delete_data($id);
            session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        } else {
            session()->setFlashdata('sukses', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        }
        return redirect()->to('/smartapps/public/User/M_kategori_pengaduan');
    }

    // ======= KATEGORI PENGADUAN ======= //

}