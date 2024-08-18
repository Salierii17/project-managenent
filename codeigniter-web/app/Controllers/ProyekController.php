<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ProyekController extends ResourceController
{
    protected $modelName = 'App\Models\ProyekModel';
    protected $format    = 'json';

    public function index()
    {
        $response = \Config\Services::curlrequest()->get('http://localhost:8082/proyek');
        return $this->respond($response->getBody());
    }

    public function show($id = null)
    {
        $response = \Config\Services::curlrequest()->get("http://localhost:8082/proyek/$id");
        return $this->respond($response->getBody());
    }

    public function create()
    {
        $data = $this->request->getPost();
        $response = \Config\Services::curlrequest()->post('http://localhost:8082/proyek', ['json' => $data]);
        return $this->respond($response->getBody());
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $response = \Config\Services::curlrequest()->put("http://localhost:8082/proyek/$id", ['json' => $data]);
        return $this->respond($response->getBody());
    }

    public function delete($id = null)
    {
        $response = \Config\Services::curlrequest()->delete("http://localhost:8082/proyek/$id");
        return $this->respond($response->getBody());
    }
}
