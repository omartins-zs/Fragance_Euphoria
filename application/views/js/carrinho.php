<!-- <script>
	$(document).ready(function() {
		// Quando o botão "Adicionar no carrinho" é clicado
		$('#btnAdicionarCarrinho').on('click', function() {
			// Obtenha os detalhes do produto
			var produtoId = <?= $perfume->id; ?>;
			var produtoNome = '<?= $perfume->nome; ?>';
			var produtoPreco = '<?= $perfume->preco; ?>';
			var quantidade = $('#inputQuantity').val();

			// Faça uma chamada AJAX para adicionar ao carrinho
			$.ajax({
				type: 'POST',
				url: '<?= base_url(); ?>carrinho/adicionar',
				data: {
					id: produtoId,
					nome: produtoNome,
					preco: produtoPreco,
					quantidade: quantidade
				},
				success: function(response) {
					// Redirecione para a página do carrinho ou faça algo com a resposta
					window.location.href = '<?= base_url('carrinho'); ?>';
				},
				error: function() {
					alert('Erro ao adicionar ao carrinho');
				}
			});
		});
	});
</script> -->
