<?php declare(strict_types=1);

namespace Burti\Controller;

use Burti\Core\TwigView;

class IndexController
{

    public function index(): TwigView
    {
        return new TwigView('Index/index', []);
    }
}