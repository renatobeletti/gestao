<?php
class Menus extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['menu_model', 'auth_model']);
        if (!$this->session->userdata('logged_in')) redirect('auth');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['titulo'] = "Gerenciar Menus";
        $data['nome_usuario'] = $this->session->userdata('nome');
        $data['menus'] = $this->menu_model->obter_menu_usuario($user_id); // Para o sidebar
        $data['lista_menus'] = $this->db->get('menus')->result(); // Todos os menus para a tabela
        
        $this->load->view('includes/header', $data);
        $this->load->view('menus/listar', $data);
        $this->load->view('includes/footer');
    }
}