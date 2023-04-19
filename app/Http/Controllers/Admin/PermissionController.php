<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\Permission\PermissionFormRequest;
use RealRashid\SweetAlert\Facades\Alert;
// use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->paginate(10);
        return view('admin.permissions.index', ['permissions' => $permissions]);
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(PermissionFormRequest $request)
    {
 
        $permission = Permission::create([
            'name' => $request->name,

        ]);
        Alert::success('Permission Created Successfully.');
        return redirect()->route('permission.index');
    }

    public function edit($id)
    {
        // dd($id);
        $permission = Permission::where('id', $id)->first();
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(PermissionFormRequest $request, $permissionId)
    {

        $permission = Permission::whereId($permissionId)->first();

        $permission->update([
            'name' => $request->name,

        ]);
        Alert::success('Permission Updated Successfully.');
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Permission::whereId($id)->first()->delete();
        $permission = Permission::find($id);
        if (empty($permission)) {
            return;
        }
        $permission->delete();
        return redirect()->route('permission.index');
    }

}
