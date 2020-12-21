const base = 'pacientes';

const service = {
	listarTodos(params = '') {
		return axios.get(`${base}${params}`);
	},

	buscar(id) {
		return axios.get(`${base}/${id}`);
	},

	salvar(data) {
		return axios.post(base, data);
	},

	atualizar(id, data) {
		return axios.put(`${base}/${id}`, data);
	},

	remover(id) {
		return axios.delete(`${base}/${id}`);
	},

	viacep(cep) {
		return axios.get(`https://viacep.com.br/ws/${cep.replace('.', '').replace('-', '')}/json/`);
	}
}