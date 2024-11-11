<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Obtém o valor de pesquisa
        $search = $request->input('search');
    
        // Se houver um valor de pesquisa, filtra os usuários pelo nome ou e-mail
        if ($search) {
            $users = User::where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->paginate(10); // Limita os resultados por 10 por página
        } else {
            // Caso não haja pesquisa, retorna todos os usuários
            $users = User::paginate(10);
        }
    
        return view('dashboard', compact('users', 'search')); // Passa 'search' para a view para mostrar o termo pesquisado
    }
    public function destroy($id)
    {
    // Encontre o usuário pelo ID
    $user = User::findOrFail($id);

    // Deletar o usuário
    $user->delete();

    // Redirecionar de volta para o dashboard com uma mensagem de sucesso
    return redirect()->route('dashboard')->with('msg', 'Usuário deletado com sucesso!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('eventos/editar', compact('user')); 
    }

    public function update(Request $request, $id)
    {
        // Validação incluindo o campo 'description'
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string', // Permite descrição opcional
        ]);

        $user = User::findOrFail($id);

        // Atribuição de valores
        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description; // Adiciona description

        // Processamento da imagem
        $imagemAntiga = $user->imagem;
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            if ($imagemAntiga) {
                $caminhoImagemAntiga = public_path('img/pessoas/' . $imagemAntiga);
                if (file_exists($caminhoImagemAntiga)) {
                    unlink($caminhoImagemAntiga);
                }
            }

            $requestFoto = $request->foto;
            $extensao = $requestFoto->extension();
            $nomeFoto = md5($requestFoto->getClientOriginalName() . strtotime("agora")) . "." . $extensao;
            $requestFoto->move(public_path('img/pessoas'), $nomeFoto);
            $user->imagem = $nomeFoto;
        }

        // Salvar as alterações
        $user->save();

        return redirect('/dashboard')->with('msg', 'Dados editados com sucesso');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('eventos/perfil', ['user' => $user]);
    }
}
