<?php

require_once(__DIR__ . "/../dao/CategoriaDAO.php");

class CategoriaController {

    public function listar() {
        $categoriaDao = new CategoriaDAO();
        return $categoriaDao->list();
    }
}
