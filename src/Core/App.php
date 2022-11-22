<?php
namespace PetShop\Core;

use Bramus\Router\Router;

class App 
{
    /**
     * Váriavel estática que conterá o objeto Router responsável pelo tratamento das rotas
     *
     * @var Router
     */
    private static $router;

    /**
     * Método que será carregado quando alguma página do site for invocada,
     * decide qual a rota deve ser executada a partir da URL informada pelo usuário
     *
     * @return void
     */
    public static function start()
    {
        //associa um objeto Bramus/Router à váriavel $router
        self::$router = new Router();

        //registra as rotas possiveis
        self::registaRotasDoBackEnd();
        self::registaRotasDoFrontEnd();

        //analisa a requesição e escolhe a rota compativel
        self::$router->run();
    }

    /**
     * Registra as rotas possíveis que estarão associadas aos controllers para o BACK END
     *
     * @return void
     */
    private static function registaRotasDoBackEnd()
    {

    }

    /**
     * Registra as rotas possíveis que estarão associadas aos controllers para o FRONT END
     *
     * @return void
     */
    private static function registaRotasDoFrontEnd()
    {
        self::$router->get('/', '\PetShop\Controller\HomeController@index');
        self::$router->get('/login', '\PetShop\Controller\LoginController@login');
    }
}