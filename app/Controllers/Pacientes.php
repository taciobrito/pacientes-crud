<?php namespace App\Controllers;

class Pacientes extends BaseController
{
	public function index()
	{
		echo 'Listagem';
	}

	public function new()
	{
		echo 'novo registro';
	}

	public function edit($id)
	{
		echo 'editar ID '. $id .' registro';
	}

	public function create()
	{
		echo 'criar via API';
	}

	public function show($id)
	{
		echo 'Exibir ID '. $id .' via API';
	}

	public function update($id)
	{
		echo 'Atualizar ID '. $id .' via API';
	}

	public function delete($id)
	{
		echo 'deletar ID '. $id .' via API';
	}
}
