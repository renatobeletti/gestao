<?php
class Usuario_model extends CI_Model {
    
    public function listar_todos() {
        return $this->db->get('usuarios')->result();
    }

    public function salvar($dados) {
        if (isset($dados['id'])) {
            $this->db->where('id', $dados['id']);
            return $this->db->update('usuarios', $dados);
        }
        return $this->db->insert('usuarios', $dados);
    }

    public function obter_por_id($id) {
        return $this->db->get_where('usuarios', ['id' => $id])->row();
    }
}