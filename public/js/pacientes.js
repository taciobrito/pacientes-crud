const objetoVue = {
	created() {
		this.carregarPacientes();
	},
	data: {
		pacientes: []
	},
	methods: {
		carregarPacientes() {
			service.listarTodos()
				.then(response => this.pacientes = response.data)
				.catch(error => alert('Atenção! Erro ao carregar dados.'));
		},
		removerPaciente(id) {
			let confirma = confirm('Confirma exclusão desse registro?');

			if (confirma) {
				service.remover(id)
					.then(response => {
						this.carregarPacientes();
						alert('Registro removido com sucesso!');
					})
					.catch(error => alert('Atenção! Não foi possível remover o registro.'));
			}
		}
	}
};
