<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if( $exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException ){
            $response = [
                'success' => false,
                'message' => 'Recurso não encontrado'
            ];
            return response()->json($response, 404);
        }

        $status = method_exists($exception, 'getStatusCode') 
                    ? $exception->getStatusCode() 
                    : 500;

        // Define uma estrutura de resposta padrão para erros
        $response = [
            'success' => false,
            'message' => $status == 404 ? 'Recurso não encontrado' : 'Erro Interno do Servidor'
        ];

        // Insere a mensagem de exceção em ambiente de desenvolvimento
        if (config('app.debug')) {
            $response['exception'] = get_class($exception);
            $response['message'] = $exception->getMessage();
            $response['trace'] = $exception->getTraceAsString();
        }

        return response()->json($response, $status);
    }
}
