<?php

require_once(__DIR__ . "/../../controller/CategoriaController.php");
require_once(__DIR__ . "/../../controller/HumorController.php");

$categoriaCont = new CategoriaController();
$humorCont = new HumorController();

$categorias = $categoriaCont->listar();
$humores = $humorCont->listar();

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="mt-3"><?= $sonho && $sonho->getId() > 0 ? "Alterar" : "Registrar" ?> sonho</h3>

<div class="row">

    <div class="col-lg-8">

        <!-- ATENÇÃO: o atributo "required" do HTML é proibido neste projeto.
             Toda a obrigatoriedade e validação acontecem no backend (PHP),
             em SonhoService::validar(). -->
        <form action="" method="POST" novalidate>

            <div class="mb-3">
                <label for="txtTitulo" class="form-label">Título do sonho:</label>
                <input type="text" id="txtTitulo" name="titulo"
                    placeholder="Ex: Encontro com gigante nas nuvens"
                    class="form-control"
                    value="<?= $sonho ? htmlspecialchars($sonho->getTitulo() ?? '') : '' ?>">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="txtData" class="form-label">Data do sonho:</label>
                    <input type="date" id="txtData" name="data_sonho"
                        class="form-control"
                        value="<?= $sonho ? htmlspecialchars($sonho->getDataSonho() ?? '') : '' ?>">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="txtIntensidade" class="form-label">Intensidade (1 a 10):</label>
                    <input type="number" id="txtIntensidade" name="intensidade"
                        min="1" max="10"
                        class="form-control"
                        value="<?= $sonho && $sonho->getIntensidade() !== null ? (int)$sonho->getIntensidade() : '' ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="txtDescricao" class="form-label">Descrição do sonho:</label>
                <textarea id="txtDescricao" name="descricao" rows="4"
                    class="form-control"
                    placeholder="Escreva tudo o que se lembra sobre o sonho..."><?= $sonho ? htmlspecialchars($sonho->getDescricao() ?? '') : '' ?></textarea>
            </div>

            <div class="mb-3">
                <label for="txtInterpretacao" class="form-label">Interpretação pessoal:</label>
                <textarea id="txtInterpretacao" name="interpretacao" rows="3"
                    class="form-control"
                    placeholder="O que você sente que este sonho representa para você?"><?= $sonho ? htmlspecialchars($sonho->getInterpretacao() ?? '') : '' ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="selCategoria" class="form-label">Categoria:</label>
                    <select name="categoria_id" id="selCategoria" class="form-select">
                        <option value="">----Selecione-----</option>
                        <?php foreach($categorias as $c): ?>
                            <option value="<?= $c->getId() ?>"
                                <?php if($sonho && $sonho->getCategoria() && $sonho->getCategoria()->getId() == $c->getId()) echo "selected"; ?>>
                                <?= htmlspecialchars($c->getNome()) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="selHumor" class="form-label">Humor ao acordar:</label>
                    <select name="humor_id" id="selHumor" class="form-select">
                        <option value="">----Selecione-----</option>
                        <?php foreach($humores as $h): ?>
                            <option value="<?= $h->getId() ?>"
                                <?php if($sonho && $sonho->getHumor() && $sonho->getHumor()->getId() == $h->getId()) echo "selected"; ?>>
                                <?= htmlspecialchars($h->getNome()) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <input type="hidden" name="id" value="<?= $sonho ? $sonho->getId() : 0 ?>">

            <div class="mt-3">
                <button type="submit" class="btn btn-purple">Gravar</button>
                <a href="listar.php" class="btn btn-outline-light">Voltar</a>
            </div>

        </form>

    </div> <!-- Fim col-8 -->

    <div class="col-lg-4">
        <?php if(! empty($msgErro)): ?>
            <div class="alert alert-danger mt-3">
                <?= $msgErro ?>
            </div>
        <?php endif; ?>
    </div> <!-- Fim col-4 -->

</div> <!-- Fim row -->

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
