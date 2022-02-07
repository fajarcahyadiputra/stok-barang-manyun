<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function index(Role $role)
    {
        $roles = Role::all();
        return view('admin.role_permission.index_role_permission', compact('roles'));
    }
}
