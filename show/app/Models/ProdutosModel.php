<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutosModel extends Model
{

    protected $table = 'products'; // Nome da tabela no banco de dados

    protected $fillable = ['name', 'description', 'quantity', 'price', 'user_id']; // Colunas que podem ser preenchidas em massa

    /**
     * Método para inserir um novo produto no banco de dados.
     *
     * @param array $data Os dados do produto a serem inseridos.
     * @return bool Retorna verdadeiro se a inserção for bem-sucedida, falso caso contrário.
     */
    // public static function inserirProduto(array $data)
    // {
    //     try {
    //         // Inserindo o produto no banco de dados
    //         $produto = ProdutosModel::create($data);

    //         // Verifica se a inserção foi bem-sucedida
    //         return $produto ? true : false;
    //     } catch (\Exception $e) {
    //         // Log do erro ou manipulação do erro, se necessário
    //         return false;
    //     }
    // }


}
