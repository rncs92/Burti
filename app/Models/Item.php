<?php declare(strict_types=1);

namespace Burti\Models;

class Item
{
    private string $code;
    private string $description;
    private Variety $varieties;

    public function __construct(
        string  $code,
        string  $description,
        Variety $varieties
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

    public function getVarieties(): Variety
    {
        return $this->varieties;
    }
}