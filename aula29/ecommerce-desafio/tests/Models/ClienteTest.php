<?php

namespace Tests\Models;

use Isaac\EcommerceDesafio\Models\Cliente;
use PHPUnit\Framework\TestCase;

class ClienteTest extends TestCase
{
    public function testConstructor()
    {
        $cliente = new Cliente(1, "Danilo", "danilo@example.com", "(12) 2345-6789", "Rua ABC, 123");

        $this->assertSame(1, $cliente->id);
        $this->assertSame("Danilo", $cliente->nome);
        $this->assertSame("danilo@example.com", $cliente->email);
        $this->assertSame("(12) 2345-6789", $cliente->telefone);
        $this->assertSame("Rua ABC, 123", $cliente->endereco);
    }

    public function testNomeAttribute()
    {
        $cliente = new Cliente();
        $cliente->nome = "Danilo";

        $this->assertSame('Danilo', $cliente->nome);
    }

    public function testTelefoneAttribute()
    {
        $cliente = new Cliente();
        $cliente->telefone = "(12) 2345-6789";

        $this->assertSame("(12) 2345-6789", $cliente->telefone);
    }

    public function testEmailAttribute()
    {
        $cliente = new Cliente();
        $cliente->email = "danilo@example.com";

        $this->assertSame("danilo@example.com", $cliente->email);
    }

    public function testEnderecoAttribute()
    {
        $cliente = new Cliente();
        $cliente->endereco = "Rua ABC, 123";

        $this->assertSame("Rua ABC, 123", $cliente->endereco);
    }
}