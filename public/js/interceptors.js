const semAutorizacao = [
	'https://viacep.com.br/'
];

const interceptors = {
	setup() {
		axios.interceptors.request.use(function(request) {
			if (!semAutorizacao.find(route => request.url.indexOf(route) > -1)) {
				request.baseURL = config.apiUrl;
			}
		    return request;
		}, function(err) {
		    return Promise.reject(err);
		});
	}
}