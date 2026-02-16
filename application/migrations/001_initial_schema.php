<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Migration_Initial_schema extends CI_Migration {

    public function up() {
        // TABELA: USUARIOS
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE],
            'nome' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'email' => ['type' => 'VARCHAR', 'constraint' => '100', 'unique' => TRUE],
            'senha' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'status' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'criado_em datetime default current_timestamp',
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('usuarios');

        // TABELA: MENUS
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE],
            'titulo' => ['type' => 'VARCHAR', 'constraint' => '50'],
            'url' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'icone' => ['type' => 'VARCHAR', 'constraint' => '50', 'default' => 'ti ti-star'],
            'ordem' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'pai_id' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('menus');

        // TABELA: PERMISSOES
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE, 'auto_increment' => TRUE],
            'usuario_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE],
            'menu_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => TRUE],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('permissoes');

        // DADOS INICIAIS (Seed)
        // Inserir seu usuário (Senha: 123456)
        $user_data = [
            'nome'  => 'Renato Beletti',
            'email' => 'renato@beletti.com.br',
            'senha' => '$2y$10$NNlsbqXd7fJJOoAyVxes1.JL49qX8.ILLCcwRRbQXqsbYv4QRCjUS'
        ];
        $this->db->insert('usuarios', $user_data);

        // Inserir Menu Dashboard
        $this->db->insert('menus', ['titulo' => 'Dashboard', 'url' => 'dashboard', 'icone' => 'ti ti-home', 'ordem' => 1]);
        
        // Dar permissão para o usuário ID 1 no menu ID 1
        $this->db->insert('permissoes', ['usuario_id' => 1, 'menu_id' => 1]);
    }

    public function down() {
        $this->dbforge->drop_table('permissoes');
        $this->dbforge->drop_table('menus');
        $this->dbforge->drop_table('usuarios');
    }
}