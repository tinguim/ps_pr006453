<?php

use PetShop\Model\Dica;

    require_once __DIR__ . '/../vendor/autoload.php';

    $dica = new Dica();
    $dica->loadById(1);
    $dica->descricao = "Nova descrição da dica";
    $dica->titulo = "Novo titulo da dica";
    $dica->save();