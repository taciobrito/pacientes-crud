<hr>

<div class="row" v-if="errors.length">
	<div class="col-12">
		<div class="alert alert-danger">
			<ul>
				<li v-for="(error, idx) in errors" :key="idx">{{ error }}</li>
			</ul>
		</div>
	</div>
</div>

<div class="row">
	<div class="offset-md-2 col-md-8 col-12">
		<form @submit.prevent="salvarPaciente">
			<div class="form-group row">
				<label for="nome" class="col-sm-4">Nome <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="nome" class="form-control form-control-sm" id="nome" v-model="paciente.nome" autofocus="autofocus" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="nome_mae" class="col-sm-4">Nome da mãe <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="nome_mae" class="form-control form-control-sm" id="nome_mae" v-model="paciente.nome_mae" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="data_nascimento" class="col-sm-4">Data de nascimento <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="data_nascimento" class="form-control form-control-sm" id="data_nascimento" v-model="paciente.data_nascimento" v-mask="'##/##/####'" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="cpf" class="col-sm-4">CPF <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="cpf" class="form-control form-control-sm" id="cpf" v-model="paciente.cpf" v-mask="'###.###.###-##'" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="cns" class="col-sm-4">CNS <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="cns" class="form-control form-control-sm" id="cns" v-model="paciente.cns" v-mask="'###############'" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="cep" class="col-sm-4">CEP: <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<div class="input-group input-group-sm">
						<input type="text" name="cep'" class="form-control form-control-sm" id="cep'" v-model="paciente.cep" v-mask="'##.###-###'" />
						<span class="input-group-append">
							<button type="button" class="btn btn-primary btn-flat" @click.prevent="buscarEnderecoPorCep">Buscar</button>
						</span>
					</div>
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="logradouro" class="col-sm-4">Endereço: <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="logradouro'" class="form-control form-control-sm" id="logradouro'" v-model="paciente.logradouro" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="numero" class="col-sm-4">Nº: <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="numero'" class="form-control form-control-sm" id="numero'" v-model="paciente.numero" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="bairro" class="col-sm-4">Bairro: <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="bairro'" class="form-control form-control-sm" id="bairro'" v-model="paciente.bairro" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="cidade" class="col-sm-4">Cidade: <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="cidade'" class="form-control form-control-sm" id="cidade'" v-model="paciente.cidade" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="uf" class="col-sm-4">Estado: <small class="text-danger">*</small></label>
				<div class="col-sm-8">
					<input type="text" name="uf'" class="form-control form-control-sm" id="uf'" v-model="paciente.uf" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="complemento" class="col-sm-4">Complemento: </label>
				<div class="col-sm-8">
					<input type="text" name="complemento'" class="form-control form-control-sm" id="complemento'" v-model="paciente.complemento" />
				</div>
			</div>

			<div class="form-group row mt-2">
				<label for="pais" class="col-sm-4">País: </label>
				<div class="col-sm-8">
					<input type="text" name="pais'" class="form-control form-control-sm" id="pais'" v-model="paciente.pais" />
				</div>
			</div>

			<br>
			<button type="submit" class="btn btn-success btn-flat">Salvar</button>
		</form>
	</div>
</div>