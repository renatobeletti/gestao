<?php
class Usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('auth');
        $this->load->model(['usuario_model', 'menu_model', 'preferencia_model']);
    }

    public function index() {
        $uid = $this->session->userdata('user_id');
        $data = [
            'titulo' => "Gestão de Usuários",
            'nome_usuario' => $this->session->userdata('nome'),
            'menus' => $this->menu_model->obter_menu_usuario($uid),
            'cores' => $this->preferencia_model->obter_por_usuario($uid),
            'lista_usuarios' => $this->usuario_model->listar_todos()
        ];
        $this->load->view('includes/header', $data);
        $this->load->view('usuarios/listar', $data);
        $this->load->view('includes/footer');
    }

    public function formulario($id = null) {
        $uid = $this->session->userdata('user_id');
        $data = [
            'titulo' => $id ? "Editar Usuário" : "Novo Usuário",
            'nome_usuario' => $this->session->userdata('nome'),
            'menus' => $this->menu_model->obter_menu_usuario($uid),
            'cores' => $this->preferencia_model->obter_por_usuario($uid),
            'user_edit' => $id ? $this->usuario_model->obter_por_id($id) : null
        ];
        $this->load->view('includes/header', $data);
        $this->load->view('usuarios/formulario', $data);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $id = $this->input->post('id');
        $dados = [
            'nome'  => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'telefone' => $this->input->post('telefone'),
            'nivel' => $this->input->post('nivel')
        ];

        // Só altera a senha se ela for preenchida (útil na edição)
        $senha = $this->input->post('senha');
        if (!empty($senha)) {
            $dados['senha'] = password_hash($senha, PASSWORD_BCRYPT);
        }

        if ($id) $dados['id'] = $id;

        $this->usuario_model->salvar($dados);
        redirect('usuarios');
    }
}