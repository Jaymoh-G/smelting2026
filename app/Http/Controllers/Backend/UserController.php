<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
//use App\Mail\WelcomeOrganizationUserAfterAdminCreatesAccount;

use App\Models\User;
use App\Utilities\StaticFunctions as SF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Log;
use Auth;

class UserController extends Controller
{
    public function index() {

        $data = SF::makeTitle('Users', 'Users');

        //Get all users and pass it to the view
        $users = User::paginate(30);

        $data['users'] = $users;

        return view('backend.role_permissions.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $data = SF::makeTitle('Users', 'Create Users');

//        $roles = Auth::user()->roles()->first();
        $roles = Auth::user()->roles()->get();
        $roles_arr = [];
        foreach($roles as $role)
        {
            array_push($roles_arr, $role->name);
        }

        $in_array = in_array('Subscriber', $roles_arr);

        // We get roles depending on who is logged in
        // If it's a subscriber account, we don't wanna give him an ability to create admin accounts.
        if($in_array == true) {
            $data['roles'] = collect([]);
        }else {
            //Get all roles and pass it to the view
            $roles = Role::get();

            $data['roles'] = $roles;
        }


        return view('backend.role_permissions.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {

        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        // Now here we fetch the logged in user and find out the role they have.
        // If subscriber, then the user we creating will have the role

        $form_data = $request->only('email', 'name', 'password');
        $password_arr = $request->only('password');

        $form_data['password'] = bcrypt($password_arr['password']);

        $user = User::create($form_data);

        $roles = $request['roles']; //Retrieving the roles field

        //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user

            }
        }

        return redirect()->route('users_index')
            ->with('flash_message',
                'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        $data = SF::makeTitle('Users', 'Edit User');
        $user = User::findOrFail($id);
        $data['user'] = $user;

        $roles = Auth::user()->roles()->get();
        $roles_arr = [];
        foreach($roles as $role)
        {
            array_push($roles_arr, $role->name);
        }

        $data['roles'] = Role::all();

        return view('backend.role_permissions.users.edit', $data);

    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request) {

        // dd($request->all());

        $id = $request->id;
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
        ]);

        $password_changed = $request->only('password_changed');
        $password_changed = $password_changed['password_changed'];

        if($password_changed == 'changed' && $request->only('new_password') !== null) {

            //Retreive the name, email and password fields
            $input = $request->only(['name', 'email', 'new_password']);

            // Validate the new password
            $validation = $this->validate($request, [
                'new_password'=>'required|min:6|confirmed'
            ]);

            // If it passed validation, we set input['password] to new_password
            $input['password'] = bcrypt($input['new_password']);

            // If it did not change we take the old one, but this time we don't bcrypt it. ... A dirty hack!!
        }else{
            //Retreive the name, email and password fields
            $input = $request->only(['name', 'email', 'password']);

        }

        $roles = $request['roles']; //Retreive all roles


        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting rolec associated to a user
        }

        $user->fill($input)->save();

        return redirect()->route('users_index')
            ->with('flash_message',
                'User successfully updated.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $ajax_data = $request->all();
        $user_id = $ajax_data['resource_uid'];

        //FInally delete the user
        $user = User::findOrFail($user_id);
        $user->delete();

        // We wanna return JSON
        $response = SF::createResponse(1);

        return json_encode($response);
    }

    public function userProfile($id){
        $data = SF::makeTitle('User', 'My Profile');
        $user = User::findOrFail($id);
        $data['user'] = $user;
        return view('backend.role_permissions.users.user_profile', $data);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateUserProfile(Request $request){
        $id = $request->id;
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
        ]);

        $password_changed = $request->only('password_changed');
        $password_changed = $password_changed['password_changed'];

        if($password_changed == 'changed' && $request->only('new_password') !== null) {

            //Retreive the name, email and password fields
            $input = $request->only(['name', 'email', 'new_password']);

            // Validate the new password
            $validation = $this->validate($request, [
                'new_password'=>'required|min:6|confirmed'
            ]);

            // If it passed validation, we set input['password] to new_password
            $input['password'] = bcrypt($input['new_password']);

            // If it did not change we take the old one, but this time we don't bcrypt it. ... A dirty hack!!
        }else{
            //Retreive the name, email and password fields
            $input = $request->only(['name', 'email', 'password']);

        }

        $user->fill($input)->save();

        /* return redirect()->route('users_index')
             ->with('flash_message',
                 'User successfully updated.');*/
        // Give feedback to the user
        $response = "Profile successfully updated";
        $request->session()->flash('flash_message', $response);
        return redirect()->back()->withInput();
    }
}
