<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ControllerUsers extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {

        return view('user.index');
    }

    public function store(Request $request)
    {
        if (is_null($request->email) && Auth::attempt(['name' => $request->name ?? '', 'password' => $request->password ?? ''])) {
            return to_route('series.index')->with('mensagem.sucesso', 'Usúario encontrado.');
        }

        $validated = $request->validate([
            'name' => ['required', 'min:3']
        ], ['name.required' => 'É necessário informar um nome.', 'name.min' => 'O nome precisa ter pelo menos 3 caracteres.']);

        try {
            $user = User::create([
                'name' => $request->name,
                'password' => $request->password,
                'email' => $request->email,
                'email_verified_at' => Date::now('America/Sao_Paulo'),
                'remember_token' => Str::random(6)
            ]);
        } catch (Exception $e) {
            $mensagemErro = 'Usuario não cadastrado.';
            error_log($mensagemErro);
        }


        return view('user.index')->withErrors([$mensagemErro ?? null])->with('user', $user ?? null);
    }

    public function destroy() {
        Auth::logout();

        return to_route('user.index');
    }
}
