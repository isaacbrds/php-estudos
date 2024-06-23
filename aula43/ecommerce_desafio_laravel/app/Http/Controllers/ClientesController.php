<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'desc')->paginate(5);
        return response()->json($clientes);
    }

    
    // Armazena um cliente recém-criado no banco de dados
    public function store(Request $request)
    {
        $validatedData = $this->formValidate($request);
        if ($validatedData instanceof \Illuminate\Http\JsonResponse) {
            return $validatedData;
        }

        $cliente = Cliente::create($validatedData);
        
        return response()->json($cliente, 201);
    }

    // Mostra os dados de um cliente específico
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return response()->json($cliente, 200);
    }

    
    // Atualiza um cliente no banco de dados
    public function update(Request $request, $id)
    {
        $validatedData = $this->formValidate($request);
        if ($validatedData instanceof \Illuminate\Http\JsonResponse) {
            return $validatedData;
        }

        Cliente::whereId($id)->update($validatedData);
        
        $cliente = Cliente::findOrFail($id);
        return response()->json($cliente, 200);

    }

    // Remove um cliente do banco de dados
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return response()->json([], 204);
    }

    private function formValidate($request)
    {
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

        $rules = [
            'nome' => 'required|max:150',
            'telefone' => 'required|max:25',
            'email' => 'required|email|max:255',
            'endereco' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Erro de validação.',
                'errors' => $validator->errors()
            ], 422);
        }

        return $validator->validated();
    }
}
