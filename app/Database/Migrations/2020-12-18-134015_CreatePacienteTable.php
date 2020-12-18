<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePacienteTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nome_mae' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'data_nascimento' => [
                'type' => 'DATE',
            ],
            'cpf' => [
                'type' => 'VARCHAR',
                'constraint' => '14',
            ],
            'cns' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'cep' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'logradouro' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'bairro' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'numero' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'complemento' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'cidade' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'uf' => [
                'type' => 'VARCHAR',
                'constraint' => '2',
            ],
            'pais' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => 'Brasil',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pacientes');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pacientes');
	}
}
