<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Gate;


class RoleController extends Controller
{

    public function __construct()
    {
        // Aplicar permisos específicos a cada acción del controlador
       // $this->middleware('permission:roles-ver')->only('index', 'show');
       // $this->middleware('permission:roles-crear')->only('create', 'store');
       // $this->middleware('permission:roles-editar')->only('edit', 'update');
        $this->middleware('permission:roles-eliminar')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Obtener los roles con paginación (10 por página)
        $roles = Role::paginate(10);

        // Retornar la vista y pasar los datos
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todos los permisos disponibles para asignar al rol
        $permissions = Permission::all();

        // Retornar la vista de creación de roles y pasarle los permisos
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* Validamos los datos */
        $request->validate([
            'name' => 'required|unique:roles',
            'description' => 'nullable|string|max:255',
        ]);

        /* Insertamos los datos del rol */
        $rol = new Role();
        $rol->name = $request->name;
        $rol->guard_name = 'web';
        $rol->description = $request->description;
        $rol->save();

        /* Asignamos los permisos al rol */

        $permissionsNames = Permission::whereIn('id', explode(',', $request->permissions))->pluck('name')->toArray();
        // Inicializar un array para almacenar los nombres de los permisos

        // Sincronizar roles
        $rol->syncPermissions($permissionsNames);




        /* Retornamos a una vista con mensaje de éxito*/
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol agregado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rol = Role::findOrFail($id);
        $permisos = $rol->permissions;  // Obtén los permisos asociados al rol

        return view('admin.roles.show', compact('rol', 'permisos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rol = Role::findOrFail($id);
        $permissions = Permission::all(); // Obtenemos todos los permisos disponibles
        $assignedPermissions = $rol->permissions->pluck('id')->toArray(); // Obtenemos los IDs de los permisos asignados al rol

        return view('admin.roles.edit', compact('rol', 'permissions', 'assignedPermissions'));
    }

    public function update(Request $request, string $id)
    {
        $rol = Role::findOrFail($id);

        // Validar los datos recibidos
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'description' => 'nullable|string|max:255',
        ]);

        // Actualizar el rol
        $rol->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $permissionsNames = Permission::whereIn('id', explode(',', $request->permissions))->pluck('name')->toArray();
        // Inicializar un array para almacenar los nombres de los permisos

        // Sincronizar roles
        $rol->syncPermissions($permissionsNames);

        /* Retornamos a una vista con mensaje de éxito */
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol editado exitosamente')
            ->with('icono', 'success');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol eliminado exitosamente')
            ->with('icono', 'success');
    }
}
