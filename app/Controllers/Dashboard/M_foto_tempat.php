<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Model_foto_tempat;
use App\Models\Model_dashboard;

/**
 *  
 */
class M_foto_tempat extends BaseController
{
	protected $Model_foto_tempat;
	function __construct()
	{
		$this->Model_foto_tempat = new Model_foto_tempat();
		helper(['form', 'url']);
	}

	public function view($id)
	{
		$session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        $model = new Model_foto_tempat();
        $foto_tempat = $model->view_foto_tempat($id);
        $data = [
            'judul' => 'Manajemen Foto Tempat ' . $id,
            'page_header' => 'Manajemen Foto Tempat ' . $id,
            'panel_title' => 'Tabel Foto Tempat ' . $id,
            'foto_tempat' => $foto_tempat,
            'id_tempat' => $id,
            'jml_tempat' => $jumlah_pengajuan_tempat,
            'jml_pengaduan' => $jumlah_pengajuan_pengaduan
        ];
        return view('backend/vFotoTempat', $data);
	}

	function add_foto_tempat($id)
	{
		$session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        if (isset($_POST['tambah'])) {
            helper(['form', 'url']);
            $image = \Config\Services::image();
            $validated =  $this->validate([
                'file'         => [
                    'max_size[file,4096]',
                ],
            ]);

            if ($validated) {
                $session = session();

                if($imagefile = $this->request->getFiles())
                {
                   foreach($imagefile['file'] as $img)
                   {
                      if ($img->isValid() && ! $img->hasMoved())
                      {
                            $namabaru     = $img->getRandomName();
                            $img->move('docs/admin/assets/img/foto_tempat', $namabaru);// Masuk database
                            $data = array(
                                'id_tempat'     => $this->request->getVar('id_tempat'),
                                'file'      => "docs/admin/assets/img/foto_tempat/" . $namabaru,
                                'nama_file'      => "docs/admin/assets/img/foto_tempat/" . $namabaru
                            );
                            $model = new Model_foto_tempat();
                            $model->add_data($data);

                            if (file_exists($data['nama_file'])) {
                                unlink($data['nama_file']);
                            }
                      }
                   }
                }
                
                $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
                return redirect()->to(base_url('Dashboard/M_foto_tempat/view/' . '/' . $id));
            } else {
                session()->setFlashdata('eror', \Config\Services::validation()->listErrors());$data =
                [
                    'judul' => 'Form Tambah Foto Tempat',
                    'page_header' => 'Form Tambah Foto Tempat',
                    'panel_title' => 'Form Foto Tempat',
                    'id_tempat' => $id,
                    'jml_tempat' => $jumlah_pengajuan_tempat,
                    'jml_pengaduan' => $jumlah_pengajuan_pengaduan
                ];
                return view('backend/vAddFotoTempat', $data);
            }
        } else {
            $data =
                [
                    'judul' => 'Form Tambah Foto Tempat',
                    'page_header' => 'Form Tambah Foto Tempat',
                    'panel_title' => 'Form Foto Tempat',
                    'id_tempat' => $id,
                    'jml_tempat' => $jumlah_pengajuan_tempat,
                    'jml_pengaduan' => $jumlah_pengajuan_pengaduan
                ];
            return view('backend/vAddFotoTempat', $data);
        }
	}
     public function detail_foto_tempat($id)
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        $model = new Model_foto_tempat();
        $foto_tempat = $model->detail_data($id);
        $data =
                [
                    'judul' => 'Form Ubah Foto Tempat',
                    'page_header' => 'Form Ubah Foto Tempat',
                    'panel_title' => 'Form Foto Tempat',
                    'foto_tempat' => $foto_tempat,
                    'jml_tempat' => $jumlah_pengajuan_tempat,
                    'jml_pengaduan' => $jumlah_pengajuan_pengaduan
                ];
        return view('backend/vUpdateFotoTempat', $data);
    }

    public function update_foto_tempat()
    {
        $session = session();
        if (!$session->get('username_login') || $session->get('level_login') == 'User') {
            return redirect()->to('/smartapps/Dashboard/Login');
        }

        $model_dash = new Model_dashboard();
        $jumlah_pengajuan_tempat = $model_dash->jumlah_pengajuan_tempat();
        $jumlah_pengajuan_pengaduan = $model_dash->jumlah_pengajuan_pengaduan();

        $model = new Model_foto_tempat();
        if (isset($_POST['edit'])) {
            helper(['form', 'url']);
            $image = \Config\Services::image();
            $id = $this->request->getVar('id_foto');
            $id_tempat = $this->request->getVar('id_tempat');
            $validated =  $this->validate([
                'file'         => [
                    'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                    'max_size[file,4096]',
                ],
            ]);
            if (!$validated) {
                session()->setFlashdata('eror', \Config\Services::validation()->listErrors());
                $foto_tempat = $model->detail_data($id);
                $data =
                    [
                        'judul' => 'Form Ubah Foto Tempat',
                        'page_header' => 'Form Ubah Foto Tempat',
                        'panel_title' => 'Form Foto Tempat',
                        'foto_tempat' => $foto_tempat,
                        'jml_tempat' => $jumlah_pengajuan_tempat,
                        'jml_pengaduan' => $jumlah_pengajuan_pengaduan
                    ];
                return view('backend/vUpdateFotoTempat', $data);
            } else {
                $file = $this->request->getFile('file');
                if ($file == '') {
                    $data = array(
                        'id_tempat'   => $this->request->getVar('id_tempat')
                    );
                    $model->update_data($data, $id);
                    $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');
                    return redirect()->to(base_url('Dashboard/M_foto_tempat/view' . '/' . $id_tempat));
                } else {
                    $avatar      = $this->request->getFile('file');
                    $namabaru     = $avatar->getRandomName();
                    $avatar->move('docs/admin/assets/img/foto_tempat', $namabaru);
                    $data = array(
                        'id_tempat'   => $this->request->getVar('id_tempat'),
                        'file'      => $this->request->getFile('file'),
                        'foto' =>   $this->request->getVar('foto'),
                        'filename' => "docs/admin/assets/img/foto_tempat/" . $namabaru,
                        'gambar' => 'docs/admin/assets/img/foto_tempat/' . $namabaru
                    );
                    $model->update_data($data, $id);
                    $session->setFlashdata('sukses', 'Data sudah berhasil di Ubah');
                    if (file_exists($data['gambar'])) {
                        unlink($data['gambar']);
                    }
                    return redirect()->to(base_url('Dashboard/M_foto_tempat/view' . '/' . $id_tempat));
                }
            }
        } else {
            $id_tempat = $this->request->getVar('id_tempat');
            return redirect()->to(base_url('Dashboard/M_foto_tempat/view' . '/' . $id_tempat));
        }
    }

    public function delete_foto_tempat()
    {
        $model = new Model_foto_tempat();
        $id = $this->request->getVar('id_foto');
        $id_tempat = $this->request->getVar('id_tempat');
        $model->delete_data($id, $id_tempat);
        $session = session();
        $session->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/smartapps/Dashboard/M_foto_tempat/view' . '/' . $id_tempat);
    }
}