<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // Se não houver sessão, chuta de volta para o login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    public function index() {
        $data['titulo'] = "Painel de Controle";
        $data['nome_usuario'] = $this->session->userdata('nome');
        
        // Carregaremos a view em partes para facilitar a manutenção
        $this->load->view('includes/header', $data);
        $this->load->view('dashboard/home', $data);
        $this->load->view('includes/footer');
    }
}