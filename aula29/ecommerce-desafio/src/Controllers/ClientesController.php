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
        $queryString = $request->getQueryParams();
        $pagina = $queryString["pagina"] ?? 1;
        $totalPagina = $queryString["totalPagina"] ?? 5;
        $params = $queryString;
        
        $clientes = self::servico()->buscar($params, $pagina, $totalPagina);
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($clientes));
        $response->withStatus(200);
        return $response;
    }

    public static function mostrar(Request $request, Response $response, array $args): Response
    {
        $id = $request->getAttribute('id');
        $cliente = self::servico()->buscarPorId($id);
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($cliente));
        return $response->withStatus(200);
    }
    
    
    public static function atualizar(Request $request, Response $response, array $args): Response
    {
        $response = $response->withHeader('Content-Type', 'application/json');
        $id = $request->getAttribute('id');
        $cliente = self::servico()->buscarPorId($id);
        if(!isset($cliente)) {
            $response->getBody()->write(json_encode(["mensagem" => "Id: {$id} não foi encontrado"]));
            return $response->withStatus(404);
        }

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
        }catch (VazioValidacao $err) {
                $response->getBody()->write(json_encode(["mensagem" => $err->getMessage()]));
                return $response->withStatus(400);
        } 
        catch (FormatoValidacao $err) {
                $response->getBody()->write(json_encode(["mensagem" => $err->getMessage()]));
                return $response->withStatus(400);
        } 
        catch (UniqueConstraintViolationException $err) {
                $response->getBody()->write(json_encode(["mensagem" => "Registro duplicado"]));
                return $response->withStatus(400);
        }
        catch (Exception $e) {
                $response->getBody()->write(json_encode(["mensagem" => "Erro genérico: {$e->getMessage()}"]));
                return $response->withStatus(400);
        }

        $response->getBody()->write(json_encode($cliente));
        $response->withStatus(200);
        return $response;
    }

    public static function criar(Request $request, Response $response, array $args): Response
    {
        $response = $response->withHeader('Content-Type', 'application/json');
       
        
        $dado  = $request->getParsedBody();
        $cliente = new Cliente(
            null,
            $dado['nome'] ?? "",
            $dado['email'] ?? "",
            $dado['telefone'] ?? "",
            $dado['endereco'] ?? ""
        );

        try{
            self::servico()->salvar($cliente);
        }catch (VazioValidacao $err) {
                $response->getBody()->write(json_encode(["mensagem" => $err->getMessage()]));
                return $response->withStatus(400);
        } 
        catch (FormatoValidacao $err) {
                $response->getBody()->write(json_encode(["mensagem" => $err->getMessage()]));
                return $response->withStatus(400);
        } 
        catch (UniqueConstraintViolationException $err) {
                $response->getBody()->write(json_encode(["mensagem" => "Registro duplicado"]));
                return $response->withStatus(400);
        }
        catch (Exception $e) {
                $response->getBody()->write(json_encode(["mensagem" => "Erro genérico: {$e->getMessage()}"]));
                return $response->withStatus(400);
        }

        $response->getBody()->write(json_encode($cliente));
        $response->withStatus(201);
        return $response;
    }

    public static function excluir(Request $request, Response $response, array $args): Response
    {
        $response = $response->withHeader('Content-Type', 'application/json');
        $id = $request->getAttribute('id');
        $cliente = self::servico()->buscarPorId($id);
        if(!isset($cliente)) {
            $response->getBody()->write(json_encode(["mensagem" => "Id: {$id} não foi encontrado"]));
            return $response->withStatus(404);
        }
        self::servico()->excluirPorId($id);

        
        return $response->withStatus(204);
    }
}
