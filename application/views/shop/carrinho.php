<!-- application/views/carrinho.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
</head>
<body>

    <h2>Seu Carrinho de Compras</h2>

    <table>
        <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Total</th>
            <th>Ação</th>
        </tr>
        <?php foreach ($this->cart->contents() as $item): ?>
            <tr>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['qtde']; ?></td>
                <td><?php echo $item['preco']; ?></td>
                <td><?php echo $item['subtotal']; ?></td>
                <td><a href="<?php echo site_url('carrinho/remover/'.$item['rowid']); ?>">Remover</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p>Total do Carrinho: <?php echo $this->cart->total(); ?></p>

    <p><a href="<?php echo site_url('carrinho/limpar'); ?>">Limpar Carrinho</a></p>

</body>
</html>
