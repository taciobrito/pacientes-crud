<?= view('header'); ?>
<?= view('navbar'); ?>

<div class="container">
	<div class="row">
			<div class="col-12">
			<h2>Pacientes</h2>

			<a href="/novo-paciente" class="btn btn-primary btn-flat">Adicionar</a>
		</div>
	</div>

	<hr>
	<div class="row">
		<div class="col-12" v-if="pacientes.length">
			<table class="table table-striped table-hovered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nome</th>
						<th scope="col">Nome da Mãe</th>
						<th scope="col">Nascimento</th>
						<th scope="col">Ações</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(paciente, idx) in pacientes" :key="paciente.id">
						<th>{{ paciente.id }}</th>
						<td>{{ paciente.nome }}</td>
						<td>{{ paciente.nome_mae }}</td>
						<td>{{ paciente.data_nascimento }}</td>
						<td>
							<a :href="'/editar-paciente/'+paciente.id" class="btn btn-success btn-sm">Editar</a>
							<a href="#" class="btn btn-danger btn-sm" @click.prevent="removerPaciente(paciente.id)">Remover</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-12" v-else>
			<div class="alert alert-warning text-center">Não há registros para serem exibidos.</div>
		</div>
	</div>
</div>

<?= view('footer', ['scripts' => ['pacientes', 'services/pacienteService']]); ?>
