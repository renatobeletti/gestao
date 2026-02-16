<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Preferencia_model extends CI_Model {

    public function salvar_preferencias($uid, $dados) {
        // A lógica de "se existe atualiza, se não insere" fica protegida aqui
        $this->db->where('usuario_id', $uid);
        $query = $this->db->get('preferencias_usuario');

        if ($query->num_rows() > 0) {
            $this->db->where('usuario_id', $uid);
            return $this->db->update('preferencias_usuario', $dados);
        } else {
            return $this->db->insert('preferencias_usuario', $dados);
        }
    }

    public function obter_por_usuario($uid) {
        return $this->db->get_where('preferencias_usuario', ['usuario_id' => $uid])->row();
    }
}