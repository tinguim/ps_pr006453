<?php
namespace PetShop\Core;

use Bramus\Router\Router;
use PetShop\Controller\ErrorController;

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
        //carrega uma sessao ou inicia uma nova em caso de novo acesso
        self::carregaSessao();

        //associa um objeto Bramus/Router à váriavel $router
        self::$router = new Router();

        //registra as rotas possiveis
        self::registraRotasDoBackEnd();
        self::registraRotasDoFrontEnd();
        self::registra404Generico();

        //analisa a requesição e escolhe a rota compativel
        self::$router->run();
    }

    /**
     * Registra as rotas possíveis que estarão associadas aos controllers para o BACK END
     *
     * @return void
     */
    private static function registraRotasDoBackEnd()
    {
        self::$router->mount('/admin', function() {
            self::$router->get('/', '\PetShop\Controller\AdminDashboardController@index');
            self::$router->get('/clientes', '\PetShop\Controller\AdminClienteController@listar');
        });
    }

     /**
     * Registra rota genérica para erro de URL digitada
     *
     * @return void
     */
    private static function registra404Generico()
    {
        self::$router->set404(function() {
            header('HTTP/1.1 404 Not Found');
            $objErro = new ErrorController();
            $objErro->erro404();
        });
    }

    /**
     * Registra as rotas possíveis que estarão associadas aos controllers para o FRONT END
     *
     * @return void
     */
    private static function registraRotasDoFrontEnd()
    {
        self::$router->get('/', '\PetShop\Controller\HomeController@index');
        self::$router->get('/login', '\PetShop\Controller\LoginController@login');
        self::$router->get('/logout', '\PetShop\Controller\LoginController@logout');
        self::$router->post('/login', '\PetShop\Controller\LoginController@postLogin');
        self::$router->get('/cadastro', '\PetShop\Controller\CadastroController@cadastro');
        self::$router->post('/cadastro', '\PetShop\Controller\CadastroController@postCadastro');
        self::$router->get('/meus-dados', '\PetShop\Controller\MeusDadosController@meusDados');
        self::$router->get('/fale-conosco', '\PetShop\Controller\FaleConoscoController@faleConosco');
        self::$router->post('/fale-conosco', '\PetShop\Controller\FaleConoscoController@postFaleConosco');
    }

    /**
     * Função que inicia uma nova sessão e, posteriormente, carrega o ID da sessão e grava no disporitivo do usuário
     *
     * @return void
     */
    private static function carregaSessao()
    {
        session_start();
    }
}