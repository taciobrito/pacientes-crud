const objetoVue = {
	created() {
		let uri = window.location.href.split('/');
		let index = uri.indexOf('editar-paciente');

		if (index > - 1) {
			this.carregarPaciente(uri[(index+1)]);
		}
	},
	data: {
		paciente: {
			id: null,
			nome: null,
			nome_mae: null,
			data_nascimento: null,
			cpf: null,
			cns: null,
			cep: null,
			logradouro: null,
			bairro: null,
			numero: null,
			complemento: null,
			cidade: null,
			uf: null,
			pais: 'Brasil',
			foto: null
		},
		errors: []
	},
	methods: {
		carregarPaciente(id) {
			service.buscar(id)
				.then(response => this.paciente = response.data)
				.catch(error => alert('Atenção! Erro ao carregar dados.'));
		},
		salvarPaciente() {
			let cnsValido = true;

			if ([1,2].includes(this.primeiroDigitoCNS)) {
				cnsValido = validaCns(this.paciente.cns);
			} else if ([7,8,9].includes(this.primeiroDigitoCNS)) {
				cnsValido = validaCnsProv(this.paciente.cns);
			}

			if (!cnsValido) {
				return;
			}

			if (!this.paciente.id) {
				service.salvar(this.paciente)
				.then(response => {
					if(response.status === 201) {
						alert(response.data.message);
						this.errors = [];
						window.location.href = '/editar-paciente/'+response.data.id;
					} else {
						alert('Atenção! '+ response.data.message);
					}
				})
				.catch(error => {
					alert('Atenção! '+ error.response.data.message);
					if (error.response.data.errors && error.response.data.errors.length) {
						this.mostrarErrosDeValidacao(error.response.data.errors);
					}
				});
			} else {
				service.atualizar(this.paciente.id, this.paciente)
				.then(response => {
					if(response.status === 200) {
						alert('Dados salvos com sucesso!');
						this.errors = [];
					} else {
						alert('Atenção! '+ response.data.message);
					}
				})
				.catch(error => {
					alert('Atenção! '+ error.response.data.message);
					if (error.response.data.errors && error.response.data.errors.length) {
						this.mostrarErrosDeValidacao(error.response.data.errors);
					}
				});
			}
		},
		buscarEnderecoPorCep() {
			service.viacep(this.paciente.cep)
			.then(response => {
				this.paciente.logradouro = response.data.logradouro;
				this.paciente.bairro = response.data.bairro;
				this.paciente.uf = response.data.uf;
				this.paciente.cidade = response.data.localidade;
			})
			.catch(error => console.log(error.response));
		},
		mostrarErrosDeValidacao(errors) {
			this.errors = [];
			Object.keys(errors).forEach(key => this.errors.push(errors[key]));
		}
	},
	computed: {
		primeiroDigitoCNS() {
			return parseInt(this.paciente.cns.substr(0,1));
		}
	}
};
