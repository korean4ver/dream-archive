<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Categoria.php");

class CategoriaDAO {

    public function list() {
        $sql = "SELECT * FROM categorias ORDER BY nome";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute();
        $dados = $stm->fetchAll();
        return $this->map($dados);
    }

    public function findById(int $id): ?Categoria
    {
        $sql = "SELECT * FROM categorias WHERE id = ?";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);

        $dados = $stm->fetchAll();
        $categorias = $this->map($dados);

        if(! empty($categorias))
            return $categorias[0];
        else
            return NULL;
    }

    private function map(array $dados) {
        $categorias = array();

        foreach($dados as $d) {
            $categoria = new Categoria();
            $categoria->setId($d['id']);
            $categoria->setNome($d['nome']);

            array_push($categorias, $categoria);
        }

        return $categorias;
    }
}
