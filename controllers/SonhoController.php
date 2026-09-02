<?php

require_once __DIR__ . '/../dao/SonhoDAO.php';

class SonhoController
{
    public static function index()
    {
        $dao = new SonhoDAO();

        $sonhos = $dao->listar();

        echo "<h1>Listagem de Sonhos</h1>";

        echo "<pre>";
        print_r($sonhos);
        echo "</pre>";
    }
}
