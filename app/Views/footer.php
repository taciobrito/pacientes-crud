	</div>

	<script src="/js/libs/bootstrap.bundle.min.js"></script>
	<script src="/js/libs/vue.js"></script>
	<script src="/js/libs/axios.min.js"></script>

	<script src="/js/config.js"></script>
	<script src="/js/interceptors.js"></script>

	<?php
		if (!empty($scripts)) :
			foreach ($scripts as $script) :
	?>
				<script src="/js/<?= $script; ?>.js"></script>
	<?php
			endforeach;
		endif;
	?>

	<script src="/js/libs/vue-the-mask.min.js"></script>

	<script src="/js/app.js"></script>

</body>
</html>
