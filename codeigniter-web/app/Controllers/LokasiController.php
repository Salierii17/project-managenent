<?

class LokasiController extends CI_Controller {
    public function index() {
        $data['lokasi_list'] = $this->getLokasiList();
        $this->load->view('lokasi_list', $data);
    }

    public function getLokasiList() {
        $response = file_get_contents('http://localhost:8080/lokasi');
        return json_decode($response, true);
    }

    public function addLokasi() {
        $this->load->view('add_lokasi');
    }

    public function saveLokasi() {
        $data = $this->input->post();
        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context  = stream_context_create($options);
        file_get_contents('http://localhost:8080/lokasi', false, $context);

        redirect('LokasiController/index');
    }
}
