<?php
class Migration_Setup_financeiro extends CI_Migration {
    public function up() {
        // 1. Fornecedores
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nome_fantasia' => ['type' => 'VARCHAR', 'constraint' => '100'],
            'cnpj_cpf' => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
            'telefone' => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
        ]);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('fornecedores');

        // 2. Formas de Pagamento / Contas (Cartão, Conta Corrente, Dinheiro)
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'descricao' => ['type' => 'VARCHAR', 'constraint' => '50'], // Ex: Santander, Cartão Nubank, Itaú
            'tipo' => ['type' => 'ENUM("conta", "cartao", "dinheiro")', 'default' => 'conta'],
        ]);
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('contas_origem');

        // 3. Contas a Pagar (A Despesa em si)
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'fornecedor_id' => ['type' => 'INT', 'unsigned' => true],
            'conta_origem_id' => ['type' => 'INT', 'unsigned' => true],
            'descricao' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'valor_total' => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'vencimento' => ['type' => 'DATE'],
            'parcela_atual' => ['type' => 'INT', 'default' => 1],
            'total_parcelas' => ['type' => 'INT', 'default' => 1],
            'status' => ['type' => 'ENUM("aberto", "pago", "atrasado")', 'default' => 'aberto'],
            'comprovante' => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'recorrente' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'hash_grupo' => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => true],
        ]);
        // Adicionamos o campo de data manualmente para evitar o erro de sintaxe do driver
        $this->dbforge->add_field("created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP");
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('contas_pagar');
    }

    public function down() {
        $this->dbforge->drop_table('contas_pagar');
        $this->dbforge->drop_table('contas_origem');
        $this->dbforge->drop_table('fornecedores');
    }
}