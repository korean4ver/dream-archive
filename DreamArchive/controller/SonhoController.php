<?php

require_once(__DIR__ . "/../dao/SonhoDAO.php");
require_once(__DIR__ . "/../dao/CategoriaDAO.php");
require_once(__DIR__ . "/../dao/HumorDAO.php");
require_once(__DIR__ . "/../service/SonhoService.php");

class SonhoController {

    private SonhoDAO $sonhoDAO;
    private CategoriaDAO $categoriaDAO;
    private HumorDAO $humorDAO;
    private SonhoService $sonhoService;

    public function __construct() {
        $this->sonhoDAO = new SonhoDAO();
        $this->categoriaDAO = new CategoriaDAO();
        $this->humorDAO = new HumorDAO();
        $this->sonhoService = new SonhoService();
    }

    public function listar() {
        return $this->sonhoDAO->list();
    }

    public function buscarPorId(int $id) {
        return $this->sonhoDAO->findById($id);
    }

    public function inserir($sonho) {
        // Validar os dados
        $erros = $this->validar($sonho);

        // Persistir os dados
        if(empty($erros)) {
            $erroDAO = $this->sonhoDAO->insert($sonho);
            if($erroDAO)
                array_push($erros, $erroDAO);
        }

        return $erros;
    }

    public function alterar($sonho) {
        // Validar os dados
        $erros = $this->validar($sonho);

        // Persistir os dados
        if(empty($erros)) {
            $erroDAO = $this->sonhoDAO->update($sonho);
            if($erroDAO)
                array_push($erros, $erroDAO);
        }

        return $erros;
    }

    public function excluir(int $id) {
        return $this->sonhoDAO->excluir($id);
    }

    private function validar($sonho) {
        // Busca os IDs de categoria/humor realmente existentes no banco,
        // para que o Service confirme se a escolha do usuário é válida.
        $categorias = $this->categoriaDAO->list();
        $humores = $this->humorDAO->list();

        $idsCategorias = array_map(function($c) { return $c->getId(); }, $categorias);
        $idsHumores = array_map(function($h) { return $h->getId(); }, $humores);

        return $this->sonhoService->validar($sonho, $idsCategorias, $idsHumores);
    }
}
