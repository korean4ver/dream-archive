<?php

// Mostrar erros do PHP (ambiente de desenvolvimento)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configurar essas variáveis de acordo com o seu ambiente
define("DB_HOST", "localhost");
define("DB_NAME", "dream_archive");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// Configuração do ambiente (true = mostra detalhes de erro nas telas)
define("AMB_DEV", true);

// Configuração de acesso (ajuste conforme a pasta do projeto no seu servidor)
define("BASE_URL", "/projetos/DreamArchive");