<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Migration_Update_users_table extends CI_Migration {
    public function up() {
        // Adicionando campos extras para um cadastro completo
        $fields = [
            'telefone' => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => TRUE],
            'nivel'    => ['type' => 'ENUM("admin", "usuario")', 'default' => 'usuario'],
            'ultimo_login' => ['type' => 'DATETIME', 'null' => TRUE]
        ];
        $this->dbforge->add_column('usuarios', $fields);
    }

    public function down() {
        $this->dbforge->drop_column('usuarios', 'telefone');
        $this->dbforge->drop_column('usuarios', 'nivel');
        $this->dbforge->drop_column('usuarios', 'ultimo_login');
    }
}