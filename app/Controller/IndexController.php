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
        $items = $this->productServices->handle();


        return new TwigView('Index/index', [
            'items' => $items
        ]);
    }
}