<?php

namespace App\Controllers;

use App\Models\LokasiModel;
use App\Models\ProyekModel;

class Home extends BaseController
{
    public function index()
    {
        $lokasiModel = new LokasiModel;
        $proyekModel = new ProyekModel;

        $data['lokasi_list'] = $lokasiModel->findAll();
        $data['proyek_list'] = $proyekModel->findAll();

        return view('home', $data);
    }
    public function addLokasi()
    {
        $client = \Config\Services::curlrequest();
        $data = [
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'negara' => $this->request->getPost('negara'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota' => $this->request->getPost('kota'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $response = $client->post('http://localhost:8080/lokasi', [
            'json' => $data
        ]);

        return redirect()->to('/');
    }
    public function editLokasi($id)
    {
        $client = \Config\Services::curlrequest();
        $data = [
            'nama_lokasi' => $this->request->getPost('nama_lokasi'),
            'negara' => $this->request->getPost('negara'),
            'provinsi' => $this->request->getPost('provinsi'),
            'kota' => $this->request->getPost('kota')
        ];

        $response = $client->put('http://localhost:8080/lokasi/' . $id, [
            'json' => $data
        ]);

        return redirect()->to('/');
    }
    public function deleteLokasi($id)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->delete('http://localhost:8080/lokasi/' . $id);

        return redirect()->to('/');
    }

    // Add other methods for handling input, edit, delete, etc.
}
