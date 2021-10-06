<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsuariosMenus extends Migration
{
    public function up()
    {
		$this->forge->addField([
			'id_login_menu' => [
				'type' => 'INT',
				'constraint' => 9,
				'usigned' => true,
				'auto_increment' => true,
			],
			'login_id' => [
				'type' => 'INT',
				'constraint' => 9
			],
			'menu_id' => [
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

		$this->forge->addKey('id_login_menu', true);
        $this->forge->addForeignKey('login_id','logins','id_login');
        $this->forge->addForeignKey('menu_id','menus','id_menu');
		$this->forge->createTable('usuariosmenus');
        

        
    }

    public function down()
    {
        $this->forge->dropTable('usuariosmenus');
    }
}
