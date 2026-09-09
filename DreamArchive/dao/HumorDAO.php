<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Humor.php");

class HumorDAO {

    public function list() {
        $sql = "SELECT * FROM humores ORDER BY nome";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute();
        $dados = $stm->fetchAll();
        return $this->map($dados);
    }

    public function findById(int $id): ?Humor
    {
        $sql = "SELECT * FROM humores WHERE id = ?";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);

        $dados = $stm->fetchAll();
        $humores = $this->map($dados);

        if(! empty($humores))
            return $humores[0];
        else
            return NULL;
    }

    private function map(array $dados) {
        $humores = array();

        foreach($dados as $d) {
            $humor = new Humor();
            $humor->setId($d['id']);
            $humor->setNome($d['nome']);

            array_push($humores, $humor);
        }

        return $humores;
    }
}
