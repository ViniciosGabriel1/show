<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProdutosModel;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    public function index()
    {
        // Lógica para listar todos os produtos
    }

    public function create()
    {
        return view('produtos.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0'
        ], [
            'name.required' => 'O campo nome do produto é obrigatório.',
            'description.required' => 'O campo descrição do produto é obrigatório.',
            'quantity.required' => 'O campo quantidade do produto é obrigatório.',
            'quantity.integer' => 'O campo quantidade do produto deve ser um número inteiro.',
            'quantity.min' => 'O campo quantidade do produto deve ser no mínimo :min.',
            'price.required' => 'O campo preço do produto é obrigatório.',
            'price.numeric' => 'O campo preço do produto deve ser um número.',
            'price.min' => 'O campo preço do produto deve ser no mínimo :min.',
        ]);

        $validatedData['user_id'] = Auth::id(); // Associando o ID do usuário ao produto

        try {
            // Criar o produto
            $product = ProdutosModel::create($validatedData);

            // Verificar se o produto foi criado com sucesso
            if ($product) {
                return redirect()->route('home.index')->with('success', 'Produto cadastrado com sucesso!');
            } else {
                return back()->with('error', 'Ocorreu um erro ao cadastrar o produto. Por favor, tente novamente.');
            }
        } catch (\Exception $e) {
            // Log do erro ou outra manipulação de erro, se necessário
            return back()->with('error', 'Ocorreu um erro ao cadastrar o produto. Por favor, tente novamente.');
        }
    }
}
