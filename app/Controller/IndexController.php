<?php declare(strict_types=1);

namespace Burti\Controller;

use Burti\Core\TwigView;
use Burti\Services\Index\IndexProductServices;

class IndexController
{

    private IndexProductServices $productServices;

    public function __construct(IndexProductServices $productServices)
    {
        $this->productServices = $productServices;
    }

    public function index(): TwigView
    {
        $product = $this->productServices->handle();
        var_dump($product);die;

        return new TwigView('Index/index', []);
    }
}