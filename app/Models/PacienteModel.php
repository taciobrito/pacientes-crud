<?php
namespace App\Models;

use CodeIgniter\Model;

class PacienteModel extends Model
{
	protected $table = 'pacientes';
    protected $primaryKey = 'id';

    protected $returnType = 'object';

    protected $allowedFields = [
		'id', 'nome', 'nome_mae', 'data_nascimento', 'cpf', 'cns', 'cep', 'logradouro', 'bairro', 'numero', 'complemento', 'cidade', 'uf', 'pais', 'foto'
	];

    protected $useTimestamps = false;

    protected $validationRules = [
        'nome' => 'required|min_length[5]',
        'nome_mae' => 'required|min_length[5]',
        'cpf' => 'required|min_length[11]|is_unique[pacientes.cpf,id,{id}]',
        'data_nascimento' => 'required',
        'cns' => 'required',
        'cep' => 'required|min_length[8]',
        'logradouro' => 'required|min_length[3]',
        'bairro' => 'required|min_length[3]',
        'numero' => 'required',
        'cidade' => 'required|min_length[3]',
        'uf' => 'required|min_length[2]|max_length[2]'
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O nome é obrigatório.',
            'min_length' => 'O campo nome deve ter no mínimo 5 caracteres.'
        ],
        'nome_mae' => [
            'required' => 'O nome da mãe é obrigatório.',
            'min_length' => 'O campo nome da mãe deve ter no mínimo 5 caracteres.'
        ],
        'cpf' => [
            'required' => 'O CPF é obrigatório.',
            'is_unique' => 'O CPF informado já se encontra cadastrado. Por favor, tente novamente.',
            'min_length' => 'O campo CPF deve ter no mínimo 11 caracteres.'
        ],
        'data_nascimento' => [
            'required' => 'A data de nascimento é obrigatória.'
        ],
        'cns' => [
            'required' => 'O CNS é obrigatório.'
        ],
        'cep' => [
            'required' => 'O CEP é obrigatório.',
            'min_length' => 'O campo CEP deve ter 8 caracteres.'
        ],
        'logradouro' => [
            'required' => 'O logradouro é obrigatório.',
            'min_length' => 'O logradouro deve ter no mínimo 3 caracteres.'
        ],
        'bairro' => [
            'required' => 'O bairro é obrigatório.',
            'min_length' => 'O bairro deve ter no mínimo 3 caracteres.'
        ],
        'numero' => [
            'required' => 'O número é obrigatório.'
        ],
        'cidade' => [
            'required' => 'A cidade é obrigatória.',
            'min_length' => 'A cidade deve ter no mínimo 3 caracteres.'
        ],
        'uf' => [
            'required' => 'A UF é obrigatória.',
            'min_length' => 'A UF deve ter 2 caracteres.',
            'max_length' => 'A UF deve ter 2 caracteres.'
        ]
    ];

    protected $skipValidation     = false;
}