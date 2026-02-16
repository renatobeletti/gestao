<?php
class Migration_Add_user_preferences extends CI_Migration {
    public function up() {
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE],
            'usuario_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE],
            'cor_primaria' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#206bc4'],
            'cor_sidebar' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#1b2431'],
            'cor_texto_sidebar' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#ffffff'], // <-- O campo que falta!
            'cor_fundo_pagina' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '#f4f6fa'],  // <-- Garanta que este também está aqui
            'modo_escuro' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('preferencias_usuario');
    }

    public function down() {
        $this->dbforge->drop_table('preferencias_usuario');
    }
}