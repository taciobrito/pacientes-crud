<?php
namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('index');
	}

	public function novoPaciente()
	{
		return view('novo-paciente');
	}

	public function editarPaciente($id)
	{
		return view('editar-paciente');
	}

	//--------------------------------------------------------------------

}
