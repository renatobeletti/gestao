<?php
class Menus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('auth');
    }

    public function index() {
        $uid = $this->session->userdata('user_id');
        $data['titulo'] = "Gestão de Menus";
        $data['nome_usuario'] = $this->session->userdata('nome');
        $data['menus'] = $this->menu_model->obter_menu_usuario($uid);
        $data['cores'] = $this->menu_model->obter_preferencias($uid);
        
        // Todos os menus para a listagem (tabela)
        $data['lista_menus'] = $this->db->order_by('ordem', 'ASC')->get('menus')->result();

        $this->load->view('includes/header', $data);
        $this->load->view('menus/listar', $data);
        $this->load->view('includes/footer');
    }

    public function adicionar() {
        $uid = $this->session->userdata('user_id');
        $data['titulo'] = "Novo Menu";
        $data['nome_usuario'] = $this->session->userdata('nome');
        $data['menus'] = $this->menu_model->obter_menu_usuario($uid);
        $data['cores'] = $this->menu_model->obter_preferencias($uid);
        
        $data['pais'] = $this->db->get_where('menus', ['pai_id' => 0])->result();

        $this->load->view('includes/header', $data);
        $this->load->view('menus/formulario', $data);
        $this->load->view('includes/footer');
    }

    public function editar($id) {
        $uid = $this->session->userdata('user_id');
        $data['titulo'] = "Editar Menu";
        $data['nome_usuario'] = $this->session->userdata('nome');
        $data['menus'] = $this->menu_model->obter_menu_usuario($uid);
        $data['cores'] = $this->menu_model->obter_preferencias($uid);
        
        $data['menu_edicao'] = $this->db->get_where('menus', ['id' => $id])->row();
        $data['pais'] = $this->db->get_where('menus', ['pai_id' => 0])->result();

        $this->load->view('includes/header', $data);
        $this->load->view('menus/formulario', $data);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $dados = $this->_get_post_data();
        if ($this->db->insert('menus', $dados)) {
            $novo_id = $this->db->insert_id();
            // Dá permissão ao admin que criou
            $this->db->insert('permissoes', ['usuario_id' => $this->session->userdata('user_id'), 'menu_id' => $novo_id]);
        }
        redirect('menus');
    }

    public function atualizar($id) {
        $dados = $this->_get_post_data();
        $this->db->where('id', $id)->update('menus', $dados);
        redirect('menus');
    }

    public function eliminar($id) {
        // Remove permissões primeiro para manter integridade
        $this->db->where('menu_id', $id)->delete('permissoes');
        $this->db->where('id', $id)->delete('menus');
        redirect('menus');
    }

    // Helper privado para não repetir código de captura de POST
    private function _get_post_data() {
        return [
            'titulo' => $this->input->post('titulo'),
            'url'    => $this->input->post('url'),
            'icone'  => $this->input->post('icone'),
            'pai_id' => $this->input->post('pai_id'),
            'ordem'  => $this->input->post('ordem')
        ];
    }
}