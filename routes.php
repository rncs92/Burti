<?php

use Burti\Controller\IndexController;

return[
    //Show
    ['GET', '/', [IndexController::class, 'index']],
];
