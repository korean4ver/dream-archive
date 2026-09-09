<?php

require_once(__DIR__ . "/../../controller/SonhoController.php");

$sonhoCont = new SonhoController();
$sonhos = $sonhoCont->listar();

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="mt-3">Sonhos registrados</h3>

<a href="inserir.php" class="btn btn-purple mb-3">Novo sonho</a>

<table class="table table-dark table-striped table-bordered">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Data</th>
        <th>Intensidade</th>
        <th>Categoria</th>
        <th>Humor</th>
        <th></th>
        <th></th>
    </tr>

    <?php if(empty($sonhos)): ?>
        <tr>
            <td colspan="8" class="text-center">Nenhum sonho registrado ainda.</td>
        </tr>
    <?php else: ?>
        <?php foreach($sonhos as $s): ?>
            <tr>
                <td><?= $s->getId() ?></td>
                <td><?= htmlspecialchars($s->getTitulo()) ?></td>
                <td><?= htmlspecialchars($s->getDataSonho()) ?></td>
                <td><?= (int)$s->getIntensidade() ?></td>
                <td><?= htmlspecialchars((string)$s->getCategoria()) ?></td>
                <td><?= htmlspecialchars((string)$s->getHumor()) ?></td>
                <td>
                    <a href="alterar.php?id=<?= $s->getId() ?>" class="btn btn-sm btn-warning">Editar</a>
                </td>
                <td>
                    <a href="excluir.php?id=<?= $s->getId() ?>"
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('Confirma a exclusão deste sonho?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
