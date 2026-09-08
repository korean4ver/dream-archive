<?php

require_once __DIR__ . '/../config/database.php';

class SonhoDAO
{
    public function listar()
    {
        // 1. Obtém a conexão PDO com o banco de dados
        $db = Database::getConnection();

        // 2. Monta a consulta SQL fazendo JOIN com as tabelas relacionadas (categorias e humores)
        $sql = "SELECT sonhos.*, 
                       categorias.nome AS categoria_nome, 
                       humores.nome AS humor_nome 
                FROM sonhos
                INNER JOIN categorias ON sonhos.categoria_id = categorias.id
                INNER JOIN humores ON sonhos.humor_id = humores.id
                ORDER BY sonhos.data_sonho DESC";

        // 3. Executa a query no banco
        $stmt = $db->query($sql);

        // 4. Retorna todos os registros encontrados como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}