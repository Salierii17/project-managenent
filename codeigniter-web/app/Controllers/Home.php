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
        if ($this->request->getMethod() === 'post') {
            // Handle the form submission
            $client = \Config\Services::curlrequest();
            $data = [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'negara' => $this->request->getPost('negara'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kota' => $this->request->getPost('kota'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $response = $client->post('http://localhost:8082/lokasi', [
                'json' => $data
            ]);

            return redirect()->to('/');
        } else {
            // Load the add location view
            echo view('addLokasi');
        }
    }
    public function editLokasi($id)
    {
        if ($this->request->getMethod() === 'post') {
            // Handle the form submission
            $client = \Config\Services::curlrequest();
            $data = [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'negara' => $this->request->getPost('negara'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kota' => $this->request->getPost('kota')
            ];

            $response = $client->put('http://localhost:8082/lokasi/' . $id, [
                'json' => $data
            ]);

            return redirect()->to('/');
        } else {
            // Fetch the current location data
            $client = \Config\Services::curlrequest();
            $response = $client->get('http://localhost:8082/lokasi/' . $id);
            $lokasi = json_decode($response->getBody(), true);

            // Load the edit location view with the current data
            echo view('editLokasi', ['lokasi' => $lokasi]);
        }
    }

    public function deleteLokasi($id)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->delete('http://localhost:8082/lokasi/' . $id);

        return redirect()->to('/');
    }
    public function addProyek()
    {
        if ($this->request->getMethod() === 'post') {
            // Handle the form submission
            $client = \Config\Services::curlrequest();
            $data = [
                'nama_proyek' => $this->request->getPost('nama_proyek'),
                'client' => $this->request->getPost('client'),
                'tgl_mulai' => $this->request->getPost('tgl_mulai'),
                'tgl_selesai' => $this->request->getPost('tgl_selesai'),
                'created_at' => date('d-m-y H:i:s')
            ];

            $response = $client->post('http://localhost:8082/proyek', [
                'json' => $data
            ]);

            return redirect()->to('/');
        } else {
            // Load the add location view
            echo view('addProyek');
        }
    }
    public function editProyek($id)
    {
        if ($this->request->getMethod() === 'post') {
            // Handle the form submission
            $client = \Config\Services::curlrequest();
            $data = [
                'nama_proyek' => $this->request->getPost('nama_proyek'),
                'client' => $this->request->getPost('client'),
                'tgl_mulai' => $this->request->getPost('tgl_mulai'),
                'tgl_selesai' => $this->request->getPost('tgl_selesai')
            ];

            $response = $client->put('http://localhost:8082/proyek/' . $id, [
                'json' => $data
            ]);

            return redirect()->to('/');
        } else {
            // Fetch the current location data
            $client = \Config\Services::curlrequest();
            $response = $client->get('http://localhost:8082/proyek/' . $id);
            $proyek = json_decode($response->getBody(), true);

            // Load the edit location view with the current data
            echo view('editProyek', ['Proyek' => $proyek]);
        }
    }

    public function deleteProyek($id)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->delete('http://localhost:8082/proyek/' . $id);

        return redirect()->to('/');
    }

}
