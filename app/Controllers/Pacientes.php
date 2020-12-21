<?php
namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

class Pacientes extends ResourceController
{
	use ResponseTrait;

	protected $modelName = 'App\Models\PacienteModel';
    protected $format    = 'json';

	public function index()
	{
		$pacientes = $this->model->findAll();

		foreach ($pacientes as $paciente) {
			$paciente->data_nascimento = date_create_from_format('Y-m-d', $paciente->data_nascimento)->format('d/m/Y');
		}

		return $this->respond($pacientes);
	}

	public function create()
	{
		try {
			$dados = $this->getDadosDaRequisicao();

			unset($dados->{'id'});
			unset($dados->{'foto'});

			if (!$paciente_id = $this->model->insert($dados)) {
				throw new \Exception('Desculpe, não foi possível salvar os dados.', 1);
			}

			$paciente = $this->model->find($paciente_id);

			return $this->respondCreated($paciente);
		} catch (\Exception $error) {
			return $this->respond([
				'message' => $error->getMessage(),
				'errors' => $this->model->errors()
			], 400);
		}
	}

	public function show($id = null)
	{
		if (!$paciente = $this->getPaciente($id)) {
			return $this->failNotFound('Registro não encontrado.');
		}

		$paciente->data_nascimento = date_create_from_format('Y-m-d', $paciente->data_nascimento)->format('d/m/Y');

		return $this->respond($paciente);
	}

	public function update($id = null)
	{
		if (!$paciente = $this->getPaciente($id)) {
			return $this->failNotFound();
		}

		try {
			$dados = $this->getDadosDaRequisicao();
			$dados->{'id'} = $id;

			if (!$this->model->update($id, $dados)) {
				throw new \Exception('Desculpe, não foi possível salvar os dados.', 1);
			}

			$paciente = $this->model->find($id);

			return $this->respondUpdated($paciente);
		} catch (\Exception $error) {
			return $this->respond([
				'message' => $error->getMessage(),
				'errors' => $this->model->errors()
			], 400);
		}

	}

	public function delete($id = null)
	{
		if (!$paciente = $this->getPaciente($id)) {
			return $this->failNotFound();
		}

		$this->model->delete($id);

		return $this->respondDeleted();
	}

	private function getPaciente($id) {
		return $this->model->find($id);
	}

	private function getDadosDaRequisicao() {
		$dados = json_decode($this->request->getBody());

		if (!empty($dados->data_nascimento)) {
			$dados->data_nascimento = date_create_from_format('d/m/Y', $dados->data_nascimento)->format('Y-m-d');
		}

		if (!empty($dados->cpf)) {
			$cpf = $this->removerMascara($dados->cpf);
			$dados->cpf = $this->inserirMascara($cpf, '###.###.###-##');
		}

		if (!empty($dados->cep)) {
			$cep = $this->removerMascara($dados->cep);
			$dados->cep = $this->inserirMascara($cep, '##.###-###');
		}

		return $dados;
	}

	private function removerMascara($valor) {
	    return str_replace(['.', '-', '/'], '', $valor);
	}

	private function inserirMascara($valor, $mascara) {
	    $valor_mascarado = '';
	    $k = 0;
	    for($i = 0; $i<=strlen($mascara)-1; $i++) {
	        if($mascara[$i] == '#') {
	            if(isset($valor[$k]))
	                $valor_mascarado .= $valor[$k++];
	        } else {
	            if(isset($mascara[$i]))
	            $valor_mascarado .= $mascara[$i];
	        }
	    }
	    return $valor_mascarado;
	}
}
