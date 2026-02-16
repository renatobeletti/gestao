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
        // 1. Pegar o ID do usuário que está na sessão
        $user_id = $this->session->userdata('user_id');
        
        $data['titulo'] = "Painel de Controle";
        $data['nome_usuario'] = $this->session->userdata('nome');
        $data['menus'] = $this->menu_model->obter_menu_usuario($user_id); // Busca os menus permitidos
        
        // Carregaremos a view em partes para facilitar a manutenção
        $this->load->view('includes/header', $data);
        $this->load->view('dashboard/home', $data);
        $this->load->view('includes/footer');
    }
}