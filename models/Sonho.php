<?php

require_once __DIR__ . '/../config/database.php';

class Sonho
{
    private ?int $id;
    private string $titulo;
    private string $data_sonho;
    private ?int $intensidade;
    private ?string $descricao;
    private ?string $interpretacao;
    private ?int $categoria_id;
    private ?int $humor_id;
    private ?Categoria $categoria;
    private ?Humor $humor;

    public function __construct(
        ?int $id = null,
        string $titulo = '',
        string $data_sonho = '',
        ?int $intensidade = null,
        ?string $descricao = null,
        ?string $interpretacao = null,
        ?int $categoria_id = null,
        ?int $humor_id = null
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->data_sonho = $data_sonho;
        $this->intensidade = $intensidade;
        $this->descricao = $descricao;
        $this->interpretacao = $interpretacao;
        $this->categoria_id = $categoria_id;
        $this->humor_id = $humor_id;
        $this->categoria = null;
        $this->humor = null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getDataSonho(): string
    {
        return $this->data_sonho;
    }

    public function setDataSonho(string $data_sonho): self
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

    public function getCategoriaId(): ?int
    {
        return $this->categoria_id;
    }

    public function setCategoriaId(?int $categoria_id): self
    {
        $this->categoria_id = $categoria_id;
        return $this;
    }

    public function getHumorId(): ?int
    {
        return $this->humor_id;
    }

    public function setHumorId(?int $humor_id): self
    {
        $this->humor_id = $humor_id;
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