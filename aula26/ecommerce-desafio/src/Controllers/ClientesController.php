<?php

namespace Isaac\EcommerceDesafio\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Isaac\EcommerceDesafio\Repositorios\ClienteRepositorioMysql;
use Isaac\EcommerceDesafio\Repositorios\ClienteRepositorioIlluminate;
use Isaac\EcommerceDesafio\Models\Cliente;
use Isaac\EcommerceDesafio\Views\RenderView;
use Isaac\EcommerceDesafio\Servicos\ClienteServico;
use Isaac\EcommerceDesafio\Servicos\ErrosDeValidacao\FormatoValidacao;
use Isaac\EcommerceDesafio\Servicos\ErrosDeValidacao\VazioValidacao;
use Illuminate\Database\UniqueConstraintViolationException;

class ClientesController
{
    private static $servico;
    private static function servico(){
        //if(!isset($servico)) $servico = new ClienteServico( new ClienteRepositorioMysql());
        if(!isset($servico)) $servico = new ClienteServico( new ClienteRepositorioIlluminate());
        return $servico;
    }

    public static function index(Request $request, Response $response, array $args): Response
    {
        
        $clientes = self::servico()->buscar();
        return RenderView::render($response,['clientes'=>$clientes]);
    }

    public static function indexJson(Request $request, Response $response, array $args): Response
    {
        $queryString = $request->getQueryParams();
        $nome = $queryString['nome'] ?? "";
        $clientes = self::servico()->buscar(["nome" => $nome]);
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($clientes));
        return $response;
    }

    public static function novo(Request $request, Response $response, array $args): Response
    {
        return RenderView::render($response,[], 'Form');
    }
    
    public static function editar(Request $request, Response $response, array $args): Response
    {
        $id = $request->getAttribute('id');
        $cliente = self::servico()->buscarPorId($id);
        if(!isset($cliente)) return $response->withStatus(302)->withHeader('Location', '/clientes');

        return RenderView::render($response,['cliente'=>$cliente], 'Form');
    }

    public static function atualizar(Request $request, Response $response, array $args): Response
    {
        $id = $request->getAttribute('id');
        $cliente = self::servico()->buscarPorId($id);
        if(!isset($cliente)) return $response->withStatus(302)->withHeader('Location', '/clientes');

        $dado  = $request->getParsedBody();
        $cliente = new Cliente(
            $id,
            $dado['nome'] ?? "",
            $dado['email'] ?? "",
            $dado['telefone'] ?? "",
            $dado['endereco'] ?? ""
        );

        
        try{
            self::servico()->salvar($cliente);
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
        

        return $response->withStatus(302)->withHeader('Location', '/clientes');
    }

    public static function criar(Request $request, Response $response, array $args): Response
    {
        
        $dado  = $request->getParsedBody();
        $cliente = new Cliente(
            null,
            $dado['nome'] ?? "",
            $dado['email'] ?? "",
            $dado['telefone'] ?? "",
            $dado['endereco'] ?? ""
        );

        

        self::servico()->salvar($cliente);
        
        return $response->withStatus(302)->withHeader('Location', '/clientes');
    }

    public static function excluir(Request $request, Response $response, array $args): Response
    {
        $id = $request->getAttribute('id');
        self::servico()->excluirPorId($id);
        
        return $response->withStatus(302)->withHeader('Location', '/clientes');
    }
}
