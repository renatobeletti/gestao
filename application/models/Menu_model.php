<?php
class Menu_model extends CI_Model {
    public function obter_menu_usuario($usuario_id) {
        $this->db->select('menus.*');
        $this->db->from('menus');
        $this->db->join('permissoes', 'permissoes.menu_id = menus.id');
        $this->db->where('permissoes.usuario_id', $usuario_id);
        $this->db->order_by('menus.ordem', 'ASC');
        return $this->db->get()->result();
    }
}