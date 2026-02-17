<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Utilities\StaticFunctions as SF;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $data = SF::makeTitle('Roles', 'Roles');

        $roles = Role::paginate(100);

        $data['roles'] = $roles;

        return view('backend.role_permissions.roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = SF::makeTitle('Roles', 'Create Role');


        $permissions = Permission::all();
        $data['permissions'] = $permissions;

        return view('backend.role_permissions.roles.create', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        //Validate name and permissions field
        $validation_resp = $this->validate($request, [
                'name'=>'required|unique:roles|max:20',
//                'permissions' =>'required',
            ]
        );


        $name = $request['name'];
        $role = new Role();
        $role->name = $name;
        $role->save();

        $permissions = $request['permissions'];

        // If any permissions present on request
        if( $permissions != null ){
            //Looping thru selected permissions
            foreach ($permissions as $permission) {
                $p_permission = Permission::where('id', '=', $permission)->firstOrFail();
                //Fetch the newly created role and assign permission
                $role = Role::where('name', '=', $name)->first();

                $role->givePermissionTo($p_permission);  //Assign the package permission to role

            }
        }

        $response = 'Role '. $role->name.' added!';
        $request->session()->flash('success', $response);
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $data = SF::makeTitle('Roles', 'Edit Role');

        $role = Role::findOrFail($id); //Get role with specified id
//        $permissions = Permission::where('permission_type', 'role')->get();//Get all permissions WHERE ...
        // We get permissions for the package if it's a subscriber
        $permissions = Permission::all();//Get all permissions


        $data['role'] = $role;
        $data['permissions'] = $permissions;

        return view('backend.role_permissions.roles.edit', $data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request) {

        $id = $request->id;
        $role = Role::findOrFail($id);//Get role with the given id


        //Validate name and permission fields
        $this->validate($request, [

            'name'=>'required|max:30|unique:roles,name,'.$id,
//            'permissions' =>'required', // Not required yay! We might wanna revoke all permissions from a role
        ]);

        $input = $request->except(['permissions']);

        $permissions = $request['permissions'];


        $role->fill($input)->save(); // Just like update ... Form input names have to match DB column names

        $p_all = Permission::all();//Get all permissions


        foreach ($p_all as $p) {
            $role->revokePermissionTo($p); //Remove all permissions associated with role
        }

        if( !is_null($permissions) && count($permissions) > 0){
            foreach ($permissions as $permission) {
                // Get the permission object with the given ID (Note that we getting the package permission)
                $p_permission = Permission::find($permission); //Get corresponding form //permission in db

                // Get name of permission
                $p_perm_name = $p_permission->short_name;
                $matching_r_perm_name = "R".$p_perm_name;

                // Get the id of this role permission
                $r_permission = Permission::where('short_name', '=', $matching_r_perm_name)->firstOrFail();

                $role->givePermissionTo($p_permission);  //Assign the package permission to role
                $role->givePermissionTo($r_permission);  //Assign the role permission to role
            }
        }


        return redirect()->route('roles.index')
            ->with('flash_message',
                'Role '. $role->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ajax_data = $request->all();
        $id = $ajax_data['resource_uid'];

        //Find a user with a given id and delete
        $role = Role::findOrFail($id);
        $role->delete();

        $response = SF::createResponse(1);

        return json_encode($response);
    }
}
