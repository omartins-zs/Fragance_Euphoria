<h2>Seu Carrinho de Compras</h2>

<?php
$this->load->library('cart');

if ($this->cart->total_items() > 0) :
?>
	<table>
		<tr>
			<th>Nome</th>
			<th>Quantidade</th>
			<th>Preço</th>
			<th>Total</th>
			<th>Ação</th>
		</tr>
		<?php foreach ($this->cart->contents() as $item) : ?>
			<tr>
				<td><?= $item['nome']; ?></td>
				<td><?= $item['qtde']; ?></td>
				<td><?= $item['preco']; ?></td>
				<td><?= $item['subtotal']; ?></td>
				<td><a href="<?= site_url('carrinho/remover/' . $item['rowid']); ?>">Remover</a></td>
			</tr>
		<?php endforeach; ?>
	</table>

	<p>Total do Carrinho: <?= $this->cart->total(); ?></p>

	<p><a href="<?= site_url('carrinho/limpar'); ?>">Limpar Carrinho</a></p>
<?php else : ?>
	<p>Carrinho vazio</p>
<?php endif; ?>
