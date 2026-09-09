<?php

require_once(__DIR__ . "/Categoria.php");
require_once(__DIR__ . "/Humor.php");

class Sonho {

    // Atributos
    private ?int $id;
    private ?string $titulo;
    private ?string $data_sonho;
    private ?int $intensidade;
    private ?string $descricao;
    private ?string $interpretacao;
    private ?Categoria $categoria;
    private ?Humor $humor;

    // GETs e SETs
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDataSonho(): ?string
    {
        return $this->data_sonho;
    }

    public function setDataSonho(?string $data_sonho): self
    {
        $this->data_sonho = $data_sonho;

        return $this;
    }

    public function getIntensidade(): ?int
    {
        return $this->intensidade;
    }

    public function setIntensidade(?int $intensidade): self
    {
        $this->intensidade = $intensidade;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getInterpretacao(): ?string
    {
        return $this->interpretacao;
    }

    public function setInterpretacao(?string $interpretacao): self
    {
        $this->interpretacao = $interpretacao;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getHumor(): ?Humor
    {
        return $this->humor;
    }

    public function setHumor(?Humor $humor): self
    {
        $this->humor = $humor;

        return $this;
    }
}
