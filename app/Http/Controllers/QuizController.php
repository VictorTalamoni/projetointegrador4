<?php

namespace App\Http\Controllers;

use App\Models\User; // Certifique-se de importar o modelo User
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', ''); // Define um valor padrão para $search como uma string vazia

        if ($search) {
            $users = User::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('dashboard', [
            'users' => $users,
            'search' => $search, // Garante que $search seja passado para a view
        ]);
    }
}
