<?php

require_once(__DIR__ . "/../../controller/SonhoController.php");

// 1- Receber o ID do sonho a ser excluído
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];

    // 2- Proceder a exclusão chamando o SonhoController
    $sonhoCont = new SonhoController();
    $erro = $sonhoCont->excluir($id);

    if(! $erro) {
        // 3- Redirecionar para a listagem
        header("location: listar.php");
    } else {
        echo $erro;
        echo "<br><a href='listar.php'>Voltar</a>";
    }

} else {
    echo "ID do sonho não informado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
}
