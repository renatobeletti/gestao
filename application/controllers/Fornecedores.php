<?php
class Fornecedores extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('auth');
        $this->load->model(['fornecedor_model', 'menu_model', 'preferencia_model']);
    }

    public function index() {
        $uid = $this->session->userdata('user_id');
        $data = [
            'titulo' => "Fornecedores",
            'nome_usuario' => $this->session->userdata('nome'),
            'menus' => $this->menu_model->obter_menu_usuario($uid),
            'cores' => $this->preferencia_model->obter_por_usuario($uid),
            'lista' => $this->fornecedor_model->listar()
        ];
        $this->load->view('includes/header', $data);
        $this->load->view('financeiro/fornecedores_lista', $data);
        $this->load->view('includes/footer');
    }

    public function formulario($id = null) {
        $uid = $this->session->userdata('user_id');
        $data = [
            'titulo' => $id ? "Editar Fornecedor" : "Novo Fornecedor",
            'nome_usuario' => $this->session->userdata('nome'),
            'menus' => $this->menu_model->obter_menu_usuario($uid),
            'cores' => $this->preferencia_model->obter_por_usuario($uid),
            'edit' => $id ? $this->fornecedor_model->obter($id) : null
        ];
        $this->load->view('includes/header', $data);
        $this->load->view('financeiro/fornecedores_form', $data);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $dados = $this->input->post();
        $this->fornecedor_model->salvar($dados);
        redirect('fornecedores');
    }
}