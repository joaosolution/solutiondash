<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cliente extends Migration
{
    public function up()
    {
		$this->forge->addField([
			'id_cliente' => [
				'type' => 'INT',
				'constraint' => 9,
				'usigned' => true,
				'auto_increment' => true,
			],
			'nome' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'cnpj' => [
				'type' => 'VARCHAR',
				'constraint' => 14
			],
			'telefone' => [
				'type' => 'VARCHAR',
				'constraint' => 32
			],
			'rua' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'numero' => [
				'type' => 'VARCHAR',
				'constraint' => 20
			],
			'complemento' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'cep' => [
				'type' => 'VARCHAR',
				'constraint' => 10
			],
			'bairro' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'cidade' => [
				'type' => 'VARCHAR',
				'constraint' => 10
			],
			'uf' => [
				'type' => 'VARCHAR',
				'constraint' => 10
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'logo' => [
				'type' => 'VARCHAR',
				'constraint' => 10
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			],
			'deleted_at' => [
				'type' => 'DATETIME'
			]

		]);

		$this->forge->addKey('id_cliente', true);
		$this->forge->createTable('clientes');
		
        
    }

    public function down()
    {
		$this->forge->dropTable('clientes');
    }
}
