<?php
class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index() {
        $data['titulo'] = "Gerenciador de Estrutura de Dados";
        
        // Executa a migração
        if ($this->migration->current() === FALSE) {
            $data['status'] = 'erro';
            $data['mensagem'] = $this->migration->error_string();
        } else {
            $data['status'] = 'sucesso';
            $data['mensagem'] = "Banco de Dados sincronizado com sucesso!";
        }

        // 1. Versão atual no banco
        $res = $this->db->get('migrations')->row();
        $data['versao_atual'] = $res ? $res->version : 0;

        // 2. Lista arquivos na pasta migrations para saber o histórico
        $data['historico'] = [];
        $files = scandir(APPPATH . 'migrations/');
        foreach ($files as $file) {
            if (preg_match('/^(\d{3})_(.*)\.php$/', $file, $match)) {
                $data['historico'][] = [
                    'versao' => (int)$match[1],
                    'nome'   => str_replace('_', ' ', $match[2]),
                    'arquivo' => $file
                ];
            }
        }
        
        // 3. Data e hora da execução (Agora)
        $data['executado_em'] = date('d/m/Y H:i:s');

        $this->load->view('configuracoes/migration_status', $data);
    }
}