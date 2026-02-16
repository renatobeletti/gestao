<?php
class Conta_origem_model extends CI_Model {
    public function listar() { return $this->db->get('contas_origem')->result(); }
    public function salvar($d) {
        return isset($d['id']) ? $this->db->update('contas_origem', $d, ['id' => $d['id']]) : $this->db->insert('contas_origem', $d);
    }
    public function obter($id) { return $this->db->get_where('contas_origem', ['id' => $id])->row(); }
}