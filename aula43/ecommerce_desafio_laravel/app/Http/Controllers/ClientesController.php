<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'desc')->paginate(5);
        return view('clientes/index', compact('clientes'));
    }

    // Mostra o formulário para criar um novo cliente
    public function create()
    {
        return view('clientes.create');
    }

    // Armazena um cliente recém-criado no banco de dados
    public function store(Request $request)
    {
        $validatedData = $this->formValidate($request);
        
       
        
        $cliente = Cliente::create($validatedData);
        return redirect('/clientes')->with('success', 'Cliente criado com sucesso.');
    }

    // Mostra os dados de um cliente específico
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    // Mostra o formulário para editar um cliente existente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    // Atualiza um cliente no banco de dados
    public function update(Request $request, $id)
    {
        $validatedData = $this->formValidate($request);
    
        Cliente::whereId($id)->update($validatedData);
        return redirect('/clientes')->with('success', 'Cliente atualizado com sucesso.');
    }

    // Remove um cliente do banco de dados
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect('/clientes')->with('success', 'Cliente excluído com sucesso.');
    }

    private function formValidate($request){
        $customMessages = [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.max' => 'O campo nome não pode ter mais que 150 caracteres.',
            'telefone.required' => 'O campo telefone é obrigatório.',
            'telefone.max' => 'O campo telefone não pode ter mais que 25 caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
            'email.max' => 'O campo e-mail não pode ter mais que 255 caracteres.',
            'endereco.required' => 'O campo endereço é obrigatório.',
        ];
    
        $validatedData = $request->validate([
            'nome' => 'required|max:150',
            'telefone' => 'required|max:25',
            'email' => 'required|email|max:255',
            'endereco' => 'required',
        ], $customMessages);
        return $validatedData;
    }
}
