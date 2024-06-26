<?php
namespace Tests\Servico;

use Tests\Mock\MemoriaRepositorio;
use Isaac\EcommerceDesafio\Servicos\ClienteServico;
use Isaac\EcommerceDesafio\Servicos\ErroDeValidacao\VazioValidacao;
use Isaac\EcommerceDesafio\Servicos\ErroDeValidacao\FormatoValidacao;

use Isaac\EcommerceDesafio\Models\Cliente;
use PHPUnit\Framework\TestCase;

class ClienteServicoTest extends TestCase 
{
    public function testPersistenciaValido()
    {
        // Arrange
        $cliente = new Cliente();
        $cliente->nome = "Danilo";
        $cliente->telefone = "(11) 1111-1111";

        $clienteServico = new ClienteServico(new MemoriaRepositorio());

        // Act
        $clienteServico->salvar($cliente);
        $lista = $clienteServico->buscar();

        // Assert
        $this->assertSame(1, count($lista));
    }

    public function testPersistenciaTelefoneInvalido()
    {
        // Assert
        $this->expectException(FormatoValidacao::class);
        $this->expectExceptionMessage("O formato do telefone precisa ser (00) 00000-0000 ou (00) 0000-0000");

        // Arrange
        $cliente = new Cliente();
        $cliente->nome = "Danilo";
        $cliente->telefone = "(111111-1111";

        $clienteServico = new ClienteServico(new MemoriaRepositorio());

        // Act
        $clienteServico->salvar($cliente);
    }

    public function testPersistenciaInvalido()
    {
        // Assert
        $this->expectException(VazioValidacao::class);
        $this->expectExceptionMessage("Nome não pode ser vazio");

        // Arrange
        $cliente = new Cliente();

        $clienteServico = new ClienteServico(new MemoriaRepositorio());

        // Act
        $clienteServico->salvar($cliente);
    }

    public function testPersistenciaInvalidoEmpty()
    {
        // Assert
        $this->expectException(VazioValidacao::class);
        $this->expectExceptionMessage("Nome não pode ser vazio");
        
        // Arrange
        $cliente = new Cliente();
        $cliente->nome = "";

        $clienteServico = new ClienteServico(new MemoriaRepositorio());

        // Act
        $clienteServico->salvar($cliente);
    }

    public function testAtualizandoClienteExistente()
    {
        // Arrange
        $cliente = new Cliente();
        $cliente->nome = "Danilo";
        $cliente->telefone = "(11) 1111-1111";

        $clienteServico = new ClienteServico(new MemoriaRepositorio());
        $clienteServico->salvar($cliente);

        // Garanto que o ID foi preenchido como identity
        $this->assertNotNull($cliente->id);
        $listaExistente = $clienteServico->buscar();

        // Atualizando o nome do cliente
        $cliente->nome = "Danilo A.";
        $clienteServico->salvar($cliente);

        // Act
        $listaAtualizada = $clienteServico->buscar();

        // Assert
        $this->assertSame(count($listaExistente), count($listaAtualizada));
        $this->assertSame("Danilo A.", $listaAtualizada[0]->nome);
    }
    
    public function testExclusaoDeCliente()
    {
        // Arrange
        $cliente = new Cliente();
        $cliente->nome = "Danilo";
        $cliente->telefone = "(11) 1111-1111";

        $clienteServico = new ClienteServico(new MemoriaRepositorio());
        $listaExistente = $clienteServico->buscar();
        $clienteServico->salvar($cliente);

        // Act - Excluindo o cliente
        $clienteServico->excluirPorId($cliente->id);

        // Assert - Verifica se o cliente foi excluído corretamente
        $obj = $clienteServico->buscarPorId($cliente->id);
        $this->assertNull($obj);
    }
}

