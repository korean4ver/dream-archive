<?php

require_once(__DIR__ . "/../model/Sonho.php");

class SonhoService {

    // $categoriasValidas e $humoresValidas: arrays com os IDs realmente
    // existentes no banco, para confirmar que a categoria/humor escolhidos
    // pelo usuário realmente existem (e não apenas que vieram preenchidos).
    public function validar(Sonho $sonho, array $categoriasValidas, array $humoresValidas) {
        $erros = array();

        if(! $sonho->getTitulo())
            array_push($erros, "Informe o título do sonho!");

        if(! $sonho->getDataSonho())
            array_push($erros, "Informe a data do sonho!");

        if(! is_numeric($sonho->getIntensidade()))
            array_push($erros, "Informe a intensidade do sonho!");
        else if($sonho->getIntensidade() < 1 || $sonho->getIntensidade() > 10)
            array_push($erros, "A intensidade deve ser um número entre 1 e 10!");

        if(! $sonho->getDescricao())
            array_push($erros, "Informe a descrição do sonho!");

        if(! $sonho->getInterpretacao())
            array_push($erros, "Informe sua interpretação pessoal sobre o sonho!");

        $idCategoria = $sonho->getCategoria() ? $sonho->getCategoria()->getId() : null;
        if(! $idCategoria)
            array_push($erros, "Informe a categoria do sonho!");
        else if(! in_array($idCategoria, $categoriasValidas))
            array_push($erros, "A categoria selecionada não existe!");

        $idHumor = $sonho->getHumor() ? $sonho->getHumor()->getId() : null;
        if(! $idHumor)
            array_push($erros, "Informe o humor ao acordar!");
        else if(! in_array($idHumor, $humoresValidas))
            array_push($erros, "O humor selecionado não existe!");

        return $erros;
    }
}
