<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Migration_Update_financeiro extends CI_Migration {
    public function up() {
        $fields = [
            'chave_pix' => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => TRUE],
            'debito_automatico' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0]
        ];
        $this->dbforge->add_column('contas_pagar', $fields);
    }

    public function down() {
        $this->dbforge->drop_column('contas_pagar', 'chave_pix');
        $this->dbforge->drop_column('contas_pagar', 'debito_automatico');
    }
}