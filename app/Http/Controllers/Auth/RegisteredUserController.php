<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'nombre' => ['required', 'string', 'max:100'],
            'apellido' => ['required', 'string', 'max:100'],
            'dpi' => ['required', 'string', 'max:20', 'unique:usuario,dpi'],
            'correo' => ['required', 'string', 'email', 'max:100', 'unique:usuario,correo'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Obtener el rol "consulta"
        $consultaRole = Rol::where('nombre', 'Usuario de Consulta')->first();

        // Si no existe, prevenir el registro
        if (!$consultaRole) {
            return back()->withErrors(['rol' => 'El rol "consulta" no existe. Por favor, contacta al administrador.']);
        }

        // Crear el usuario con rol consulta
        $user = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dpi' => $request->dpi,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->password),
            'id_rol' => $consultaRole->id,
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
