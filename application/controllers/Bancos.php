<?php
class Bancos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('auth');
        $this->load->model(['conta_origem_model', 'menu_model', 'preferencia_model']);
    }

    public function index() {
        $uid = $this->session->userdata('user_id');
        $data = [
            'titulo' => "Contas e Cartões",
            'nome_usuario' => $this->session->userdata('nome'),
            'menus' => $this->menu_model->obter_menu_usuario($uid),
            'cores' => $this->preferencia_model->obter_por_usuario($uid),
            'lista' => $this->conta_origem_model->listar()
        ];
        $this->load->view('includes/header', $data);
        $this->load->view('financeiro/bancos_lista', $data);
        $this->load->view('includes/footer');
    }

    public function formulario($id = null) {
        $uid = $this->session->userdata('user_id');
        $data = [
            'titulo' => $id ? "Editar Conta" : "Nova Conta/Cartão",
            'nome_usuario' => $this->session->userdata('nome'),
            'menus' => $this->menu_model->obter_menu_usuario($uid),
            'cores' => $this->preferencia_model->obter_por_usuario($uid),
            'edit' => $id ? $this->conta_origem_model->obter($id) : null
        ];
        $this->load->view('includes/header', $data);
        $this->load->view('financeiro/bancos_form', $data);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $dados = $this->input->post();
        $this->conta_origem_model->salvar($dados);
        redirect('bancos');
    }
}