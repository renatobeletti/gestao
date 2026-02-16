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

    public function adicionar() {
        $user_id = $this->session->userdata('user_id');
        $data['titulo'] = "Adicionar Novo Menu";
        $data['nome_usuario'] = $this->session->userdata('nome');
        $data['menus'] = $this->menu_model->obter_menu_usuario($user_id);
        
        // Pegar menus pai para o select
        $data['pais'] = $this->db->get_where('menus', ['pai_id' => 0])->result();

        $this->load->view('includes/header', $data);
        $this->load->view('menus/formulario', $data);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $dados = [
            'titulo' => $this->input->post('titulo'),
            'url'    => $this->input->post('url'),
            'icone'  => $this->input->post('icone'),
            'pai_id' => $this->input->post('pai_id'),
            'ordem'  => $this->input->post('ordem')
        ];

        if ($this->db->insert('menus', $dados)) {
            $novo_menu_id = $this->db->insert_id();
            // Importante: Dá permissão automática para quem criou o menu
            $this->db->insert('permissoes', [
                'usuario_id' => $this->session->userdata('user_id'),
                'menu_id'    => $novo_menu_id
            ]);
            redirect('menus');
        }
    }
}