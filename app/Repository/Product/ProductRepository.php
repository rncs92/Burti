<?php declare(strict_types=1);

namespace Burti\Repository\Product;

interface ProductRepository
{
    public function getItems(): array;

}