<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dream Archive - Listagem de Sonhos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light"> <!-- modo noturno-->

    <div class="container mt-5">
        <h2 class="mb-4">Meus Sonhos Registrados</h2>
        
        <a href="index.php?acao=create" class="btn btn-outline-light mb-3">Novo Sonho</a>

        <table class="table table-dark table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Data</th>
                    <th>Intensidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sonhos)): ?>
                    <?php foreach ($sonhos as $sonho): ?>
                        <tr>
                            <td><?php echo $sonho['id']; ?></td>
                            <td><?php echo htmlspecialchars($sonho['titulo']); ?></td>
                            <td><?php echo $sonho['data_sonho']; ?></td>
                            <td><?php echo $sonho['intensidade']; ?></td>
                            <td>
                                <a href="index.php?acao=edit&id=<?php echo $sonho['id']; ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?acao=delete&id=<?php echo $sonho['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Nenhum sonho registrado ainda.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>