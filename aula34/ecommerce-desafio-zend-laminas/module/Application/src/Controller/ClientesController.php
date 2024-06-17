<?php

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use \Doctrine\ORM\EntityManager;
use \Application\Entity\Cliente;

class ClientesController extends AbstractActionController
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function indexAction()
    {
        // $cliente = new Cliente();
        // $cliente->nome = 'João Silva';
        // $cliente->telefone = '(11) 1234-5678';
        // $cliente->email = 'joao.silva@email.com';
        // $cliente->endereco = 'Rua das Flores, 123, Cidade, UF';

        // $this->entityManager->persist($cliente);
        // $this->entityManager->flush();

        $clientes = $this->entityManager->getRepository(Cliente::class)->findAll();

        return new ViewModel([
            'clientes' => $clientes
        ]);
    }

    public function novoAction()
    {
        return new ViewModel();
    }

    public function criarAction()
    {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            $this->getResponse()->setStatusCode(405);
            return;
        }

        $postData = $request->getPost();

        $cliente = new Cliente();
        $cliente->nome = $postData['nome'];
        $cliente->telefone = $postData['telefone'];
        $cliente->email = $postData['email'];
        $cliente->endereco = $postData['endereco'];

        $this->entityManager->persist($cliente);
        $this->entityManager->flush();

        $this->flashMessenger()->addSuccessMessage('Cliente criado com sucesso!');

        return $this->redirect()->toRoute('clientes');
    }

    public function editarAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            $this->flashMessenger()->addErrorMessage('Cliente não encontrado!');
            return $this->redirect()->toRoute('clientes');
        }

        // Encontrar cliente pelo ID
        $cliente = $this->entityManager->find(Cliente::class, $id);

        if (!$cliente) {
            $this->flashMessenger()->addErrorMessage('Cliente não encontrado!');
            return $this->redirect()->toRoute('clientes');
        }

        // Implementar lógica de edição aqui (pode ser um formulário, por exemplo)

        return new ViewModel([
            'cliente' => $cliente
        ]);
    }

    public function excluirAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            $this->flashMessenger()->addErrorMessage('Cliente não encontrado!');
            return $this->redirect()->toRoute('clientes');
        }

        $cliente = $this->entityManager->find(Cliente::class, $id);

        if (!$cliente) {
            $this->flashMessenger()->addErrorMessage('Cliente não encontrado!');
            return $this->redirect()->toRoute('clientes');
        }

        $this->entityManager->remove($cliente);
        $this->entityManager->flush();

        // Adicionar mensagem de sucesso após a exclusão
        $this->flashMessenger()->addSuccessMessage('Cliente removido com sucesso!');

        return $this->redirect()->toRoute('clientes');
    }

    public function alterarAction()
    {
        $request = $this->getRequest();
        if (!$request->isPost()) {
            $this->getResponse()->setStatusCode(405);
            return;
        }

        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {
            return $this->redirect()->toRoute('clientes');
        }

        $cliente = $this->entityManager->find(Cliente::class, $id);

        if (!$cliente) {
            return $this->redirect()->toRoute('clientes');
        }

        $postData = $request->getPost();

        $cliente->nome = $postData['nome'];
        $cliente->telefone = $postData['telefone'];
        $cliente->email = $postData['email'];
        $cliente->endereco = $postData['endereco'];

        $this->entityManager->persist($cliente);
        $this->entityManager->flush();

        $this->flashMessenger()->addSuccessMessage('Cliente atualizado com sucesso!');

        return $this->redirect()->toRoute('clientes');
    }
}
