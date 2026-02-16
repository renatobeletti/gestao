<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Migration_Add_user_preferences_colors extends CI_Migration {

    public function up() {
        // Se a tabela NÃO existe, cria ela do zero com tudo
        if (!$this->db->table_exists('preferencias_usuario')) {
            $this->dbforge->add_field([
                'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE],
                'usuario_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE],
                'cor_primaria' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#206bc4'],
                'cor_sidebar' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#1b2431'],
                'cor_texto_sidebar' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#ffffff'],
                'cor_fundo_pagina' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#f4f6fa'],
                'modo_escuro' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            ]);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('preferencias_usuario');
        } else {
            // Se a tabela JÁ existe, vamos apenas adicionar as colunas que estavam dando erro
            $fields = [];
            
            if (!$this->db->field_exists('cor_texto_sidebar', 'preferencias_usuario')) {
                $fields['cor_texto_sidebar'] = ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#ffffff'];
            }
            
            if (!$this->db->field_exists('cor_fundo_pagina', 'preferencias_usuario')) {
                $fields['cor_fundo_pagina'] = ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#f4f6fa'];
            }

            if (!empty($fields)) {
                $this->dbforge->add_column('preferencias_usuario', $fields);
            }
        }
    }

    public function down() {
        // Opcional: remover a tabela ou colunas ao fazer rollback
        $this->dbforge->drop_table('preferencias_usuario', TRUE);
    }
}