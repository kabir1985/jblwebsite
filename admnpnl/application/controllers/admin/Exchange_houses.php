    <?php

class Exchange_houses extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        //session_start();
        if ($_SESSION['userid'] < 1) {
            redirect('Welcome/index', 'refresh');
        }
    }

    function index() {
        $data['title'] = "Janata Bank PLC.";
        if ($_SESSION['username'] == 'batayan' || $_SESSION['username'] == 'jbtd') {
            $data['main'] = 'vw_exhouse_home';
            $data['tda'] = $this->Model_exhouses->getAllExchange();
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        $data['tinymce'] = '';
        $this->load->vars($data);
        $data['varcss'] = 'admin_dashboard.css';
        $this->load->view('dashboard', $data);
    }

    function addExchangeHouses() {
        if ($this->input->post('exchg_house_name')) {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $config = array(
                array(
                    'field' => 'exchg_house_name',
                    'label' => 'exchg_house_name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'exchg_house_address',
                    'label' => 'exchg_house_address',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'exchg_house_country',
                    'label' => 'exchg_house_country',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'exchg_house_phone',
                    'label' => 'exchg_house_phone',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'exchg_house_status',
                    'label' => 'exchg_house_status',
                    'rules' => 'required'
                ),
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == false) {
                $data['title'] = "Janata Bank PLC.";
                if ($_SESSION['username'] == 'batayan') {
                    $data['main'] = 'vw_exhouse_add';
                } else {
                    $data['msg'] = 'You are not allowed to access this module';
                    $data['main'] = 'authorization_page';
                }
                $data['tinymce'] = '';
                $data['varcss'] = 'admin_dashboard.css';
                $this->load->view('dashboard', $data);
            } else {
                $this->Model_exhouses->addHouse();
                $this->session->set_flashdata('message', 'Successfully Added');
                redirect('admin/Exchange_houses/index', 'refresh');
            }
        } else {
            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_exhouse_add';
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function edit($id = 0) {
        if ($this->input->post('id')) {
            $this->Model_exhouses->updateHouse();
            $this->session->set_flashdata('message', 'Updated Successfully');
            redirect('admin/Exchange_houses/index', 'refresh');
        } else {

            $data['title'] = "Janata Bank PLC.";
            if ($_SESSION['username'] == 'batayan') {
                $data['main'] = 'vw_exhouse_edit';
                $data['tda'] = $this->Model_exhouses->getTopHouse($id);
            } else {
                $data['msg'] = 'You are not allowed to access this module';
                $data['main'] = 'authorization_page';
            }
            $data['tinymce'] = '';
            $this->load->vars($data);
            $data['varcss'] = 'admin_dashboard.css';
            $this->load->view('dashboard', $data);
        }
    }

    function delete($id) {
        if ($_SESSION['username'] == 'batayan') {
            $this->Model_exhouses->deleteHouse($id);
            $this->session->set_flashdata('message', 'Exchange House Deleted');
        } else {
            $data['msg'] = 'You are not allowed to access this module';
            $data['main'] = 'authorization_page';
        }
        redirect('admin/Exchange_houses/index', 'refresh');
    }

}
