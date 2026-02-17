<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Utilities\StaticFunctions as SF;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data = SF::makeTitle('Permissions', 'Role Permissions');

        /**
         * Need a way to tell from where the link was clicked so that we separate between Role and Package Permissions.
         *
         */
        $permissions = Permission::all(); //Get role permissions

        $data['permissions'] = $permissions;

        return view('backend.role_permissions.permissions.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = SF::makeTitle('Permissions', 'Create Role Permissions');

        $roles = Role::all(); //Get all roles

        $data['roles'] = $roles;

        return view('backend.role_permissions.permissions.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     */
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name       = $request['name'];

        $permission = new Permission();
        $permission->name       = $name;


        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return redirect()->route('permissions.index')
            ->with('flash_message',
                'Permission '. $permission->name.' added!');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        /*$permission = Permission::findOrFail($id);

        return view('backend.role_permissions.permissions.permissions.edit', compact('permission'));*/

        $data = SF::makeTitle('Permissions', 'Edit Permission');

        $permission = Permission::findOrFail($id); //Get permission with specified id

        $data['permission'] = $permission;

        return view('backend.role_permissions.permissions.edit', $data);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request) {
        $id = $request->id;

        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('permissions.index')
            ->with('flash_message',
                'Permission '. $permission->name.' updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {

        $ajax_data = $request->all();
        $id = $ajax_data['resource_uid'];

        //Find a permission with a given id and delete
        $permission = Permission::findOrFail($id);
        $permission->delete();

        $response = SF::createResponse(1);

        return json_encode($response);

    }
}
