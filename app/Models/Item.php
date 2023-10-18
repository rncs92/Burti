<?php declare(strict_types=1);

namespace Burti\Models;

use JsonSerializable;

class Item implements JsonSerializable
{
    protected string $code;
    protected string $description;
    protected array $varieties;

    public function __construct(
        string  $code,
        string  $description,
        array $varieties
    )
    {
        $this->code = $code;
        $this->description = $description;
        $this->varieties = $varieties;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getVarieties(): array
    {
        return $this->varieties;
    }

    public function jsonSerialize(): array
    {
        return [
            'code' => $this->getCode(),
            'description' => $this->getDescription(),
            'varieties' => $this->getVarieties()
        ];
    }
}