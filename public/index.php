<?php

use PetShop\Model\Dica;

    require_once __DIR__ . '/../vendor/autoload.php';

    $dica = new Dica();
    var_dump($dica->getTableInfo());