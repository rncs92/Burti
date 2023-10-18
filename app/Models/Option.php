<?php declare(strict_types=1);

namespace Burti\Models;

use JsonSerializable;

class Option implements JsonSerializable
{
    protected string $code;
    protected string $description;

    public function __construct(
        string $code,
        string $description
    )
    {
        $this->code = $code;
        $this->description = $description;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function jsonSerialize(): array
    {
        return [
            'code' => $this->getCode(),
            'description' => $this->getDescription()
        ];
    }
}