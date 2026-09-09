<?php
require_once(__DIR__ . "/util/config.php");

require_once(__DIR__ . "/view/include/header.php");
require_once(__DIR__ . "/view/include/menu.php");
?>

<div class="row mt-5 justify-content-center">
    <div class="col-lg-5 col-md-8">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Dream Archive</h5>
                <p class="card-text text-muted">Arquivo digital de sonhos.</p>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="<?= BASE_URL ?>/view/sonhos/listar.php" class="card-link">
                        Listagem de sonhos</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/view/include/footer.php");
?>
