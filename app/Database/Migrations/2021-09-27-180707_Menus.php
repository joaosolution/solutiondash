<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menus extends Migration
{
    public function up()
    {

		$this->forge->addField([
			'id_menu' => [
				'type' => 'INT',
				'constraint' => 9,
				'usigned' => true,
				'auto_increment' => true,
			],
			'nome_menu' => [
				'type' => 'VARCHAR',
				'constraint' => 128
			],
			'link_menu' => [
				'type' => 'VARCHAR',
				'constraint' => 256
			],
			'cliente_id' => [
				'type' => 'INT',
				'constraint' => 9
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

		$this->forge->addKey('id_menu', true);
        $this->forge->addForeignKey('cliente_id','clientes','id_cliente');
		$this->forge->createTable('menus');
        

    }

    public function down()
    {
        $this->forge->dropTable('menus');
        
    }
}
