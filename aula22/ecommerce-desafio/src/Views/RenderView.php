<?php

namespace Isaac\EcommerceDesafio\Views;

class RenderView{
    public static function render($response, $cliente, $controller, $acao){

        ob_start();
        include __DIR__ . "/../Views/$controller/$acao.html.php";
        $saidaHtml = ob_get_clean();

        $response->getBody()->write($saidaHtml);
        return $response;
    }
}