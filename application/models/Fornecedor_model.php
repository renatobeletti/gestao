<?php
class Fornecedor_model extends CI_Model {
    public function listar() { return $this->db->get('fornecedores')->result(); }
    public function salvar($d) { 
        return isset($d['id']) ? $this->db->update('fornecedores', $d, ['id' => $d['id']]) : $this->db->insert('fornecedores', $d); 
    }
    public function obter($id) { return $this->db->get_where('fornecedores', ['id' => $id])->row(); }
}