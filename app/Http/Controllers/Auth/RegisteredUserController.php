<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Models\Perfil;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'dni' => 'required|string|max:20|unique:perfiles,dni',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
            'rol_id' => 'required|exists:roles,id',
            'genero' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol_id' => 1,
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos_perfil', 'public');
        }

        $user->perfil()->create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'genero' => $request->genero,
            'foto' => $fotoPath,
        ]);
            dd($user->perfil);
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
