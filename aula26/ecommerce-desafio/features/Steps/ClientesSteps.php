<?php
namespace Steps;

use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use Danilo\EcommerceDesafio\Repositorios\Infraestrutura\MysqlRepositorio;

class ClientesSteps extends RawMinkContext implements Context, SnippetAcceptingContext
{
     /**
     * @Given que eu estou na pagina de novo cliente
     */
    public function queEuEstouNaPaginaDeNovoCliente()
    {
        $this->getSession()->visit('http://localhost:8080/');
    }

    /**
     * @When eu preencho todos os campos e clico em cadastrar
     */
    public function euPreenchoTodosOsCamposEClicoEmCadastrar()
    {
        throw new PendingException();
    }

    /**
     * @Then eu devo ver o item na tabela de clientes
     */
    public function euDevoVerOItemNaTabelaDeClientes()
    {
        throw new PendingException();
    }

    /**
     * @When eu preencho o telefone errado depois clico em cadastrar
     */
    public function euPreenchoOTelefoneErradoDepoisClicoEmCadastrar()
    {
        throw new PendingException();
    }

    /**
     * @Then eu devo ver a mensagem de erro
     */
    public function euDevoVerAMensagemDeErro()
    {
        throw new PendingException();
    }

    /**
     * @When eu cadastro :arg1 vezes o cliente duplicado
     */
    public function euCadastroVezesOClienteDuplicado($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then devo te a mensagem de erro duplicado
     */
    public function devoTeAMensagemDeErroDuplicado()
    {
        throw new PendingException();
    }

}