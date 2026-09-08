```php
<?php

require_once __DIR__ . '/../config/database.php';

class Sonho
{
    private ?int $humor_id;
    private string $nome;

    public function __construct(
        ?int $humor_id = null,
        string $nome = ''
    ) {
        $this->humor_id = $humor_id;
        $this->nome = $nome;
    }

    /**
     * Get the value of humor_id
     */
    public function getHumorId(): ?int
    {
        return $this->humor_id;
    }

    /**
     * Set the value of humor_id
     */
    public function setHumorId(?int $humor_id): self
    {
        $this->humor_id = $humor_id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }
}
```
