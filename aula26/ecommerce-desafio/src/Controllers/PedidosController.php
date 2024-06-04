<?php

namespace Isaac\EcommerceDesafio\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Isaac\EcommerceDesafio\Repositorios\PedidoRepositorioMysql;
use Isaac\EcommerceDesafio\Repositorios\PedidoRepositorioIlluminate;
use Isaac\EcommerceDesafio\Models\Pedido;
use Isaac\EcommerceDesafio\Views\RenderView;
use Isaac\EcommerceDesafio\Servicos\PedidoServico;
use Isaac\EcommerceDesafio\Servicos\ErrosDeValidacao\FormatoValidacao;
use Isaac\EcommerceDesafio\Servicos\ErrosDeValidacao\VazioValidacao;
use Illuminate\Database\UniqueConstraintViolationException;

class PedidosController
{
    private static $servico;
    private static function servico(){
        //if(!isset($servico)) $servico = new PedidoServico( new PedidoRepositorioMysql());
        if(!isset($servico)) $servico = new PedidoServico( new PedidoRepositorioIlluminate());
        return $servico;
    }

    public static function index(Request $request, Response $response, array $args): Response
    {
        
        $pedidos = self::servico()->buscar();
        
        return RenderView::render($response,['pedidos'=>$pedidos]);
    }

    public static function novo(Request $request, Response $response, array $args): Response
    {
        return RenderView::render($response,[], 'Form');
    }
    
    public static function editar(Request $request, Response $response, array $args): Response
    {
        $id = $request->getAttribute('id');
        $pedido = self::servico()->buscarPorId($id);
        if(!isset($pedido)) return $response->withStatus(302)->withHeader('Location', '/pedidos');

        return RenderView::render($response,['pedido'=>$pedido], 'Form');
    }

    public static function atualizar(Request $request, Response $response, array $args): Response
    {
        $id = $request->getAttribute('id');
        $pedido = self::servico()->buscarPorId($id);
        if(!isset($pedido)) return $response->withStatus(302)->withHeader('Location', '/pedidos');

        $dado  = $request->getParsedBody();
        $pedido = new Pedido(
            $id,
            $dado['clienteId'] ?? 0,
            $dado['valorTotal'] ?? 0,
            $dado['descricao'] ?? ""
        );

        
        try{
            self::servico()->salvar($pedido);
        } catch (VazioValidacao $err) {
            return RenderView::render($response, ["erro" => $err->getMessage()], "Form");
        } 
        catch (FormatoValidacao $err) {
            return RenderView::render($response, ["erro" => $err->getMessage()], "Form");
        } 
        catch (UniqueConstraintViolationException $err) {
            return RenderView::render($response, ["erro" => "Registro duplicado"], "Form");
        }
        catch (Exception $e) {
            return RenderView::render($response, ["erro" => "Erro genérico: {$e->getMessage()}"], "Form");
        }
        

        return $response->withStatus(302)->withHeader('Location', '/pedidos');
    }

    public static function criar(Request $request, Response $response, array $args): Response
    {
        
        $dado  = $request->getParsedBody();
        $pedido = new Pedido(
            null,
            $dado['clienteId'] ?? 0,
            $dado['valorTotal'] ?? 0,
            $dado['descricao'] ?? ""
        );
        
        try{
            self::servico()->salvar($pedido);
        } catch (VazioValidacao $err) {
            return RenderView::render($response, ["erro" => $err->getMessage()], "Form");
        } 
        catch (FormatoValidacao $err) {
            return RenderView::render($response, ["erro" => $err->getMessage()], "Form");
        } 
        catch (UniqueConstraintViolationException $err) {
            return RenderView::render($response, ["erro" => "Registro duplicado"], "Form");
        }
        catch (Exception $e) {
            return RenderView::render($response, ["erro" => "Erro genérico: {$e->getMessage()}"], "Form");
        }
        
        
        return $response->withStatus(302)->withHeader('Location', '/pedidos');
    }

    public static function excluir(Request $request, Response $response, array $args): Response
    {
        $id = $request->getAttribute('id');
        self::servico()->excluirPorId($id);
        
        return $response->withStatus(302)->withHeader('Location', '/pedidos');
    }
}
