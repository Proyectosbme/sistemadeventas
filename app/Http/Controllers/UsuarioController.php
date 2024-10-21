<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $empresa_id = Auth::user()->empresa_id;
        $usuarios = User::where('empresa_id', $empresa_id)->paginate(1);
        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::paginate(10);
        return view('admin.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|exists:roles,name', // Asegúrate de que el rol exista en la tabla roles
        ]);

        // Inserción de datos
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->empresa_id = Auth::user()->empresa_id;

        // Guardar usuario
        $usuario->save();

        // Asignar rol
        $usuario->assignRole($request->role);

        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Usuario agregado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $usuario = User::find($id);
        return view('admin.usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required' // Asegurarse de que el rol sea requerido
        ]);

        // Encontrar el usuario por ID
        $user = User::findOrFail($id);

        // Actualizar los datos del usuario
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Actualizar el rol del usuario
        $user->syncRoles([$request->input('role')]); // Asignar el nuevo rol

        // Guardar los cambios del usuario
        $user->save();

        // Redirigir o devolver una respuesta
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el usuario por su ID
        $usuario = User::findOrFail($id);

        // Eliminar el usuario
        $usuario->delete();

        // Redirigir al índice de usuarios con un mensaje de éxito
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Usuario eliminado exitosamente')
            ->with('icono', 'success');
    }

}
