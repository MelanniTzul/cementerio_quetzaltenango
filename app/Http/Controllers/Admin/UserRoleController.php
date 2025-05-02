<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Usuario;

class UserRoleController extends Controller
{
    // Mostrar todos los usuarios con sus roles
    public function index()
    {
        $users = Usuario::with('rol')->get(); // Obtener todos los usuarios con su relación de rol
        $roles = Rol::all(); // Obtener todos los roles

        return view('admin.users.index', compact('users', 'roles'));
    }

    // Actualizar el rol de un usuario
    public function changeRole(Request $request, Usuario $user)
    {
        $request->validate([
            'id_rol' => 'required|exists:rol,id',
        ]);

        $user->id_rol = $request->id_rol;
        $user->save();

        return redirect()->route('admin.user-roles.index')->with('success', 'Rol actualizado correctamente.');
    }
}
