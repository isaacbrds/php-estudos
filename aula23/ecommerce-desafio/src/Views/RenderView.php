<?php

namespace Isaac\EcommerceDesafio\Views;
use Slim\Views\PhpRenderer;

class RenderView{
    public static function render($response, $data=[]){
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        $controllerName = '';
        $actionName = '';
        
        foreach ($backtrace as $entry) {
            if (isset($entry['class']) && strpos($entry['class'], 'Controller') !== false) {
                $controllerName = $entry['class'];
                $actionName = $entry['function'];
                break;
            }
        }

        $controller = basename(str_replace('\\', '/', $controllerName));
        $controller = str_replace('Controller', '', $controller);
        $action = ucfirst($actionName);

        $renderer = new PhpRenderer(__DIR__);
        return $renderer->render($response, "/$controller/$action.html.php", $data);
    }
}