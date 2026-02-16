<?php
class Configuracoes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('auth');
    }

    public function index() {
        $uid = $this->session->userdata('user_id');
        $data['titulo'] = "Personalização";
        $data['nome_usuario'] = $this->session->userdata('nome');
        $data['menus'] = $this->menu_model->obter_menu_usuario($uid);
        
        // Busca as cores atuais ou define padrão
        $data['cores'] = $this->db->get_where('preferencias_usuario', ['usuario_id' => $uid])->row();

        $this->load->view('includes/header', $data);
        $this->load->view('configuracoes/cores', $data);
        $this->load->view('includes/footer');
    }

    public function salvar_cores() {
        $uid = $this->session->userdata('user_id');
        $dados = [
            'usuario_id' => $uid,
            'cor_primaria' => $this->input->post('cor_primaria'),
            'cor_sidebar' => $this->input->post('cor_sidebar')
        ];

        $existe = $this->db->get_where('preferencias_usuario', ['usuario_id' => $uid])->row();
        
        if ($existe) {
            $this->db->where('usuario_id', $uid)->update('preferencias_usuario', $dados);
        } else {
            $this->db->insert('preferencias_usuario', $dados);
        }
        redirect('configuracoes');
    }
}