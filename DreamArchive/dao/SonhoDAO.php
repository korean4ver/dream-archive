<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Sonho.php");
require_once(__DIR__ . "/../model/Categoria.php");
require_once(__DIR__ . "/../model/Humor.php");

class SonhoDAO {

    public function list() {
        $sql = "SELECT s.*, c.nome nome_categoria, h.nome nome_humor
                FROM sonhos s
                JOIN categorias c ON (c.id = s.categoria_id)
                JOIN humores h ON (h.id = s.humor_id)
                ORDER BY s.data_sonho DESC";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute();

        $dados = $stm->fetchAll();
        return $this->map($dados);
    }

    public function findById(int $id): ?Sonho
    {
        $sql = "SELECT s.*, c.nome nome_categoria, h.nome nome_humor
                FROM sonhos s
                JOIN categorias c ON (c.id = s.categoria_id)
                JOIN humores h ON (h.id = s.humor_id)
                WHERE s.id = ?";

        $conn = Connection::getConnection();
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);

        $dados = $stm->fetchAll();
        $sonhos = $this->map($dados);

        if(! empty($sonhos))
            return $sonhos[0];
        else
            return NULL;
    }

    public function insert(Sonho $sonho) {
        try {
            $sql = "INSERT INTO sonhos
                        (titulo, data_sonho, intensidade, descricao, interpretacao, categoria_id, humor_id)
                    VALUES
                        (:titulo, :data_sonho, :intensidade, :descricao, :interpretacao, :categoria_id, :humor_id)";

            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindValue("titulo", $sonho->getTitulo());
            $stm->bindValue("data_sonho", $sonho->getDataSonho());
            $stm->bindValue("intensidade", $sonho->getIntensidade());
            $stm->bindValue("descricao", $sonho->getDescricao());
            $stm->bindValue("interpretacao", $sonho->getInterpretacao());
            $stm->bindValue("categoria_id", $sonho->getCategoria()->getId());
            $stm->bindValue("humor_id", $sonho->getHumor()->getId());
            $stm->execute();
            return "";
        } catch(PDOException $e) {
            $erro = "Erro ao salvar o sonho. Tente novamente.";
            if(AMB_DEV)
                $erro .= "<br>" . $e->getMessage();
            return $erro;
        }
    }

    public function update(Sonho $sonho) {
        try {
            $sql = "UPDATE sonhos SET
                        titulo = :titulo,
                        data_sonho = :data_sonho,
                        intensidade = :intensidade,
                        descricao = :descricao,
                        interpretacao = :interpretacao,
                        categoria_id = :categoria_id,
                        humor_id = :humor_id
                    WHERE id = :id";

            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            $stm->bindValue("titulo", $sonho->getTitulo());
            $stm->bindValue("data_sonho", $sonho->getDataSonho());
            $stm->bindValue("intensidade", $sonho->getIntensidade());
            $stm->bindValue("descricao", $sonho->getDescricao());
            $stm->bindValue("interpretacao", $sonho->getInterpretacao());
            $stm->bindValue("categoria_id", $sonho->getCategoria()->getId());
            $stm->bindValue("humor_id", $sonho->getHumor()->getId());
            $stm->bindValue("id", $sonho->getId());

            $stm->execute();
            return "";
        } catch(PDOException $e) {
            $erro = "Erro ao salvar o sonho. Tente novamente.";
            if(AMB_DEV)
                $erro .= "<br>" . $e->getMessage();
            return $erro;
        }
    }

    public function excluir(int $id) {
        try {
            $sql = "DELETE FROM sonhos WHERE id = ?";

            $conn = Connection::getConnection();
            $stm = $conn->prepare($sql);
            $stm->execute([$id]);
            return "";
        } catch(PDOException $e) {
            $erro = "Erro ao excluir o sonho. Tente novamente.";
            if(AMB_DEV)
                $erro .= "<br>" . $e->getMessage();
            return $erro;
        }
    }

    private function map(array $dados) {
        $sonhos = array();

        foreach($dados as $d) {
            $sonho = new Sonho();
            $sonho->setId($d['id']);
            $sonho->setTitulo($d['titulo']);
            $sonho->setDataSonho($d['data_sonho']);
            $sonho->setIntensidade($d['intensidade']);
            $sonho->setDescricao($d['descricao']);
            $sonho->setInterpretacao($d['interpretacao']);

            $categoria = new Categoria();
            $categoria->setId($d['categoria_id']);
            $categoria->setNome($d['nome_categoria']);
            $sonho->setCategoria($categoria);

            $humor = new Humor();
            $humor->setId($d['humor_id']);
            $humor->setNome($d['nome_humor']);
            $sonho->setHumor($humor);

            array_push($sonhos, $sonho);
        }

        return $sonhos;
    }
}
