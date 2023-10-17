<?php declare(strict_types=1);

namespace Burti\Models;

class Variety
{
    private string $code;
    private string $description;
    private array $options;

    public function __construct(
        string $code,
        string $description,
        array $options
    )
    {
        $this->code = $code;
        $this->description = $description;
        $this->options = $options;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}