@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11 user-table">
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <h4 class="table-title">User: <span class="text-dark">{{ $user->first_name }}</span></h4>
                <h5 class="mt-5">Roles:</h5>
                <form method="POST" action="{{ route('user.gived-role-store', [$user->id]) }}">
                    @csrf
                    <div class="row mt-4 ms-3" id="roles">
                        @foreach ($roles as $role)
                            <div class="col-md-3 mt-3 form-check">
                                {{-- <input data-bind="text:Id" id={{ $role->id }} onclick="getRolePermissions(this);" --}}
                                <input id="role-{{$role->id }}" data-id={{ $role->id }} class="form-check-input all-role" name="roles[]"
                                    type="checkbox" value="{{ $role->name }}"
                                    @foreach ($userRoles as $userRole)

                                    {{ $role->id == $userRole->id ? 'checked' : '' }} @endforeach>
                                <label for="flexCheckChecked">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <h5 class="mt-5">Permissions:</h5>
                    <div id="permissions" class="row mt-4 ms-3">
   
                    </div>
                    <div class="col-12 mt-5">
                        <button type="submit" class="button mt-2">Asign</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>


        //  fetch Roles Permissions
        var permissionsID = [];
        var permissionsName = [];
        var permissionsOccur = [];
        var userPermissionsOccur = [];

        function render_permission(permissionsID,permissionsName, permissionsOccur){
            console.log("permissionName", permissionsName)
            console.log("permissionOccur", permissionsOccur)

            const permissionsList = document.getElementById('permissions')
            permissionsList.innerHTML='';
            permissionsID.map((item, index)=>{
                // console.log("item & index", item, index)
                var isChecked = ''
                if (permissionsOccur[index] && !userPermissionsOccur[index]){
                    isChecked = "checked disabled"
                }
                else if(userPermissionsOccur[index]){
                    isChecked = "checked"
                } else {
                    isChecked = ""
                }
                const div = document.createElement('div');
                div.classList.add('col-md-3');
                div.classList.add('mt-3');
                div.innerHTML =
                    ` <input class="form-check-input"
                        name="permissions[]" 
                        type="checkbox"
                    value= ${item}
                    ${isChecked}
                        >
                    <label for="flexCheckChecked">
                        ${permissionsName[index] }
                    </label>
                    `;
                permissionsList.appendChild(div);
            })
        }
        
        var singleUser = {!! json_encode($user) !!}
        var user_id = singleUser.id;

        $.ajax({
            type: 'GET',
            url: "http://127.0.0.1:8000/admin-dashboard/roles-permissions/" + user_id,
            data: '',
            dataType: 'json',
            success: function(response) {
                console.log("response",response)
                var permissions = response.permissions;
                var userRolesPermissions = response.user.roles
                var userPermissions = response.user.permissions
        
                permissions.map(permission => {
                    // creating three arrays from permissions
                    permissionsID.push(permission.id);
                    permissionsName.push(permission.name);
                    permissionsOccur.push(0);
                    userPermissionsOccur.push(0);
                })

                userRolesPermissions.map(role => {
                    role.permissions.map((user_permissions) => {
                        //   console.log(user_permissions.id)
                        permissionsID.map(permission_id => {
                            //  console.log("permission_id",permission_id)
                            //  console.log("user_permission_id",user_permissions.id)
                            if (permission_id == user_permissions.id) {
                                var indexOfPermissionsId = permissionsID.indexOf(permission_id)
                                // console.log("indexOfPermissionsId",indexOfPermissionsId)
                                permissionsOccur[indexOfPermissionsId] =  permissionsOccur[indexOfPermissionsId] + 1;
                                // console.log(permissionsOccur[indexOfPermissionsId])
                            }
                        })
                    })
                })

                if (userPermissionsOccur.length > 0){
                    userPermissions.map(item => {
                        var indexOfPermissionsId = permissionsName.indexOf(item.name)
                        userPermissionsOccur[indexOfPermissionsId] =  userPermissionsOccur[indexOfPermissionsId] + 1;
                        
                    })
                }

                render_permission(permissionsID, permissionsName, permissionsOccur)

                


            }


        });
        // console.log("permissionsID", permissionsID);
        // console.log("permissionsName", permissionsName);
        // console.log("permissionsOccur", permissionsOccur);

        $('.all-role').on('click',function(){
            console.log(this)
            var role_id = $(this).attr("data-id");
            console.log(role_id)
            var singleRolePermissions = []
            console.log('this.checked ', this.checked)
            var isChecked=this.checked
            $.ajax({
                type:'GET',
                url:"http://127.0.0.1:8000/admin-dashboard/role-permissions/"+ role_id ,
                dataType:'json',
                success: function (response){
                singleRolePermissions = response;
                console.log('single_role_permission', singleRolePermissions)
                console.log('single_role_permission length', singleRolePermissions.length)

                
            
                if (singleRolePermissions.length > 0){
                    singleRolePermissions.map(item => {
                        var permissionIndex = permissionsName.indexOf(item.name)
                        console.log('permissionIndex', permissionIndex)
                        console.log('permissionsOccur[permissionIndex]', permissionsOccur[permissionIndex])
                        // ++permissionsOccur[permissionIndex]
                        if(isChecked){
                        permissionsOccur[permissionIndex] = permissionsOccur[permissionIndex] + 1
                        } else{
                            permissionsOccur[permissionIndex] = permissionsOccur[permissionIndex] == 0 ? 0 : --permissionsOccur[permissionIndex]
                        }
                    })
                }
                else {
                    console.log("singleRolePermissions.length", singleRolePermissions.length)
                }
                render_permission(permissionsID, permissionsName, permissionsOccur)
            }})
            
            
        })


    </script>
@append
