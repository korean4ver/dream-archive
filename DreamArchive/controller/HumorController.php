<?php

require_once(__DIR__ . "/../dao/HumorDAO.php");

class HumorController {

    public function listar() {
        $humorDao = new HumorDAO();
        return $humorDao->list();
    }
}
