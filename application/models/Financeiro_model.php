<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Financeiro_model extends CI_Model {

    public function listar_despesas() {
        $this->db->select('cp.*, f.nome_fantasia as fornecedor, co.descricao as conta_origem');
        $this->db->from('contas_pagar cp');
        $this->db->join('fornecedores f', 'f.id = cp.fornecedor_id');
        $this->db->join('contas_origem co', 'co.id = cp.conta_origem_id');
        $this->db->order_by('cp.vencimento', 'ASC');
        return $this->db->get()->result();
    }

    public function salvar_despesa($dados) {
        return $this->db->insert('contas_pagar', $dados);
    }

    public function obter_despesa($id) {
        return $this->db->get_where('contas_pagar', ['id' => $id])->row();
    }

    public function excluir_despesa($id) {
        return $this->db->delete('contas_pagar', ['id' => $id]);
    }
}