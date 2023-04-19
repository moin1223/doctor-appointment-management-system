<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;
use App\Models\Role;
use App\Http\Requests\Role\RoleFormRequest;
use RealRashid\SweetAlert\Facades\Alert;
class RoleController extends Controller
{

    public function index()
    {
        // $roles = Role::orderBy('id', 'desc')->paginate(2);
        $roles = Role::orderBy('id', 'desc')->paginate(10);
        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleFormRequest $request)
    {
  

        $role = Role::create([
            'name' => $request->name,

        ]);
        Alert::success('Role Created Successfully.');
        return redirect()->route('role.index');
    }

    public function edit($id)
    {
        // dd($id);
        $role = Role::where('id', $id)->first();
        return view('admin.roles.edit', compact('role'));
    }

    public function update(RoleFormRequest $request, $roleId)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:roles',

        ]);
        $role = Role::whereId($roleId)->first();

        $role->update([
            'name' => $request->name,

        ]);
        Alert::success('Role Updated Successfully.');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Role::whereId($id)->first()->delete();
        $role = Role::find($id);
        if (empty($role)) {
            return;
        }
        $role->delete();
        return redirect()->route('role.index');
    }

    // give permission to role
    public function givePermission($id)
    {
        $role = Role::where('id', $id)->first();
        $permissions = Permission::all();
        $rolePermissions = $role->permissions;
        return view('admin.give-permission.give-permission', compact('permissions', 'role','rolePermissions'));
    }
    public function givedPermissionStore(Request $request, $id)
    {
        // dd($request->all());
        $role = Role::where('id', $id)->first();
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('message', 'Permission Successfully Assigned!');
    }

    //    public function givePermissionsToRole(Request $request) {
    //     // dd($request->role_id,$request->permission);
    //     $role = Role::findById($request->role_id);
    //   if($role->hasPermissionTo($request->permission)){
    //         // return back()->with('message', 'Permission exists.');
    //         return 'hzuhauha';
    //     }
    //     $role->givePermissionTo($request->permission);
    //     $rolePermissions = $role->permissions;
    //     return view('give-permission.give-permission',compact('rolePermissions'));

    // }

}
