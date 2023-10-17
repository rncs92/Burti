<?php declare(strict_types=1);

namespace Burti\Models;

class Product
{
    private Item $item;
    private Variety $varieties;

    public function __construct(
        Item    $item,
        Variety $varieties
    )
    {
        $this->item = $item;
        $this->varieties = $varieties;
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function getVarieties(): Variety
    {
        return $this->varieties;
    }
}