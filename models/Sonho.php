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
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getDataSonho(): string
    {
        return $this->data_sonho;
    }

    public function setDataSonho(string $data_sonho): void
    {
        $this->data_sonho = $data_sonho;
    }

    public function getIntensidade(): ?int
    {
        return $this->intensidade;
    }

    public function setIntensidade(?int $intensidade): void
    {
        $this->intensidade = $intensidade;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getInterpretacao(): ?string
    {
        return $this->interpretacao;
    }

    public function setInterpretacao(?string $interpretacao): void
    {
        $this->interpretacao = $interpretacao;
    }

    public function getCategoriaId(): ?int
    {
        return $this->categoria_id;
    }

    public function setCategoriaId(?int $categoria_id): void
    {
        $this->categoria_id = $categoria_id;
    }

    public function getHumorId(): ?int
    {
        return $this->humor_id;
    }

    public function setHumorId(?int $humor_id): void
    {
        $this->humor_id = $humor_id;
    }
}

