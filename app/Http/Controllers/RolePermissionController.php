<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): view
    {
        $permisos = Permission::paginate(10);
        return view('admin.permisos.index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): view
    {
        return view('admin.permisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions',
            'description' => 'nullable|string|max:255',
        ]);

        Permission::create($request->only('name', 'description'));

        return redirect()->route('admin.permisos.index')->with('success', 'Permiso creado correctamente.')
        ->with('success', 'Permiso creado correctamente.')
        ->with('mensaje', 'Permiso creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        $permiso = Permission::findOrFail($id);
        return view('admin.permisos.show', compact('permiso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): Factory|View
    {
        $permiso = Permission::findOrFail($id);
        return view('admin.permisos.edit', compact('permiso'));
    }


    /**
     * Update the specified permission in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permiso):RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $permiso->update($request->only('name', 'description'));

        return redirect()->route('admin.permisos.index')->with('success', 'Permiso actualizado correctamente.')
        ->with('mensaje', 'Permiso editado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id):RedirectResponse
    {
        $permiso = Permission::findOrFail($id);
        $permiso->delete();

        return redirect()->route('admin.permisos.index')->with('success', 'Permiso eliminado correctamente.');
    }
}
