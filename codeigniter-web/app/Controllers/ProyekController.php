<?

class ProyekController extends CI_Controller {
    public function index() {
        $data['proyek_list'] = $this->getProyekList();
        $this->load->view('proyek_list', $data);
    }

    public function getProyekList() {
        $response = file_get_contents('http://localhost:8080/proyek');
        return json_decode($response, true);
    }

    public function addProyek() {
        // Load a view to input a new project
        $this->load->view('add_proyek');
    }

    public function saveProyek() {
        $data = $this->input->post();
        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context  = stream_context_create($options);
        file_get_contents('http://localhost:8080/proyek', false, $context);

        redirect('ProyekController/index');
    }
}
