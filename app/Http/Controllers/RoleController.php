<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        // Retornar la vista y pasar los datos
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* Validamos los datos */
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        /* Insertamos los datos */
        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->save();

        /* Retornamos a una vista */
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol agregado exitosamente')
            ->with('icono', 'success');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Role::find($id);
        return view('admin.roles.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rol = Role::find($id);
        return view('admin.roles.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
        ]);
        $rol = Role::find($id);
        $rol->name = $request->name;
        $rol->save();

        /*Retornamos a una vista*/
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol modifica existosamente')
            ->with('icono', 'success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol elimino existosamente')
            ->with('icono', 'success');
    }
}
