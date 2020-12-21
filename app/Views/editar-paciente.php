<?= view('header'); ?>
<?= view('navbar'); ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Editar Paciente</h2>

			<a href="/novo-paciente" class="btn btn-primary btn-flat">Adicionar</a>
		</div>
	</div>

	<?= view('form-paciente'); ?>
</div>

<?= view('footer', ['scripts' => [
	'validacaoCNS', 'paciente-form', 'services/pacienteService'
]]); ?>
