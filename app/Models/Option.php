<?php declare(strict_types=1);

namespace Burti\Models;

class Option
{
    private string $code;
    private string $description;

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
}