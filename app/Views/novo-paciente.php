<?= view('header'); ?>
<?= view('navbar'); ?>

<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Novo Paciente</h2>
		</div>
	</div>

	<?= view('form-paciente'); ?>
</div>

<?= view('footer', ['scripts' => [
	'validacaoCNS', 'paciente-form', 'services/pacienteService'
]]); ?>
