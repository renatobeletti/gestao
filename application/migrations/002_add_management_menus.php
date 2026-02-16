<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Migration_Add_management_menus extends CI_Migration {

    public function up() {
        // 1. Inserir Menu Pai "Configurações"
        $data_config = [
            'titulo' => 'Configurações',
            'url'    => '#',
            'icone'  => 'ti ti-settings',
            'ordem'  => 10,
            'pai_id' => 0
        ];
        $this->db->insert('menus', $data_config);
        $pai_id = $this->db->insert_id();

        // 2. Inserir Submenu "Gerenciar Menus"
        $data_sub = [
            'titulo' => 'Gerenciar Menus',
            'url'    => 'menus',
            'icone'  => 'ti ti-list-details',
            'ordem'  => 1,
            'pai_id' => $pai_id
        ];
        $this->db->insert('menus', $data_sub);
        $menu_id = $this->db->insert_id();

        // 3. Dar permissão ao usuário ID 1 para ambos
        $this->db->insert('permissoes', ['usuario_id' => 1, 'menu_id' => $pai_id]);
        $this->db->insert('permissoes', ['usuario_id' => 1, 'menu_id' => $menu_id]);
    }

    public function down() {
        // Remove as permissões e menus criados nesta versão
        $this->db->where_in('url', ['#', 'menus'])->delete('menus');
    }
}