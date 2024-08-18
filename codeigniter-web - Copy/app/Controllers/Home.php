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
            $client = \Config\Services::curlrequest();
            $data = [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'negara' => $this->request->getPost('negara'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kota' => $this->request->getPost('kota')
            ];

            log_message('info', 'Data being sent: ' . json_encode($data));

            try {
                $response = $client->post('http://localhost:8082/lokasi', [
                    'json' => $data,
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                ]);

                // Log the HTTP response status and body
                $statusCode = $response->getStatusCode();
                $responseBody = $response->getBody();
                log_message('info', 'POST Request Status Code: ' . $statusCode);
                log_message('info', 'POST Request Response Body: ' . $responseBody);

                if ($statusCode == 201) {
                    return redirect()->to('/');
                } else {
                    return redirect()->back()->with('error', 'Error adding Lokasi.');
                }
            } catch (\Exception $e) {
                log_message('error', 'Exception adding Lokasi: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Exception occurred.');
            }
        } else {
            echo view('addLokasi');
        }
    }


    public function editLokasi($id)
    {
        if ($this->request->getMethod() === 'post') {
            $client = \Config\Services::curlrequest();
            $data = [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'negara' => $this->request->getPost('negara'),
                'provinsi' => $this->request->getPost('provinsi'),
                'kota' => $this->request->getPost('kota')
            ];

            try {
                $response = $client->request('PUT', "http://localhost:8082/lokasi/" . $id, [
                    'json' => $data,
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                ]);

                $responseBody = $response->getBody();
                $statusCode = $response->getStatusCode();

                log_message('info', 'PUT Request Status Code: ' . $statusCode);
                log_message('info', 'PUT Request Response Body: ' . $responseBody);

                if ($statusCode == 200) {
                    return redirect()->to('/');
                } else {
                    log_message('error', 'Error updating Lokasi: ' . $responseBody);
                    return redirect()->back()->with('error', 'Error updating Lokasi.');
                }
            } catch (\Exception $e) {
                log_message('error', 'Exception updating Lokasi: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Exception occurred.');
            }
        } else {
            $client = \Config\Services::curlrequest();
            $response = $client->get('http://localhost:8082/lokasi/' . $id);
            $lokasi = json_decode($response->getBody(), true);

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
            $client = \Config\Services::curlrequest();
            $response = $client->get('http://localhost:8082/proyek/' . $id);
            $proyek = json_decode($response->getBody(), true);

            echo view('editProyek', ['proyek' => $proyek]);
        }
    }

    public function deleteProyek($id)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->delete('http://localhost:8082/proyek/' . $id);

        return redirect()->to('/');
    }
}
