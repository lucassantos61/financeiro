<?php 
declare(strict_types=1);
namespace Financas\View;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response;


class ViewRenderer implements ViewRenderInterface
{
    private $twigEnviroment;
    public function __construct(\Twig_Environment $twigEnviroment)
    {
     $this->twigEnviroment = $twigEnviroment; 
    }
    public function render(string $template, array $context = []): ResponseInterface
    {
        $result = $this->twigEnviroment->render($template,$context);
        $reponse = new  Response();
        $reponse->getBody()->write($result);
        return $reponse;
    }
}
