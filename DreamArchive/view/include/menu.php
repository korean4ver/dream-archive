<?php

require_once(__DIR__ . "/../../util/config.php");

?>

<nav class="navbar navbar-expand-md px-3">

    <a class="navbar-brand" href="<?= BASE_URL ?>/index.php">
        Dream Archive
    </a>

    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navSite">

        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/index.php">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URL ?>/view/sonhos/listar.php">
                    Sonhos
                </a>
            </li>

        </ul>

    </div>

</nav>