<?php

require_once(__DIR__ . "/../../model/Sonho.php");
require_once(__DIR__ . "/../../model/Categoria.php");
require_once(__DIR__ . "/../../model/Humor.php");
require_once(__DIR__ . "/../../controller/SonhoController.php");

$msgErro = "";
$sonho = NULL;

// Verificação: formulário já foi submetido?
if(isset($_POST['titulo'])) {
    // 1- Capturar e sanear os dados preenchidos no formulário
    $titulo = trim($_POST['titulo']) ? trim($_POST['titulo']) : NULL;
    $dataSonho = trim($_POST['data_sonho']) ? trim($_POST['data_sonho']) : NULL;
    $intensidade = is_numeric($_POST['intensidade']) ? (int)$_POST['intensidade'] : NULL;
    $descricao = trim($_POST['descricao']) ? trim($_POST['descricao']) : NULL;
    $interpretacao = trim($_POST['interpretacao']) ? trim($_POST['interpretacao']) : NULL;
    $idCategoria = is_numeric($_POST['categoria_id']) ? (int)$_POST['categoria_id'] : NULL;
    $idHumor = is_numeric($_POST['humor_id']) ? (int)$_POST['humor_id'] : NULL;

    // 2- Criar um objeto Sonho para persistí-lo
    $sonho = new Sonho();
    $sonho->setId(0);
    $sonho->setTitulo($titulo);
    $sonho->setDataSonho($dataSonho);
    $sonho->setIntensidade($intensidade);
    $sonho->setDescricao($descricao);
    $sonho->setInterpretacao($interpretacao);

    $categoria = new Categoria();
    $categoria->setId($idCategoria);
    $sonho->setCategoria($categoria);

    $humor = new Humor();
    $humor->setId($idHumor);
    $sonho->setHumor($humor);

    // 3- Validar os dados e 4- persistir o objeto
    $sonhoCont = new SonhoController();
    $erros = $sonhoCont->inserir($sonho);

    if(empty($erros))
        header("location: listar.php");
    else
        $msgErro = implode("<br>", $erros);
}

require_once(__DIR__ . "/form.php");
?>
