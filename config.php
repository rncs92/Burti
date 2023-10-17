<?php


use Burti\Repository\Product\JSONProductRepository;
use Burti\Repository\Product\ProductRepository;

return [
    'classes' => [
        ProductRepository::class => new JSONProductRepository(),
    ],
];