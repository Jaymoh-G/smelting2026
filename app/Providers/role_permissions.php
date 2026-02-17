<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate as GateContract;
use Log;

// There are things that the developer needs to setup themselves
// So we only give access to Super Admin and the developer
// For example who can create permissions and delete permissions?
GateContract::define('RoleSuperAdmin', function($user){

    $allowed = $user->hasRole('Super Admin') || $user->hasRole('Developer');
    Log::info('RoleSuperAdmin ?');
    Log::info($allowed);
    return $allowed ? true : null;
});

GateContract::define('RoleDevMode', function($user){

     $allowed = $user->hasRole('Developer') || $user->hasRole('Developer');
//    $allowed = $user->hasRole('Super Admin') || $user->hasRole('Developer');
    return $allowed ? true : null;
});

// Who can view packages ... This is just the Ujuzi Kilimo Admins Only
GateContract::define('RoleAdmin', function($user){
    return $user->hasRole('Developer') ? true : null;

});

// Who is allowed to view the menu to create users, packages, permissions etc ??
GateContract::define('RoleSysAdmin', function($user){

    $allowed = $user->hasRole('Admin');
    return $allowed ? true : null;
});

// For the Agronomony section
GateContract::define('RoleAgronomist', function($user){

    $allowed = $user->hasRole('Admin') || $user->hasRole('Agronomist');
    return $allowed ? true : null;
});


/**
 *  Here we repeat the package permissions in role form, because this is what will be applied to the roles
 * on the subscriber side ...
 *
 *
 */
GateContract::define('RFarmersAccessModule', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // array_push($role_permissions, "RFarmersAccessModule");
    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    /*Log::info("RFarmersAccessModule");
    Log::info($role_permissions);*/
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RFarmersAccessModule', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RFarmersCreateSingle', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RFarmersCreateSingle', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RFarmersUploadBulk', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RFarmersUploadBulk', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RFarmersEditFarmerDetails', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RFarmersEditFarmerDetails', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RFarmersExportExcel', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RFarmersExportExcel', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RFarmersDeleteFarmers', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RFarmersDeleteFarmers', $role_permissions);
    }

    return $allowed;
});

/**
 * Messaging
 */
GateContract::define('RMessagesAccessModule', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesAccessModule', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesSendQuick', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesSendQuick', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesExportExcel', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesExportExcel', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesScheduling', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesScheduling', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesViewSMSGroups', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesViewSMSGroups', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesAddSMSGroups', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesAddSMSGroups', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesViewScheduled', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesViewScheduled', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesViewAlertsMenu', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesViewAlertsMenu', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesViewFertilizerAlerts', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesViewFertilizerAlerts', $role_permissions);
    }

    return $allowed;
});


GateContract::define('RMessagesViewTemplates', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesViewTemplates', $role_permissions);
    }

    return $allowed;
});


GateContract::define('RMessagesSendFertilizerAlerts', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesSendFertilizerAlerts', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesViewWeatherAlerts', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesViewWeatherAlerts', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RMessagesSendWeatherAlerts', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RMessagesSendWeatherAlerts', $role_permissions);
    }

    return $allowed;
});



/**
 * System administration
 */
GateContract::define('RSysAdminAccessModule', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminAccessModule', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminAccessUsersAndRoles', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminAccessUsersAndRoles', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminAddUser', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminAddUser', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminEditUser', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminEditUser', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminDeleteUser', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminDeleteUser', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminInviteUsers', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminInviteUsers', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminViewRoles', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminViewRoles', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminAddRole', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminAddRole', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminEditRole', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminEditRole', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminDeleteRole', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminDeleteRole', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminViewPermissions', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminViewPermissions', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminAddPermission', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminAddPermission', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminEditPermission', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminEditPermission', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminDeletePermission', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminDeletePermission', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminAccessPackages', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminAccessPackages', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSysAdminAccessGeneralSettings', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSysAdminAccessGeneralSettings', $role_permissions);
    }

    return $allowed;
});


/**
 * KITS AND SOIL TESTS
 */

GateContract::define('RSoilTestsAccess', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSoilTestsAccess', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSoilTestsBookFull', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSoilTestsBookFull', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RSoilTestsBookpHOnly', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RSoilTestsBookpHOnly', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RTestKitsAccess', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RTestKitsAccess', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RTestKitsAddNew', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RTestKitsAddNew', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RKitOperatorsAccess', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RKitOperatorsAccess', $role_permissions);
    }

    return $allowed;
});

GateContract::define('RKitOperatorsAddNew', function($user){

    // Get the roles the user belongs to
    $user_roles = $user->roles()->get();

    $role_permissions = [];
    foreach ($user_roles as $role) {
        $one_role_permissions = $role->permissions()->get()->pluck('short_name');
        foreach ($one_role_permissions as $key => $value) {
            # code...
            array_push($role_permissions, $value);
        }

    }

    // We could have duplicates
    $role_permissions = array_unique($role_permissions);
    $allowed = false;
    if($role_permissions != null){
        // $user_permissions = $user_permissions->toArray(); // For some reason this is stored as an array
        // Instead of collection
        // $role_permissions = $role_permissions->toArray();

        // Does this permission exist in the array of the user's permissions?
        $allowed = in_array('RKitOperatorsAddNew', $role_permissions);
    }

    return $allowed;
});

