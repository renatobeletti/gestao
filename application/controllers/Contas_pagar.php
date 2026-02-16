<?php
class Contas_pagar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model(['financeiro_model', 'fornecedor_model', 'conta_origem_model', 'menu_model', 'preferencia_model']);
    }

    public function index() {
        $uid = $this->session->userdata('user_id');
        $data = [
            'titulo' => 'Contas a Pagar',
            'menus' => $this->menu_model->obter_menu_usuario($uid),
            'cores' => $this->preferencia_model->obter_por_usuario($uid),
            'despesas' => $this->financeiro_model->listar_despesas()
        ];
        $this->load->view('includes/header', $data);
        $this->load->view('financeiro/contas_pagar_lista', $data);
        $this->load->view('includes/footer');
    }

    public function salvar() {
        $total_parcelas = $this->input->post('total_parcelas') ?: 1;
        $vencimento_inicial = $this->input->post('vencimento');
        $hash = md5(uniqid(rand(), true)); // Identifica o grupo de parcelas

        for ($i = 1; $i <= $total_parcelas; $i++) {
            $dados = [
                'fornecedor_id'   => $this->input->post('fornecedor_id'),
                'conta_origem_id' => $this->input->post('conta_origem_id'),
                'descricao'       => $this->input->post('descricao'),
                'valor_total'     => $this->input->post('valor_total') / $total_parcelas,
                'vencimento'      => date('Y-m-d', strtotime("+" . ($i - 1) . " month", strtotime($vencimento_inicial))),
                'parcela_atual'   => $i,
                'total_parcelas'  => $total_parcelas,
                'recorrente'      => $this->input->post('recorrente') ? 1 : 0,
                'hash_grupo'      => $hash
            ];
            $this->db->insert('contas_pagar', $dados);
        }
        redirect('contas_pagar');
    }

    private function _do_upload() {
        $config['upload_path']          = './uploads/comprovantes/';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        $config['encrypt_name']         = TRUE; // Evita nomes repetidos ou com espaço

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('comprovante')) {
            return $this->upload->data('file_name');
        }
        return NULL;
    }
}