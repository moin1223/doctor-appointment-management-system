<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' =>$request->password,
        ]);
        Alert::success('User Created Successfully');
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        // dd($id);
        $user = User::where('id', $id)->first();
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $userId)
    {

        $user = User::whereId($userId)->first();
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        Alert::success('User Updated Successfully');
        return redirect()->route('user.index');
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
        $user = User::find($id);
        if (empty($user)) {
            return;
        }
        $user->delete();
        return redirect()->route('user.index');
    }

    // give role to user
    public function giveRole($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        $userRoles = $user->roles;
        $permissions = Permission::all();
        // dd($userRoles);
        return view('admin.give-role.give-role', compact('user', 'roles', 'userRoles', 'permissions'));
    }
    public function givedRoleStore(Request $request, $id)
    {
        // dd($request->roles);
        // dd($request->permissions);
        $user = User::where('id', $id)->first();
        $user->syncroles($request->roles);
        // $user->givePermissionTo($request->permissions);
        $user->syncPermissions($request->permissions);
        return redirect()->back()->with('message', 'Successfully Assigned!');
    }

    //  role permisssions
    public function rolePermissions($id)
    {
        $role = Role::where('id', $id)->first();
        $rolePermissions = $role->permissions;
        return response()->json($rolePermissions);

    }

    //roles permissions
    public function rolesPermissions($id)
    {
        $permissions = Permission::all();
        $roles = Role::all();
        $user = User::with('roles', 'roles.permissions', 'permissions')->find($id);
        // $rolePermissions = $role->permissions;
        // $user = User::where('id', $id)->first();
        // $roles = Role::all();
        // $userRoles = $user->roles;
        // $rolesPermissions = $userRoles->permissions;

        return response()->json(
            [
                'permissions' => $permissions,
                'user' => $user,
                // 'rolePermissions' => $rolePermissions,
                'roles' => $roles,
                // 'userRoles' => $userRoles,s

            ]

        );

    }

    public function rootPath()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');

        } else {

            return redirect()->route('show-login');

        }

    }
    // userProfie

    public function profileShow()
    {
        $userId = auth()->user()->id;
        $user = User::whereId($userId)->first();
        return view('userProfile.userProfileShow', compact('user'));
    }

    public function profileUpdate(Request $request, $userId)
    {
        //  dd($request->all());

        $user = User::whereId($userId)->first();
        $imageName = '';
        $deleteOldImage = 'images/users/' . $user->image;
        if ($image = $request->file('image')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('images/users', $imageName);
        } else {
            $imageName = $user->image;
        }

        $user->update([
            'image' => $imageName,
        ]);
        Alert::success('Profile Updated Successfully');
        return redirect()->back();
    }

}
