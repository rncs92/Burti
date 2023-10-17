<?php declare(strict_types=1);

namespace Burti\Services\Index;

use Burti\Repository\Product\ProductRepository;

class IndexProductServices
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function handle()
    {
        return $this->productRepository->getItems();
    }
}